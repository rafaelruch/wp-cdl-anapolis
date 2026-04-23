<?php
/**
 * Template Name: Fale Conosco
 */
get_header();

$hero_image  = get_field('contato_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920&q=80';
$subtitle    = get_the_excerpt() ?: 'Estamos aqui para ajudar. Entre em contato com a CDL Anápolis.';

// Contact info from ACF options with fallbacks
$phone    = get_field('top_bar_phone', 'option') ?: '(62) 3328-0008';
$email    = get_field('top_bar_email', 'option') ?: 'contato@cdlanapolis.com.br';
$address  = get_field('footer_address', 'option') ?: 'Rua Conde Afonso Celso, 43, Centro, Anápolis - GO, CEP 75025-030';
$whatsapp = get_field('whatsapp_number', 'option') ?: '5562991933275';
$whatsapp_display = get_field('whatsapp_display', 'option') ?: '(62) 99193-3275';
$horario  = get_field('contato_horario', 'option') ?: 'Seg a Sex, 8h às 18h';
$maps_embed = get_field('contato_maps_embed', 'option') ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.5!2d-48.9536!3d-16.3281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sCDL+An%C3%A1polis!5e0!3m2!1spt-BR!2sbr!4v1';

// Check if form was submitted
$form_sent = isset($_GET['contato']) && $_GET['contato'] === 'enviado';
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Contato</div>
        <h1 class="page-hero__title ao ao-d1"><?php the_title(); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($subtitle); ?></p>
    </div>
</section>

<!-- Contact Grid: Info + Form -->
<section class="sec">
    <div class="wrap">
        <div class="contact-grid">
            <!-- LEFT: Contact Info Cards -->
            <div class="contact-grid__info">
                <div class="sec-tag ao">Como nos encontrar</div>
                <h2 class="sec-title ao ao-d1" style="font-size:clamp(1.4rem,2.5vw,2rem);text-align:left">Informações de contato</h2>

                <div class="contact-grid__items">
                    <div class="contact-grid__item ao ao-d1">
                        <div class="contact-grid__ico">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                        </div>
                        <div>
                            <h4>Telefone</h4>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>

                    <div class="contact-grid__item ao ao-d2">
                        <div class="contact-grid__ico" style="background:rgba(37,211,102,.08);color:#25d366">
                            <svg width="22" height="22" viewBox="0 0 32 32" fill="currentColor"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg>
                        </div>
                        <div>
                            <h4>WhatsApp</h4>
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" rel="noopener"><?php echo esc_html($whatsapp_display); ?></a>
                        </div>
                    </div>

                    <div class="contact-grid__item ao ao-d3">
                        <div class="contact-grid__ico">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <h4>E-mail</h4>
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                        </div>
                    </div>

                    <div class="contact-grid__item ao ao-d4">
                        <div class="contact-grid__ico">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <h4>Endereço</h4>
                            <p><?php echo esc_html($address); ?></p>
                        </div>
                    </div>

                    <div class="contact-grid__item ao ao-d4">
                        <div class="contact-grid__ico">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <h4>Horário de atendimento</h4>
                            <p><?php echo esc_html($horario); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Contact Form -->
            <div class="contact-grid__form ao ao-d2">
                <?php if ($form_sent): ?>
                <div class="contact-form-success">
                    <div class="contact-form-success__ico">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    <h3>Mensagem enviada!</h3>
                    <p>Recebemos sua mensagem e retornaremos em até 24 horas úteis.</p>
                </div>
                <?php else: ?>
                <?php
                // Try CF7 first
                if (shortcode_exists('contact-form-7')) {
                    $cf7_forms = get_posts(['post_type' => 'wpcf7_contact_form', 'posts_per_page' => 1]);
                    if ($cf7_forms) {
                        echo do_shortcode('[contact-form-7 id="' . $cf7_forms[0]->ID . '"]');
                    } else {
                        cdl_render_contact_form($email);
                    }
                } else {
                    cdl_render_contact_form($email);
                }
                ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps -->
<section class="sec" style="background:var(--light)">
    <div class="wrap">
        <div class="sec-tag ao" style="text-align:center">Localização</div>
        <h2 class="sec-title ao ao-d1" style="text-align:center">Onde estamos</h2>
        <div class="contact-map ao ao-d2" style="margin-top:clamp(32px,4vw,48px)">
            <iframe
                src="<?php echo esc_url($maps_embed); ?>"
                width="100%"
                height="450"
                style="border:0;border-radius:var(--radius-xl);display:block"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao">Prefere falar<br>pelo WhatsApp?</h2>
    <p class="ao ao-d1">Resposta rápida da nossa equipe de atendimento.</p>
    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Olá! Gostaria de falar com a CDL Anápolis.'); ?>" class="btn btn-dark ao ao-d2" target="_blank" rel="noopener">Abrir WhatsApp <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>

<?php
/**
 * Render the HTML contact form (used when CF7 is not available)
 */
function cdl_render_contact_form($email) {
    $action_url = admin_url('admin-post.php');
    $has_handler = has_action('admin_post_nopriv_cdl_contact_form') || has_action('admin_post_cdl_contact_form');
    ?>
    <form class="contact-form"
          method="post"
          action="<?php echo $has_handler ? esc_url($action_url) : 'mailto:' . esc_attr($email); ?>"
          <?php echo $has_handler ? '' : 'enctype="text/plain"'; ?>>
        <?php if ($has_handler): ?>
        <input type="hidden" name="action" value="cdl_contact_form">
        <?php wp_nonce_field('cdl_contact_nonce', '_cdl_nonce'); ?>
        <?php endif; ?>

        <div class="contact-form__group">
            <label class="contact-form__label" for="cf-nome">Nome completo <span class="contact-form__req">*</span></label>
            <input class="contact-form__input" type="text" id="cf-nome" name="nome" required placeholder="Seu nome completo">
        </div>

        <div class="contact-form__group">
            <label class="contact-form__label" for="cf-email">E-mail <span class="contact-form__req">*</span></label>
            <input class="contact-form__input" type="email" id="cf-email" name="email" required placeholder="seu@email.com.br">
        </div>

        <div class="contact-form__group">
            <label class="contact-form__label" for="cf-telefone">Telefone</label>
            <input class="contact-form__input" type="tel" id="cf-telefone" name="telefone" placeholder="(62) 99999-9999">
        </div>

        <div class="contact-form__group">
            <label class="contact-form__label" for="cf-assunto">Assunto</label>
            <select class="contact-form__select" id="cf-assunto" name="assunto">
                <option value="Filiações">Filiações</option>
                <option value="CDL Celular">CDL Celular</option>
                <option value="CDL Jovem">CDL Jovem</option>
                <option value="CDL Mais Você">CDL Mais Você</option>
                <option value="CDL Mulher">CDL Mulher</option>
                <option value="CDL Saúde">CDL Saúde</option>
                <option value="Central de Cobranças">Central de Cobranças</option>
                <option value="Certificado Digital">Certificado Digital</option>
                <option value="Comercial">Comercial</option>
                <option value="Financeiro">Financeiro</option>
                <option value="Marketing">Marketing</option>
                <option value="SPC">SPC</option>
                <option value="Tesouraria">Tesouraria</option>
                <option value="Outros">Outros</option>
            </select>
        </div>

        <div class="contact-form__group">
            <label class="contact-form__label" for="cf-mensagem">Mensagem <span class="contact-form__req">*</span></label>
            <textarea class="contact-form__textarea" id="cf-mensagem" name="mensagem" rows="5" required placeholder="Como podemos ajudar?"></textarea>
        </div>

        <button type="submit" class="btn btn-gold" style="width:100%;justify-content:center">
            Enviar mensagem <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
    </form>
    <?php
}
?>
