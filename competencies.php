<?php
require_once 'config.php';
$config = require 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Компетенции - <?= $config['site']['title'] ?></title>
    <meta name="description" content="4 направления для профессионального роста и развития на Чемпионате молодых мастеров">
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
                        <i class="fas fa-cogs"></i>
                        Направления развития
                    </div>
                    <h1 class="text-3d">
                        <span class="text-3d-layer">КОМПЕТЕНЦИИ</span>
                        <span class="text-3d-layer accent">БУДУЩЕГО</span>
                    </h1>
                    <p class="hero-subtitle">4 направления для профессионального роста и развития юных мастеров</p>
                </div>
            </div>
        </section>

        <!-- Competencies Grid -->
        <section class="competencies-grid-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ВЫБЕРИ СВОЮ ДОРОГУ</h2>
                    <p class="section-subtitle">Каждая компетенция — это возможность раскрыть таланты и получить ценные навыки</p>
                </div>
                
                <div class="competencies-grid">
                    <?php foreach($config['championship']['competencies'] as $name => $comp): ?>
                    <div class="competency-card glass-card fade-in <?php echo $name === 'Обслуживание автомобилей' ? 'center-card' : ''; ?>">
                        <div class="competency-header" style="background: linear-gradient(135deg, <?= $comp['color'] ?>, <?= adjustBrightness($comp['color'], -30) ?>);">
                            <div class="competency-icon">
                                <i class="fas <?= $comp['icon'] ?>"></i>
                            </div>
                            <h3><?= $name ?></h3>
                            <div class="competency-ages">
                                <?php foreach($comp['ages'] as $age): ?>
                                <span class="age-tag"><?= $age ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="competency-body">
                            <div class="competency-experts">
                                <h4><i class="fas fa-user-tie"></i> Эксперты:</h4>
                                <ul>
                                    <?php foreach($comp['experts'] as $expert): ?>
                                    <li><?= $expert ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="competency-description">
                                <h4><i class="fas fa-info-circle"></i> Описание:</h4>
                                <p>
                                    <?php
                                    $descriptions = [
                                        'Педагогика' => 'Развитие базовых педагогических навыков, умения работать в команде и создавать образовательные проекты.',
                                        'Графический дизайн' => 'Освоение основ графического дизайна, создание визуальных материалов и развитие чувства стиля.',
                                        'Программирование' => 'Освоение основ программирования, создание игр и приложений, развитие логического мышления.',
                                        'Обслуживание автомобилей' => 'Знакомство с основами автомобильного дела, безопасностью и техническим обслуживанием.'
                                    ];
                                    echo $descriptions[$name];
                                    ?>
                                </p>
                            </div>

                            <div class="competency-skills">
                                <h4><i class="fas fa-star"></i> Формируемые навыки:</h4>
                                <div class="skills-tags">
                                    <?php
                                    $skills = [
                                        'Педагогика' => ['Коммуникация', 'Творчество', 'Организация', 'Работа в команде'],
                                        'Графический дизайн' => ['Креативность', 'Визуальное восприятие', 'Работа с графикой', 'Цветоведение'],
                                        'Программирование' => ['Логика', 'Алгоритмы', 'Решение проблем', 'Креативность'],
                                        'Обслуживание автомобилей' => ['Техническое мышление', 'Внимательность', 'Работа с инструментами', 'Безопасность']
                                    ];
                                    foreach($skills[$name] as $skill):
                                    ?>
                                    <span class="skill-tag"><?= $skill ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                            <!-- Information about competition materials and results -->
                            <div class="competency-results-tasks">
                                <h4><i class="fas fa-tasks"></i> Конкурсные задания:</h4>
                                <div class="tasks-info">
                                    <div class="task-stage">
                                        <h5><i class="fas fa-laptop-code"></i> Дистанционный этап</h5>
                                        <p>Задания по <?= $name ?> включают в себя выполнение практических задач, соответствующих возрастным особенностям участников.</p>

                                        <?php if (isset($comp['remote_stage_materials'])): ?>
                                        <div class="materials-links">
                                            <h6><i class="fas fa-download"></i> Материалы для скачивания:</h6>
                                            <?php foreach($comp['remote_stage_materials'] as $age => $file): ?>
                                            <div class="material-link">
                                                <a href="<?= $file ?>" target="_blank">
                                                    <?php if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'docx'): ?>
                                                        <i class="fas fa-file-word"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-file-pdf"></i>
                                                    <?php endif; ?>
                                                    <span>Задания для <?= $age ?></span>
                                                </a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="task-stage">
                                        <h5><i class="fas fa-flag-checkered"></i> Финальный этап</h5>
                                        <p>Практические задания по <?= $name ?> на финале направлены на применение полученных навыков в реальных условиях.</p>

                                        <?php if (isset($comp['final_stage_materials'])): ?>
                                        <div class="materials-links">
                                            <h6><i class="fas fa-download"></i> Материалы для скачивания:</h6>
                                            <?php foreach($comp['final_stage_materials'] as $age => $file): ?>
                                            <div class="material-link">
                                                <a href="<?= $file ?>" target="_blank">
                                                    <?php if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'docx'): ?>
                                                        <i class="fas fa-file-word"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-file-pdf"></i>
                                                    <?php endif; ?>
                                                    <span>Задания для <?= $age ?></span>
                                                </a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <h4><i class="fas fa-trophy"></i> Результаты:</h4>
                                <div class="results-info">
                                    <div class="result-stage">
                                        <h5><i class="fas fa-laptop-code"></i> Дистанционный этап</h5>
                                        <p>Результаты по <?= $name ?> будут опубликованы 3 марта 2026 года. В финал проходят 8 команд в каждой возрастной категории.</p>

                                        <?php if (isset($comp['remote_stage_results'])): ?>
                                        <div class="materials-links">
                                            <h6><i class="fas fa-chart-bar"></i> Результаты:</h6>
                                            <?php foreach($comp['remote_stage_results'] as $age => $file): ?>
                                            <div class="material-link">
                                                <a href="<?= $file ?>" target="_blank">
                                                    <?php if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'docx'): ?>
                                                        <i class="fas fa-file-word"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-file-pdf"></i>
                                                    <?php endif; ?>
                                                    <span>Результаты для <?= $age ?></span>
                                                </a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="result-stage">
                                        <h5><i class="fas fa-flag-checkered"></i> Финальный этап</h5>
                                        <p>Окончательные результаты по <?= $name ?> будут объявлены 27 марта 2026 года на церемонии закрытия.</p>

                                        <?php if (isset($comp['final_stage_results'])): ?>
                                        <div class="materials-links">
                                            <h6><i class="fas fa-chart-bar"></i> Результаты:</h6>
                                            <?php foreach($comp['final_stage_results'] as $age => $file): ?>
                                            <div class="material-link">
                                                <a href="<?= $file ?>" target="_blank">
                                                    <?php if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'docx'): ?>
                                                        <i class="fas fa-file-word"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-file-pdf"></i>
                                                    <?php endif; ?>
                                                    <span>Результаты для <?= $age ?></span>
                                                </a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <a href="application.php?competence=<?= urlencode($name) ?>" class="competency-choose">
                                <i class="fas fa-check-circle"></i>
                                <span>ВЫБРАТЬ ЭТУ КОМПЕТЕНЦИЮ</span>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Detailed Competencies -->
        <section class="detailed-competencies">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ПОДРОБНО О КАЖДОЙ КОМПЕТЕНЦИИ</h2>
                    <p class="section-subtitle">Узнайте, что предстоит делать участникам на каждом этапе</p>
                </div>

                <div class="competency-details">
                    <?php
                    $competencyDetails = [
                        'Педагогика' => [
                            'tasks' => [
                                'Разработка и проведение мини-уроков',
                                'Создание образовательных игр',
                                'Организация игровых занятий',
                                'Проектирование образовательной среды'
                            ],
                            'criteria' => [
                                'Креативность педагогического подхода',
                                'Практическая применимость материалов',
                                'Соответствие возрастным особенностям',
                                'Качество презентации проекта'
                            ],
                            'description' => 'Компетенция "Педагогика" направлена на развитие базовых педагогических навыков у детей. Участники создают мини-уроки, образовательные игры и учатся работать в команде. Эта компетенция помогает раскрыть лидерские качества и развить коммуникативные навыки.',
                            'equipment' => 'Ноутбуки, интерактивные доски, канцелярские принадлежности, материалы для творчества',
                            'requirements' => 'Знание основ педагогики, умение работать в команде, креативность'
                        ],
                        'Графический дизайн' => [
                            'tasks' => [
                                'Создание логотипов и фирменного стиля',
                                'Разработка плакатов и баннеров',
                                'Оформление социальных сетей',
                                'Дизайн полиграфической продукции'
                            ],
                            'criteria' => [
                                'Соответствие техническому заданию',
                                'Креативность визуального решения',
                                'Качество исполнения',
                                'Единство стиля'
                            ],
                            'description' => 'Компетенция "Графический дизайн" позволяет участникам освоить основы визуального искусства. Участники создают уникальные визуальные материалы, работают с цветом и формой, развивают чувство стиля и эстетики.',
                            'equipment' => 'Компьютеры с графическими планшетами, программы Adobe Creative Suite, принтеры',
                            'requirements' => 'Художественные способности, знание основ композиции, умение работать с графическими редакторами'
                        ],
                        'Программирование' => [
                            'tasks' => [
                                'Разработка компьютерных игр',
                                'Создание мультимедийных приложений',
                                'Программирование на Python',
                                'Разработка мобильных приложений'
                            ],
                            'criteria' => [
                                'Функциональность программы',
                                'Качество кода',
                                'Интерфейс и дизайн',
                                'Оригинальность идеи'
                            ],
                            'description' => 'Компетенция "Программирование" обучает основам алгоритмического мышления и разработки программного обеспечения. Участники создают игры, приложения и учатся решать сложные задачи с помощью кода.',
                            'equipment' => 'Компьютеры, среды разработки, серверы для тестирования',
                            'requirements' => 'Логическое мышление, усидчивость, знание математики, интерес к технологиям'
                        ],
                        'Обслуживание автомобилей' => [
                            'tasks' => [
                                'Проверка технического состояния',
                                'Замена расходных материалов',
                                'Диагностика неисправностей',
                                'Изучение основ безопасности'
                            ],
                            'criteria' => [
                                'Соблюдение техники безопасности',
                                'Качество выполнения заданий',
                                'Знание инструментов',
                                'Скорость и точность'
                            ],
                            'description' => 'Компетенция "Обслуживание автомобилей" знакомит участников с основами автодела. Участники изучают устройство автомобиля, учатся диагностировать неисправности и выполнять базовое техническое обслуживание.',
                            'equipment' => 'Учебные автомобили, диагностическое оборудование, наборы инструментов, защитная одежда',
                            'requirements' => 'Внимательность, аккуратность, знание основ физики, умение работать с инструментами'
                        ]
                    ];

                    foreach($competencyDetails as $name => $details):
                    ?>
                    <div class="competency-detail-card glass-card fade-in">
                        <div class="detail-header" style="border-left-color: <?= $config['championship']['competencies'][$name]['color'] ?>;">
                            <h3><?= $name ?></h3>
                            <div class="detail-badge" style="background: <?= $config['championship']['competencies'][$name]['color'] ?>;">
                                <i class="fas <?= $config['championship']['competencies'][$name]['icon'] ?>"></i>
                            </div>
                        </div>
                        <div class="detail-content">
                            <div class="detail-column">
                                <h4><i class="fas fa-info-circle"></i> Описание компетенции</h4>
                                <p><?= $details['description'] ?></p>

                                <h4><i class="fas fa-tasks"></i> Задачи участников</h4>
                                <ul class="detail-list">
                                    <?php foreach($details['tasks'] as $task): ?>
                                    <li><i class="fas fa-check"></i> <?= $task ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="detail-column">
                                <h4><i class="fas fa-tools"></i> Оборудование</h4>
                                <p><?= $details['equipment'] ?></p>

                                <h4><i class="fas fa-clipboard-check"></i> Требования к участникам</h4>
                                <p><?= $details['requirements'] ?></p>

                                <h4><i class="fas fa-chart-line"></i> Критерии оценки</h4>
                                <ul class="detail-list">
                                    <?php foreach($details['criteria'] as $criterion): ?>
                                    <li><i class="fas fa-star"></i> <?= $criterion ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Competition Materials -->
        <section class="competition-materials">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">МАТЕРИАЛЫ КОНКУРСА</h2>
                    <p class="section-subtitle">Задания и результаты этапов чемпионата</p>
                </div>

                <div class="materials-grid">
                    <div class="material-card glass-card fade-in">
                        <div class="material-header">
                            <h3><i class="fas fa-laptop-code"></i> Дистанционный этап</h3>
                            <div class="material-date">19 янв - 21 фев 2026</div>
                        </div>
                        <div class="material-content">
                            <h4><i class="fas fa-tasks"></i> Конкурсные задания</h4>
                            <p>Участникам предстоит выполнить комплекс заданий по выбранной компетенции в дистанционном формате. Задания разработаны экспертами и соответствуют возрастным особенностям участников.</p>

                            <h4><i class="fas fa-trophy"></i> Результаты</h4>
                            <p>Результаты дистанционного этапа будут опубликованы 3 марта 2026 года. В финал проходят 8 команд в каждой возрастной категории по каждой компетенции.</p>

                            <div class="material-actions">
                                <a href="documents.php#technical" class="btn-outline">
                                    <i class="fas fa-file-download"></i>
                                    <span>Скачать задания</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="material-card glass-card fade-in delay-1">
                        <div class="material-header">
                            <h3><i class="fas fa-flag-checkered"></i> Финальный этап</h3>
                            <div class="material-date">23 - 27 мар 2026</div>
                        </div>
                        <div class="material-content">
                            <h4><i class="fas fa-tasks"></i> Конкурсные задания</h4>
                            <p>Финалисты выполняют практические задания на площадке колледжа. Задания направлены на применение полученных навыков в реальных условиях и решение практических задач.</p>

                            <h4><i class="fas fa-trophy"></i> Результаты</h4>
                            <p>Окончательные результаты чемпионата будут объявлены на церемонии закрытия 27 марта 2026 года. Победители и призеры награждаются дипломами и ценными призами.</p>

                            <div class="material-actions">
                                <a href="documents.php#technical" class="btn-outline">
                                    <i class="fas fa-file-download"></i>
                                    <span>Скачать задания</span>
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
                        <h2>ВЫБРАЛИ КОМПЕТЕНЦИЮ?</h2>
                        <p>Переходите к регистрации команды и станьте участником I Регионального Чемпионата молодых мастеров!</p>
                        
                        <div class="cta-buttons">
                            <a href="application.php" class="btn-pulse">
                                <i class="fas fa-user-plus"></i>
                                <span>ЗАРЕГИСТРИРОВАТЬ КОМАНДУ</span>
                                <div class="pulse-effect"></div>
                            </a>
                            <a href="documents.php#technical" class="btn-outline">
                                <i class="fas fa-book"></i>
                                <span>ТЕХНИЧЕСКИЕ ОПИСАНИЯ</span>
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

<?php
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