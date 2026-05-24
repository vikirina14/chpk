<?php
// Пытаемся подключить конфигурацию, проверяя различные возможные пути
$config = null;

if (file_exists('config.php')) {
    $config = require 'config.php';
} elseif (file_exists('../config.php')) {
    $config = require '../config.php';
} elseif (file_exists('../../config.php')) {
    $config = require '../../config.php';
} else {
    die('Не удалось найти файл конфигурации');
}

// Получаем выбранную компетенцию из URL и декодируем её
$selectedCompetence = isset($_GET['competence']) ? urldecode($_GET['competence']) : '';

// Загружаем конфигурацию компетенций
$competencies = $config['championship']['competencies'];

// Проверяем, существует ли выбранная компетенция в конфигурации
if ($selectedCompetence && !isset($competencies[$selectedCompetence])) {
    // Если компетенция не найдена, можно установить первую доступную или оставить пустой
    $available_competences = array_keys($competencies);
    if (!empty($available_competences)) {
        $selectedCompetence = $available_competences[0];
    } else {
        $selectedCompetence = '';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подать заявку - <?= $config['site']['title'] ?></title>
    <meta name="description" content="Форма регистрации команды для участия в Чемпионате молодых мастеров">
    <?php include 'components/meta.php'; ?>
</head>
<body>
    <!-- 3D Background Elements -->
    <div class="bg-3d">
        <div class="cube"></div>
        <div class="sphere"></div>
        <div class="pyramid"></div>
        <div class="particles"></div>
        <div class="gradient-overlay"></div>
    </div>

    <!-- Header -->
    <?php include 'components/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero-3d" style="background: linear-gradient(rgba(26, 26, 46, 0.9), rgba(26, 26, 46, 0.9));">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-tag">
                        <i class="fas fa-file-signature"></i>
                        Регистрация команды
                    </div>
                    <h1 class="text-3d">
                        <span class="text-3d-layer">ПОДАТЬ</span>
                        <span class="text-3d-layer accent">ЗАЯВКУ</span>
                    </h1>
                    <p class="hero-subtitle">Заполните форму для участия в I Региональном Чемпионате молодых мастеров</p>
                </div>
            </div>
        </section>

        <!-- Application Form -->
        <section class="application-section">
            <div class="container">
                <div class="application-steps">
                    <div class="step active">
                        <div class="step-number">1</div>
                        <div class="step-label">Данные наставника</div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-label">Информация о команде</div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-label">Документы</div>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-label">Подтверждение</div>
                    </div>
                </div>

                <form id="championshipForm" class="application-form glass-card" method="POST" action="process_application.php" enctype="multipart/form-data">
                    <div class="form-section active" id="section1">
                        <h2 class="form-title">
                            <i class="fas fa-user-tie"></i>
                            Информация о наставнике
                        </h2>
                        <p class="form-subtitle">Лицо, сопровождающее команду на всех этапах чемпионата</p>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="mentor_name">
                                    <i class="fas fa-user"></i>
                                    ФИО наставника *
                                </label>
                                <input type="text" id="mentor_name" name="mentor_name" required 
                                       placeholder="Иванов Иван Иванович">
                                <div class="form-hint">Полное ФИО без сокращений</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="mentor_position">
                                    <i class="fas fa-briefcase"></i>
                                    Должность *
                                </label>
                                <input type="text" id="mentor_position" name="mentor_position" required 
                                       placeholder="Педагог дополнительного образования">
                            </div>
                            
                            <div class="form-group">
                                <label for="organization">
                                    <i class="fas fa-university"></i>
                                    Образовательная организация *
                                </label>
                                <input type="text" id="organization" name="organization" required 
                                       placeholder="МБОУ СОШ №1 г. Чебоксары">
                                <div class="form-hint">Полное официальное название</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="mentor_phone">
                                    <i class="fas fa-phone"></i>
                                    Контактный телефон *
                                </label>
                                <input type="tel" id="mentor_phone" name="mentor_phone" required 
                                       placeholder="+7 (900) 123-45-67">
                                <div class="form-hint">Телефон для оперативной связи</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="mentor_email">
                                    <i class="fas fa-envelope"></i>
                                    Электронная почта *
                                </label>
                                <input type="email" id="mentor_email" name="mentor_email" required 
                                       placeholder="example@mail.ru">
                                <div class="form-hint">На этот email придет подтверждение заявки</div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn-next" onclick="nextSection(1)">
                                Далее
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-section" id="section2">
                        <h2 class="form-title">
                            <i class="fas fa-users"></i>
                            Информация о команде
                        </h2>
                        <p class="form-subtitle">Данные об участниках и выбранной компетенции</p>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="competence">
                                    <i class="fas fa-cogs"></i>
                                    Компетенция *
                                </label>
                                <select id="competence" name="competence" required>
                                    <option value="">-- Выберите компетенцию --</option>
                                    <?php foreach($competencies as $name => $comp): ?>
                                    <option value="<?= $name ?>" <?= $selectedCompetence == $name ? 'selected' : '' ?>>
                                        <?= $name ?> (<?= implode(', ', $comp['ages']) ?>)
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="age_category">
                                    <i class="fas fa-child"></i>
                                    Возрастная категория *
                                </label>
                                <select id="age_category" name="age_category" required>
                                    <option value="">-- Выберите категорию --</option>
                                    <option value="ДОУ">Воспитанники ДОУ (5-7 лет)</option>
                                    <option value="1-4 класс">Обучающиеся 1-4 классов</option>
                                    <option value="5-8 класс">Обучающиеся 5-8 классов</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="team_size">
                                    <i class="fas fa-user-friends"></i>
                                    Количество участников *
                                </label>
                                <input type="number" id="team_size" name="team_size" min="1" max="10" required 
                                       placeholder="От 1 до 10" value="3">
                                <div class="form-hint">От 1 до 10 человек в команде</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="clothing_size">
                                    <i class="fas fa-tshirt"></i>
                                    Размер одежды участников
                                </label>
                                <input type="text" id="clothing_size" name="clothing_size"
                                       placeholder="Например: 30, 32, S, M">
                                <div class="form-hint">Укажите размеры через запятую</div>
                            </div>

                            <div class="form-group">
                                <label for="video_link">
                                    <i class="fas fa-video"></i>
                                    Ссылка на видео (по желанию)
                                </label>
                                <input type="url" id="video_link" name="video_link"
                                       placeholder="https://drive.google.com/...">
                                <div class="form-hint">Ссылка на облачное хранилище с видео вашего проекта (Google Drive, Dropbox и т.д.)</div>
                            </div>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="participants_list">
                                <i class="fas fa-list"></i>
                                Список участников *
                            </label>
                            <textarea id="participants_list" name="participants_list" required 
                                      rows="5"
                                      placeholder="Введите каждого участника с новой строки:
Пример:
Иванов Иван, 6 лет, воспитанник ДОУ
Петрова Анна, 1 класс, 7 лет
Сидоров Петр, 2 класс, 8 лет"></textarea>
                            <div class="form-hint">Указывайте: ФИО, возраст/класс, статус</div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn-prev" onclick="prevSection(2)">
                                <i class="fas fa-arrow-left"></i>
                                Назад
                            </button>
                            <button type="button" class="btn-next" onclick="nextSection(2)">
                                Далее
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-section" id="section3">
                        <h2 class="form-title">
                            <i class="fas fa-paperclip"></i>
                            Прикрепление документов
                        </h2>
                        <p class="form-subtitle">Загрузите заполненные бланки согласий</p>
                        
                        <div class="upload-instructions">
                            <div class="instruction-item">
                                <i class="fas fa-info-circle"></i>
                                <div>
                                    <h4>Требования к файлам:</h4>
                                    <ul>
                                        <li>Форматы: PDF, DOC, DOCX, JPG, PNG</li>
                                        <li>Максимальный размер: 5MB на файл</li>
                                        <li>Максимум: 5 файлов</li>
                                        <li>Обязательно: заполненные бланки согласий</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="file-upload-area">
                            <div class="file-upload-box" id="fileDropArea">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <h4>Перетащите файлы сюда</h4>
                                <p>или нажмите для выбора</p>
                                <input type="file" id="fileInput" name="files[]" multiple
                                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                       class="file-input">
                            </div>

                            <div class="file-list" id="fileList">
                                <!-- Файлы будут добавляться сюда -->
                            </div>
                        </div>

                        <script>
                        // Глобальный массив для хранения файлов
                        let uploadedFiles = [];

                        // Добавляем функциональность для отображения загруженных файлов
                        document.addEventListener('DOMContentLoaded', function() {
                            const fileInput = document.getElementById('fileInput');
                            const fileDropArea = document.getElementById('fileDropArea');
                            const fileList = document.getElementById('fileList');

                            if (fileInput && fileDropArea && fileList) {
                                // Обработчик изменения файла
                                fileInput.addEventListener('change', function() {
                                    handleFiles(this.files);
                                });

                                // Обработчик перетаскивания файлов
                                fileDropArea.addEventListener('dragover', function(e) {
                                    e.preventDefault();
                                    this.classList.add('highlight');
                                });

                                fileDropArea.addEventListener('dragleave', function() {
                                    this.classList.remove('highlight');
                                });

                                fileDropArea.addEventListener('drop', function(e) {
                                    e.preventDefault();
                                    this.classList.remove('highlight');
                                    handleFiles(e.dataTransfer.files);
                                });

                                // Функция обработки файлов
                                function handleFiles(files) {
                                    for (let i = 0; i < files.length; i++) {
                                        const file = files[i];

                                        // Проверяем размер файла
                                        if (file.size > 5 * 1024 * 1024) { // 5MB
                                            alert(`Файл ${file.name} превышает максимальный размер 5MB`);
                                            continue;
                                        }

                                        // Проверяем тип файла
                                        const allowedTypes = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
                                        const fileExt = file.name.toLowerCase().split('.').pop();
                                        if (!allowedTypes.includes(fileExt)) {
                                            alert(`Файл ${file.name} имеет недопустимый тип. Разрешены: ${allowedTypes.join(', ')}`);
                                            continue;
                                        }

                                        // Добавляем файл в глобальный массив
                                        uploadedFiles.push(file);

                                        // Создаем элемент для отображения файла
                                        const fileItem = document.createElement('div');
                                        fileItem.className = 'file-item';
                                        fileItem.innerHTML = `
                                            <div class="file-info">
                                                <i class="fas fa-file"></i>
                                                <div>
                                                    <div class="file-name">${file.name}</div>
                                                    <div class="file-size">${formatFileSize(file.size)}</div>
                                                </div>
                                            </div>
                                            <button type="button" class="remove-file" data-filename="${file.name}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        `;

                                        fileList.appendChild(fileItem);

                                        // Добавляем обработчик удаления файла
                                        fileItem.querySelector('.remove-file').addEventListener('click', function() {
                                            // Удаляем файл из визуального списка
                                            fileList.removeChild(fileItem);

                                            // Удаляем файл из глобального массива
                                            const fileName = this.getAttribute('data-filename');
                                            uploadedFiles = uploadedFiles.filter(f => f.name !== fileName);
                                        });
                                    }

                                    // Очищаем input
                                    fileInput.value = '';
                                }

                                // Функция форматирования размера файла
                                function formatFileSize(bytes) {
                                    if (bytes === 0) return '0 Bytes';
                                    const k = 1024;
                                    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                                    const i = Math.floor(Math.log(bytes) / Math.log(k));
                                    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
                                }
                            }
                        });
                        </script>
                        
                        <div class="required-docs">
                            <h4><i class="fas fa-check-circle"></i> Обязательные документы:</h4>
                            <ul>
                                <li>Согласие на обработку персональных данных</li>
                                <li>Согласие на фото- и видеосъемку</li>
                                <li>Согласие на участие и сопровождение</li>
                            </ul>
                            <p class="small">Скачайте бланки в разделе <a href="documents.php">Документы</a></p>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn-prev" onclick="prevSection(3)">
                                <i class="fas fa-arrow-left"></i>
                                Назад
                            </button>
                            <button type="button" class="btn-next" onclick="nextSection(3)">
                                Далее
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-section" id="section4">
                        <h2 class="form-title">
                            <i class="fas fa-check-circle"></i>
                            Подтверждение заявки
                        </h2>
                        <p class="form-subtitle">Проверьте данные перед отправкой</p>
                        
                        <div class="review-data">
                            <div class="review-section">
                                <h4><i class="fas fa-user-tie"></i> Данные наставника</h4>
                                <div class="review-item">
                                    <span class="review-label">ФИО:</span>
                                    <span id="reviewMentorName" class="review-value"></span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Организация:</span>
                                    <span id="reviewOrganization" class="review-value"></span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Контактные данные:</span>
                                    <span id="reviewContacts" class="review-value"></span>
                                </div>
                            </div>
                            
                            <div class="review-section">
                                <h4><i class="fas fa-users"></i> Информация о команде</h4>
                                <div class="review-item">
                                    <span class="review-label">Компетенция:</span>
                                    <span id="reviewCompetence" class="review-value"></span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Возрастная категория:</span>
                                    <span id="reviewAgeCategory" class="review-value"></span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Количество участников:</span>
                                    <span id="reviewTeamSize" class="review-value"></span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Участники:</span>
                                    <span id="reviewParticipants" class="review-value"></span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Видео:</span>
                                    <span id="reviewVideoLink" class="review-value"></span>
                                </div>
                            </div>
                            
                            <div class="review-section">
                                <h4><i class="fas fa-file"></i> Прикрепленные файлы</h4>
                                <div id="reviewFiles" class="review-files">
                                    <p class="no-files">Файлы не загружены</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="agreement-check">
                            <input type="checkbox" id="agreement" name="agreement" required>
                            <label for="agreement">
                                Я подтверждаю, что ознакомлен(а) с 
                                <a href="documents.php" target="_blank">Положением о проведении Чемпионата</a>
                                и даю согласие на обработку персональных данных всех участников команды. *
                            </label>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn-prev" onclick="prevSection(4)">
                                <i class="fas fa-arrow-left"></i>
                                Назад
                            </button>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i>
                                Отправить заявку
                            </button>
                        </div>
                    </div>
                </form>
                
                <div class="form-progress">
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <div class="progress-text">
                        <span id="progressText">Шаг 1 из 4</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Success Modal -->
        <div id="successModal" class="modal">
            <div class="modal-content glass-card">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Заявка успешно отправлена!</h3>
                <p>Ваша заявка на участие в Чемпионате молодых мастеров принята.</p>
                <p>В ближайшее время на указанный email придет подтверждение.</p>
                <div class="success-details">
                    <p><strong>Номер заявки:</strong> <span id="applicationNumber">YM-<?= date('Ymd') ?>-<?= rand(1000, 9999) ?></span></p>
                    <p><strong>Дата подачи:</strong> <span id="applicationDate"><?= date('d.m.Y H:i') ?></span></p>
                </div>
                <div class="modal-actions">
                    <button class="btn-modal" onclick="closeSuccessModal()">Закрыть</button>
                    <a href="index.php" class="btn-modal primary">На главную</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </div>

<script>
// Текущий шаг формы
let currentStep = 1;

// Функция для перехода на следующий шаг
function nextSection(step) {
    const currentSection = document.getElementById('section' + step);
    
    // Простая валидация полей перед переходом
    const inputs = currentSection.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    inputs.forEach(input => {
        if (!input.checkValidity()) {
            input.reportValidity();
            isValid = false;
        }
    });

    if (isValid) {
        currentSection.classList.remove('active');
        currentStep = step + 1;
        document.getElementById('section' + currentStep).classList.add('active');
        updateProgress();
        updateReviewData(); // Обновляем данные для 4-го шага
    }
}

// Функция для возврата назад
function prevSection(step) {
    document.getElementById('section' + step).classList.remove('active');
    currentStep = step - 1;
    document.getElementById('section' + currentStep).classList.add('active');
    updateProgress();
}

// Обновление прогресс-бара и текста
function updateProgress() {
    const steps = document.querySelectorAll('.step');
    steps.forEach((s, idx) => {
        if (idx < currentStep) s.classList.add('active');
        else s.classList.remove('active');
    });

    const progress = ((currentStep - 1) / 3) * 100;
    document.getElementById('progressFill').style.width = progress + '%';
    document.getElementById('progressText').textContent = `Шаг ${currentStep} из 4`;
}

// Заполнение данных на финальном шаге проверки
function updateReviewData() {
    if (currentStep === 4) {
        document.getElementById('reviewMentorName').textContent = document.getElementById('mentor_name').value;
        document.getElementById('reviewOrganization').textContent = document.getElementById('organization').value;
        document.getElementById('reviewContacts').textContent =
            document.getElementById('mentor_phone').value + ' | ' + document.getElementById('mentor_email').value;
        document.getElementById('reviewCompetence').textContent = document.getElementById('competence').value;
        document.getElementById('reviewAgeCategory').textContent = document.getElementById('age_category').value;
        document.getElementById('reviewTeamSize').textContent = document.getElementById('team_size').value;
        document.getElementById('reviewParticipants').textContent = document.getElementById('participants_list').value;

        // Обновляем поле с видео
        const videoLink = document.getElementById('video_link').value;
        if (videoLink) {
            document.getElementById('reviewVideoLink').innerHTML = `<a href="${videoLink}" target="_blank">${videoLink}</a>`;
        } else {
            document.getElementById('reviewVideoLink').textContent = 'Не предоставлено';
        }

        // Обновляем информацию о загруженных файлах
        updateReviewFiles();
    }
}

// Обновление информации о загруженных файлах
function updateReviewFiles() {
    const fileList = document.getElementById('fileList');
    const reviewFilesContainer = document.getElementById('reviewFiles');

    if (!fileList || !reviewFilesContainer) return;

    const fileItems = fileList.querySelectorAll('.file-item');

    if (fileItems.length === 0) {
        reviewFilesContainer.innerHTML = '<p class="no-files">Файлы не загружены</p>';
        return;
    }

    let filesHtml = '';
    fileItems.forEach(item => {
        const fileName = item.querySelector('.file-name').textContent;
        const fileSize = item.querySelector('.file-size').textContent;

        filesHtml += `
            <div class="review-file-item">
                <i class="fas fa-file"></i>
                <div>
                    <div>${fileName}</div>
                    <small>${fileSize}</small>
                </div>
            </div>
        `;
    });

    reviewFilesContainer.innerHTML = filesHtml;
}

// Закрытие модального окна
function closeSuccessModal() {
    document.getElementById('successModal').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    // ВНИМАНИЕ: Исправлено ID на championshipForm (как в вашем HTML)
    const form = document.getElementById('championshipForm');
    if (!form) {
        console.error('Форма championshipForm не найдена!');
        return;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.textContent = 'Отправка...';

        const formData = new FormData(form);

        // Добавление файлов из элемента file input
        const fileInput = document.getElementById('fileInput');
        if (fileInput && fileInput.files.length > 0) {
            for (let i = 0; i < fileInput.files.length; i++) {
                formData.append('files[]', fileInput.files[i]);
            }
        }

        // Добавляем файлы из глобального массива uploadedFiles
        if (uploadedFiles && uploadedFiles.length > 0) {
            uploadedFiles.forEach(file => {
                formData.append('files[]', file, file.name);
            });
        }

        try {
            // Отправляем форму с помощью fetch API вместо iframe
            const response = await fetch('process_application.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                document.getElementById('applicationNumber').textContent = result.application_id;
                document.getElementById('successModal').style.display = 'block';
                form.reset();
                // Возврат к первому шагу
                currentStep = 1;
                document.querySelectorAll('.form-section').forEach(s => s.classList.remove('active'));
                document.getElementById('section1').classList.add('active');
                updateProgress();
            } else {
                alert('Ошибка при отправке заявки: ' + result.message);
            }
        } catch (error) {
            console.error('Full Error:', error);
            alert('Произошла ошибка при отправке заявки. Пожалуйста, проверьте все поля формы и попробуйте снова.\n\nПодробности: ' + error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });
});
</script>
    <script src="/script.js"></script>
</body>
</html>