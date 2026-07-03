<?php
/**
 * Template Name: Área do Associado
 *
 * Box de login centralizado que autentica o associado contra a API
 * de Login Centralizado CDL (POST /auth/login). Após sucesso:
 * - guarda o token JWT em localStorage
 * - redireciona o associado para a URL do sistema central
 *   (ACF Options → CDL Config → Header & Footer → "URL de redirect")
 *   com o token na query string (?token=...).
 *
 * Configuração necessária via ACF Options:
 * - area_associado_api_url     (URL base da API, ex: https://api.cdlanapolis.com.br)
 * - area_associado_redirect_url (URL pro sistema do cliente pós-login)
 */
get_header();

$hero_image    = function_exists('get_field') ? get_field('area_associado_hero_image', 'option') : null;
$hero_img_url  = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80';
$hero_title    = (function_exists('get_field') ? get_field('area_associado_hero_title',    'option') : '') ?: 'Área do Associado';
$hero_subtitle = (function_exists('get_field') ? get_field('area_associado_hero_subtitle', 'option') : '') ?: 'Acesse o sistema central com seu CNPJ e senha cadastrados.';
?>

<!-- Hero -->
<section class="page-hero page-hero--compact" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content" style="text-align:center">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Acesso exclusivo</div>
        <h1 class="page-hero__title ao ao-d1"><?php echo esc_html($hero_title); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($hero_subtitle); ?></p>
    </div>
</section>

<!-- Box de Login -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="max-width:480px">
        <div class="aa-login-card ao">
            <div class="aa-login-card__head">
                <div class="aa-login-card__ico" aria-hidden="true">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                </div>
                <h2 class="aa-login-card__title">Entrar na sua conta</h2>
                <p class="aa-login-card__sub">Use o CNPJ e a senha cadastrados na CDL Anápolis.</p>
            </div>

            <form id="aaLoginForm" class="aa-login-form" novalidate>
                <div class="aa-field">
                    <label for="aaCnpj" class="aa-field__label">CNPJ</label>
                    <input
                        type="text"
                        id="aaCnpj"
                        name="cnpj"
                        class="aa-field__input"
                        placeholder="00.000.000/0000-00"
                        inputmode="numeric"
                        autocomplete="username"
                        maxlength="18"
                        required>
                </div>

                <div class="aa-field">
                    <label for="aaPassword" class="aa-field__label">Senha</label>
                    <div class="aa-field__password">
                        <input
                            type="password"
                            id="aaPassword"
                            name="password"
                            class="aa-field__input"
                            placeholder="Digite sua senha"
                            autocomplete="current-password"
                            required>
                        <button type="button" class="aa-field__toggle" id="aaTogglePassword" aria-label="Mostrar senha">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div id="aaStatus" class="aa-status" role="alert" hidden></div>

                <button type="submit" class="btn btn-blue aa-submit" id="aaSubmit">
                    <span class="aa-submit__label">Entrar</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </form>

            <div class="aa-login-card__foot">
                <p>Ainda não é associado?</p>
                <a href="/associe-se/" class="link">Saiba como fazer parte &rarr;</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
