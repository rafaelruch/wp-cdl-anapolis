<?php
/**
 * Template Name: Associe-se
 */
get_header();

$hero_image  = get_field('associe_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1920&q=80';
$whatsapp    = get_field('whatsapp_number', 'option') ?: '5562991933275';
$whatsapp_display = get_field('whatsapp_display', 'option') ?: '(62) 99193-3275';
$phone       = get_field('top_bar_phone', 'option') ?: '(62) 3328-0008';
$email       = get_field('top_bar_email', 'option') ?: 'contato@cdlanapolis.com.br';

$planos = [
    [
        'key'      => 'bronze',
        'name'     => 'BRONZE',
        'badge'    => 'MEI',
        'desc'     => 'Para <strong>MEI</strong> associados',
        'features' => [
            'CDL Saúde',
            'Balcão do MEI',
        ],
    ],
    [
        'key'      => 'essencial',
        'name'     => 'ESSENCIAL',
        'badge'    => '10',
        'desc'     => 'Para associados com até <strong>10 funcionários</strong>',
        'features' => [
            'CDL Saúde',
            'Assessoria Jurídica',
            'Assessoria Contábil',
            'Assessoria de Apoio Estratégico',
            'Rede de descontos',
            'Certificado digital A1 PJ',
            'Eventos corporativos',
            'Participação dos Núcleos',
            'Recrutamento e Seleção',
            'Exames Admissionais e Demissionais',
            'Gestão de E-SOCIAL',
        ],
    ],
    [
        'key'      => 'prata',
        'name'     => 'PRATA',
        'badge'    => '30',
        'desc'     => 'Para associados com até <strong>30 funcionários</strong>',
        'highlight'=> true,
        'features' => [
            'CDL Saúde',
            'Assessoria Jurídica',
            'Assessoria Contábil',
            'Assessoria de Apoio Estratégico',
            'Treinamentos e Consultorias',
            'Rede de descontos',
            'Certificado digital A1 PJ',
            'Eventos corporativos (1)',
            'Participação dos Núcleos',
            'Recrutamento e Seleção',
            'Exames Admissionais e Demissionais',
            'Gestão de E-SOCIAL',
            'Espaços Corporativos (1)',
            'Mídia sites e redes sociais (1)',
            'Espaço de lazer e eventos (1)',
        ],
    ],
    [
        'key'      => 'ouro',
        'name'     => 'OURO',
        'badge'    => '50',
        'desc'     => 'Para associados com até <strong>50 funcionários</strong>',
        'features' => [
            'CDL Saúde',
            'Assessoria Jurídica',
            'Assessoria Contábil',
            'Assessoria de Apoio Estratégico',
            'Treinamentos e Consultorias',
            'Rede de descontos',
            'Certificado digital A1 PJ',
            'Eventos corporativos (2)',
            'Participação dos Núcleos',
            'Recrutamento e Seleção',
            'Exames Admissionais e Demissionais',
            'Gestão de E-SOCIAL',
            'Espaços Corporativos (2)',
            'Mídia sites e redes sociais (2)',
            'Espaço de lazer e eventos (2)',
        ],
    ],
    [
        'key'      => 'diamante',
        'name'     => 'DIAMANTE',
        'badge'    => '+50',
        'desc'     => 'Para associados com <strong>mais de 50 funcionários</strong>',
        'features' => [
            'CDL Saúde',
            'Assessoria Jurídica',
            'Assessoria Contábil',
            'Assessoria de Apoio Estratégico',
            'Treinamentos e Consultorias',
            'Rede de descontos',
            'Certificado digital A1 PJ',
            'Eventos corporativos',
            'Participação dos Núcleos',
            'Recrutamento e Seleção',
            'Exames Admissionais e Demissionais',
            'Gestão de E-SOCIAL',
            'Espaços Corporativos',
            'Mídia sites e redes sociais',
            'Espaço de lazer e eventos',
        ],
    ],
];
?>

<!-- 1. HERO -->
<section class="conv-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay" style="background:linear-gradient(180deg,rgba(2,30,80,.85) 0%,rgba(3,66,142,.92) 100%)"></div>
    <div class="wrap conv-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2);margin:0 auto 20px">Venha para a CDL</div>
        <h1 class="conv-hero__title ao ao-d1">Faça parte da maior comunidade<br>de empreendedores de Anápolis</h1>
        <p class="conv-hero__sub ao ao-d2">Acesso ao SPC Brasil, assessoria jurídica, planos de saúde exclusivos e muito mais. Tudo o que seu negócio precisa em um só lugar.</p>
        <div class="ao ao-d3" style="margin-top:32px">
            <a href="#planos" class="btn btn-gold">
                Ver planos <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
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

<!-- 3. PLANOS -->
<section class="planos-section" id="planos" style="background:var(--light)">
    <div class="wrap">
        <div class="planos-section__head">
            <div class="sec-tag ao">Planos e Benefícios</div>
            <h2 class="sec-title ao ao-d1">Escolha o plano ideal<br>para o seu negócio</h2>
            <p class="sec-desc ao ao-d2" style="max-width:560px;margin:16px auto 0">Opções para todos os portes de empresa, do MEI a grandes estruturas. Escolha o seu e comece agora.</p>
        </div>

        <div class="planos-grid">
            <?php foreach ($planos as $i => $plano):
                $classes = 'plano-card plano-card--' . $plano['key'] . ' ao';
                if ($i > 0) $classes .= ' ao-d' . min($i, 4);
                $is_highlight = !empty($plano['highlight']);
            ?>
            <div class="<?php echo esc_attr($classes); ?>">
                <div class="plano-card__badge"><?php echo esc_html($plano['badge']); ?></div>
                <h3 class="plano-card__name"><?php echo esc_html($plano['name']); ?></h3>
                <p class="plano-card__desc"><?php echo wp_kses($plano['desc'], ['strong' => []]); ?></p>
                <ul class="plano-card__features">
                    <?php foreach ($plano['features'] as $f): ?>
                    <li><?php echo esc_html($f); ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="plano-card__cta" data-plano="<?php echo esc_attr($plano['name']); ?>">
                    Contratar plano
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </div>
            <?php endforeach; ?>
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
                <h3>Escolha seu plano</h3>
                <p>Identifique o plano que melhor se adapta ao porte do seu negócio.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico" style="background:rgba(255,214,0,.1);color:#b89a00;font-family:'Sora';font-size:1.2rem;font-weight:800">2</div>
                <h3>Envie seus dados</h3>
                <p>Preencha o formulário rápido e envie direto pelo WhatsApp para nossa equipe.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico" style="background:rgba(0,135,67,.07);color:#008743;font-family:'Sora';font-size:1.2rem;font-weight:800">3</div>
                <h3>Aproveite os benefícios</h3>
                <p>Com o cadastro ativo, acesso imediato a todos os serviços e benefícios da CDL.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. CTA WHATSAPP -->
<section class="cta-gold" aria-label="Atendimento pelo WhatsApp">
    <h2 class="ao">Prefere falar<br>pelo WhatsApp?</h2>
    <p class="ao ao-d1">Tire suas dúvidas e faça seu cadastro direto com nossa equipe.</p>
    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Olá! Quero fazer parte da CDL Anápolis.'); ?>" class="btn btn-dark ao ao-d2" target="_blank" rel="noopener">
        Abrir WhatsApp
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</section>

<!-- ═══ MODAL DE CONTRATAÇÃO ═══ -->
<div class="plano-modal" id="planoModal" role="dialog" aria-modal="true" aria-labelledby="planoModalTitle">
    <div class="plano-modal__overlay" data-close-modal></div>
    <div class="plano-modal__card">
        <button type="button" class="plano-modal__close" data-close-modal aria-label="Fechar">&times;</button>

        <div class="plano-modal__head">
            <h3 class="plano-modal__title" id="planoModalTitle">Contratar plano</h3>
            <p class="plano-modal__sub">Preencha seus dados e nossa equipe confirmará seu cadastro pelo WhatsApp.</p>
        </div>

        <div class="plano-modal__selected">
            <span class="plano-modal__selected-label">Plano escolhido</span>
            <span class="plano-modal__selected-name" id="planoSelectedName">—</span>
        </div>

        <form class="contact-form" id="planoForm" data-whatsapp="<?php echo esc_attr($whatsapp); ?>">
            <input type="hidden" name="plano" id="planoInput" value="">

            <div class="contact-form__group">
                <label class="contact-form__label" for="pf-razao">Razão Social <span class="contact-form__req">*</span></label>
                <input class="contact-form__input" type="text" id="pf-razao" name="razao_social" required placeholder="Nome da empresa">
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label" for="pf-cnpj">CNPJ <span class="contact-form__req">*</span></label>
                <input class="contact-form__input" type="text" id="pf-cnpj" name="cnpj" required placeholder="00.000.000/0000-00">
            </div>

            <div class="contact-form__row">
                <div class="contact-form__group">
                    <label class="contact-form__label" for="pf-nome">Nome do responsável <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="text" id="pf-nome" name="nome_responsavel" required placeholder="Nome completo">
                </div>
                <div class="contact-form__group">
                    <label class="contact-form__label" for="pf-cpf">CPF <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="text" id="pf-cpf" name="cpf_responsavel" required placeholder="000.000.000-00">
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__group">
                    <label class="contact-form__label" for="pf-telefone">Telefone / WhatsApp <span class="contact-form__req">*</span></label>
                    <input class="contact-form__input" type="tel" id="pf-telefone" name="telefone" required placeholder="(62) 99999-9999">
                </div>
                <div class="contact-form__group">
                    <label class="contact-form__label" for="pf-email">E-mail</label>
                    <input class="contact-form__input" type="email" id="pf-email" name="email" placeholder="seu@email.com.br">
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
