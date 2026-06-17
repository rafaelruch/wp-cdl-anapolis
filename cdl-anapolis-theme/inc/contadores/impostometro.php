<?php
/**
 * Plugin Name: Impostômetro CDL Anápolis
 * Description: Exibe somente os números oficiais do Impostômetro para Anápolis, Goiás e Brasil.
 * Version: 2.8.0
 * Author: Matheus Rezende
 */

if (!defined('ABSPATH')) {
    exit;
}

function impostometro_cdl_sources()
{
    $year = gmdate('Y');

    return array(
        'anapolis' => array(
            'label' => 'Anápolis',
            'url' => 'https://impostometro.com.br/Contador/Municipios?estado=go&municipio=anapolis&ano=' . $year,
            'referer' => 'https://impostometro.com.br/widget/contador/go?municipio=anapolis',
        ),
        'goias' => array(
            'label' => 'Goiás',
            'url' => 'https://impostometro.com.br/Contador/Estado?estado=go&ano=' . $year,
            'referer' => 'https://impostometro.com.br/widget/contador/go',
        ),
        'brasil' => array(
            'label' => 'Brasil',
            'url' => 'https://impostometro.com.br/Contador/Brasil',
            'referer' => 'https://impostometro.com.br/widget/contador/',
        ),
    );
}

function impostometro_cdl_parse_date($value)
{
    try {
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $normalized = preg_replace('/(\.\d{6})\d+/', '$1', (string) $value);
        $date = new DateTimeImmutable($normalized, $timezone);
        return $date->getTimestamp();
    } catch (Exception $exception) {
        return false;
    }
}

function impostometro_cdl_fetch_source($key, $source)
{
    $cache_key = 'impostometro_cdl_v28_' . $key;
    $cached = get_transient($cache_key);

    if (is_array($cached)) {
        return $cached;
    }

    $response = wp_remote_get(
        $source['url'],
        array(
            'timeout' => 8,
            'redirection' => 2,
            'headers' => array(
                'Accept' => 'application/json',
                'Referer' => $source['referer'],
                'X-Requested-With' => 'XMLHttpRequest',
            ),
            'user-agent' => 'WordPress/Impostometro-CDL-Anapolis',
        )
    );

    if (!is_wp_error($response) && 200 === wp_remote_retrieve_response_code($response)) {
        $body = json_decode(wp_remote_retrieve_body($response), true);

        if (
            is_array($body)
            && isset($body['Valor'], $body['Incremento'], $body['Data'], $body['Midnight'])
            && is_numeric($body['Valor'])
            && is_numeric($body['Incremento'])
        ) {
            $data_time = impostometro_cdl_parse_date($body['Data']);
            $midnight = impostometro_cdl_parse_date($body['Midnight']);

            if (false !== $data_time && false !== $midnight) {
                $increment = (float) $body['Incremento'];
                $value_at_data = (float) $body['Valor'] + ($increment * max(0, $data_time - $midnight));
                $server_time = time();
                $normalized = array(
                    'label' => $source['label'],
                    'value' => $value_at_data + ($increment * max(0, $server_time - $data_time)),
                    'increment' => $increment,
                    'baseTime' => $server_time * 1000,
                    'referenceDate' => wp_date('d/m/Y', $data_time, new DateTimeZone('America/Sao_Paulo')),
                );

                set_transient($cache_key, $normalized, MINUTE_IN_SECONDS);
                update_option($cache_key . '_last_good', $normalized, false);

                return $normalized;
            }
        }
    }

    $last_good = get_option($cache_key . '_last_good');
    return is_array($last_good) ? $last_good : null;
}

function impostometro_cdl_rest_data()
{
    $result = array();

    foreach (impostometro_cdl_sources() as $key => $source) {
        $data = impostometro_cdl_fetch_source($key, $source);
        if (is_array($data)) {
            $result[$key] = $data;
        }
    }

    if (!$result) {
        return new WP_Error(
            'impostometro_indisponivel',
            'Os dados do Impostômetro estão temporariamente indisponíveis.',
            array('status' => 502)
        );
    }

    return rest_ensure_response(
        array(
            'items' => $result,
            'updatedAt' => time() * 1000,
        )
    );
}

function impostometro_cdl_register_rest_route()
{
    register_rest_route(
        'impostometro-cdl/v1',
        '/dados',
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'impostometro_cdl_rest_data',
            'permission_callback' => '__return_true',
        )
    );
}
add_action('rest_api_init', 'impostometro_cdl_register_rest_route');

function impostometro_cdl_shortcode($atts = array())
{
    $atts = shortcode_atts(
        array(
            'rotacao' => '8000',
        ),
        $atts,
        'impostometro_cdl'
    );

    $rotation = max(0, absint($atts['rotacao']));

    ob_start();
    ?>
    <section
        class="impostometro-cdl"
        data-impostometro
        data-api="<?php echo esc_url(rest_url('impostometro-cdl/v1/dados')); ?>"
        data-rotation="<?php echo esc_attr($rotation); ?>"
        aria-label="Arrecadação de impostos">
        <header class="impostometro-cdl__header">
            <strong class="impostometro-cdl__brand">Impostômetro</strong>
        </header>

        <div class="impostometro-cdl__nav" role="tablist" aria-label="Local da arrecadação">
            <button type="button" role="tab" aria-selected="true" data-key="anapolis">Anápolis</button>
            <button type="button" role="tab" aria-selected="false" data-key="goias">Goiás</button>
            <button type="button" role="tab" aria-selected="false" data-key="brasil">Brasil</button>
        </div>

        <div class="impostometro-cdl__display" aria-live="polite">
            <span class="impostometro-cdl__currency">R$</span>
            <div class="impostometro-cdl__groups">
                <span class="impostometro-cdl__loading-value">Carregando...</span>
            </div>
        </div>

        <div class="impostometro-cdl__details">
            <div class="impostometro-cdl__reference">
                <span>Dados de <strong class="impostometro-cdl__date">--/--/----</strong></span>
                <span>Fonte: <a href="https://impostometro.com.br/" target="_blank" rel="noopener noreferrer">impostometro.com.br</a></span>
            </div>
        </div>

        <p class="impostometro-cdl__error" hidden>Não foi possível atualizar o contador.</p>
    </section>
    <?php

    return ob_get_clean();
}
add_shortcode('impostometro_cdl', 'impostometro_cdl_shortcode');

function impostometro_cdl_assets()
{
    if (is_admin()) {
        return;
    }

    wp_register_style('impostometro-cdl', false, array(), '2.8.0');
    wp_enqueue_style('impostometro-cdl');
    wp_add_inline_style('impostometro-cdl', impostometro_cdl_css());

    wp_register_script('impostometro-cdl', false, array(), '2.8.0', true);
    wp_enqueue_script('impostometro-cdl');
    wp_add_inline_script('impostometro-cdl', impostometro_cdl_js());
}
add_action('wp_enqueue_scripts', 'impostometro_cdl_assets');

function impostometro_cdl_css()
{
    return <<<'CSS'
.impostometro-cdl{--ic-navy:#0f2143;--ic-green:#24817d;--ic-border:#d8e0eb;--ic-muted:#60718e;--ic-white:#fff;width:min(100%,728px);margin-inline:auto;overflow:hidden;border:1px solid var(--ic-border);border-radius:12px;background:var(--ic-white);box-shadow:0 12px 35px rgba(15,33,67,.14);font-family:Arial,Helvetica,sans-serif}.impostometro-cdl *{box-sizing:border-box}.impostometro-cdl__nav{display:grid;grid-template-columns:repeat(3,1fr);background:#f5f7fa}.impostometro-cdl__nav button{min-height:42px;margin:0;padding:9px;border:0;border-right:1px solid var(--ic-border);border-radius:0;background:transparent;color:var(--ic-navy);font:700 12px Arial,Helvetica,sans-serif;cursor:pointer}.impostometro-cdl__nav button:last-child{border-right:0}.impostometro-cdl__nav button[aria-selected=true]{background:var(--ic-green);color:var(--ic-white)}.impostometro-cdl__nav button:focus-visible{outline:3px solid rgba(36,129,125,.28);outline-offset:-3px}.impostometro-cdl__context{margin:0!important;padding:10px 16px!important;border-top:1px solid var(--ic-border);background:var(--ic-white);color:var(--ic-muted);font-size:12px!important;line-height:1.35!important;text-align:center}.impostometro-cdl__context strong{color:var(--ic-navy)}.impostometro-cdl__display{min-height:132px;padding:24px 14px 19px;display:flex;align-items:center;justify-content:center;gap:10px;overflow:hidden;background:var(--ic-navy);color:var(--ic-white);font-variant-numeric:tabular-nums}.impostometro-cdl__currency{align-self:flex-start;margin-top:13px;color:#a9bad3;font-size:clamp(14px,2.5vw,22px);font-weight:700}.impostometro-cdl__groups{display:flex;align-items:stretch;justify-content:center;gap:7px;min-width:0}.impostometro-cdl__group{min-width:66px;overflow:hidden;border:1px solid rgba(255,255,255,.18);border-radius:8px;background:#182f57;box-shadow:inset 0 1px 0 rgba(255,255,255,.08),0 4px 10px rgba(0,0,0,.18);text-align:center}.impostometro-cdl__group strong{display:block;padding:12px 8px 10px;color:var(--ic-white);font-size:clamp(22px,4.8vw,42px);font-weight:900;line-height:1;letter-spacing:-.045em;white-space:nowrap}.impostometro-cdl__group span{display:block;padding:6px 4px;border-top:1px solid rgba(255,255,255,.12);background:rgba(0,0,0,.13);color:#c3d0e3;font-size:9px;font-weight:700;letter-spacing:.05em;text-transform:uppercase}.impostometro-cdl__loading-value{color:var(--ic-white);font-size:18px;font-weight:700}.impostometro-cdl__details{padding:10px 16px;background:var(--ic-white)}.impostometro-cdl__reference{display:flex;justify-content:space-between;gap:12px;color:var(--ic-muted);font-size:10px}.impostometro-cdl__reference strong{color:var(--ic-navy)}.impostometro-cdl__reference a{color:var(--ic-green);font-weight:700;text-decoration:none}.impostometro-cdl__error{margin:0;padding:8px 12px;background:#fff3cd;color:#664d03;font-size:11px;text-align:center}.impostometro-cdl__error[hidden]{display:none}@media(max-width:600px){.impostometro-cdl__display{padding-inline:8px}.impostometro-cdl__groups{gap:4px}.impostometro-cdl__group{min-width:52px}.impostometro-cdl__reference{align-items:flex-start;flex-direction:column;gap:4px}}@media(max-width:430px){.impostometro-cdl__nav button{min-height:36px;padding:7px 4px;font-size:11px}.impostometro-cdl__context{padding:8px 10px!important;font-size:11px!important}.impostometro-cdl__display{min-height:95px;padding:16px 5px 13px;gap:4px}.impostometro-cdl__currency{margin-top:7px;font-size:12px}.impostometro-cdl__groups{gap:3px}.impostometro-cdl__group{min-width:43px;border-radius:6px}.impostometro-cdl__group strong{padding:9px 4px 8px;font-size:clamp(18px,6vw,25px)}.impostometro-cdl__group span{padding:5px 2px;font-size:6px}.impostometro-cdl__details{padding:9px 10px}}@media(prefers-reduced-motion:reduce){.impostometro-cdl__nav button{transition:none}}
.impostometro-cdl{--ic-cdl-blue:#03428e;--ic-cdl-dark:#021e50;--ic-cdl-gray:#79797b;--ic-cdl-light:#f5f5f7;border:1px solid rgba(3,66,142,.1);border-radius:20px;box-shadow:0 16px 48px rgba(16,24,40,.08);font-family:'Inter',Arial,sans-serif}.impostometro-cdl__header{min-height:58px;padding:12px 16px;display:flex;align-items:center;justify-content:center;background:#fff;border-bottom:1px solid rgba(3,66,142,.08)}.impostometro-cdl__brand{color:var(--ic-cdl-blue);font-family:'Sora','Inter',Arial,sans-serif;font-size:14px;font-weight:800;letter-spacing:.08em;text-align:center;text-transform:uppercase}.impostometro-cdl__nav{gap:6px;padding:8px;background:var(--ic-cdl-light)}.impostometro-cdl__nav button{min-height:40px;padding:8px 12px;border:0;border-radius:999px;color:var(--ic-cdl-blue);font-family:'Inter',Arial,sans-serif;font-weight:700;transition:background .3s ease,color .3s ease,box-shadow .3s ease,transform .3s ease}.impostometro-cdl__nav button:hover{background:#e8f0fe;transform:translateY(-1px)}.impostometro-cdl__nav button[aria-selected=true]{background:var(--ic-cdl-blue);color:#fff;box-shadow:0 6px 16px rgba(3,66,142,.18)}.impostometro-cdl__nav button:focus-visible{outline:3px solid rgba(3,66,142,.2);outline-offset:2px}.impostometro-cdl__details{border-top:1px solid rgba(3,66,142,.08);background:#fff}.impostometro-cdl__reference{color:var(--ic-cdl-gray);font-family:'Inter',Arial,sans-serif}.impostometro-cdl__reference strong{color:var(--ic-cdl-blue);font-family:'Sora','Inter',Arial,sans-serif}.impostometro-cdl__reference a{color:var(--ic-cdl-blue);text-decoration:none}@media(max-width:600px){.impostometro-cdl__header{min-height:50px;padding:10px 12px}.impostometro-cdl__brand{font-size:12px}}@media(max-width:430px){.impostometro-cdl{border-radius:14px}.impostometro-cdl__nav{gap:4px;padding:6px}.impostometro-cdl__nav button{min-height:34px;padding:6px 5px}}
CSS;
}

function impostometro_cdl_js()
{
    return <<<'JS'
(() => {
    const labels = ['Tri', 'Bi', 'Mi', 'Mil', 'Reais', 'Centavos'];

    const splitValue = (value) => {
        const totalCents = Math.round(value * 100);
        const integer = Math.floor(totalCents / 100);

        return [
            Math.floor(integer / 1e12),
            Math.floor(integer / 1e9) % 1000,
            Math.floor(integer / 1e6) % 1000,
            Math.floor(integer / 1e3) % 1000,
            integer % 1000,
            totalCents % 100,
        ];
    };

    const init = (widget) => {
        if (widget.dataset.ready) return;
        widget.dataset.ready = 'true';

        const tabs = [...widget.querySelectorAll('[role="tab"]')];
        const groupsEl = widget.querySelector('.impostometro-cdl__groups');
        const dateEl = widget.querySelector('.impostometro-cdl__date');
        const errorEl = widget.querySelector('.impostometro-cdl__error');
        const rotation = Number(widget.dataset.rotation) || 0;
        let items = {};
        let activeIndex = 0;
        let rotationTimer;
        let renderTimer;
        let syncTimer;

        const render = () => {
            const item = items[tabs[activeIndex].dataset.key];
            if (!item) return;

            const elapsed = Math.max(0, (Date.now() - Number(item.baseTime)) / 1000);
            const value = Number(item.value) + (elapsed * Number(item.increment));
            const groups = splitValue(value);
            let first = groups.findIndex((group, index) => index < 4 && group > 0);

            if (first < 0) first = 4;
            dateEl.textContent = item.referenceDate || '--/--/----';
            groupsEl.innerHTML = groups.map((group, index) => {
                if (index < first) return '';

                const display = index === 5
                    ? String(group).padStart(2, '0')
                    : (index > first && index < 5 ? String(group).padStart(3, '0') : group);

                return `<div class="impostometro-cdl__group"><strong>${display}</strong><span>${labels[index]}</span></div>`;
            }).join('');
        };

        const select = (index, restart = true) => {
            activeIndex = index;
            tabs.forEach((tab, tabIndex) => {
                tab.setAttribute('aria-selected', String(tabIndex === index));
            });
            render();
            if (restart) startRotation();
        };

        const startRotation = () => {
            clearInterval(rotationTimer);
            if (rotation > 0 && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
                rotationTimer = setInterval(() => {
                    select((activeIndex + 1) % tabs.length, false);
                }, rotation);
            }
        };

        const sync = async (initial = false) => {
            try {
                const response = await fetch(`${widget.dataset.api}?t=${Date.now()}`, {
                    cache: 'no-store',
                    headers: { Accept: 'application/json' },
                });
                if (!response.ok) throw new Error(`HTTP ${response.status}`);

                const data = await response.json();
                const nextItems = data.items || {};
                const available = tabs.findIndex((tab) => nextItems[tab.dataset.key]);
                if (available < 0) throw new Error('Sem dados');

                items = nextItems;
                errorEl.hidden = true;

                if (initial && !items[tabs[activeIndex].dataset.key]) {
                    activeIndex = available;
                }
                select(activeIndex, initial);
            } catch (error) {
                if (initial && !Object.keys(items).length) {
                    groupsEl.innerHTML = '<span class="impostometro-cdl__loading-value">Indisponível</span>';
                    errorEl.hidden = false;
                }
            }
        };

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => select(index));
        });
        widget.addEventListener('mouseenter', () => clearInterval(rotationTimer));
        widget.addEventListener('mouseleave', startRotation);
        widget.addEventListener('focusin', () => clearInterval(rotationTimer));
        widget.addEventListener('focusout', startRotation);

        sync(true).then(() => {
            clearInterval(renderTimer);
            renderTimer = setInterval(render, 100);
            clearInterval(syncTimer);
            syncTimer = setInterval(() => sync(false), 60 * 1000);
        });
    };

    const boot = () => {
        document.querySelectorAll('[data-impostometro]').forEach(init);
    };

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', boot)
        : boot();
})();
JS;
}
