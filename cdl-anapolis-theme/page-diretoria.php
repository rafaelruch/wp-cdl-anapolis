<?php
/**
 * Template Name: Diretoria
 */
get_header();

$hero_image   = get_field('diretoria_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1920&q=80';

$img_base = CDL_THEME_URI . '/assets/img/diretoria/';

$diretores = get_field('diretoria_membros');
if (!$diretores) {
    $diretores = [
        ['name' => 'Luis Miguel Mendes',       'role' => 'Presidente',                    'photo' => ['url' => $img_base . 'Luis-Miguel-Mendes.webp']],
        ['name' => 'Ian Moreira Silva',         'role' => '1º Vice-Presidente',            'photo' => ['url' => $img_base . 'Ian-Moreira-Silva.webp']],
        ['name' => 'Wilmar Carvalho',           'role' => '2º Vice-Presidente',            'photo' => ['url' => $img_base . 'Wilmar-Carvalho.webp']],
        ['name' => 'Ana Paula Perenne',         'role' => '1ª Diretora Financeira',        'photo' => ['url' => $img_base . 'Ana-Paula-Perenne.webp']],
        ['name' => 'Marcos Aurélio Rodovalho',  'role' => '2º Vice Dir. Financeiro',       'photo' => ['url' => $img_base . 'Marcos-Aurélio-Rodovalho.webp']],
        ['name' => 'Kedima Barbosa',            'role' => 'Dir. Secr. Administrativo',     'photo' => ['url' => $img_base . 'Kedima-Barbosa.webp']],
        ['name' => 'Edson Debona',              'role' => 'Dir. Desen. Neg. e Inovação',   'photo' => ['url' => $img_base . 'Edson-Debona.webp']],
        ['name' => 'Allan Peixoto',             'role' => 'Dir. Eventos e Promoções',      'photo' => ['url' => $img_base . 'Allan-Peixoto.webp']],
        ['name' => 'Enival Ferreira de Souza',  'role' => 'Dir. Infraestrutura',           'photo' => ['url' => $img_base . 'Enival-Ferreira-de-Souza.webp']],
        ['name' => 'Louise Ramiro da Costa',    'role' => 'Dir. Jur. e Rel. Institucionais','photo' => ['url' => $img_base . 'Louise-Costa.webp']],
        ['name' => 'Christian Kleber Lisboa',   'role' => 'Dir. Capacitação Empresarial',  'photo' => ['url' => $img_base . 'Christian-Kleber-Lisboa.webp']],
        ['name' => 'Jaime Neto Alves Matos',   'role' => 'Dir. SPC',                      'photo' => ['url' => $img_base . 'Jaime-Matos.webp']],
        ['name' => 'Maurício de Oliveira',      'role' => 'Dir. Suplente',                 'photo' => ['url' => $img_base . 'Maurício-Oliveira.webp']],
    ];
}

$conselho = [
    ['nome' => 'João Soares da Silva',     'foto' => $img_base . 'João-Silva.webp'],
    ['nome' => 'Munir Caixe',              'foto' => $img_base . 'Munir-Caixe.webp'],
    ['nome' => 'Geraldo Pereira Braga',    'foto' => $img_base . 'Geraldo-Pereira-Braga.webp'],
    ['nome' => 'Air Vasconcelos Ganzarolli','foto' => $img_base . 'Air-Ganzaroli-F.webp'],
];
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Gestão atual</div>
        <h1 class="page-hero__title ao ao-d1">Diretoria<br>CDL Anápolis</h1>
        <p class="page-hero__sub ao ao-d2">Liderança voluntária em prol do comércio e da comunidade.</p>
    </div>
</section>

<!-- Intro -->
<section class="sec" style="text-align:center">
    <div class="wrap" style="max-width:800px">
        <div class="sobre-texto ao">
            <p>A equipe de liderança da CDL Anápolis é composta por empresários que dedicam seu tempo, experiência e dedicação para fortalecer o comércio local. São líderes que trabalham voluntariamente, acreditando no poder da comunidade e na força de uma cidade que cresce com união e compromisso.</p>
        </div>
    </div>
</section>

<!-- People Scroll -->
<section class="people-scroll" style="background:var(--light)">
    <div class="wrap" style="text-align:center;padding-bottom:40px">
        <div class="sec-tag ao">Nossa equipe</div>
        <h2 class="sec-title ao ao-d1">Conheça a diretoria</h2>
    </div>

    <!-- Grid: List + Sticky Photo -->
    <div class="people-scroll__grid wrap">
        <!-- People list -->
        <div class="people-scroll__list">
            <?php foreach ($diretores as $i => $d): ?>
            <div class="people-scroll__item<?php echo $i === 0 ? ' active' : ''; ?>" data-index="<?php echo $i; ?>">
                <span class="people-scroll__name"><?php echo esc_html($d['name']); ?></span>
                <span class="people-scroll__role">
                    <span class="people-scroll__plus">+</span>
                    <?php echo esc_html($d['role']); ?>
                </span>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Photo container (sticky) -->
        <div class="people-scroll__photo">
            <?php foreach ($diretores as $i => $d):
                $has_photo = !empty($d['photo']) && is_array($d['photo']) && !empty($d['photo']['url']);
            ?>
                <?php if ($has_photo): ?>
                    <img src="<?php echo esc_url($d['photo']['url']); ?>" alt="<?php echo esc_attr($d['name']); ?>"<?php echo $i === 0 ? ' class="active" fetchpriority="high"' : ' loading="lazy" decoding="async"'; ?>>
                <?php else: ?>
                    <div class="people-scroll__photo-placeholder<?php echo $i === 0 ? ' active' : ''; ?>">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Conselho Fiscal -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Fiscalização</div>
        <h2 class="sec-title ao ao-d1">Conselho Fiscal</h2>
        <div class="sobre-mvv" style="margin-top:clamp(32px,4vw,48px);grid-template-columns:repeat(4,1fr)">
            <?php foreach ($conselho as $i => $c): ?>
            <div class="sobre-mvv__card ao ao-d<?php echo $i % 4; ?>">
                <div style="width:80px;height:80px;border-radius:50%;overflow:hidden;margin:0 auto 16px">
                    <img src="<?php echo esc_url($c['foto']); ?>" alt="<?php echo esc_attr($c['nome']); ?>" style="width:100%;height:100%;object-fit:cover" loading="lazy" decoding="async">
                </div>
                <h3 style="font-size:.88rem"><?php echo esc_html($c['nome']); ?></h3>
                <p>Conselheiro Fiscal</p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-gold">
    <h2 class="ao">Venha para a<br>CDL Anápolis</h2>
    <p class="ao ao-d1">Junte-se a milhares de empreendedores que já fazem parte</p>
    <a href="/associe-se/" class="btn btn-dark ao ao-d2">Quero fazer parte <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
