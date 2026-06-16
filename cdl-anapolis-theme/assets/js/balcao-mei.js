/**
 * Página /balcao-do-mei/ — abre o modal de cadastro do MEI a partir dos
 * botões com data-balcao-open e envia o form via WhatsApp pré-preenchido.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var modal     = document.getElementById('balcaoModal');
        var form      = document.getElementById('balcaoForm');
        if (!modal || !form) return;

        var whatsapp  = form.dataset.whatsapp;
        var openBtns  = document.querySelectorAll('[data-balcao-open]');
        var closeEls  = document.querySelectorAll('[data-close-balcao]');

        function openModal() {
            modal.classList.add('is-open');
            document.body.classList.add('modal-open');
        }
        function closeModal() {
            modal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }

        openBtns.forEach(function (btn) { btn.addEventListener('click', openModal); });
        closeEls.forEach(function (el)  { el.addEventListener('click', closeModal); });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var data = new FormData(form);
            var msg =
                '*Novo cadastro — Balcão do MEI CDL Anápolis*\n\n' +
                '*Nome:* ' + (data.get('nome') || '') + '\n' +
                '*CPF:* ' + (data.get('cpf') || '') + '\n' +
                '*Data de nascimento:* ' + (data.get('data_nascimento') || '') + '\n' +
                '*WhatsApp:* ' + (data.get('whatsapp') || '') + '\n' +
                '*E-mail:* ' + (data.get('email') || '') + '\n\n' +
                'Gostaria de iniciar o processo de abertura do meu MEI com a CDL Anápolis.';
            var url = 'https://wa.me/' + whatsapp + '?text=' + encodeURIComponent(msg);
            window.open(url, '_blank');
        });
    });
})();
