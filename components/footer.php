<?php
if (!isset($config)) {
    require_once '../config.php';
    $config = require '../config.php';
}
?>
<footer class="glass-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-brand">
                <a href="index.php" class="logo-3d small">
                    <div class="logo-shape">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="logo-text">
                        <span class="logo-main">YoungMasters</span>
                        <span class="logo-sub">Чемпионат 2026</span>
                    </div>
                </a>
                <p class="footer-description"><?= $config['site']['description'] ?></p>
                
                <div class="social-links">
                    <a href="https://vk.com/cpknikolskogo_professionalitet" target="_blank" class="social-link" title="ВКонтакте">
                        <i class="fab fa-vk"></i>
                    </a>
                    <a href="https://t.me/chpk_nikolskogo_professionalitet" target="_blank" class="social-link" title="Telegram">
                        <i class="fab fa-telegram"></i>
                    </a>
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