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

    // ── Carrossel de Benefícios ─────────────────────────────────
    var benefitsEl = document.querySelector('.benefits-swiper');
    if (benefitsEl) {
        new Swiper(benefitsEl, {
            slidesPerView: 1,
            spaceBetween: 14,
            grabCursor: true,
            breakpoints: {
                480:  { slidesPerView: 2, spaceBetween: 14 },
                768:  { slidesPerView: 3, spaceBetween: 14 },
                1024: { slidesPerView: 4, spaceBetween: 14 },
                1280: { slidesPerView: 5, spaceBetween: 14 },
            },
            navigation: {
                prevEl: '.benefits-carousel__btn--prev',
                nextEl: '.benefits-carousel__btn--next',
            },
            keyboard: { enabled: true },
            a11y: {
                prevSlideMessage: 'Benefício anterior',
                nextSlideMessage: 'Próximo benefício',
                firstSlideMessage: 'Primeiro benefício',
                lastSlideMessage: 'Último benefício',
            },
        });
    }
});
