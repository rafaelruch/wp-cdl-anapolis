<?php
/**
 * Template Name: Associe-se
 */
get_header();

$hero_image  = get_field('associe_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1920&q=80';
$whatsapp    = get_field('whatsapp_number', 'option') ?: '556232800000';
$whatsapp_display = get_field('whatsapp_display', 'option') ?: '(62) 99999-9999';
$phone       = get_field('top_bar_phone', 'option') ?: '(62) 3280-0000';
$email       = get_field('top_bar_email', 'option') ?: 'contato@cdlanapolis.com.br';

$form_sent = isset($_GET['associe']) && $_GET['associe'] === 'enviado';
?>

<!-- 1. HERO -->
<section class="conv-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay" style="background:linear-gradient(180deg,rgba(2,30,80,.85) 0%,rgba(3,66,142,.92) 100%)"></div>
    <div class="wrap conv-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2);margin:0 auto 20px">Venha para a CDL</div>
        <h1 class="conv-hero__title ao ao-d1">Faça parte da maior comunidade<br>de empreendedores de Anápolis</h1>
        <p class="conv-hero__sub ao ao-d2">Acesso ao SPC Brasil, assessoria jurídica, planos de saúde exclusivos e muito mais. Tudo o que seu negócio precisa em um só lugar.</p>
        <div class="ao ao-d3" style="margin-top:32px">
            <a href="#formulario" class="btn btn-gold">
                Quero fazer parte <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 2. SOCIAL PROOF STRIP -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <div class="conv-social-strip__item ao">
                <span class="conv-social-strip__number">2.000+</span>
                <span class="conv-social-strip__label">empreendedores</span>
            </div>
            <div class="conv-social-strip__item ao ao-d1">
                <span class="conv-social-strip__number">60+</span>
                <span class="conv-social-strip__label">anos de história</span>
            </div>
            <div class="conv-social-strip__item ao ao-d2">
                <span class="conv-social-strip__number">7</span>
                <span class="conv-social-strip__label">serviços exclusivos</span>
            </div>
        </div>
    </div>
</section>

<!-- 3. REGISTRATION FORM (moved up) -->
<section class="sec conv-form-section" id="formulario" style="background:var(--light)">
    <div class="wrap">
        <div class="conv-form-grid">
            <div class="conv-form-info ao">
                <div class="sec-tag">Cadastro rápido</div>
                <h2 class="sec-title" style="text-align:left;font-size:clamp(1.4rem,2.5vw,2.2rem)">Preencha seus dados e nossa equipe entrará em contato</h2>
                <p class="sec-desc" style="text-align:left;margin:0;margin-top:16px">O processo é simples e rápido. Após o envio, um consultor da CDL Anápolis vai ligar para apresentar todos os serviços e condições disponíveis para o seu perfil de negócio.</p>

                <div class="conv-trust" style="margin-top:40px">
                    <div class="conv-trust__item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        <span>Seus dados estão seguros</span>
                    </div>
                    <div class="conv-trust__item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span>Sem compromisso inicial</span>
                    </div>
                    <div class="conv-trust__item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span>Retorno em até 24 horas</span>
                    </div>
                </div>
            </div>

            <div class="conv-form-card ao ao-d1">
                <?php if ($form_sent): ?>
                <div class="contact-form-success">
                    <div class="contact-form-success__ico">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    <h3>Cadastro recebido!</h3>
                    <p>Nossa equipe entrará em contato em breve para apresentar os serviços e condições.</p>
                </div>
                <?php else: ?>
                <?php
                if (shortcode_exists('contact-form-7')) {
                    $cf7_forms = get_posts(['post_type' => 'wpcf7_contact_form', 'posts_per_page' => 1, 's' => 'associe']);
                    if (!$cf7_forms) $cf7_forms = get_posts(['post_type' => 'wpcf7_contact_form', 'posts_per_page' => 1]);
                    if ($cf7_forms) {
                        echo do_shortcode('[contact-form-7 id="' . $cf7_forms[0]->ID . '"]');
                    } else {
                        cdl_render_associe_form($email);
                    }
                } else {
                    cdl_render_associe_form($email);
                }
                ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- 4. BENEFITS HIGHLIGHT -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Por que fazer parte?</div>
        <h2 class="sec-title ao ao-d1">Vantagens que fazem a diferença</h2>
        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Proteção ao Crédito</h3>
                <p>Acesso completo ao SPC Brasil: consultas de CPF/CNPJ, inclusão de devedores e score de crédito para decisões seguras.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
                <h3>Assessoria Jurídica</h3>
                <p>Orientação empresarial, trabalhista e do consumidor sem custo adicional. Análise de contratos e mediação de conflitos.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                </div>
                <h3>CDL Saúde</h3>
                <p>Planos de saúde e odontológicos com valores até 40% menores. Cobertura para você, seus colaboradores e familiares.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. STEPS -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Como funciona</div>
        <h2 class="sec-title ao ao-d1">Fazer parte é simples</h2>
        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico" style="background:rgba(3,66,142,.07);color:var(--blue);font-family:'Sora';font-size:1.2rem;font-weight:800">1</div>
                <h3>Preencha o formulário</h3>
                <p>Envie seus dados pelo formulário acima. É rápido e sem compromisso.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico" style="background:rgba(255,214,0,.1);color:#b89a00;font-family:'Sora';font-size:1.2rem;font-weight:800">2</div>
                <h3>Receba nosso contato</h3>
                <p>Nossa equipe vai ligar para apresentar os serviços e planos disponíveis para o seu negócio.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico" style="background:rgba(0,135,67,.07);color:#008743;font-family:'Sora';font-size:1.2rem;font-weight:800">3</div>
                <h3>Aproveite os benefícios</h3>
                <p>Com o cadastro ativo, você já tem acesso imediato a todos os serviços e benefícios da CDL.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. CTA WHATSAPP -->
<section class="cta-gold">
    <h2 class="ao">Prefere falar<br>pelo WhatsApp?</h2>
    <p class="ao ao-d1">Tire suas dúvidas e faça seu cadastro direto com nossa equipe.</p>
    <div class="ao ao-d2" style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center">
        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Olá! Quero fazer parte da CDL Anápolis.'); ?>" class="btn btn-dark" target="_blank" rel="noopener" style="background:#25d366;border-color:#25d366">
            <svg width="18" height="18" viewBox="0 0 32 32" fill="currentColor" style="margin-right:6px"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg>
            Abrir WhatsApp
        </a>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="btn" style="background:rgba(255,255,255,.15);color:#fff;backdrop-filter:blur(8px)">
            Ligar agora
        </a>
    </div>
</section>

<?php get_footer(); ?>

<?php
function cdl_render_associe_form($email) {
    $action_url = admin_url('admin-post.php');
    $has_handler = has_action('admin_post_nopriv_cdl_associe_form') || has_action('admin_post_cdl_associe_form');
    ?>
    <form class="contact-form"
          method="post"
          action="<?php echo $has_handler ? esc_url($action_url) : 'mailto:' . esc_attr($email); ?>"
          <?php echo $has_handler ? '' : 'enctype="text/plain"'; ?>>
        <?php if ($has_handler): ?>
        <input type="hidden" name="action" value="cdl_associe_form">
        <?php wp_nonce_field('cdl_associe_nonce', '_cdl_nonce'); ?>
        <?php endif; ?>

        <div class="contact-form__group">
            <label class="contact-form__label" for="af-razao">Razão Social <span class="contact-form__req">*</span></label>
            <input class="contact-form__input" type="text" id="af-razao" name="razao_social" required placeholder="Nome da empresa">
        </div>

        <div class="contact-form__group">
            <label class="contact-form__label" for="af-cnpj">CNPJ <span class="contact-form__req">*</span></label>
            <input class="contact-form__input" type="text" id="af-cnpj" name="cnpj" required placeholder="00.000.000/0000-00">
        </div>

        <div class="contact-form__row">
            <div class="contact-form__group">
                <label class="contact-form__label" for="af-nome">Nome do responsável <span class="contact-form__req">*</span></label>
                <input class="contact-form__input" type="text" id="af-nome" name="nome_responsavel" required placeholder="Nome completo">
            </div>
            <div class="contact-form__group">
                <label class="contact-form__label" for="af-cpf">CPF do responsável <span class="contact-form__req">*</span></label>
                <input class="contact-form__input" type="text" id="af-cpf" name="cpf_responsavel" required placeholder="000.000.000-00">
            </div>
        </div>

        <div class="contact-form__row">
            <div class="contact-form__group">
                <label class="contact-form__label" for="af-telefone">Telefone / WhatsApp <span class="contact-form__req">*</span></label>
                <input class="contact-form__input" type="tel" id="af-telefone" name="telefone" required placeholder="(62) 99999-9999">
            </div>
            <div class="contact-form__group">
                <label class="contact-form__label" for="af-email">E-mail</label>
                <input class="contact-form__input" type="email" id="af-email" name="email" placeholder="seu@email.com.br">
            </div>
        </div>

        <button type="submit" class="btn btn-gold" style="width:100%;justify-content:center;padding:18px 32px;font-size:1rem">
            Quero fazer parte <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
    </form>
    <?php
}
?>
