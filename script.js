// Главный скрипт сайта Чемпионата молодых мастеров
document.addEventListener('DOMContentLoaded', function() {
    initSite();
    enhanceSelectElements();
});

// Улучшаем выпадающие списки
function enhanceSelectElements() {
    const selects = document.querySelectorAll('select');
    selects.forEach(select => {
        // Добавляем класс для стилизации
        select.classList.add('styled-select');

        // Обновляем стили при изменении
        select.addEventListener('change', function() {
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
            this.style.color = 'white';
        });

        // Обновляем стили при фокусе
        select.addEventListener('focus', function() {
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.3)';
        });

        // Обновляем стили при потере фокуса
        select.addEventListener('blur', function() {
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
        });
    });
}

// Функция для центрирования карточек
function centerCompetencyCards() {
    const grid = document.querySelector('.competencies-grid');
    if (!grid) return;

    // Убедимся, что сетка имеет правильные стили
    grid.style.justifyContent = 'center';
    grid.style.alignItems = 'stretch';

    // Применим стили к карточкам
    const cards = grid.querySelectorAll('.competency-card');
    cards.forEach(card => {
        card.style.margin = '0 auto';
        card.style.justifySelf = 'center';
    });
}

function initSite() {
    initMobileMenu();
    initParallax();
    initCounters();
    initCountdown();
    initScrollTop();
    initNotification();
    initAnimations();
    initCards3D();
    initSmoothScroll();
    initParticles();
    initAccessibility();
    initFocusManagement();
    optimizeAnimationsForPerformance();
    centerCompetencyCards();
}

// Улучшенная функция для доступности
function initAccessibility() {
    // Добавляем класс high-contrast при нажатии Alt + Shift + C
    document.addEventListener('keydown', function(e) {
        if (e.altKey && e.shiftKey && e.key === 'C') {
            document.body.classList.toggle('high-contrast-mode');

            // Сохраняем состояние в localStorage
            const isHighContrast = document.body.classList.contains('high-contrast-mode');
            localStorage.setItem('highContrastMode', isHighContrast);
        }
    });

    // Восстанавливаем состояние при загрузке
    const savedContrast = localStorage.getItem('highContrastMode');
    if (savedContrast === 'true') {
        document.body.classList.add('high-contrast-mode');
    }

    // Добавляем ARIA-атрибуты для лучшей доступности
    const buttons = document.querySelectorAll('button, a');
    buttons.forEach(button => {
        if (!button.hasAttribute('role')) {
            button.setAttribute('role', 'button');
        }

        if (!button.hasAttribute('tabindex')) {
            button.setAttribute('tabindex', '0');
        }
    });
}

// Управление фокусом для улучшения навигации
function initFocusManagement() {
    // Добавляем класс 'keyboard-navigation' когда пользователь использует клавиатуру
    let isUsingKeyboard = false;
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab' || e.key === 'ArrowDown' || e.key === 'ArrowUp' || e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
            isUsingKeyboard = true;
            document.body.classList.add('keyboard-navigation');
        }
    });
    
    document.addEventListener('mousedown', function() {
        isUsingKeyboard = false;
        document.body.classList.remove('keyboard-navigation');
    });
    
    // Улучшаем фокус для карточек
    const cards = document.querySelectorAll('.glass-card, .competency-card, .feature-card');
    cards.forEach(card => {
        card.addEventListener('focus', function() {
            if (isUsingKeyboard) {
                card.style.outline = '2px solid var(--accent-light)';
                card.style.outlineOffset = '3px';
            }
        });
        
        card.addEventListener('blur', function() {
            card.style.outline = '';
            card.style.outlineOffset = '';
        });
    });
}

// Оптимизированная функция инициализации параллакса
function initParallax() {
    const bgElements = document.querySelectorAll('.cube, .sphere, .pyramid');

    if (bgElements.length === 0) return;

    // Используем requestAnimationFrame для оптимизации производительности
    let ticking = false;

    function updateParallax(e) {
        const x = (e.clientX / window.innerWidth) * 40 - 20;
        const y = (e.clientY / window.innerHeight) * 40 - 20;

        bgElements.forEach(el => {
            el.style.transform = `translate(${x}px, ${y}px)`;
        });

        ticking = false;
    }

    document.addEventListener('mousemove', function(e) {
        if (!ticking) {
            requestAnimationFrame(function() {
                updateParallax(e);
            });
            ticking = true;
        }
    });
}

// Оптимизированная функция инициализации анимаций
function initAnimations() {
    // Проверяем предпочтения пользователя относительно анимаций
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        // Если пользователь предпочитает меньше анимаций, отключаем их
        return;
    }
    
    // Проверяем поддержку Intersection Observer
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');

                    // Добавляем анимацию появления
                    if (entry.target.classList.contains('feature-card') ||
                        entry.target.classList.contains('timeline-item') ||
                        entry.target.classList.contains('partner-card')) {

                        // Добавляем задержку для последовательной анимации
                        const index = Array.from(entry.target.parentNode.children).indexOf(entry.target);
                        entry.target.style.transitionDelay = `${index * 0.1}s`;
                    }

                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Наблюдаем за всеми элементами с классами анимации
        const animatedElements = document.querySelectorAll(
            '.feature-card, .timeline-item, .partner-card, .about-card, ' +
            '.member-card, .competency-card, .competency-detail-card, ' +
            '.document-card, .contact-method-card, .faq-item, .notes-card'
        );

        animatedElements.forEach(el => observer.observe(el));
    } else {
        // Резервный вариант для старых браузеров
        const animatedElements = document.querySelectorAll(
            '.feature-card, .timeline-item, .partner-card, .about-card, ' +
            '.member-card, .competency-card, .competency-detail-card, ' +
            '.document-card, .contact-method-card, .faq-item, .notes-card'
        );

        animatedElements.forEach(el => {
            el.classList.add('fade-in');
        });
    }
}

// Функция для определения производительности устройства
function getDevicePerformance() {
    // Проверяем, поддерживает ли устройство hardware concurrency
    const cores = navigator.hardwareConcurrency || 2;
    
    // Проверяем, является ли устройство мобильным
    const isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    
    // Определяем уровень производительности
    if (cores <= 2 || isMobile) {
        return 'low';
    } else if (cores <= 4) {
        return 'medium';
    } else {
        return 'high';
    }
}

// Оптимизация анимаций в зависимости от производительности устройства
function optimizeAnimationsForPerformance() {
    const performanceLevel = getDevicePerformance();
    
    if (performanceLevel === 'low') {
        // Для слабых устройств уменьшаем количество анимаций
        const elementsWithAnimation = document.querySelectorAll('.card-3d, .text-3d-layer, .pulse-effect');
        elementsWithAnimation.forEach(el => {
            el.style.animation = 'none';
            el.style.transition = 'none';
        });
    }
}

// Мобильное меню
function initMobileMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (menuToggle && navMenu) {
        // Обновляем aria-атрибуты при клике
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            
            // Обновляем aria-expanded
            const isExpanded = menuToggle.classList.contains('active');
            menuToggle.setAttribute('aria-expanded', isExpanded);
            
            // Улучшаем фокус для элементов меню
            if (isExpanded) {
                // При открытии меню устанавливаем фокус на первый элемент
                const firstItem = navMenu.querySelector('a');
                if (firstItem) {
                    setTimeout(() => firstItem.focus(), 100);
                }
            }
        });

        // Закрытие меню при клике на ссылку
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });

        // Закрытие меню при клике вне его
        document.addEventListener('click', (e) => {
            if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Обработка клавиатурных событий для меню
        menuToggle.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                menuToggle.click();
            }
        });
        
        // Обработка клавиатурной навигации внутри меню
        navMenu.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.focus(); // Возвращаем фокус на кнопку меню
            }
        });
    }
}

// Параллакс эффект
function initParallax() {
    const bgElements = document.querySelectorAll('.cube, .sphere, .pyramid');
    
    if (bgElements.length === 0) return;
    
    document.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth) * 40 - 20;
        const y = (e.clientY / window.innerHeight) * 40 - 20;
        
        bgElements.forEach(el => {
            el.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
}

// Анимированные счетчики
function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    if (counters.length === 0) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-count'));
                const suffix = counter.textContent.includes('+') ? '+' : '';
                const duration = 2000;
                const increment = target / (duration / 16);
                
                let current = 0;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + suffix;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current) + suffix;
                    }
                }, 16);
                
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
}

// Обратный отсчет
function initCountdown() {
    const startDate = new Date('Jan 16, 2026 00:00:00').getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const elapsed = now - startDate;

        if (elapsed < 0) {
            document.querySelectorAll('.countdown-number').forEach(el => {
                el.textContent = '00';
            });
            return;
        }

        const days = Math.floor(elapsed / (1000 * 60 * 60 * 24));
        const hours = Math.floor((elapsed % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((elapsed % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((elapsed % (1000 * 60)) / 1000);

        const daysEl = document.getElementById('days');
        const hoursEl = document.getElementById('hours');
        const minutesEl = document.getElementById('minutes');
        const secondsEl = document.getElementById('seconds');

        if (daysEl) daysEl.textContent = days.toString().padStart(2, '0');
        if (hoursEl) hoursEl.textContent = hours.toString().padStart(2, '0');
        if (minutesEl) minutesEl.textContent = minutes.toString().padStart(2, '0');
        if (secondsEl) secondsEl.textContent = seconds.toString().padStart(2, '0');
    }
    
    if (document.getElementById('days')) {
        updateCountdown();
        setInterval(updateCountdown, 1000);
    }
}

// Кнопка скролла наверх
function initScrollTop() {
    const scrollTop = document.querySelector('.scroll-top');
    
    if (scrollTop) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });
        
        scrollTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// Уведомление
function initNotification() {
    const notification = document.querySelector('.floating-notification');
    const closeBtn = document.querySelector('.close-notification');

    if (notification && closeBtn) {
        closeBtn.addEventListener('click', () => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => notification.remove(), 300);
        });

        // Автоскрытие через 10 секунд
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateY(-20px)';
                setTimeout(() => notification.remove(), 300);
            }
        }, 10000);
        
        // Обработка клавиатурных событий для закрытия уведомления
        closeBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                closeBtn.click();
            }
        });
    }
}

// Анимации при скролле
function initAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Наблюдаем за всеми элементами с классами анимации
    const animatedElements = document.querySelectorAll(
        '.feature-card, .timeline-item, .partner-card, .about-card, ' +
        '.member-card, .competency-card, .competency-detail-card, ' +
        '.document-card, .contact-method-card, .faq-item, .notes-card'
    );
    
    animatedElements.forEach(el => observer.observe(el));
}

// 3D эффекты карточек
function initCards3D() {
    const cards3d = document.querySelectorAll('.card-3d');
    
    cards3d.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateY = ((x - centerX) / centerX) * 15;
            const rotateX = ((centerY - y) / centerY) * 15;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
            
            // Параллакс эффект для содержимого
            const content = card.querySelector('.card-content');
            if (content) {
                const moveX = (x - centerX) * 0.05;
                const moveY = (y - centerY) * 0.05;
                content.style.transform = `translate(${moveX}px, ${moveY}px)`;
            }
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
            const content = card.querySelector('.card-content');
            if (content) {
                content.style.transform = 'translate(0, 0)';
            }
        });
    });
}

// Плавная прокрутка
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '#!') return;
            
            const targetElement = document.querySelector(href);
            if (targetElement) {
                e.preventDefault();
                const headerHeight = document.querySelector('.glass-header').offsetHeight || 100;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Эффект частиц
function initParticles() {
    document.addEventListener('click', createParticle);
    
    function createParticle(e) {
        if (e.target.closest('a, button') || e.target.classList.contains('close-notification')) return;
        
        for (let i = 0; i < 3; i++) {
            const particle = document.createElement('div');
            particle.className = 'click-particle';
            
            const size = Math.random() * 10 + 5;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${e.clientX}px`;
            particle.style.top = `${e.clientY}px`;
            
            const angle = Math.random() * Math.PI * 2;
            const distance = Math.random() * 50 + 20;
            particle.style.setProperty('--x', Math.cos(angle) * distance);
            particle.style.setProperty('--y', Math.sin(angle) * distance);
            
            const hue = Math.random() * 60 + 200;
            particle.style.background = `hsl(${hue}, 100%, 60%)`;
            
            document.body.appendChild(particle);
            
            setTimeout(() => particle.remove(), 1000);
        }
    }
}


// Универсальная функция показа уведомления
function showNotification(message, type = 'success') {
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

// Форматирование байтов в читаемый формат
function formatBytes(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Валидация email
function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Валидация телефона
function isValidPhone(phone) {
    const re = /^[\d\s\-\+\(\)]+$/;
    const digits = phone.replace(/\D/g, '');
    return re.test(phone) && digits.length >= 10;
}

// Добавляем стили для частиц
const particleStyle = document.createElement('style');
particleStyle.textContent = `
    .click-particle {
        position: fixed;
        background: var(--accent-light);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9998;
        animation: particleFly 1s ease-out forwards;
        opacity: 0.8;
    }
    
    @keyframes particleFly {
        0% {
            transform: translate(0, 0) scale(1);
            opacity: 1;
        }
        100% {
            transform: translate(var(--x, 0), var(--y, 0)) scale(0);
            opacity: 0;
        }
    }
`;
document.head.appendChild(particleStyle);