/**
 * Página /associe-se/ — Modal de planos + envio do formulário via WhatsApp.
 * Lê o número do WhatsApp em `data-whatsapp` do <form>.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var modal        = document.getElementById('planoModal');
        var planoInput   = document.getElementById('planoInput');
        var planoNameEl  = document.getElementById('planoSelectedName');
        var planoLabelEl = document.getElementById('planoSelectedLabel');
        var form         = document.getElementById('planoForm');
        var meiGate      = document.getElementById('planoModalMeiGate');
        var meiYesBtn    = document.getElementById('planoModalMeiYes');
        if (!modal || !form) return;

        var whatsapp   = form.dataset.whatsapp;
        var ctaButtons = document.querySelectorAll('[data-plano]');
        var closeEls   = document.querySelectorAll('[data-close-modal]');

        function showForm() {
            if (meiGate) meiGate.hidden = true;
            form.hidden = false;
        }

        function showMeiGate() {
            if (meiGate) meiGate.hidden = false;
            form.hidden = true;
        }

        function openModal(plano, valor) {
            // Label do topo recebe o valor; nome do plano fica em destaque sozinho.
            // Ex.: label "Plano escolhido — R$ 99,90/mês" e nome "BRONZE".
            if (planoLabelEl) {
                planoLabelEl.textContent = valor ? ('Plano escolhido — ' + valor) : 'Plano escolhido';
            }
            planoNameEl.textContent  = plano;
            // O hidden input carrega tudo pra mensagem do WhatsApp ficar completa.
            planoInput.value = valor ? (plano + ' — ' + valor) : plano;
            modal.classList.add('is-open');
            document.body.classList.add('modal-open');

            // BRONZE → mostra a pergunta sobre CNPJ antes do form.
            // Demais planos → vai direto pro form.
            if (meiGate && (plano || '').toUpperCase().indexOf('BRONZE') !== -1) {
                showMeiGate();
            } else {
                showForm();
            }
        }

        function closeModal() {
            modal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
            // Reseta gate pra próxima abertura
            showForm();
        }

        if (meiYesBtn) {
            meiYesBtn.addEventListener('click', showForm);
        }

        ctaButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                openModal(btn.dataset.plano, btn.dataset.planoValor || '');
            });
        });

        // Deep-link: /associe-se/?abrir=bronze → auto-clica no botão do BRONZE
        // (vem do Balcão do MEI → "Já sou MEI"). Aceita qualquer plano_key.
        var qs = new URLSearchParams(window.location.search);
        var abrir = (qs.get('abrir') || '').toUpperCase();
        if (abrir) {
            var target = null;
            ctaButtons.forEach(function (btn) {
                if (!target && (btn.dataset.plano || '').toUpperCase() === abrir) target = btn;
            });
            if (target) {
                // Aguarda um tick pra que outras inits terminem.
                setTimeout(function () { target.click(); }, 80);
            }
        }
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
