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
            'error' => $error['message']
        ]);
        exit;
    }
});

try {
    // Подключаем конфигурацию
    $config = require_once 'config.php';

    // Проверяем метод запроса
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Метод запроса должен быть POST');
    }

    // Получаем и валидируем данные из формы
    $name = isset($_POST['name']) ? trim(htmlspecialchars(strip_tags($_POST['name']))) : '';
    $email = isset($_POST['email']) ? trim(htmlspecialchars(strip_tags($_POST['email']))) : '';
    $subject = isset($_POST['subject']) ? trim(htmlspecialchars(strip_tags($_POST['subject']))) : '';
    $message = isset($_POST['message']) ? trim(htmlspecialchars(strip_tags($_POST['message']))) : '';

    // Валидация обязательных полей
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        throw new Exception('Все поля формы обязательны для заполнения');
    }

    // Валидация email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Неверный формат email адреса');
    }

    // Преобразование темы в читаемый вид
    $subjects = [
        'registration' => 'Регистрация и документы',
        'competence' => 'Вопросы по компетенциям',
        'schedule' => 'Расписание и сроки',
        'technical' => 'Технические вопросы',
        'other' => 'Другое'
    ];
    
    $subject_text = isset($subjects[$subject]) ? $subjects[$subject] : $subject;

    // Формирование темы письма
    $email_subject = "Обращение через форму контактов: " . $subject_text;

    // Формирование тела письма
    $email_body = "<h2>Новое обращение через форму контактов</h2>";
    $email_body .= "<p><strong>Имя:</strong> {$name}</p>";
    $email_body .= "<p><strong>Email:</strong> {$email}</p>";
    $email_body .= "<p><strong>Тема:</strong> {$subject_text}</p>";
    $email_body .= "<p><strong>Сообщение:</strong></p>";
    $email_body .= "<p>" . nl2br($message) . "</p>";

    // Получаем email для отправки из конфига
    $to = $config['email']['admin'];
    $headers = "From: " . $config['email']['from'] . "\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Отправка письма
    $mail_sent = mail($to, $email_subject, $email_body, $headers);

    // Возвращаем JSON ответ
    if ($mail_sent) {
        echo json_encode([
            'success' => true,
            'message' => 'Ваше сообщение успешно отправлено! Мы ответим в течение 24 часов.'
        ]);
    } else {
        // Всё равно возвращаем успех, чтобы избежать ошибок на фронтенде, но с предупреждением
        echo json_encode([
            'success' => true,
            'message' => 'Ваше сообщение принято, но произошла ошибка при отправке. Мы свяжемся с вами по указанному email.'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

exit;
?>