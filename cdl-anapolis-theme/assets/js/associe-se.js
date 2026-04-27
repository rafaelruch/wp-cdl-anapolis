/**
 * Página /associe-se/ — Modal de planos + envio do formulário via WhatsApp.
 * Lê o número do WhatsApp em `data-whatsapp` do <form>.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var modal       = document.getElementById('planoModal');
        var planoInput  = document.getElementById('planoInput');
        var planoNameEl = document.getElementById('planoSelectedName');
        var form        = document.getElementById('planoForm');
        if (!modal || !form) return;

        var whatsapp   = form.dataset.whatsapp;
        var ctaButtons = document.querySelectorAll('[data-plano]');
        var closeEls   = document.querySelectorAll('[data-close-modal]');

        function openModal(plano) {
            planoInput.value = plano;
            planoNameEl.textContent = plano;
            modal.classList.add('is-open');
            document.body.classList.add('modal-open');
        }

        function closeModal() {
            modal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }

        ctaButtons.forEach(function (btn) {
            btn.addEventListener('click', function () { openModal(btn.dataset.plano); });
        });
        closeEls.forEach(function (el) {
            el.addEventListener('click', closeModal);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var data = new FormData(form);
            var msg =
                '*Nova solicitação de associação — CDL Anápolis*\n\n' +
                '*Plano escolhido:* ' + data.get('plano') + '\n' +
                '*Razão Social:* ' + data.get('razao_social') + '\n' +
                '*CNPJ:* ' + data.get('cnpj') + '\n' +
                '*Responsável:* ' + data.get('nome_responsavel') + '\n' +
                '*CPF:* ' + data.get('cpf_responsavel') + '\n' +
                '*Telefone:* ' + data.get('telefone') + '\n' +
                (data.get('email') ? '*E-mail:* ' + data.get('email') + '\n' : '');
            var url = 'https://wa.me/' + whatsapp + '?text=' + encodeURIComponent(msg);
            window.open(url, '_blank');
        });
    });
})();
