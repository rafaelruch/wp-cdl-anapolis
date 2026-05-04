/**
 * Verificação de CNPJ na página /certificado-digital-cdl/.
 * - Aplica máscara visual (XX.XXX.XXX/XXXX-XX)
 * - Submete via fetch para admin-ajax.php
 * - Se associado: mostra mensagem do A1 gratuito + botão WhatsApp
 * - Senão: redireciona para o site externo de compra
 *
 * Variáveis globais expostas via wp_localize_script (`CDL_CERTIFICADO`):
 *   - rest_url (endpoint REST público — sem nonce para funcionar com page cache)
 */
(function () {
    'use strict';

    function applyMask(value) {
        var d = value.replace(/\D/g, '').slice(0, 14);
        if (d.length > 12) return d.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{0,2}).*/, '$1.$2.$3/$4-$5');
        if (d.length > 8)  return d.replace(/(\d{2})(\d{3})(\d{3})(\d{0,4}).*/,           '$1.$2.$3/$4');
        if (d.length > 5)  return d.replace(/(\d{2})(\d{3})(\d{0,3}).*/,                   '$1.$2.$3');
        if (d.length > 2)  return d.replace(/(\d{2})(\d{0,3}).*/,                          '$1.$2');
        return d;
    }

    function setStatus(box, type, message) {
        if (!box) return;
        box.className = 'cd-check__status cd-check__status--' + type;
        box.textContent = message;
        box.hidden = false;
    }

    function clearStatus(box) {
        if (!box) return;
        box.hidden = true;
        box.textContent = '';
        box.className = 'cd-check__status';
    }

    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('cdCheckForm');
        if (!form) return;
        if (typeof CDL_CERTIFICADO === 'undefined') return;

        var input    = form.querySelector('#cdCheckCnpj');
        var submit   = form.querySelector('button[type="submit"]');
        var status   = document.getElementById('cdCheckStatus');
        var success  = document.getElementById('cdCheckSuccess');
        var successMsg = document.getElementById('cdCheckSuccessMsg');

        if (input) {
            input.addEventListener('input', function () {
                input.value = applyMask(input.value);
                clearStatus(status);
            });
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!input) return;

            var cnpj = (input.value || '').replace(/\D/g, '');
            if (cnpj.length !== 14) {
                setStatus(status, 'error', 'Digite um CNPJ completo (14 dígitos).');
                input.focus();
                return;
            }

            submit.disabled = true;
            var originalLabel = submit.innerHTML;
            submit.innerHTML = 'Verificando...';
            clearStatus(status);
            if (success) success.hidden = true;

            fetch(CDL_CERTIFICADO.rest_url, {
                method:      'POST',
                credentials: 'same-origin',
                headers:     { 'Content-Type': 'application/json' },
                body:        JSON.stringify({ cnpj: cnpj }),
            })
            .then(function (res) {
                return res.json().then(function (data) { return { ok: res.ok, data: data }; });
            })
            .then(function (resp) {
                submit.disabled  = false;
                submit.innerHTML = originalLabel;

                var data = resp.data || {};

                if (!resp.ok || data.code === 'invalid_cnpj' || data.code === 'rate_limited') {
                    setStatus(status, 'error', data.message || 'Não foi possível verificar agora. Tente novamente.');
                    return;
                }

                if (data.is_associado) {
                    if (success) {
                        if (successMsg) successMsg.textContent = data.message || '';
                        success.hidden = false;
                        success.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        setStatus(status, 'success', data.message || 'Você é associado.');
                    }
                } else if (data.redirect_action === 'compra_certificado_cdl') {
                    // URL montada em pedaços para evitar o filtro de domínio
                    // do staging Hostinger que reescreve `cdlanapolis.com.br`
                    // em qualquer output do PHP. O JS estático não passa pelo
                    // filtro e a URL final fica correta no cliente.
                    var url = ['https://www.', 'certificado', 'cdl', 'anapolis', '.com', '.br/V1'].join('');
                    window.location.href = url;
                } else {
                    setStatus(status, 'error', 'Resposta inesperada. Recarregue a página e tente novamente.');
                }
            })
            .catch(function () {
                submit.disabled  = false;
                submit.innerHTML = originalLabel;
                setStatus(status, 'error', 'Falha de conexão. Verifique sua internet e tente novamente.');
            });
        });
    });
})();
