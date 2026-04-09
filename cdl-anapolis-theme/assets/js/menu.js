/**
 * Menu - Sticky Header, Mega-menu, Hamburger, Keyboard Nav
 */
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header');
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('main-nav');
    const dropdownButtons = document.querySelectorAll('.has-dropdown > .main-nav__link');
    const isMobile = () => window.innerWidth < 1024;

    // ── Sticky Header ──
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;
        header.classList.toggle('is-scrolled', scrollY > 80);
        lastScroll = scrollY;
    }, { passive: true });

    // ── Hamburger Toggle ──
    hamburger?.addEventListener('click', () => {
        const isOpen = hamburger.getAttribute('aria-expanded') === 'true';
        hamburger.setAttribute('aria-expanded', String(!isOpen));
        nav.classList.toggle('is-open', !isOpen);
        document.body.classList.toggle('nav-open', !isOpen);
    });

    // ── Close mobile nav on outside click ──
    document.addEventListener('click', (e) => {
        if (nav.classList.contains('is-open') &&
            !nav.contains(e.target) &&
            !hamburger.contains(e.target)) {
            closeAllMenus();
        }
    });

    // ── Close mobile nav on resize to desktop ──
    window.addEventListener('resize', () => {
        if (!isMobile() && nav.classList.contains('is-open')) {
            closeAllMenus();
        }
    });

    // ── Desktop: hover with delay ──
    const dropdownItems = document.querySelectorAll('.has-dropdown');
    let hoverTimeout = null;

    dropdownItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            if (isMobile()) return;
            clearTimeout(hoverTimeout);
            // Close others first
            dropdownItems.forEach(other => {
                if (other !== item) closeDropdown(other);
            });
            openDropdown(item);
        });

        item.addEventListener('mouseleave', () => {
            if (isMobile()) return;
            hoverTimeout = setTimeout(() => {
                closeDropdown(item);
            }, 150);
        });
    });

    // ── Mobile: click accordion ──
    dropdownButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (!isMobile()) return;
            e.preventDefault();
            const parent = btn.parentElement;
            const isOpen = btn.getAttribute('aria-expanded') === 'true';

            // Close others
            dropdownButtons.forEach(other => {
                if (other !== btn) {
                    closeDropdown(other.parentElement);
                }
            });

            if (isOpen) {
                closeDropdown(parent);
            } else {
                openDropdown(parent);
            }
        });
    });

    // ── Keyboard Navigation ──
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeAllMenus();
            // Return focus to the last active dropdown button
            const activeBtn = document.querySelector('.main-nav__link[aria-expanded="true"]');
            if (activeBtn) {
                closeDropdown(activeBtn.parentElement);
                activeBtn.focus();
            }
            // Close mobile menu
            if (nav.classList.contains('is-open')) {
                closeAllMenus();
                hamburger?.focus();
            }
        }
    });

    // ── Helper Functions ──
    function openDropdown(item) {
        const btn = item.querySelector('.main-nav__link');
        const menu = item.querySelector('.mega-menu');
        if (btn) btn.setAttribute('aria-expanded', 'true');
        if (menu) menu.classList.add('is-open');
    }

    function closeDropdown(item) {
        const btn = item.querySelector('.main-nav__link');
        const menu = item.querySelector('.mega-menu');
        if (btn) btn.setAttribute('aria-expanded', 'false');
        if (menu) menu.classList.remove('is-open');
    }

    function closeAllMenus() {
        dropdownItems.forEach(item => closeDropdown(item));
        hamburger?.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
        document.body.classList.remove('nav-open');
    }
});
