/**
 * Banner de cookies LGPD-compliant.
 *
 * Comportamento:
 * - Na primeira visita (sem cookie cdl_cookie_consent), o banner aparece
 *   ao final do load com fade.
 * - 3 caminhos: "Aceitar todos", "Apenas necessários", "Personalizar"
 *   (abre modal com 4 toggles).
 * - Escolha persiste em cookie (180 dias) + localStorage. O cookie permite
 *   ler do servidor caso futuras integrações precisem decidir antes do JS.
 * - Botão [data-cdl-cookie-prefs] do footer reabre o modal a qualquer
 *   momento.
 * - Dispara CustomEvent `cdl:cookie-consent` com detail = { necessary,
 *   functional, analytics, marketing } sempre que o estado muda, para
 *   integrações futuras carregarem GA/Pixel condicionalmente.
 */
(function () {
    'use strict';

    var COOKIE_NAME = 'cdl_cookie_consent';
    var COOKIE_DAYS = 180;
    var STORAGE_KEY = 'cdl_cookie_consent';

    function readCookie() {
        var match = document.cookie.match(new RegExp('(^|;)\\s*' + COOKIE_NAME + '=([^;]+)'));
        if (!match) return null;
        try {
            return JSON.parse(decodeURIComponent(match[2]));
        } catch (e) {
            return null;
        }
    }

    function writeCookie(value) {
        var serialized = encodeURIComponent(JSON.stringify(value));
        var expires = new Date(Date.now() + COOKIE_DAYS * 86400000).toUTCString();
        document.cookie = COOKIE_NAME + '=' + serialized + '; expires=' + expires + '; path=/; SameSite=Lax';
        try { localStorage.setItem(STORAGE_KEY, JSON.stringify(value)); } catch (e) {}
    }

    function loadConsent() {
        return readCookie() || (function () {
            try {
                var raw = localStorage.getItem(STORAGE_KEY);
                return raw ? JSON.parse(raw) : null;
            } catch (e) { return null; }
        })();
    }

    function dispatch(consent) {
        document.dispatchEvent(new CustomEvent('cdl:cookie-consent', { detail: consent }));
    }

    document.addEventListener('DOMContentLoaded', function () {
        var banner    = document.getElementById('cdlCookies');
        var modal     = document.getElementById('cdlCookiesModal');
        if (!banner || !modal) return;

        var toggles = modal.querySelectorAll('[data-cdl-cookie-cat]');

        function showBanner() {
            banner.hidden = false;
        }
        function hideBanner() {
            banner.hidden = true;
        }
        function openModal(consent) {
            // Pré-seleciona toggles com base no consentimento atual (se existir).
            toggles.forEach(function (input) {
                var key = input.dataset.cdlCookieCat;
                if (key === 'necessary') {
                    input.checked = true;
                    return;
                }
                input.checked = consent ? !!consent[key] : false;
            });
            modal.hidden = false;
            document.body.classList.add('cdl-cookies-open');
        }
        function closeModal() {
            modal.hidden = true;
            document.body.classList.remove('cdl-cookies-open');
        }

        function save(consent) {
            consent.timestamp = new Date().toISOString();
            consent.version = 1;
            writeCookie(consent);
            dispatch(consent);
            hideBanner();
            closeModal();
        }

        function acceptAll() {
            save({ necessary: true, functional: true, analytics: true, marketing: true });
        }
        function rejectNonEssential() {
            save({ necessary: true, functional: false, analytics: false, marketing: false });
        }
        function savePrefs() {
            var consent = { necessary: true };
            toggles.forEach(function (input) {
                var key = input.dataset.cdlCookieCat;
                if (key === 'necessary') return;
                consent[key] = !!input.checked;
            });
            save(consent);
        }

        // Delegação de ações
        document.addEventListener('click', function (e) {
            var actionEl = e.target.closest('[data-cdl-cookie-action]');
            if (actionEl) {
                e.preventDefault();
                var action = actionEl.dataset.cdlCookieAction;
                if (action === 'accept')        acceptAll();
                else if (action === 'reject')   rejectNonEssential();
                else if (action === 'customize') openModal(loadConsent());
                else if (action === 'save-prefs') savePrefs();
                else if (action === 'close-modal') closeModal();
                return;
            }
            var prefsEl = e.target.closest('[data-cdl-cookie-prefs]');
            if (prefsEl) {
                e.preventDefault();
                openModal(loadConsent());
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.hidden) closeModal();
        });

        // Boot: se já temos consentimento, dispatch (pra carregar GA/Pixel
        // se houver script ouvindo) e não mostra o banner.
        var current = loadConsent();
        if (current && current.necessary) {
            dispatch(current);
        } else {
            // Pequeno atraso pra não competir com o LCP.
            setTimeout(showBanner, 600);
        }
    });
})();
