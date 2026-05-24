<?php
$config = require 'config.php';

// Вспомогательная функция для изменения яркости цвета
function adjustBrightness($hex, $steps) {
    $steps = max(-255, min(255, $steps));
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color);
        $color   = max(0, min(255, $color + $steps));
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
    }

    return $return;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['site']['title'] ?> - Главная</title>
    <meta name="description" content="<?= $config['site']['description'] ?>">
    <meta name="keywords" content="<?= $config['site']['keywords'] ?>">
    <meta name="author" content="<?= $config['site']['author'] ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?= $config['site']['title'] ?>">
    <meta property="og:description" content="<?= $config['site']['description'] ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $config['site']['url'] ?>">
    <meta property="og:image" content="<?= $config['site']['url'] ?>/assets/og-image.jpg">
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
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
        <section class="hero-3d" aria-labelledby="hero-title">
            <header class="hero-header" role="banner">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-tag">
                        <i class="fas fa-star"></i>
                        I Региональный Чемпионат
                    </div>
                    <h1 class="text-3d">
                        <span class="text-3d-layer">СТАНЬ</span>
                        <span class="text-3d-layer accent">ГЕРОЕМ</span>
                        <span class="text-3d-layer">БУДУЩЕГО</span>
                    </h1>
                    <p class="hero-subtitle">Открой в себе суперсилы! Создавай, проектируй, программируй и побеждай в самом масштабном детском чемпионате Чувашии</p>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number" data-count="4">0</div>
                            <div class="stat-label">Компетенции</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="3">0</div>
                            <div class="stat-label">Возрастные группы</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="500">0+</div>
                            <div class="stat-label">Участников</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="50">0+</div>
                            <div class="stat-label">Школ и садов</div>
                        </div>
                    </div>

                    <div class="hero-buttons">
                        <a href="application.php" class="btn-3d">
                            <i class="fas fa-play"></i>
                            <span>СТАРТОВАТЬ СЕЙЧАС</span>
                            <div class="btn-reflection"></div>
                        </a>
                        <a href="documents/Алгоритм.pdf" class="btn-glass" target="_blank">
                            <i class="fas fa-list-ol"></i>
                            <span>АЛГОРИТМ ПОДАЧИ ЗАЯВКИ</span>
                        </a>
                    </div>
                </div>
                
                <div class="hero-illustration">
                    <div class="floating-cards">
                        <?php foreach($config['championship']['competencies'] as $name => $comp): ?>
                        <div class="card-3d">
                            <div class="card-content">
                                <div class="card-icon" style="background: linear-gradient(135deg, <?= $comp['color'] ?>, <?= adjustBrightness($comp['color'], -30) ?>);">
                                    <i class="fas <?= $comp['icon'] ?>"></i>
                                </div>
                                <h4><?= $name ?></h4>
                                <p><?= $name == 'Программирование' ? 'Создай свою игру' : ($name == 'Педагогика' ? 'Учи других учиться' : ($name == 'Графический дизайн' ? 'Воплоти мечты в цвете' : 'Стань инженером')) ?></p>
                                <div class="card-badge"><?= implode(', ', $comp['ages']) ?></div>
                            </div>
                            <div class="card-shadow"></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ПОЧЕМУ ЭТО НУЖНО ТВОЕМУ РЕБЁНКУ?</h2>
                    <p class="section-subtitle">Развиваем навыки будущего через игру и практику</p>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card glass-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3>Профориентация с детства</h3>
                        <p>Помогаем детям узнать свои сильные стороны и выбрать путь развития в раннем возрасте</p>
                    </div>
                    
                    <div class="feature-card glass-card fade-in delay-1">
                        <div class="feature-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Командная работа</h3>
                        <p>Учим работать в команде, распределять задачи и достигать общих целей вместе</p>
                    </div>
                    
                    <div class="feature-card glass-card fade-in delay-2">
                        <div class="feature-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Креативное мышление</h3>
                        <p>Развиваем нестандартный подход к решению задач и генерацию инновационных идей</p>
                    </div>
                    
                    <div class="feature-card glass-card fade-in delay-3">
                        <div class="feature-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3>Практические навыки</h3>
                        <p>Даём возможность работать с реальным оборудованием и инструментами профессионалов</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline Section -->
        <section class="timeline-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ДОРОГА К ПОБЕДЕ</h2>
                    <p class="section-subtitle">3 этапа увлекательного путешествия в мир профессий</p>
                </div>
                
                <div class="timeline">
                    <div class="timeline-item glass-card fade-in">
                        <div class="timeline-marker">1</div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <h3><i class="fas fa-search"></i> ОТБОРОЧНЫЙ ЭТАП</h3>
                                <div class="timeline-date">22 ДЕК 2025 - 20 ЯНВ 2026</div>
                            </div>
                            <ul class="timeline-list">
                                <li><i class="fas fa-check"></i> Профориентация в детских садах и школах</li>
                                <li><i class="fas fa-check"></i> Выбор направлений для участия</li>
                                <li><i class="fas fa-check"></i> Внутренний отбор в образовательных организациях</li>
                            </ul>
                            <div class="timeline-note">
                                <i class="fas fa-info-circle"></i> Регистрация команд с 16 по 20 января
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item glass-card fade-in delay-1">
                        <div class="timeline-marker">2</div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <h3><i class="fas fa-laptop-code"></i> ДИСТАНЦИОННЫЙ ЭТАП</h3>
                                <div class="timeline-date">19 ЯНВ - 21 ФЕВ 2026</div>
                            </div>
                            <ul class="timeline-list">
                                <li><i class="fas fa-check"></i> Подача заявок на участие</li>
                                <li><i class="fas fa-check"></i> Выполнение онлайн-заданий</li>
                                <li><i class="fas fa-check"></i> Оценка экспертами (24 фев - 2 мар)</li>
                                <li><i class="fas fa-check"></i> Объявление результатов 3 марта</li>
                            </ul>
                            <div class="timeline-note">
                                <i class="fas fa-trophy"></i> 8 команд в каждой категории проходят в финал
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item glass-card fade-in delay-2">
                        <div class="timeline-marker">3</div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <h3><i class="fas fa-flag-checkered"></i> ФИНАЛЬНЫЙ РЫВОК</h3>
                                <div class="timeline-date">23 - 27 МАР 2026</div>
                            </div>
                            <ul class="timeline-list">
                                <li><i class="fas fa-check"></i> Очная стажировка (17-19 марта)</li>
                                <li><i class="fas fa-check"></i> Практические модули по компетенциям</li>
                                <li><i class="fas fa-check"></i> Церемония награждения</li>
                                <li><i class="fas fa-check"></i> Публикация официальных результатов</li>
                            </ul>
                            <div class="timeline-note">
                                <i class="fas fa-map-marker-alt"></i> ГАПОУ ЧР "Чувашский педагогический колледж им. Н.В. Никольского"
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="partners-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ОРГАНИЗАТОРЫ И ПАРТНЁРЫ</h2>
                </div>
                
                <div class="partners-grid">
                    <div class="partner-card glass-card">
                        <div class="partner-logo">
                            <i class="fas fa-university"></i>
                        </div>
                        <h4>Министерство образования Чувашской Республики</h4>
                        <p>Учредитель чемпионата</p>
                    </div>
                    
                    <div class="partner-card glass-card">
                        <div class="partner-logo">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Чувашский педагогический колледж им. Н.В. Никольского</h4>
                        <p>Организатор и площадка</p>
                    </div>
                    
                    <div class="partner-card glass-card">
                        <div class="partner-logo">
                            <i class="fas fa-city"></i>
                        </div>
                        <h4>Администрация г. Чебоксары</h4>
                        <p>Партнёр чемпионата</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-card glass-card">
                    <div class="cta-content">
                        <h2>ВРЕМЯ ДЕЙСТВОВАТЬ!</h2>
                        <p>Регистрация открыта с 16 января 2026 года. Не упусти шанс стать частью исторического события!</p>

                        <div class="countdown">
                            <div class="countdown-item">
                                <div class="countdown-number" id="days">00</div>
                                <div class="countdown-label">Дней</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="hours">00</div>
                                <div class="countdown-label">Часов</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="minutes">00</div>
                                <div class="countdown-label">Минут</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="seconds">00</div>
                                <div class="countdown-label">Секунд</div>
                            </div>
                        </div>

                        <div class="cta-buttons">
                            <a href="application.php" class="btn-pulse">
                                <i class="fas fa-bolt"></i>
                                <span>ЗАРЕГИСТРИРОВАТЬ КОМАНДУ</span>
                                <div class="pulse-effect"></div>
                            </a>
                            <a href="documents.php" class="btn-outline">
                                <i class="fas fa-file-download"></i>
                                <span>СКАЧАТЬ ПОЛОЖЕНИЕ</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="glass-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="logo-3d small">
                        <div class="logo-shape">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="logo-text">
                            <span class="logo-main">YoungMasters</span>
                            <span class="logo-sub">Чемпионат 2026</span>
                        </div>
                    </div>
                    <p class="footer-description">I Региональный Чемпионат для воспитанников ДОУ и обучающихся 1-8 классов Чувашской Республики.</p>
                    
                    <div class="social-links">
                        <a href="https://vk.com" target="_blank" class="social-link"><i class="fab fa-vk"></i></a>
                        <a href="https://t.me" target="_blank" class="social-link"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h4>Навигация</h4>
                    <ul>
                        <li><a href="index.php"><i class="fas fa-chevron-right"></i> Главная</a></li>
                        <li><a href="about.php"><i class="fas fa-chevron-right"></i> О чемпионате</a></li>
                        <li><a href="competencies.php"><i class="fas fa-chevron-right"></i> Компетенции</a></li>
                        <li><a href="documents.php"><i class="fas fa-chevron-right"></i> Документы</a></li>
                        <li><a href="application.php"><i class="fas fa-chevron-right"></i> Подать заявку</a></li>
                        <li><a href="contacts.php"><i class="fas fa-chevron-right"></i> Контакты</a></li>
                    </ul>
                </div>
                
                <div class="footer-contact">
                    <h4>Контакты</h4>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Адрес:</strong>
                            <span><?= $config['championship']['contacts']['address'] ?></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Телефон:</strong>
                            <span><?= $config['championship']['contacts']['phone'] ?></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email:</strong>
                            <span><?= $config['championship']['contacts']['email'] ?></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Режим работы:</strong>
                            <span><?= $config['championship']['contacts']['working_hours'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?= $config['site']['year'] ?> I Региональный Чемпионат молодых мастеров. Все права защищены.</p>
                <p>Организатор: <?= $config['championship']['organizer']['name'] ?></p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="/script.js"></script>
</body>
</html>