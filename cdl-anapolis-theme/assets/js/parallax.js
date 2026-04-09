/**
 * Parallax Effect (Desktop Only)
 */
document.addEventListener('DOMContentLoaded', () => {
    const mq = window.matchMedia('(min-width: 1024px)');
    if (!mq.matches) return;

    const elements = document.querySelectorAll('[data-parallax]');
    if (!elements.length) return;

    let ticking = false;

    window.addEventListener(
        'scroll',
        () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    const scrollY = window.scrollY;
                    elements.forEach(el => {
                        const rate = parseFloat(el.dataset.parallax) || 0.3;
                        el.style.transform = `translateY(${scrollY * rate}px)`;
                    });
                    ticking = false;
                });
                ticking = true;
            }
        },
        { passive: true }
    );
});
