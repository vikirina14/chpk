<?php
if (!isset($config)) {
    require_once '../config.php';
    $config = require '../config.php';
}
?>
<!-- Floating Notification -->
<div class="floating-notification" role="alert" aria-live="polite">
    <i class="fas fa-bell" aria-hidden="true"></i>
    <span>Регистрация открыта с 16 января 2026!</span>
    <a href="application.php" class="notification-btn" aria-label="Перейти к регистрации">Участвовать</a>
    <button class="close-notification" aria-label="Закрыть уведомление">&times;</button>
</div>

<header class="glass-header">
    <div class="container">
        <nav class="nav-container">
            <a href="index.php" class="logo-3d" aria-label="Главная страница чемпионата YoungMasters">
                <div class="logo-shape" aria-hidden="true">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="logo-text">
                    <span class="logo-main">YoungMasters</span>
                    <span class="logo-sub">Чемпионат 2026</span>
                </div>
            </a>
            
            <div class="menu-toggle" role="button" tabindex="0" aria-label="Меню навигации" aria-expanded="false">
                <span class="bar" aria-hidden="true"></span>
                <span class="bar" aria-hidden="true"></span>
                <span class="bar" aria-hidden="true"></span>
            </div>
            
            <ul class="nav-menu">
                <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" aria-label="Главная">
                    <i class="fas fa-home" aria-hidden="true"></i> <span>Главная</span>
                </a></li>
                <li><a href="about.php" class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>" aria-label="О чемпионате">
                    <i class="fas fa-flag" aria-hidden="true"></i> <span>О чемпионате</span>
                </a></li>
                <li><a href="competencies.php" class="<?= basename($_SERVER['PHP_SELF']) == 'competencies.php' ? 'active' : '' ?>" aria-label="Компетенции">
                    <i class="fas fa-cogs" aria-hidden="true"></i> <span>Компетенции</span>
                </a></li>
               <li><a href="documents.php" class="<?= basename($_SERVER['PHP_SELF']) == 'documents.php' ? 'active' : '' ?>" aria-label="Документы">
                    <i class="fas fa-file-alt" aria-hidden="true"></i> <span>Документы</span>
                </a></li>
                <li><a href="contacts.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contacts.php' ? 'active' : '' ?>" aria-label="Контакты">
                    <i class="fas fa-envelope" aria-hidden="true"></i> <span>Контакты</span>
                </a></li>
                <li><a href="application.php" class="btn-neon <?= basename($_SERVER['PHP_SELF']) == 'application.php' ? 'active' : '' ?>" aria-label="Подать заявку">
                    <i class="fas fa-rocket" aria-hidden="true"></i> <span>Подать заявку</span>
                </a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="header-spacer"></div>