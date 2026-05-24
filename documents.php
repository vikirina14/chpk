<?php
require_once 'config.php';
$config = require 'config.php';

$documents = [
    'official' => [
        [
            'id' => 'order',
            'title' => 'Приказ о проведении Чемпионата',
            'description' => 'Приказ Министерства образования Чувашской Республики №1403 от 18.12.2025 об организации и проведении I Регионального Чемпионата молодых мастеров',
            'file' => 'order.pdf',
            'size' => '2.4 MB',
            'pages' => '13',
            'icon' => 'fa-file-signature',
            'date' => '18.12.2025'
        ]
    ],
    'regulations' => [
    [
            'id' => 'regulation',
            'title' => 'Положение о проведении Чемпионата',
            'description' => 'Полный регламент проведения I Регионального Чемпионата молодых мастеров с приложениями и формами согласий',
            'file' => 'regulation.pdf',
            'size' => '5.8 MB',
            'pages' => '48',
            'icon' => 'fa-scroll',
            'date' => '18.12.2025'
        ]
    ],
    'forms' => [
        [
            'id' => 'consent_pd',
            'title' => 'Согласие на обработку персональных данных',
            'description' => 'Бланк согласия родителя (законного представителя) на обработку персональных данных несовершеннолетнего',
            'file' => 'Согласии обработки данных.pdf',
            'size' => '0.8 MB',
            'pages' => '2',
            'icon' => 'fa-user-check',
            'date' => '01.12.2025'
        ],
        [
            'id' => 'consent_photo',
            'title' => 'Согласие на фото- и видеосъемку',
            'description' => 'Разрешение на проведение фото- и видеосъемки несовершеннолетнего и публикацию материалов',
            'file' => 'Согласие на фото-видео.pdf',
            'size' => '0.7 MB',
            'pages' => '1',
            'icon' => 'fa-camera',
            'date' => '01.12.2025'
        ],
        [
            'id' => 'consent_participation',
            'title' => 'Согласие на участие и сопровождение',
            'description' => 'Согласие родителей на участие ребенка в чемпионате и сопровождение доверенным лицом',
            'file' => 'Согласие на участие.pdf',
            'size' => '0.9 MB',
            'pages' => '2',
            'icon' => 'fa-user-shield',
            'date' => '01.12.2025'
        ],
        [
            'id' => 'all_forms',
            'title' => 'Все бланки согласий (архив)',
            'description' => 'Полный комплект всех необходимых бланков согласий в одном ZIP-архиве',
            'file' => 'Согласии.zip',
            'size' => '3.2 MB',
            'pages' => '—',
            'icon' => 'fa-file-archive',
            'date' => '01.12.2025'
        ]
    ],
    'technical' => [
        [
            'id' => 'technical_descriptions',
            'title' => 'Технические описания компетенций',
            'description' => 'Детальные технические описания всех 4 компетенций чемпионата с требованиями и спецификациями',
            'file' => 'technical_descriptions.pdf',
            'size' => '3.2 MB',
            'pages' => '25',
            'icon' => 'fa-cogs',
            'date' => '15.12.2025'
        ],
        [
            'id' => 'evaluation_criteria',
            'title' => 'Критерии оценки',
            'description' => 'Система оценивания работ участников по всем компетенциям с балльной шкалой',
            'file' => 'evaluation_criteria.pdf',
            'size' => '1.2 MB',
            'pages' => '8',
            'icon' => 'fa-chart-line',
            'date' => '15.12.2025'
        ],
        [
            'id' => 'task_examples',
            'title' => 'Примеры конкурсных заданий',
            'description' => 'Типовые примеры конкурсных заданий по всем компетенциям для подготовки участников',
            'file' => 'task_examples.pdf',
            'size' => '2.1 MB',
            'pages' => '15',
            'icon' => 'fa-tasks',
            'date' => '20.12.2025'
        ]
    ],
    'results' => [
        [
            'id' => 'remote_stage_results',
            'title' => 'Результаты дистанционного этапа',
            'description' => 'Официальные результаты дистанционного этапа чемпионата по всем компетенциям и возрастным категориям',
            'file' => 'remote_stage_results.pdf',
            'size' => '1.8 MB',
            'pages' => '32',
            'icon' => 'fa-trophy',
            'date' => '03.03.2026'
        ],
        [
            'id' => 'final_stage_results',
            'title' => 'Результаты финального этапа',
            'description' => 'Окончательные результаты финального этапа чемпионата с указанием победителей и призеров',
            'file' => 'final_stage_results.pdf',
            'size' => '2.1 MB',
            'pages' => '45',
            'icon' => 'fa-award',
            'date' => '27.03.2026'
        ]
    ],
    'competition_tasks' => [
        [
            'id' => 'remote_task_package',
            'title' => 'Конкурсные задания дистанционного этапа',
            'description' => 'Полный комплект конкурсных заданий для дистанционного этапа по всем компетенциям',
            'file' => 'remote_task_package.pdf',
            'size' => '4.5 MB',
            'pages' => '68',
            'icon' => 'fa-laptop-code',
            'date' => '19.01.2026'
        ],
        [
            'id' => 'final_task_package',
            'title' => 'Конкурсные задания финального этапа',
            'description' => 'Комплект заданий для финального очного этапа чемпионата',
            'file' => 'final_task_package.pdf',
            'size' => '3.7 MB',
            'pages' => '52',
            'icon' => 'fa-flag-checkered',
            'date' => '23.03.2026'
        ]
    ],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Документы - <?= $config['site']['title'] ?></title>
    <meta name="description" content="Официальные документы и бланки для участия в Чемпионате молодых мастеров">
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
                        <i class="fas fa-folder-open"></i>
                        Официальные документы
                    </div>
                    <h1 class="text-3d">
                        <span class="text-3d-layer">ВСЯ</span>
                        <span class="text-3d-layer accent">ДОКУМЕНТАЦИЯ</span>
                    </h1>
                    <p class="hero-subtitle">Скачайте необходимые документы для участия в чемпионате. Все файлы в формате PDF.</p>
                </div>
            </div>
        </section>

        <!-- Documents Navigation -->
        <section class="documents-nav">
            <div class="container">
                <div class="nav-tabs">
                    <button class="nav-tab active" data-tab="official">
                        <i class="fas fa-landmark"></i>
                        <span>Официальные</span>
                    </button>
                    <!-- <button class="nav-tab" data-tab="regulations">
                        <i class="fas fa-book"></i>
                        <span>Регламенты</span>
                    </button> -->
                    <button class="nav-tab" data-tab="forms">
                        <i class="fas fa-edit"></i>
                        <span>Бланки</span>
                    </button>
                    <!-- <button class="nav-tab" data-tab="technical">
                        <i class="fas fa-wrench"></i>
                        <span>Технические</span>
                    </button> -->
                    <!-- <button class="nav-tab" data-tab="results">
                        <i class="fas fa-trophy"></i>
                        <span>Результаты</span>
                    </button> -->
                    <!-- <button class="nav-tab" data-tab="competition_tasks">
                        <i class="fas fa-tasks"></i>
                        <span>Задания</span>
                    </button> -->
                </div>
            </div>
        </section>

        <!-- Documents Sections -->
        <section class="documents-sections">
            <div class="container">
                <?php foreach($documents as $category => $items): ?>
                <div id="<?= $category ?>" class="documents-section <?= $category === 'official' ? 'active' : '' ?>">
                    <div class="section-header">
                        <h2 class="section-title">
                            <?php
                            $titles = [
                                'official' => 'Официальные документы',
                                'regulations' => 'Регламенты чемпионата',
                                'forms' => 'Бланки и формы согласий',
                                'technical' => 'Техническая документация',
                                'results' => 'Результаты этапов',
                                'competition_tasks' => 'Конкурсные задания'
                            ];
                            echo $titles[$category];
                            ?>
                        </h2>
                        <p class="section-subtitle">
                            <?php
                            $subtitles = [
                                'official' => 'Основные документы, утверждающие проведение чемпионата',
                                'regulations' => 'Полный регламент и правила участия',
                                'forms' => 'Необходимые бланки для регистрации участников',
                                'technical' => 'Технические требования и критерии оценки',
                                'results' => 'Официальные результаты этапов чемпионата',
                                'competition_tasks' => 'Конкурсные задания для участников'
                            ];
                            echo $subtitles[$category];
                            ?>
                        </p>
                    </div>
                    
                    <div class="documents-grid">
                        <?php foreach($items as $doc): ?>
                        <div class="document-card glass-card fade-in">
                            <div class="document-header">
                                <div class="document-icon">
                                    <i class="fas <?= $doc['icon'] ?>"></i>
                                </div>
                                <div class="document-info">
                                    <h3><?= $doc['title'] ?></h3>
                                    <p><?= $doc['description'] ?></p>
                                    <div class="document-meta">
                                        <span><i class="fas fa-calendar"></i> <?= $doc['date'] ?></span>
                                        <span><i class="fas fa-weight"></i> <?= $doc['size'] ?></span>
                                        <span><i class="fas fa-copy"></i> <?= $doc['pages'] ?> стр.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="document-actions">
                                <button class="btn-preview" onclick="previewDocument('<?= $doc['id'] ?>', '<?= $doc['title'] ?>', '<?= $doc['file'] ?>')">
                                    <i class="fas fa-eye"></i>
                                    <span>Предпросмотр</span>
                                </button>
                                <?php if (strpos($doc['file'], 'materials/') === 0): ?>
                                <a href="<?= $doc['file'] ?>" class="btn-download" download>
                                    <i class="fas fa-download"></i>
                                    <span>Скачать</span>
                                </a>
                                <?php else: ?>
                                <a href="documents/<?= $doc['file'] ?>" class="btn-download" download>
                                    <i class="fas fa-download"></i>
                                    <span>Скачать</span>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Important Notes -->
        <section class="important-notes">
            <div class="container">
                <div class="notes-card glass-card">
                    <div class="notes-header">
                        <i class="fas fa-exclamation-circle"></i>
                        <h3>Важная информация</h3>
                    </div>
                    <div class="notes-content">
                        <div class="note-item">
                            <h4><i class="fas fa-check-circle"></i> Обязательные документы</h4>
                            <p>Для участия в чемпионате необходимо заполнить и предоставить все три формы согласий: на обработку персональных данных, на фото-видеосъемку и на участие с сопровождением.</p>
                        </div>
                        <div class="note-item">
                            <h4><i class="fas fa-clock"></i> Сроки предоставления</h4>
                            <p>Оригиналы согласий предоставляются наставником главному эксперту на очной стажировке (17-19 марта 2026 года).</p>
                        </div>
                        <div class="note-item">
                            <h4><i class="fas fa-file-pdf"></i> Формат документов</h4>
                            <p>Все документы должны быть заполнены разборчиво, подписаны оригинальными подписями и заверены печатью организации (при необходимости).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-card glass-card">
                    <div class="cta-content">
                        <h2>ДОКУМЕНТЫ ГОТОВЫ?</h2>
                        <p>Переходите к регистрации команды. Не забудьте подготовить все необходимые согласия от родителей!</p>
                        
                        <div class="cta-buttons">
                            <a href="application.php" class="btn-pulse">
                                <i class="fas fa-file-signature"></i>
                                <span>ПЕРЕЙТИ К ЗАЯВКЕ</span>
                                <div class="pulse-effect"></div>
                            </a>
                            <a href="contacts.php" class="btn-outline">
                                <i class="fas fa-question-circle"></i>
                                <span>ЗАДАТЬ ВОПРОС</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Preview Modal -->
    <div id="previewModal" class="modal">
        <div class="modal-content glass-card">
            <button class="close-modal">&times;</button>
            <div class="modal-header">
                <h3 id="modalTitle"></h3>
            </div>
            <div class="modal-body">
                <div class="preview-placeholder">
                    <i class="fas fa-file-pdf"></i>
                    <p>Предпросмотр документа</p>
                    <p class="small">Для просмотра полной версии скачайте документ</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="downloadLink" class="btn-download">
                    <i class="fas fa-download"></i>
                    <span>СКАЧАТЬ ПОЛНУЮ ВЕРСИЮ</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
    function previewDocument(docId, docTitle, fileName) {
        const modal = document.getElementById('previewModal');
        const title = document.getElementById('modalTitle');
        const downloadLink = document.getElementById('downloadLink');
        const modalBody = document.querySelector('.modal-body');
        const previewPlaceholder = document.querySelector('.preview-placeholder');

        title.textContent = docTitle;
        // Проверяем, является ли файл частью материалов дистанционного этапа
        if (fileName.startsWith('materials/')) {
            downloadLink.href = fileName;
        } else {
            downloadLink.href = 'documents/' + fileName;
        }

        // Определяем тип файла по расширению
        const fileExtension = fileName.split('.').pop().toLowerCase();

        // Создаем элемент для предварительного просмотра в зависимости от типа файла
        let filePath = fileName;
        if (!fileName.startsWith('materials/')) {
            filePath = 'documents/' + fileName;
        }

        if (fileExtension === 'pdf') {
            // Для PDF используем встроенный просмотрщик браузера
            const iframe = document.createElement('iframe');
            iframe.src = filePath;
            iframe.style.width = '100%';
            iframe.style.height = '500px';
            iframe.style.border = 'none';

            // Очищаем содержимое и добавляем iframe
            modalBody.innerHTML = '';
            modalBody.appendChild(iframe);
        } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
            // Для изображений создаем тег img
            const img = document.createElement('img');
            img.src = filePath;
            img.style.maxWidth = '100%';
            img.style.maxHeight = '500px';
            img.style.objectFit = 'contain';

            modalBody.innerHTML = '';
            modalBody.appendChild(img);
        } else if (fileExtension === 'zip') {
            // Для ZIP-файлов показываем специальное сообщение
            modalBody.innerHTML = `
                <div class="file-preview-info">
                    <i class="fas fa-file-archive fa-3x" style="color: var(--warning); margin-bottom: 20px;"></i>
                    <h4>ZIP-архив</h4>
                    <p>Для просмотра содержимого архива скачайте файл и откройте его на своем устройстве.</p>
                </div>
            `;
        } else {
            // Для других типов файлов показываем стандартный плейсхолдер
            modalBody.innerHTML = `
                <div class="file-preview-info">
                    <i class="fas fa-file fa-3x" style="color: var(--primary); margin-bottom: 20px;"></i>
                    <h4>${fileName}</h4>
                    <p>Для просмотра содержимого файла скачайте его на свое устройство.</p>
                </div>
            `;
        }

        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    // Табы для навигации по документам
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.nav-tab');
        const sections = document.querySelectorAll('.documents-section');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Убираем активный класс у всех табов
                tabs.forEach(t => t.classList.remove('active'));
                sections.forEach(s => s.classList.remove('active'));
                
                // Добавляем активный класс текущему табу
                this.classList.add('active');
                
                // Показываем соответствующую секцию
                const activeSection = document.getElementById(tabId);
                if (activeSection) {
                    activeSection.classList.add('active');
                    
                    // Плавная прокрутка к секции
                    activeSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Закрытие модального окна
        const modal = document.getElementById('previewModal');
        const closeBtn = document.querySelector('.close-modal');
        
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    });
    </script>
    <script src="/script.js"></script>
</body>
</html>