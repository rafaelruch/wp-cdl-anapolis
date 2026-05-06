/**
 * Swiper.js — Inicialização dos carrosséis da home.
 * Carrega após Swiper estar disponível (via CDN no enqueue).
 */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper === 'undefined') return;

    // ── Carrossel de Depoimentos ────────────────────────────────
    var testimonialEl = document.querySelector('.testimonials__slider');
    if (testimonialEl) {
        new Swiper(testimonialEl, {
            slidesPerView: 1,
            spaceBetween: 32,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                prevEl: '.swiper-button-prev',
                nextEl: '.swiper-button-next',
            },
            keyboard: { enabled: true },
            a11y: {
                prevSlideMessage: 'Depoimento anterior',
                nextSlideMessage: 'Próximo depoimento',
                firstSlideMessage: 'Primeiro depoimento',
                lastSlideMessage: 'Último depoimento',
            },
        });
    }

    // ── Carrossel de Vantagens / Serviços (Features Band) ───────
    var featuresEl = document.querySelector('.features-band-swiper');
    if (featuresEl) {
        new Swiper(featuresEl, {
            slidesPerView: 1,
            spaceBetween: 2,
            grabCursor: true,
            breakpoints: {
                640:  { slidesPerView: 2, spaceBetween: 2 },
                1024: { slidesPerView: 3, spaceBetween: 2 },
            },
            navigation: {
                prevEl: '.features-band-carousel__btn--prev',
                nextEl: '.features-band-carousel__btn--next',
            },
            keyboard: { enabled: true },
            a11y: {
                prevSlideMessage: 'Vantagem anterior',
                nextSlideMessage: 'Próxima vantagem',
                firstSlideMessage: 'Primeira vantagem',
                lastSlideMessage: 'Última vantagem',
            },
        });
    }

    // ── Carrossel de Notícias (home) ────────────────────────────
    var newsEl = document.querySelector('.info-swiper');
    if (newsEl) {
        new Swiper(newsEl, {
            slidesPerView: 1,
            spaceBetween: 16,
            grabCursor: true,
            breakpoints: {
                640:  { slidesPerView: 2, spaceBetween: 16 },
                1024: { slidesPerView: 3, spaceBetween: 18 },
                1280: { slidesPerView: 4, spaceBetween: 20 },
            },
            navigation: {
                prevEl: '.info-carousel__btn--prev',
                nextEl: '.info-carousel__btn--next',
            },
            keyboard: { enabled: true },
            a11y: {
                prevSlideMessage: 'Notícia anterior',
                nextSlideMessage: 'Próxima notícia',
                firstSlideMessage: 'Primeira notícia',
                lastSlideMessage: 'Última notícia',
            },
        });
    }
});
