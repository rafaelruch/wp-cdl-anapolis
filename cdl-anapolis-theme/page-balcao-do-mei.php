<?php
/**
 * Template Name: Balcão do MEI
 *
 * Página de entrada do Balcão do MEI. Tem dois caminhos:
 *  1. "Quero abrir meu MEI" → abre modal com formulário e envia tudo
 *     via WhatsApp pré-preenchido.
 *  2. "Já sou MEI" → leva pra /associe-se/?abrir=bronze, onde o JS de
 *     associe-se.js abre o modal do plano BRONZE direto.
 *
 * Conteúdo é administrável via ACF (group_balcao_mei). Tudo tem fallback
 * com o texto institucional pra não quebrar antes do cliente preencher.
 */
get_header();

$has_acf = function_exists('get_field');

$hero_image   = $has_acf ? get_field('balcao_hero_image') : null;
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1920&q=80';

$hero_tag      = ($has_acf ? get_field('balcao_hero_tag') : '')      ?: 'Serviço CDL';
$hero_title    = ($has_acf ? get_field('balcao_hero_title') : '')    ?: 'Balcão do MEI CDL Anápolis';
$hero_subtitle = ($has_acf ? get_field('balcao_hero_subtitle') : '') ?: 'Formalize seu negócio com segurança, orientação e apoio de quem entende de empreendedorismo.';

$intro_text = ($has_acf ? get_field('balcao_intro') : '') ?: 'Com o Balcão do MEI da CDL Anápolis, você conta com suporte para abrir seu MEI, regularizar sua empresa e dar o próximo passo com mais tranquilidade.';

$opt1_title = ($has_acf ? get_field('balcao_opt1_title') : '') ?: 'Quero abrir meu MEI';
$opt1_desc  = ($has_acf ? get_field('balcao_opt1_desc')  : '') ?: 'Preencha o formulário com seus dados e nossa equipe irá analisar as informações para iniciar o processo de abertura do seu MEI com segurança.';
$opt1_cta   = ($has_acf ? get_field('balcao_opt1_cta')   : '') ?: 'Cadastrar meu MEI';

$opt2_title = ($has_acf ? get_field('balcao_opt2_title') : '') ?: 'Já sou MEI';
$opt2_desc  = ($has_acf ? get_field('balcao_opt2_desc')  : '') ?: 'Se você já possui MEI, conheça o Plano MEI da CDL Anápolis e tenha acesso a soluções, benefícios e suporte para fortalecer o seu negócio.';
$opt2_cta   = ($has_acf ? get_field('balcao_opt2_cta')   : '') ?: 'Conhecer Plano MEI';
$opt2_link  = ($has_acf ? get_field('balcao_opt2_link')  : '') ?: '/associe-se/?abrir=bronze#planos';

$porque_title = ($has_acf ? get_field('balcao_porque_title') : '') ?: 'Por que abrir seu MEI pela CDL Anápolis?';
$porque_text  = ($has_acf ? get_field('balcao_porque_text')  : '') ?: 'Abrir seu MEI com a CDL é contar com orientação especializada desde o primeiro passo. Nossa equipe auxilia no processo de formalização, evita erros no cadastro e ajuda você a entender melhor suas obrigações como empreendedor.';

$beneficios = $has_acf ? get_field('balcao_beneficios') : null;
if (!$beneficios) {
    $beneficios = [
        ['titulo' => 'Atendimento orientado',                  'descricao' => 'Suporte para preencher corretamente as informações necessárias.'],
        ['titulo' => 'Mais segurança no cadastro',             'descricao' => 'Evite erros na atividade, dados da empresa e informações obrigatórias.'],
        ['titulo' => 'Apoio após a formalização',              'descricao' => 'Você não fica sozinho depois de abrir o MEI.'],
        ['titulo' => 'Acesso ao Plano MEI CDL',                'descricao' => 'Benefícios exclusivos para quem quer crescer com mais estrutura.'],
        ['titulo' => 'Facilidade para emitir notas e se regularizar', 'descricao' => 'Orientação para deixar sua empresa pronta para vender mais.'],
    ];
}

$cta_title = ($has_acf ? get_field('balcao_cta_title') : '') ?: 'Comece seu negócio do jeito certo.';
$cta_text  = ($has_acf ? get_field('balcao_cta_text')  : '') ?: 'A CDL Anápolis está pronta para ajudar você a transformar sua ideia em uma empresa formalizada, regular e preparada para crescer.';
$cta_btn   = ($has_acf ? get_field('balcao_cta_btn')   : '') ?: 'Cadastrar meu MEI';

$whatsapp = ($has_acf ? get_field('whatsapp_number', 'option') : '') ?: '5562991933275';

$icones_beneficios = [
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
];
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo esc_html($hero_tag); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php echo esc_html($hero_title); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($hero_subtitle); ?></p>
    </div>
</section>

<!-- Intro -->
<section class="sec" style="text-align:center">
    <div class="wrap" style="max-width:760px">
        <p class="sobre-texto ao"><?php echo esc_html($intro_text); ?></p>
    </div>
</section>

<!-- Escolha uma opção -->
<section class="sec balcao-opcoes" style="background:var(--light)">
    <div class="wrap">
        <div style="text-align:center;margin-bottom:clamp(28px,4vw,40px)">
            <div class="sec-tag ao">Qual é o seu momento?</div>
            <h2 class="sec-title ao ao-d1">Escolha uma opção</h2>
        </div>

        <div class="balcao-opcoes__grid">
            <article class="balcao-card ao">
                <div class="balcao-card__head">
                    <div class="balcao-card__ico">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                    </div>
                    <h3><?php echo esc_html($opt1_title); ?></h3>
                </div>
                <p><?php echo esc_html($opt1_desc); ?></p>
                <button type="button" class="btn btn-blue balcao-card__cta" data-balcao-open>
                    <?php echo esc_html($opt1_cta); ?>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </article>

            <article class="balcao-card ao ao-d1">
                <div class="balcao-card__head">
                    <div class="balcao-card__ico balcao-card__ico--gold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h3><?php echo esc_html($opt2_title); ?></h3>
                </div>
                <p><?php echo esc_html($opt2_desc); ?></p>
                <a href="<?php echo esc_url($opt2_link); ?>" class="btn btn-gold balcao-card__cta">
                    <?php echo esc_html($opt2_cta); ?>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </article>
        </div>
    </div>
</section>

<!-- Por que abrir? -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Suporte completo</div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($porque_title); ?></h2>
        <p class="sec-desc ao ao-d2" style="max-width:760px;margin:16px auto 0"><?php echo esc_html($porque_text); ?></p>

        <div class="page-features__grid" style="margin-top:clamp(36px,5vw,56px)">
            <?php foreach ($beneficios as $i => $b): ?>
            <div class="sobre-mvv__card ao ao-d<?php echo $i % 3; ?>">
                <div class="sobre-mvv__ico">
                    <?php echo $icones_beneficios[$i % count($icones_beneficios)]; ?>
                </div>
                <h3><?php echo esc_html($b['titulo']); ?></h3>
                <p><?php echo esc_html($b['descricao']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA final -->
<section class="cta-gold">
    <h2 class="ao"><?php echo esc_html($cta_title); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($cta_text); ?></p>
    <button type="button" class="btn btn-dark ao ao-d2" data-balcao-open>
        <?php echo esc_html($cta_btn); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </button>
</section>

<!-- ═══ MODAL DE CADASTRO MEI ═══ -->
<div class="plano-modal" id="balcaoModal" role="dialog" aria-modal="true" aria-labelledby="balcaoModalTitle">
    <div class="plano-modal__overlay" data-close-balcao></div>
    <div class="plano-modal__card">
        <button type="button" class="plano-modal__close" data-close-balcao aria-label="Fechar">&times;</button>

        <div class="plano-modal__head">
            <h3 class="plano-modal__title" id="balcaoModalTitle">Cadastrar meu MEI</h3>
            <p class="plano-modal__sub">Preencha seus dados e nossa equipe entrará em contato pelo WhatsApp para iniciar a abertura.</p>
        </div>

        <form class="contact-form" id="balcaoForm" data-whatsapp="<?php echo esc_attr($whatsapp); ?>">
            <div class="contact-form__group">
                <label class="contact-form__label" for="bf-nome">Nome completo <span class="contact-form__req">*</span></label>
                <input class="contact-form__input" type="text" id="bf-nome" name="nome" required placeholder="Seu nome completo">
            </div>

            <div class="contact-form__row">
                <div class="contact-form__group">
                    <label class="contact-form__label" for="bf-cpf">CPF <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="text" id="bf-cpf" name="cpf" required placeholder="000.000.000-00">
                </div>
                <div class="contact-form__group">
                    <label class="contact-form__label" for="bf-data">Data de nascimento <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="date" id="bf-data" name="data_nascimento" required>
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__group">
                    <label class="contact-form__label" for="bf-whatsapp">WhatsApp <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="tel" id="bf-whatsapp" name="whatsapp" required placeholder="(62) 99999-9999">
                </div>
                <div class="contact-form__group">
                    <label class="contact-form__label" for="bf-email">E-mail <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="email" id="bf-email" name="email" required placeholder="nome@email.com">
                </div>
            </div>

            <button type="submit" class="btn btn-gold" style="width:100%;justify-content:center;padding:16px 32px;font-size:.95rem;margin-top:8px;background:#25d366;border-color:#25d366;color:#fff">
                <svg width="18" height="18" viewBox="0 0 32 32" fill="currentColor"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg>
                Enviar via WhatsApp
            </button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
