<?php
require_once 'config.php';
$config = require 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты - <?= $config['site']['title'] ?></title>
    <meta name="description" content="Контактная информация организаторов Чемпионата молодых мастеров">
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
                        <i class="fas fa-envelope"></i>
                        Свяжитесь с нами
                    </div>
                    <h1 class="text-3d">
                        <span class="text-3d-layer">КОНТАКТЫ</span>
                        <span class="text-3d-layer accent">ОРГАНИЗАТОРОВ</span>
                    </h1>
                    <p class="hero-subtitle">Получите ответы на все вопросы о проведении чемпионата</p>
                </div>
            </div>
        </section>

        <!-- Contact Methods -->
        <section class="contact-methods-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">СПОСОБЫ СВЯЗИ</h2>
                    <p class="section-subtitle">Выберите удобный для вас способ связи</p>
                </div>
                
                <div class="contact-methods-grid">
                    <div class="contact-method-card glass-card fade-in">
                        <div class="method-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Телефон</h3>
                        <p>Позвоните нам для оперативного решения вопросов</p>
                        <div class="method-contacts">
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $config['championship']['contacts']['phone']) ?>" class="contact-link">
                                <i class="fas fa-phone-alt"></i>
                                <?= $config['championship']['contacts']['phone'] ?>
                            </a>
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $config['championship']['contacts']['phone_org']) ?>" class="contact-link">
                                <i class="fas fa-user-tie"></i>
                                Оргкомитет: <?= $config['championship']['contacts']['phone_org'] ?>
                            </a>
                        </div>
                        <div class="method-hours">
                            <i class="fas fa-clock"></i>
                            <?= $config['championship']['contacts']['working_hours'] ?>
                        </div>
                    </div>
                    
                    <div class="contact-method-card glass-card fade-in delay-1">
                        <div class="method-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Электронная почта</h3>
                        <p>Напишите нам для получения подробной информации</p>
                        <div class="method-contacts">
                            <a href="mailto:<?= $config['championship']['contacts']['email'] ?>" class="contact-link">
                                <i class="fas fa-envelope"></i>
                                <?= $config['championship']['contacts']['email'] ?>
                            </a>
                            <a href="mailto:<?= $config['championship']['contacts']['org_email'] ?>" class="contact-link">
                                <i class="fas fa-users"></i>
                                Оргкомитет: <?= $config['championship']['contacts']['org_email'] ?>
                            </a>
                            <!-- <a href="mailto:<?= $config['championship']['contacts']['support_email'] ?>" class="contact-link">
                                <i class="fas fa-headset"></i>
                                Техподдержка: <?= $config['championship']['contacts']['support_email'] ?>
                            </a> -->
                        </div>
                    </div>
                    
                    <div class="contact-method-card glass-card fade-in delay-2">
                        <div class="method-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Адрес</h3>
                        <p>Посетите нас лично по адресу проведения чемпионата</p>
                        <div class="method-address">
                            <i class="fas fa-university"></i>
                            <div>
                                <strong><?= $config['championship']['organizer']['name'] ?></strong>
                                <p><?= $config['championship']['contacts']['address'] ?></p>
                            </div>
                        </div>
                        <a href="#map" class="btn-map">
                            <i class="fas fa-map"></i>
                            Посмотреть на карте
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">ЧАСТЫЕ ВОПРОСЫ</h2>
                    <p class="section-subtitle">Ответы на популярные вопросы участников</p>
                </div>
                
                <div class="faq-grid">
                    <div class="faq-item glass-card fade-in">
                        <div class="faq-question">
                            <h3>Кто может участвовать в чемпионате?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Воспитанники ДОУ 5-7 лет и обучающиеся 1-4, 5-8 классов образовательных организаций Чувашской Республики. Участие командное (от 1 до 10 человек) с одним наставником.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item glass-card fade-in delay-1">
                        <div class="faq-question">
                            <h3>Какие документы нужны для участия?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Обязательно предоставить три согласия: на обработку персональных данных, на фото-видеосъемку и на участие с сопровождением. Бланки доступны в разделе <a href="documents.php">Документы</a>.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item glass-card fade-in delay-2">
                        <div class="faq-question">
                            <h3>Сколько стоит участие?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Участие в чемпионате полностью бесплатное. Финансирование осуществляется за счет внебюджетных средств Чувашского педагогического колледжа.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item glass-card fade-in delay-3">
                        <div class="faq-question">
                            <h3>Можно ли участвовать в нескольких компетенциях?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Одна образовательная организация может подать заявки по всем компетенциям в разных возрастных категориях. Один участник может участвовать только в одной компетенции.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item glass-card fade-in">
                        <div class="faq-question">
                            <h3>Когда будут известны результаты?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Результаты дистанционного этапа публикуются 3 марта 2026 года. Финальные результаты объявляются на церемонии закрытия 27 марта 2026 года.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item glass-card fade-in delay-1">
                        <div class="faq-question">
                            <h3>Где проходит финал чемпионата?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Финальный этап проводится на базе ГАПОУ ЧР "Чувашский педагогический колледж им. Н.В. Никольского" по адресу: г. Чебоксары, ул. Декабристов, д. 17.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="contact-form-section" id="contactForm">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">НАПИШИТЕ НАМ</h2>
                    <p class="section-subtitle">Задайте вопрос через форму обратной связи</p>
                </div>
                
                <div class="contact-form-wrapper glass-card">
                    <form id="contactFormElement" method="POST" action="send_contact.php">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name">
                                    <i class="fas fa-user"></i>
                                    Ваше имя *
                                </label>
                                <input type="text" id="contact_name" name="name" required 
                                       placeholder="Иванов Иван Иванович">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_email">
                                    <i class="fas fa-envelope"></i>
                                    Электронная почта *
                                </label>
                                <input type="email" id="contact_email" name="email" required 
                                       placeholder="example@mail.ru">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_subject">
                                <i class="fas fa-tag"></i>
                                Тема сообщения *
                            </label>
                            <select id="contact_subject" name="subject" required>
                                <option value="">-- Выберите тему --</option>
                                <option value="registration">Регистрация и документы</option>
                                <option value="competence">Вопросы по компетенциям</option>
                                <option value="schedule">Расписание и сроки</option>
                                <option value="technical">Технические вопросы</option>
                                <option value="other">Другое</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message">
                                <i class="fas fa-comment"></i>
                                Ваш вопрос *
                            </label>
                            <textarea id="contact_message" name="message" required rows="6"
                                      placeholder="Опишите ваш вопрос подробно..."></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i>
                                Отправить сообщение
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="map-section" id="map">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title-3d">КАК НАС НАЙТИ</h2>
                    <p class="section-subtitle">Место проведения финала чемпионата</p>
                </div>
                
                <div class="map-wrapper glass-card">
                    <div class="map-placeholder">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>ГАПОУ ЧР "Чувашский педагогический колледж"</h3>
                        <p>г. Чебоксары, ул. Декабристов, д. 17</p>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps?q=56.137657,47.284831&hl=ru&z=17&output=embed"
                            width="100%"
                            height="400"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="map-coordinates">
                        <span><i class="fas fa-map-pin"></i> 56.137657° N, 47.284831° E</span>
                    </div>
                    
                    <div class="map-info">
                        <h4><i class="fas fa-info-circle"></i> Как добраться</h4>
                        <div class="transport-options">
                            <div class="transport-option">
                                <i class="fas fa-bus"></i>
                                <div>
                                    <strong>Общественный транспорт:</strong>
                                    <p>Остановка "Чебоксарский трикотаж"</p>
                                </div>
                            </div>
                            <div class="transport-option">
                                <i class="fas fa-car"></i>
                                <div>
                                    <strong>На автомобиле:</strong>
                                    <p>Координаты для навигатора: 56.137657, 47.284831</p>
                                </div>
                            </div>
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

    <script>
    // FAQ аккордеон
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const item = this.parentElement;
                const answer = item.querySelector('.faq-answer');
                const icon = this.querySelector('i');
                
                // Закрываем все открытые ответы
                document.querySelectorAll('.faq-item.active').forEach(activeItem => {
                    if (activeItem !== item) {
                        activeItem.classList.remove('active');
                        activeItem.querySelector('.faq-answer').style.maxHeight = null;
                        activeItem.querySelector('.faq-question i').classList.remove('fa-chevron-up');
                        activeItem.querySelector('.faq-question i').classList.add('fa-chevron-down');
                    }
                });
                
                // Открываем/закрываем текущий ответ
                item.classList.toggle('active');
                
                if (item.classList.contains('active')) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    answer.style.maxHeight = null;
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
        
        // Обработка формы обратной связи
        const contactForm = document.getElementById('contactFormElement');

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('.btn-submit');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Отправка...';

            // Сбор данных формы
            const formData = new FormData();
            formData.append('name', document.getElementById('contact_name').value);
            formData.append('email', document.getElementById('contact_email').value);
            formData.append('subject', document.getElementById('contact_subject').value);
            formData.append('message', document.getElementById('contact_message').value);

            // Отправка формы через fetch API
            fetch('send_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    contactForm.reset();
                } else {
                    showNotification('Ошибка: ' + data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                showNotification('Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.', 'error');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
        
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                <span>${message}</span>
                <button class="close-notification">&times;</button>
            `;

            document.body.appendChild(notification);

            // Анимация появления
            setTimeout(() => notification.classList.add('show'), 10);

            // Автоскрытие
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 5000);

            // Закрытие по клику
            notification.querySelector('.close-notification').addEventListener('click', () => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            });
        }
    });
    </script>
    <script src="/script.js"></script>
</body>
</html>