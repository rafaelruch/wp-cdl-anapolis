/**
 * Área do Associado — login centralizado.
 *
 * Fluxo:
 *  1. Usuário preenche CNPJ + senha
 *  2. JS valida CNPJ (14 dígitos) e envia POST {api_url}/auth/login
 *  3. Em caso de sucesso, salva o token JWT em localStorage e redireciona
 *     o usuário para {redirect_url}?token={token}
 *  4. Em caso de erro (API offline, credenciais inválidas), mostra mensagem.
 *
 * Variáveis globais (via wp_localize_script):
 *  - CDL_AREA_ASSOCIADO.api_url       (URL base da API)
 *  - CDL_AREA_ASSOCIADO.redirect_url  (URL do sistema do cliente)
 */
(function () {
    'use strict';

    var STORAGE_KEY = 'cdl_associado_token';

    function applyCnpjMask(value) {
        var d = value.replace(/\D/g, '').slice(0, 14);
        if (d.length > 12) return d.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{0,2}).*/, '$1.$2.$3/$4-$5');
        if (d.length > 8)  return d.replace(/(\d{2})(\d{3})(\d{3})(\d{0,4}).*/,           '$1.$2.$3/$4');
        if (d.length > 5)  return d.replace(/(\d{2})(\d{3})(\d{0,3}).*/,                   '$1.$2.$3');
        if (d.length > 2)  return d.replace(/(\d{2})(\d{0,3}).*/,                          '$1.$2');
        return d;
    }

    function setStatus(box, type, message) {
        if (!box) return;
        box.className = 'aa-status aa-status--' + type;
        box.textContent = message;
        box.hidden = false;
    }

    function clearStatus(box) {
        if (!box) return;
        box.hidden = true;
        box.textContent = '';
        box.className = 'aa-status';
    }

    function setBusy(submitBtn, busy, originalLabel) {
        if (!submitBtn) return;
        submitBtn.disabled = busy;
        var labelEl = submitBtn.querySelector('.aa-submit__label');
        if (labelEl) labelEl.textContent = busy ? 'Entrando...' : originalLabel;
    }

    function appendToken(url, token) {
        try {
            var u = new URL(url);
            u.searchParams.set('token', token);
            return u.toString();
        } catch (e) {
            // Fallback: monta na unha se a URL não for parseável.
            var sep = url.indexOf('?') === -1 ? '?' : '&';
            return url + sep + 'token=' + encodeURIComponent(token);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('aaLoginForm');
        if (!form) return;
        if (typeof CDL_AREA_ASSOCIADO === 'undefined') {
            console.warn('CDL_AREA_ASSOCIADO não foi injetado — configure a URL da API em CDL Config → Header & Footer.');
            return;
        }

        var cnpjInput   = form.querySelector('#aaCnpj');
        var passInput   = form.querySelector('#aaPassword');
        var submitBtn   = form.querySelector('#aaSubmit');
        var statusBox   = document.getElementById('aaStatus');
        var toggleBtn   = document.getElementById('aaTogglePassword');
        var originalLbl = submitBtn ? submitBtn.querySelector('.aa-submit__label').textContent : 'Entrar';

        // Máscara CNPJ
        if (cnpjInput) {
            cnpjInput.addEventListener('input', function () {
                cnpjInput.value = applyCnpjMask(cnpjInput.value);
                clearStatus(statusBox);
            });
        }

        // Mostrar/ocultar senha
        if (toggleBtn && passInput) {
            toggleBtn.addEventListener('click', function () {
                var isHidden = passInput.type === 'password';
                passInput.type = isHidden ? 'text' : 'password';
                toggleBtn.setAttribute('aria-label', isHidden ? 'Ocultar senha' : 'Mostrar senha');
            });
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            clearStatus(statusBox);

            if (!CDL_AREA_ASSOCIADO.api_url) {
                setStatus(statusBox, 'error', 'O sistema ainda não foi configurado. Avise o administrador.');
                return;
            }

            var cnpj = (cnpjInput.value || '').replace(/\D/g, '');
            var pass = passInput.value || '';

            if (cnpj.length !== 14) {
                setStatus(statusBox, 'error', 'Digite um CNPJ completo (14 dígitos).');
                cnpjInput.focus();
                return;
            }
            if (pass.length < 4) {
                setStatus(statusBox, 'error', 'Digite sua senha.');
                passInput.focus();
                return;
            }

            setBusy(submitBtn, true, originalLbl);

            var endpoint = CDL_AREA_ASSOCIADO.api_url.replace(/\/+$/, '') + '/auth/login';

            fetch(endpoint, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ cnpj: cnpj, password: pass }),
            })
            .then(function (res) {
                return res.json().then(function (data) { return { ok: res.ok, status: res.status, data: data }; });
            })
            .then(function (resp) {
                setBusy(submitBtn, false, originalLbl);

                if (!resp.ok || !resp.data || !resp.data.token) {
                    var msg = (resp.data && (resp.data.message || resp.data.error))
                        || (resp.status === 401 ? 'CNPJ ou senha incorretos.' : 'Não foi possível entrar agora. Tente novamente.');
                    setStatus(statusBox, 'error', msg);
                    return;
                }

                // Sucesso — guarda o token e redireciona pro sistema do cliente.
                try { localStorage.setItem(STORAGE_KEY, resp.data.token); } catch (e) {}

                var redirect = CDL_AREA_ASSOCIADO.redirect_url || '';
                if (!redirect) {
                    setStatus(statusBox, 'success', 'Login realizado. Configure a URL de redirect no admin para continuar.');
                    return;
                }

                setStatus(statusBox, 'success', 'Acesso autorizado. Redirecionando...');
                window.location.href = appendToken(redirect, resp.data.token);
            })
            .catch(function (err) {
                setBusy(submitBtn, false, originalLbl);
                console.error('[area-associado] erro:', err);
                setStatus(statusBox, 'error', 'Falha de conexão com o servidor de login. Verifique sua internet ou tente novamente.');
            });
        });
    });
})();
