<?php
/**
 * Template Name: LGPD
 *
 * Toda a página é administrável via ACF (group_lgpd.json). Conteúdo legal
 * estruturado em cards visuais é mantido como fallback hardcoded; quando
 * o cliente preenche `lgpd_corpo_html` no admin, esse WYSIWYG substitui
 * os cards padrão (útil quando precisa atualizar o texto da política).
 */
get_header();

$has_acf = function_exists('get_field');

// ─── HERO ─────────────────────────────────────────────
$hero_image = $has_acf ? get_field('lgpd_hero_image') : null;
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1920&q=80';
$hero_tag   = ($has_acf ? get_field('lgpd_hero_tag')      : '') ?: 'Institucional';
$hero_title = ($has_acf ? get_field('lgpd_hero_title')    : '') ?: "Política de Privacidade\ne LGPD";
$hero_sub   = ($has_acf ? get_field('lgpd_hero_subtitle') : '') ?: 'Transparência e proteção de dados pessoais em conformidade com a Lei Geral de Proteção de Dados.';

// ─── INFO STRIP ──────────────────────────────────────
$strip = [
    [
        'num' => ($has_acf ? get_field('lgpd_strip_entidade_titulo') : '') ?: 'CDL Anápolis',
        'lab' => ($has_acf ? get_field('lgpd_strip_entidade_label')  : '') ?: 'CNPJ 01.064.674/0001-12',
    ],
    [
        'num' => ($has_acf ? get_field('lgpd_strip_lei_titulo') : '') ?: 'Lei nº 13.709/2018',
        'lab' => ($has_acf ? get_field('lgpd_strip_lei_label')  : '') ?: 'LGPD — Lei Geral de Proteção de Dados',
    ],
    [
        'num' => ($has_acf ? get_field('lgpd_strip_dpo_titulo') : '') ?: 'Dra. Louise Ramiro',
        'lab' => ($has_acf ? get_field('lgpd_strip_dpo_label')  : '') ?: 'Encarregada de Proteção de Dados (DPO)',
    ],
];

// ─── INTRO ──────────────────────────────────────────
$intro = ($has_acf ? get_field('lgpd_intro_html') : '') ?: '<p>A CDL Anápolis (Câmara de Dirigentes Lojistas de Anápolis), com sede na Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030, está comprometida com a proteção dos dados pessoais dos seus membros, parceiros, colaboradores e visitantes, em conformidade com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018 — LGPD).</p>';

// ─── POLÍTICA ────────────────────────────────────────
$pol_tag   = ($has_acf ? get_field('lgpd_policy_tag')      : '') ?: 'Política de Privacidade';
$pol_title = ($has_acf ? get_field('lgpd_policy_title')    : '') ?: 'Como tratamos seus dados';
$pol_sub   = ($has_acf ? get_field('lgpd_policy_subtitle') : '') ?: 'Conheça cada aspecto da nossa política de proteção de dados pessoais.';
$corpo_html = $has_acf ? get_field('lgpd_corpo_html') : '';

// ─── DPO ─────────────────────────────────────────────
$dpo_title = ($has_acf ? get_field('lgpd_dpo_title')    : '') ?: 'Encarregada de Dados';
$dpo_sub   = ($has_acf ? get_field('lgpd_dpo_subtitle') : '') ?: 'Para exercer seus direitos ou esclarecer dúvidas sobre o tratamento de dados pessoais.';
$dpo_nome  = ($has_acf ? get_field('lgpd_dpo_nome')     : '') ?: 'Advogada Dra. Louise Ramiro da Costa';
$dpo_email = ($has_acf ? get_field('lgpd_dpo_email')    : '') ?: 'lgpd@cdlanapolis.com.br';
$dpo_tel   = ($has_acf ? get_field('lgpd_dpo_telefone') : '') ?: '(62) 3328-0008';
$dpo_end   = ($has_acf ? get_field('lgpd_dpo_endereco') : '') ?: 'Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030';
$versao    = ($has_acf ? get_field('lgpd_versao_texto') : '') ?: 'Versão da política: 01/08/2021 — Esta política pode ser atualizada periodicamente.';

// ─── CTA ─────────────────────────────────────────────
$cta_title    = ($has_acf ? get_field('lgpd_cta_title')    : '') ?: "Dúvidas sobre\nproteção de dados?";
$cta_subtitle = ($has_acf ? get_field('lgpd_cta_subtitle') : '') ?: 'Entre em contato com nosso Encarregado de Proteção de Dados.';
$cta_btn_text = ($has_acf ? get_field('lgpd_cta_btn_text') : '') ?: 'Fale conosco';
$cta_btn_link = ($has_acf ? get_field('lgpd_cta_btn_link') : '') ?: '/fale-conosco/';

$nl2br_h = function ($s) { return nl2br(esc_html($s)); };
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo esc_html($hero_tag); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php echo $nl2br_h($hero_title); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($hero_sub); ?></p>
    </div>
</section>

<!-- Info strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <?php foreach ($strip as $i => $s):
                $delay = $i > 0 ? ' ao-d' . min($i, 4) : '';
            ?>
            <div class="ao<?php echo $delay; ?>">
                <span class="conv-social-strip__number" style="font-size:clamp(1rem,2vw,1.4rem)"><?php echo esc_html($s['num']); ?></span>
                <span class="conv-social-strip__label"><?php echo esc_html($s['lab']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Intro -->
<section class="sec">
    <div class="wrap" style="max-width:800px;text-align:center">
        <div class="sobre-texto ao"><?php echo wp_kses_post($intro); ?></div>
    </div>
</section>

<!-- Política — cards visuais OU WYSIWYG do cliente -->
<section class="sec" style="background:var(--light)">
    <div class="wrap">
        <div style="text-align:center">
            <div class="sec-tag ao"><?php echo esc_html($pol_tag); ?></div>
            <h2 class="sec-title ao ao-d1"><?php echo esc_html($pol_title); ?></h2>
            <?php if ($pol_sub): ?>
            <p class="sec-desc ao ao-d2" style="margin:0 auto"><?php echo esc_html($pol_sub); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($corpo_html): ?>
            <!-- Quando o cliente preenche o WYSIWYG no admin, o conteúdo dele substitui os cards padrão -->
            <div class="lgpd-content ao" style="max-width:900px;margin:clamp(40px,5vw,56px) auto 0">
                <?php echo wp_kses_post($corpo_html); ?>
            </div>
        <?php else: ?>
            <!-- Cards padrão (fallback) -->
            <div class="lgpd-cards">
                <div class="lgpd-card ao">
                    <div class="lgpd-card__ico" style="background:rgba(3,66,142,.07);color:var(--blue)"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg></div>
                    <h4>Dados Coletados</h4>
                    <ul>
                        <li><strong>Identificação:</strong> Nome, CPF, CNPJ, RG, razão social</li>
                        <li><strong>Contato:</strong> Endereço, telefone, e-mail, WhatsApp</li>
                        <li><strong>Navegação:</strong> Cookies, IP, dados de acesso ao site e apps</li>
                        <li><strong>Comerciais:</strong> Dados para SPC, Certificado Digital, Central de Cobranças e CDL Saúde</li>
                        <li><strong>Avaliação:</strong> Informações do app CDL Mais Você</li>
                    </ul>
                </div>

                <div class="lgpd-card ao ao-d1">
                    <div class="lgpd-card__ico" style="background:rgba(255,214,0,.1);color:#b89a00"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
                    <h4>Finalidades</h4>
                    <ul>
                        <li>Prestação de serviços (SPC, Certificado Digital, Cobranças, CDL Saúde, CDL Celular)</li>
                        <li>Gestão de filiações e relacionamento</li>
                        <li>Comunicação sobre eventos e benefícios</li>
                        <li>Operação do app CDL Mais Você</li>
                        <li>Cumprimento de obrigações legais</li>
                        <li>Melhoria dos nossos serviços</li>
                    </ul>
                </div>

                <div class="lgpd-card ao ao-d2">
                    <div class="lgpd-card__ico" style="background:rgba(0,135,67,.07);color:#008743"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg></div>
                    <h4>Compartilhamento</h4>
                    <ul>
                        <li><strong>SPC Brasil</strong> — proteção ao crédito e consultas</li>
                        <li><strong>Parceiros conveniados</strong> — CDL Saúde, Tempo &amp; Saúde e prestadores</li>
                        <li><strong>Certificadoras digitais</strong> — emissão de e-CPF e e-CNPJ</li>
                        <li><strong>FCDL e CNDL</strong> — fins institucionais</li>
                        <li><strong>Autoridades</strong> — quando exigido por lei</li>
                    </ul>
                </div>

                <div class="lgpd-card ao">
                    <div class="lgpd-card__ico" style="background:rgba(3,66,142,.07);color:var(--blue)"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                    <h4>Seus Direitos</h4>
                    <ul>
                        <li>Confirmar a existência de tratamento</li>
                        <li>Acessar seus dados pessoais</li>
                        <li>Corrigir dados incompletos ou inexatos</li>
                        <li>Solicitar anonimização ou eliminação</li>
                        <li>Portabilidade dos dados</li>
                        <li>Revogar o consentimento a qualquer momento</li>
                    </ul>
                </div>

                <div class="lgpd-card ao ao-d1">
                    <div class="lgpd-card__ico" style="background:rgba(255,214,0,.1);color:#b89a00"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg></div>
                    <h4>Segurança</h4>
                    <p>Adotamos medidas técnicas e organizacionais para proteger os dados pessoais contra acesso não autorizado, perda, alteração ou destruição, incluindo criptografia, controle de acesso e monitoramento contínuo.</p>
                </div>

                <div class="lgpd-card ao ao-d2">
                    <div class="lgpd-card__ico" style="background:rgba(0,135,67,.07);color:#008743"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                    <h4>Retenção e Cookies</h4>
                    <p>Os dados pessoais são mantidos pelo período necessário ao cumprimento das finalidades descritas. Nosso site utiliza cookies para melhorar a experiência de navegação. Você pode gerenciar as configurações de cookies no seu navegador a qualquer momento.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- DPO Contact Card -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="max-width:800px">
        <div style="text-align:center;margin-bottom:clamp(24px,3vw,32px)">
            <div class="sec-tag ao"><?php echo esc_html($dpo_title); ?></div>
            <h2 class="sec-title ao ao-d1">Entre em contato com a DPO</h2>
            <?php if ($dpo_sub): ?>
            <p class="sec-desc ao ao-d2" style="margin:0 auto"><?php echo esc_html($dpo_sub); ?></p>
            <?php endif; ?>
        </div>

        <div class="lgpd-dpo ao">
            <div class="lgpd-dpo__ico">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div>
                <h4><?php echo esc_html($dpo_nome); ?></h4>
                <?php if ($dpo_email): ?>
                <p><strong>E-mail:</strong> <a href="mailto:<?php echo esc_attr($dpo_email); ?>"><?php echo esc_html($dpo_email); ?></a></p>
                <?php endif; ?>
                <?php if ($dpo_tel): ?>
                <p><strong>Telefone:</strong> <?php echo esc_html($dpo_tel); ?></p>
                <?php endif; ?>
                <?php if ($dpo_end): ?>
                <p><strong>Endereço:</strong> <?php echo esc_html($dpo_end); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($versao): ?>
        <div style="text-align:center;margin-top:24px">
            <p class="ao" style="font-size:.78rem;color:var(--gray)"><?php echo esc_html($versao); ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao"><?php echo $nl2br_h($cta_title); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($cta_subtitle); ?></p>
    <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn btn-dark ao ao-d2">
        <?php echo esc_html($cta_btn_text); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</section>

<?php get_footer(); ?>
