/**
 * Swiper.js Carousel Initialization
 */
document.addEventListener('DOMContentLoaded', () => {
    // Testimonials carousel
    const testimonialEl = document.querySelector('.testimonials__slider');
    if (testimonialEl && typeof Swiper !== 'undefined') {
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
            keyboard: {
                enabled: true,
            },
            a11y: {
                prevSlideMessage: 'Depoimento anterior',
                nextSlideMessage: 'Proximo depoimento',
                firstSlideMessage: 'Primeiro depoimento',
                lastSlideMessage: 'Ultimo depoimento',
            },
        });
    }
});
