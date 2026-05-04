/**
 * Página /certificado-digital-cdl/
 *
 * Qualquer link com [data-cdl-compra-certificado] redireciona o
 * visitante para a plataforma externa de compra/agendamento da CDL.
 *
 * A URL é montada em pedaços porque a Hostinger (em staging) tem um
 * filtro de output que substitui `cdlanapolis.com.br` pelo subdomínio
 * do staging em qualquer string que sai do PHP. JS estático não passa
 * pelo filtro, então a URL final fica correta no cliente.
 *
 * Quando o site migrar pro domínio definitivo (cdlanapolis.com.br),
 * o filtro deixa de existir e este código continua funcionando — a
 * URL final é a mesma.
 */
(function () {
    'use strict';

    function getCompraUrl() {
        return ['https://www.', 'certificado', 'cdl', 'anapolis', '.com', '.br/V1'].join('');
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.body.addEventListener('click', function (e) {
            var link = e.target.closest('[data-cdl-compra-certificado]');
            if (!link) return;
            e.preventDefault();
            window.open(getCompraUrl(), '_blank', 'noopener');
        });
    });
})();
