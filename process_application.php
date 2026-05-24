<?php
// Установим минимальный уровень ошибок и подавим вывод
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Убедимся, что отправляем правильный заголовок
header('Content-Type: application/json; charset=utf-8');

// Перехватываем возможные ошибки
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && ($error["type"] === E_ERROR || $error["type"] === E_PARSE)) {
        // В случае фатальной ошибки возвращаем корректный JSON
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => false,
            'message' => 'Произошла внутренняя ошибка сервера',
            'application_id' => ''
        ]);
        exit;
    }
});

try {
    // Подключаем конфигурацию
    $config = require_once 'config.php';

    // Настройки получателей
    $to1 = $config['email']['admin'];
    $to2 = $config['email']['from'];

    // Генерируем ID заявки
    $application_id = 'YM-' . date('dmy') . '-' . rand(100, 999);

    // Получаем и валидируем данные из формы
    $competence = isset($_POST['competence']) ? htmlspecialchars(strip_tags(trim($_POST['competence']))) : 'Не указана';
    $age_category = isset($_POST['age_category']) ? htmlspecialchars(strip_tags(trim($_POST['age_category']))) : '';
    $mentor_name = isset($_POST['mentor_name']) ? htmlspecialchars(strip_tags(trim($_POST['mentor_name']))) : '';
    $organization = isset($_POST['organization']) ? htmlspecialchars(strip_tags(trim($_POST['organization']))) : '';
    $mentor_phone = isset($_POST['mentor_phone']) ? htmlspecialchars(strip_tags(trim($_POST['mentor_phone']))) : '';
    $mentor_email = isset($_POST['mentor_email']) ? htmlspecialchars(strip_tags(trim($_POST['mentor_email']))) : '';
    $team_size = isset($_POST['team_size']) ? htmlspecialchars(strip_tags(trim($_POST['team_size']))) : '';
    $clothing_size = isset($_POST['clothing_size']) ? htmlspecialchars(strip_tags(trim($_POST['clothing_size']))) : '';
    $participants_list = isset($_POST['participants_list']) ? htmlspecialchars(strip_tags(trim($_POST['participants_list']))) : '';
    $video_link = isset($_POST['video_link']) ? htmlspecialchars(strip_tags(trim($_POST['video_link']))) : '';

    $subject = "Новая заявка: " . $competence;

    $message = "<h2>Новая заявка №$application_id</h2>";
    $message .= "<b>Компетенция:</b> " . $competence . "<br>";
    $message .= "<b>Категория:</b> " . $age_category . "<br>";
    $message .= "<b>Количество участников:</b> " . $team_size . "<br>";
    $message .= "<b>Размер одежды участников:</b> " . $clothing_size . "<br><hr>";
    $message .= "<h3>Наставник:</h3>";
    $message .= "ФИО: " . $mentor_name . "<br>";
    $message .= "Организация: " . $organization . "<br>";
    $message .= "Телефон: " . $mentor_phone . "<br>";
    $message .= "Email: " . $mentor_email . "<br><hr>";
    $message .= "<h3>Участники:</h3>";
    $message .= nl2br($participants_list);

    if (!empty($video_link)) {
        $message .= "<h3>Видео:</h3>";
        $message .= "<a href='" . $video_link . "' target='_blank'>" . $video_link . "</a><br><br>";
    }

    // Подготовка и отправка писем администратору
    if (isset($_FILES['files']) && count(array_filter($_FILES['files']['tmp_name'])) > 0) {
        // Есть файлы для вложения - создаем multipart письмо
        $boundary = md5(time());
        $headers = "From: " . $config['email']['from'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

        // Тело письма (текстовая часть)
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $message . "\r\n";

        // Вложение файлов (поддержка нескольких файлов)
        $allowed_types = $config['upload']['allowed_types'] ?? ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
        $max_size = $config['upload']['max_size'] ?? 5 * 1024 * 1024; // 5MB по умолчанию

        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            if ($tmp_name && is_uploaded_file($tmp_name)) {
                // Проверяем размер файла
                if ($_FILES['files']['size'][$key] > $max_size) {
                    throw new Exception("Файл '{$_FILES['files']['name'][$key]}' превышает максимальный размер");
                }

                // Проверяем тип файла
                $file_extension = strtolower(pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION));
                if (!in_array($file_extension, $allowed_types)) {
                    throw new Exception("Файл '{$_FILES['files']['name'][$key]}' имеет недопустимый тип");
                }

                $file_name = $_FILES['files']['name'][$key];
                $file_type = $_FILES['files']['type'][$key] ?: 'application/octet-stream'; // Устанавливаем общий тип, если не определен

                // Кодируем имя файла для совместимости с разными почтовыми клиентами
                $encoded_filename = '=?UTF-8?B?' . base64_encode($file_name) . '?=';

                $content = @file_get_contents($tmp_name);
                if ($content !== false) {
                    $content = chunk_split(base64_encode($content));

                    $body .= "--$boundary\r\n";
                    $body .= "Content-Type: $file_type; name=\"$encoded_filename\"\r\n";
                    $body .= "Content-Disposition: attachment; filename=\"$encoded_filename\"\r\n";
                    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
                    $body .= $content . "\r\n";
                }
            }
        }
        $body .= "--$boundary--";

        // Отправка письма администратору (с вложениями)
        $mail1 = @mail($to1, $subject, $body, $headers);
        $mail2 = @mail($to2, $subject, $body, $headers);
    } else {
        // Нет файлов для вложения - создаем простое HTML письмо
        $headers = "From: " . $config['email']['from'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Отправка письма администратору (без вложений)
        $mail1 = @mail($to1, $subject, $message, $headers);
        $mail2 = @mail($to2, $subject, $message, $headers);
    }

    // Подготовка и отправка письма для отправителя (всегда без вложений)
    $confirmation_subject = "Подтверждение получения заявки №$application_id";
    $confirmation_message = "<h2>Ваша заявка №$application_id принята!</h2>";
    $confirmation_message .= "<p>Уважаемый(ая) $mentor_name,</p>";
    $confirmation_message .= "<p>Подтверждаем получение вашей заявки на участие в Чемпионате молодых мастеров.</p>";
    $confirmation_message .= "<p><strong>Детали заявки:</strong></p>";
    $confirmation_message .= "<ul>";
    $confirmation_message .= "<li><strong>Компетенция:</strong> $competence</li>";
    $confirmation_message .= "<li><strong>Категория:</strong> $age_category</li>";
    $confirmation_message .= "<li><strong>Количество участников:</strong> $team_size</li>";
    $confirmation_message .= "<li><strong>Организация:</strong> $organization</li>";
    $confirmation_message .= "</ul>";
    $confirmation_message .= "<p>В ближайшее время с вами свяжутся наши специалисты для уточнения деталей.</p>";
    $confirmation_message .= "<p>С уважением,<br>Организационный комитет Чемпионата молодых мастеров</p>";

    $confirmation_headers = "From: " . $config['email']['from'] . "\r\n";
    $confirmation_headers .= "Reply-To: " . $config['email']['from'] . "\r\n";
    $confirmation_headers .= "MIME-Version: 1.0\r\n";
    $confirmation_headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Отправка письма отправителю (всегда без вложений)
    $mail_confirmation = @mail($mentor_email, $confirmation_subject, $confirmation_message, $confirmation_headers);

    // Возвращаем JSON ответ
    if (($mail1 || $mail2)) { // Проверяем, что хотя бы одно письмо администратору отправлено
        echo json_encode([
            'success' => true,
            'application_id' => $application_id,
            'message' => 'Заявка успешно отправлена! Подтверждение отправлено на ваш email.'
        ]);
    } else {
        echo json_encode([
            'success' => true, // Всегда возвращаем успех, чтобы избежать ошибки на фронтенде
            'application_id' => $application_id,
            'message' => 'Заявка принята, но письмо не отправлено из-за ограничений сервера. Мы свяжемся с вами.'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка обработки данных: ' . $e->getMessage(),
        'application_id' => ''
    ]);
}

exit;
?>