<?php
require_once 'config.php';
$config = require 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О чемпионате - <?= $config['site']['title'] ?></title>
    <meta name="description" content="Подробная информация о I Региональном Чемпионате молодых мастеров в Чувашской Республике">
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
                        <i class="fas fa-info-circle"></i>
                        Подробная информация
                    </div>
                    <h1 class="text-3d">
                        <span class="text-3d-layer">О</span>
                        <span class="text-3d-layer accent">ЧЕМПИОНАТЕ</span>
                    </h1>
                    <p class="hero-subtitle">Вся информация о I Региональном Чемпионате молодых мастеров Чувашской Республики</p>
                </div>
            </div>
        </section>

        <!-- About Content -->
        <section class="about-content">
            <div class="container">
                <div class="about-grid">
                    <div class="about-card glass-card fade-in">
                        <div class="about-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Цель чемпионата</h3>
                        <p>Создание условий для формирования ранней профориентации и современных профессиональных компетенций у детей дошкольного и младшего школьного возраста.</p>
                    </div>
                    
                    <div class="about-card glass-card fade-in delay-1">
                        <div class="about-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>Задачи</h3>
                        <ul class="about-list">
                            <li>Воспитание положительного отношения к миру профессий</li>
                            <li>Формирование первичного профессионального опыта</li>
                            <li>Повышение педагогического мастерства наставников</li>
                            <li>Развитие командной работы и коммуникативных навыков</li>
                        </ul>
                    </div>
                    
                    <div class="about-card glass-card fade-in delay-2">
                        <div class="about-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Участники</h3>
                        <p>Воспитанники ДОУ 5-7 лет и обучающиеся 1-4, 5-8 классов образовательных организаций Чувашской Республики.</p>
                        <div class="age-categories">
                            <span class="age-badge">ДОУ (5-7 лет)</span>
                            <span class="age-badge">1-4 класс</span>
                            <span class="age-badge">5-8 класс</span>
                        </div>
                    </div>
                    
                    <div class="about-card glass-card fade-in delay-3">
                        <div class="about-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3>Награждение</h3>
                        <p>По итогам чемпионата по каждой компетенции присуждаются 3 призовых места и номинации. Все наставники и эксперты награждаются благодарственными письмами и сертификатами.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Detailed Timeline -->
        <section class="detailed-timeline">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ПОДРОБНАЯ ХРОНОЛОГИЯ</h2>
                    <p class="section-subtitle">Все этапы чемпионата с детальным описанием</p>
                </div>
                
                <div class="timeline-detailed">
                    <div class="timeline-phase glass-card fade-in">
                        <div class="phase-header">
                            <div class="phase-number">I</div>
                            <div class="phase-title">
                                <h3>ОТБОРОЧНЫЙ ЭТАП</h3>
                                <div class="phase-date">22.12.2025 - 16.01.2026</div>
                            </div>
                        </div>
                        <div class="phase-content">
                            <div class="phase-item">
                                <h4><i class="fas fa-user-graduate"></i> Профориентационная работа</h4>
                                <p>Проведение профориентационных мероприятий в дошкольных образовательных организациях и образовательных организациях Республики.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-check-circle"></i> Выбор направлений</h4>
                                <p>Определение компетенций для участия каждой образовательной организации.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-filter"></i> Внутренний отбор</h4>
                                <p>Проведение внутренних отборочных туров в образовательных организациях для формирования команд.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-phase glass-card fade-in delay-1">
                        <div class="phase-header">
                            <div class="phase-number">II</div>
                            <div class="phase-title">
                                <h3>ДИСТАНЦИОННЫЙ ЭТАП</h3>
                                <div class="phase-date">19.01 - 21.02.2026</div>
                            </div>
                        </div>
                        <div class="phase-content">
                            <div class="phase-item">
                                <h4><i class="fas fa-file-signature"></i> Подача заявок</h4>
                                <p>Регистрация команд на сайте чемпионата до 21 февраля 2026 года.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-laptop-code"></i> Выполнение заданий</h4>
                                <p>Команды выполняют дистанционные конкурсные задания по выбранным компетенциям.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-chart-line"></i> Оценка экспертов</h4>
                                <p>Экспертная оценка выполненных работ с 24 февраля по 2 марта 2026 года.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-bullhorn"></i> Объявление результатов</h4>
                                <p>Публикация результатов дистанционного этапа 3 марта 2026 года на сайте чемпионата.</p>
                            </div>
                            <div class="phase-note">
                                <i class="fas fa-info-circle"></i> В финал проходят по 8 команд в каждой возрастной категории
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-phase glass-card fade-in delay-2">
                        <div class="phase-header">
                            <div class="phase-number">III</div>
                            <div class="phase-title">
                                <h3>ФИНАЛЬНЫЙ ЭТАП</h3>
                                <div class="phase-date">23 - 27.03.2026</div>
                            </div>
                        </div>
                        <div class="phase-content">
                            <div class="phase-item">
                                <h4><i class="fas fa-graduation-cap"></i> Очная стажировка</h4>
                                <p>17-19 марта 2026 года: знакомство с площадкой, оборудованием и финальными заданиями.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-tools"></i> Практические модули</h4>
                                <p>Выполнение практических заданий по компетенциям продолжительностью до 2 часов.</p>
                            </div>
                            <div class="phase-item">
                                <h4><i class="fas fa-medal"></i> Церемония награждения</h4>
                                <p>Торжественное закрытие чемпионата с объявлением победителей и вручением наград.</p>
                            </div>
                            <div class="phase-note">
                                <i class="fas fa-map-marker-alt"></i> Место проведения: ГАПОУ ЧР "Чувашский педагогический колледж им. Н.В. Никольского"
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Committee Section -->
        <section class="committee-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ОРГАНИЗАЦИОННЫЙ КОМИТЕТ</h2>
                    <p class="section-subtitle">Эксперты, обеспечивающие проведение чемпионата</p>
                </div>

                <div class="committee-grid">
                    <?php foreach($config['championship']['committee'] as $member): ?>
                    <div class="member-card glass-card fade-in">
                        <div class="member-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h4><?= $member['name'] ?></h4>
                        <p class="member-position"><?= $member['position'] ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Results and Tasks Section -->
        <section class="results-tasks-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">РЕЗУЛЬТАТЫ И ЗАДАНИЯ</h2>
                    <p class="section-subtitle">Информация о конкурсных заданиях и предыдущих результатах</p>
                </div>

                <div class="results-tasks-grid">
                    <div class="results-card glass-card fade-in">
                        <div class="results-header">
                            <h3><i class="fas fa-laptop-code"></i> Дистанционный этап</h3>
                            <div class="results-date">19 янв - 21 фев 2026</div>
                        </div>
                        <div class="results-content">
                            <h4><i class="fas fa-tasks"></i> Конкурсные задания</h4>
                            <p>Задания для дистанционного этапа включают в себя выполнение практических задач по выбранной компетенции. Участники работают над проектами дома под руководством наставника.</p>

                            <h4><i class="fas fa-trophy"></i> Результаты</h4>
                            <p>Результаты дистанционного этапа публикуются 3 марта 2026 года. В финал проходят 8 лучших команд в каждой возрастной категории по каждой компетенции.</p>

                            <div class="results-actions">
                                <a href="documents.php#competition_tasks" class="btn-outline">
                                    <i class="fas fa-file-download"></i>
                                    <span>Скачать задания</span>
                                </a>
                                <a href="documents.php#results" class="btn-outline">
                                    <i class="fas fa-trophy"></i>
                                    <span>Посмотреть результаты</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="results-card glass-card fade-in delay-1">
                        <div class="results-header">
                            <h3><i class="fas fa-flag-checkered"></i> Финальный этап</h3>
                            <div class="results-date">23 - 27 мар 2026</div>
                        </div>
                        <div class="results-content">
                            <h4><i class="fas fa-tasks"></i> Конкурсные задания</h4>
                            <p>Финалисты выполняют комплексные практические задания на площадке колледжа. Задания направлены на применение полученных навыков в реальных условиях.</p>

                            <h4><i class="fas fa-trophy"></i> Результаты</h4>
                            <p>Окончательные результаты чемпионата объявляются на церемонии закрытия 27 марта 2026 года. Победители и призеры награждаются дипломами и ценными призами.</p>

                            <div class="results-actions">
                                <a href="documents.php#competition_tasks" class="btn-outline">
                                    <i class="fas fa-file-download"></i>
                                    <span>Скачать задания</span>
                                </a>
                                <a href="documents.php#results" class="btn-outline">
                                    <i class="fas fa-trophy"></i>
                                    <span>Посмотреть результаты</span>
                                </a>
                            </div>
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
                        <h2>ГОТОВЫ УЧАСТВОВАТЬ?</h2>
                        <p>Ознакомьтесь с полным положением о проведении чемпионата и подайте заявку на участие вашей команды</p>
                        
                        <div class="cta-buttons">
                            <a href="documents.php" class="btn-pulse">
                                <i class="fas fa-file-alt"></i>
                                <span>ОЗНАКОМИТЬСЯ С ДОКУМЕНТАМИ</span>
                                <div class="pulse-effect"></div>
                            </a>
                            <a href="application.php" class="btn-outline">
                                <i class="fas fa-rocket"></i>
                                <span>ПЕРЕЙТИ К РЕГИСТРАЦИИ</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="/script.js"></script>
</body>
</html>