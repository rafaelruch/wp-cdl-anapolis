/**
 * CDL Anapolis - Main JS
 * Nav scroll, hero slider, scroll animations, mobile menu, WhatsApp widget
 */

document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {

    // ─── Nav scroll effect ───
    const nav = document.getElementById('nav');
    if (nav) {
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 60);
        }, { passive: true });
    }

    // ─── Scroll animation (ao class) ───
    const aoElements = document.querySelectorAll('.ao');
    if (aoElements.length) {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (prefersReducedMotion) {
            aoElements.forEach(el => el.classList.add('v'));
        } else {
            const aoObserver = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('v');
                        aoObserver.unobserve(e.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

            aoElements.forEach(e => aoObserver.observe(e));
        }
    }

    // ─── Legacy fade-up animation ───
    const fadeElements = document.querySelectorAll('.fade-up');
    if (fadeElements.length) {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (prefersReducedMotion) {
            fadeElements.forEach(el => el.classList.add('is-visible'));
        } else {
            const fadeObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        fadeObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -30px 0px' });

            fadeElements.forEach(el => fadeObserver.observe(el));
        }
    }

    // ─── Hero vertical slider ───
    const heroSlides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');

    if (heroSlides.length > 1) {
        let currentSlide = 0;
        const totalSlides = heroSlides.length;
        const slideDuration = 10000;

        function goToSlide(n) {
            heroSlides[currentSlide].classList.remove('active');
            heroSlides[currentSlide].style.transform = 'translateY(-40px)';
            currentSlide = n;
            heroSlides[currentSlide].style.transform = '';
            heroSlides[currentSlide].classList.add('active');
            dots.forEach((d, i) => d.classList.toggle('active', i === n));
        }

        dots.forEach(d => d.addEventListener('click', () => {
            goToSlide(parseInt(d.dataset.slide));
            clearInterval(autoSlide);
            autoSlide = setInterval(() => goToSlide((currentSlide + 1) % totalSlides), slideDuration);
        }));

        let autoSlide = setInterval(() => goToSlide((currentSlide + 1) % totalSlides), slideDuration);
    }

    // ─── Hamburger & mobile menu ───
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('open');
            document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
        });

        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('open');
                document.body.style.overflow = '';
            }
        });

        // Mobile accordions
        document.querySelectorAll('.mobile-accordion').forEach(btn => {
            btn.addEventListener('click', () => {
                const sub = btn.nextElementSibling;
                const isOpen = sub.classList.contains('open');
                document.querySelectorAll('.mobile-sub.open').forEach(s => s.classList.remove('open'));
                document.querySelectorAll('.mobile-accordion.active').forEach(b => b.classList.remove('active'));
                if (!isOpen) {
                    sub.classList.add('open');
                    btn.classList.add('active');
                }
            });
        });

        // Close mobile menu on link click
        mobileMenu.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', () => {
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('open');
                document.body.style.overflow = '';
            });
        });
    }

    // ─── Safety net: force visibility after 3s ───
    setTimeout(() => {
        document.querySelectorAll('.ao:not(.v)').forEach(el => el.classList.add('v'));
        document.querySelectorAll('.fade-up:not(.is-visible)').forEach(el => el.classList.add('is-visible'));
    }, 3000);

    // ─── People Scroll (Hark Capital style) ───
    // Uses scroll-based detection to find the item closest to viewport center
    const peopleScrollSections = document.querySelectorAll('.people-scroll');

    peopleScrollSections.forEach(section => {
        const items = section.querySelectorAll('.people-scroll__item');
        const photoContainer = section.querySelector('.people-scroll__photo');
        if (!items.length || !photoContainer) return;

        const photos = photoContainer.querySelectorAll('img, .people-scroll__photo-placeholder');
        let currentActive = 0;

        function activatePerson(index) {
            if (index === currentActive) return;
            currentActive = index;
            items.forEach((item, i) => item.classList.toggle('active', i === index));
            photos.forEach((photo, i) => photo.classList.toggle('active', i === index));
        }

        // Activate first by default
        activatePerson(0);

        // On scroll: find which item is closest to viewport center
        let ticking = false;
        function onScroll() {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(() => {
                const viewportCenter = window.innerHeight / 2;
                let closestIndex = 0;
                let closestDistance = Infinity;

                items.forEach((item, i) => {
                    const rect = item.getBoundingClientRect();
                    const itemCenter = rect.top + rect.height / 2;
                    const distance = Math.abs(itemCenter - viewportCenter);
                    if (distance < closestDistance) {
                        closestDistance = distance;
                        closestIndex = i;
                    }
                });

                activatePerson(closestIndex);
                ticking = false;
            });
        }

        window.addEventListener('scroll', onScroll, { passive: true });
    });
});
