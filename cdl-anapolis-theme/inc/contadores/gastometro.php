<?php
/**
 * Plugin Name: Gastômetro CDL Anápolis
 * Description: Exibe os números oficiais do Gasto Brasil para Anápolis, Goiás e Brasil.
 * Version: 1.0.0
 * Author: Matheus Rezende
 */

if (!defined('ABSPATH')) {
    exit;
}

function gastometro_cdl_sources()
{
    return array(
        'anapolis' => array(
            'label' => 'Anápolis',
            'url' => 'https://gastobrasil.com.br/municipality_tax_counters/5201108',
            'value_field' => 'total_year',
            'increment_field' => 'incremental',
        ),
        'goias' => array(
            'label' => 'Goiás',
            'url' => 'https://gastobrasil.com.br/state_tax_counters/Goi%C3%A1s',
            'value_field' => 'total_year',
            'increment_field' => 'incremental',
        ),
        'brasil' => array(
            'label' => 'Brasil',
            'url' => 'https://gastobrasil.com.br/tax_counters',
            'value_field' => 'general_government',
            'increment_field' => 'general_government_incremental',
        ),
    );
}

function gastometro_cdl_fetch_source($key, $source)
{
    $cache_key = 'gastometro_cdl_v1_' . $key;
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
                'Referer' => 'https://gastobrasil.com.br/',
            ),
            'user-agent' => 'WordPress/Gastometro-CDL-Anapolis',
        )
    );

    if (!is_wp_error($response) && 200 === wp_remote_retrieve_response_code($response)) {
        $body = json_decode(wp_remote_retrieve_body($response), true);
        $value_field = $source['value_field'];
        $increment_field = $source['increment_field'];

        if (
            is_array($body)
            && isset($body[$value_field], $body[$increment_field])
            && is_numeric($body[$value_field])
            && is_numeric($body[$increment_field])
        ) {
            $server_time = time();
            $normalized = array(
                'label' => $source['label'],
                'value' => (float) $body[$value_field],
                'increment' => (float) $body[$increment_field],
                'baseTime' => $server_time * 1000,
                'referenceDate' => wp_date(
                    'd/m/Y',
                    $server_time,
                    new DateTimeZone('America/Sao_Paulo')
                ),
            );

            set_transient($cache_key, $normalized, MINUTE_IN_SECONDS);
            update_option($cache_key . '_last_good', $normalized, false);

            return $normalized;
        }
    }

    $last_good = get_option($cache_key . '_last_good');
    return is_array($last_good) ? $last_good : null;
}

function gastometro_cdl_rest_data()
{
    $result = array();

    foreach (gastometro_cdl_sources() as $key => $source) {
        $data = gastometro_cdl_fetch_source($key, $source);
        if (is_array($data)) {
            $result[$key] = $data;
        }
    }

    if (!$result) {
        return new WP_Error(
            'gastometro_indisponivel',
            'Os dados do Gasto Brasil estão temporariamente indisponíveis.',
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

function gastometro_cdl_register_rest_route()
{
    register_rest_route(
        'gastometro-cdl/v1',
        '/dados',
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'gastometro_cdl_rest_data',
            'permission_callback' => '__return_true',
        )
    );
}
add_action('rest_api_init', 'gastometro_cdl_register_rest_route');

function gastometro_cdl_shortcode($atts = array())
{
    $atts = shortcode_atts(
        array(
            'rotacao' => '8000',
        ),
        $atts,
        'gastometro_cdl'
    );

    $rotation = max(0, absint($atts['rotacao']));

    ob_start();
    ?>
    <section
        class="gastometro-cdl"
        data-gastometro
        data-api="<?php echo esc_url(rest_url('gastometro-cdl/v1/dados')); ?>"
        data-rotation="<?php echo esc_attr($rotation); ?>"
        aria-label="Gastos públicos estimados">
        <header class="gastometro-cdl__header">
            <strong class="gastometro-cdl__brand">Gastômetro</strong>
        </header>

        <div class="gastometro-cdl__nav" role="tablist" aria-label="Local dos gastos">
            <button type="button" role="tab" aria-selected="true" data-key="anapolis">Anápolis</button>
            <button type="button" role="tab" aria-selected="false" data-key="goias">Goiás</button>
            <button type="button" role="tab" aria-selected="false" data-key="brasil">Brasil</button>
        </div>

        <div class="gastometro-cdl__display" aria-live="polite">
            <span class="gastometro-cdl__currency">R$</span>
            <div class="gastometro-cdl__groups">
                <span class="gastometro-cdl__loading-value">Carregando...</span>
            </div>
        </div>

        <div class="gastometro-cdl__details">
            <div class="gastometro-cdl__reference">
                <span>Atualizado em <strong class="gastometro-cdl__date">--/--/----</strong></span>
                <span>Fonte: <a href="https://gastobrasil.com.br/" target="_blank" rel="noopener noreferrer">gastobrasil.com.br</a></span>
            </div>
        </div>

        <p class="gastometro-cdl__error" hidden>Não foi possível atualizar o contador.</p>
    </section>
    <?php

    return ob_get_clean();
}
add_shortcode('gastometro_cdl', 'gastometro_cdl_shortcode');

function gastometro_cdl_assets()
{
    if (is_admin()) {
        return;
    }

    wp_register_style('gastometro-cdl', false, array(), '1.0.0');
    wp_enqueue_style('gastometro-cdl');
    wp_add_inline_style('gastometro-cdl', gastometro_cdl_css());

    wp_register_script('gastometro-cdl', false, array(), '1.0.0', true);
    wp_enqueue_script('gastometro-cdl');
    wp_add_inline_script('gastometro-cdl', gastometro_cdl_js());
}
add_action('wp_enqueue_scripts', 'gastometro_cdl_assets');

function gastometro_cdl_css()
{
    return <<<'CSS'
.gastometro-cdl{--gc-navy:#0f2143;--gc-blue:#03428e;--gc-border:#d8e0eb;--gc-muted:#79797b;--gc-light:#f5f5f7;--gc-white:#fff;width:min(100%,728px);margin-inline:auto;overflow:hidden;border:1px solid rgba(3,66,142,.1);border-radius:20px;background:var(--gc-white);box-shadow:0 16px 48px rgba(16,24,40,.08);font-family:'Inter',Arial,sans-serif}.gastometro-cdl *{box-sizing:border-box}.gastometro-cdl__header{min-height:58px;padding:12px 16px;display:flex;align-items:center;justify-content:center;background:#fff;border-bottom:1px solid rgba(3,66,142,.08)}.gastometro-cdl__brand{color:var(--gc-blue);font-family:'Sora','Inter',Arial,sans-serif;font-size:14px;font-weight:800;letter-spacing:.08em;text-align:center;text-transform:uppercase}.gastometro-cdl__nav{padding:8px;display:grid;grid-template-columns:repeat(3,1fr);gap:6px;background:var(--gc-light)}.gastometro-cdl__nav button{min-height:40px;margin:0;padding:8px 12px;border:0;border-radius:999px;background:transparent;color:var(--gc-blue);font:700 12px 'Inter',Arial,sans-serif;cursor:pointer;transition:background .3s ease,color .3s ease,box-shadow .3s ease,transform .3s ease}.gastometro-cdl__nav button:hover{background:#e8f0fe;transform:translateY(-1px)}.gastometro-cdl__nav button[aria-selected=true]{background:var(--gc-blue);color:#fff;box-shadow:0 6px 16px rgba(3,66,142,.18)}.gastometro-cdl__nav button:focus-visible{outline:3px solid rgba(3,66,142,.2);outline-offset:2px}.gastometro-cdl__display{min-height:132px;padding:24px 14px 19px;display:flex;align-items:center;justify-content:center;gap:10px;overflow:hidden;background:var(--gc-navy);color:#fff;font-variant-numeric:tabular-nums}.gastometro-cdl__currency{align-self:flex-start;margin-top:13px;color:#a9bad3;font-size:clamp(14px,2.5vw,22px);font-weight:700}.gastometro-cdl__groups{display:flex;align-items:stretch;justify-content:center;gap:7px;min-width:0}.gastometro-cdl__group{min-width:66px;overflow:hidden;border:1px solid rgba(255,255,255,.18);border-radius:8px;background:#182f57;box-shadow:inset 0 1px 0 rgba(255,255,255,.08),0 4px 10px rgba(0,0,0,.18);text-align:center}.gastometro-cdl__group strong{display:block;padding:12px 8px 10px;color:#fff;font-size:clamp(22px,4.8vw,42px);font-weight:900;line-height:1;letter-spacing:-.045em;white-space:nowrap}.gastometro-cdl__group span{display:block;padding:6px 4px;border-top:1px solid rgba(255,255,255,.12);background:rgba(0,0,0,.13);color:#c3d0e3;font-size:9px;font-weight:700;letter-spacing:.05em;text-transform:uppercase}.gastometro-cdl__loading-value{color:#fff;font-size:18px;font-weight:700}.gastometro-cdl__details{padding:10px 16px;border-top:1px solid rgba(3,66,142,.08);background:#fff}.gastometro-cdl__reference{display:flex;justify-content:space-between;gap:12px;color:var(--gc-muted);font:400 10px 'Inter',Arial,sans-serif}.gastometro-cdl__reference strong{color:var(--gc-blue);font-family:'Sora','Inter',Arial,sans-serif}.gastometro-cdl__reference a{color:var(--gc-blue);font-weight:700;text-decoration:none}.gastometro-cdl__error{margin:0;padding:8px 12px;background:#fff3cd;color:#664d03;font-size:11px;text-align:center}.gastometro-cdl__error[hidden]{display:none}@media(max-width:600px){.gastometro-cdl__header{min-height:50px;padding:10px 12px}.gastometro-cdl__brand{font-size:12px}.gastometro-cdl__display{padding-inline:8px}.gastometro-cdl__groups{gap:4px}.gastometro-cdl__group{min-width:52px}.gastometro-cdl__reference{align-items:flex-start;flex-direction:column;gap:4px}}@media(max-width:430px){.gastometro-cdl{border-radius:14px}.gastometro-cdl__nav{gap:4px;padding:6px}.gastometro-cdl__nav button{min-height:34px;padding:6px 5px;font-size:11px}.gastometro-cdl__display{min-height:95px;padding:16px 5px 13px;gap:4px}.gastometro-cdl__currency{margin-top:7px;font-size:12px}.gastometro-cdl__groups{gap:3px}.gastometro-cdl__group{min-width:43px;border-radius:6px}.gastometro-cdl__group strong{padding:9px 4px 8px;font-size:clamp(18px,6vw,25px)}.gastometro-cdl__group span{padding:5px 2px;font-size:6px}.gastometro-cdl__details{padding:9px 10px}}@media(prefers-reduced-motion:reduce){.gastometro-cdl__nav button{transition:none}}
CSS;
}

function gastometro_cdl_js()
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
        const groupsEl = widget.querySelector('.gastometro-cdl__groups');
        const dateEl = widget.querySelector('.gastometro-cdl__date');
        const errorEl = widget.querySelector('.gastometro-cdl__error');
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

                return `<div class="gastometro-cdl__group"><strong>${display}</strong><span>${labels[index]}</span></div>`;
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
                    groupsEl.innerHTML = '<span class="gastometro-cdl__loading-value">Indisponível</span>';
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
            renderTimer = setInterval(render, 100);
            syncTimer = setInterval(() => sync(false), 60 * 1000);
        });
    };

    const boot = () => {
        document.querySelectorAll('[data-gastometro]').forEach(init);
    };

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', boot)
        : boot();
})();
JS;
}
