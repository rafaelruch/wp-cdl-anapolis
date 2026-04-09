<?php
/**
 * Template Name: Presidentes
 */
get_header();

$hero_image   = get_field('presidentes_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1920&q=80';

$presidentes = get_field('presidentes_lista');
if (!$presidentes) {
    $presidentes = [
        ['name' => 'Dennison Batista',              'period' => '1962 – 1963', 'photo' => ''],
        ['name' => 'Wagner Silva',                   'period' => '1963',        'photo' => ''],
        ['name' => 'Nelson de Abreu',                'period' => '1963 – 1974', 'photo' => ''],
        ['name' => 'Inácio Godinho',                 'period' => '1974 – 1977', 'photo' => ''],
        ['name' => 'Décio Porto',                    'period' => '1977 – 1981', 'photo' => ''],
        ['name' => 'Zamir Menezes',                  'period' => 'Interino – Jul/1981', 'photo' => ''],
        ['name' => 'Rui Bueno Gomes',                'period' => '1981 – 1985', 'photo' => ''],
        ['name' => 'Wilmar Jardim de Carvalho',      'period' => '1985 – 1987', 'photo' => ''],
        ['name' => 'Iraci Custódio Ribeiro',         'period' => '1987 – 1989', 'photo' => ''],
        ['name' => 'José Roberto Santos',            'period' => '1989 – 1992', 'photo' => ''],
        ['name' => 'Air Ganzarolli',                 'period' => '1992 – 1994', 'photo' => ''],
        ['name' => 'Élsio Alves Pereira',            'period' => '1994 – 1996', 'photo' => ''],
        ['name' => 'Roberto Naves de Assunção',      'period' => '1996 – 1998', 'photo' => ''],
        ['name' => 'Élsio Alves Pereira',            'period' => '1998 – 1999', 'photo' => ''],
        ['name' => 'Sultan Falluh',                  'period' => '2000 – 2002', 'photo' => ''],
        ['name' => 'Air Ganzarolli',                 'period' => '2003 – 2004', 'photo' => ''],
        ['name' => 'João Itagiba Nunes Junior',      'period' => '2004',        'photo' => ''],
        ['name' => 'Wilmar Jardim de Carvalho',      'period' => '2005 – 2010', 'photo' => ''],
        ['name' => 'Reinaldo de Castro Del Fiaco',   'period' => '2011 – 2014', 'photo' => ''],
        ['name' => 'Wilmar Jardim de Carvalho',      'period' => '2015 – 2025', 'photo' => ''],
    ];
}
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Institucional</div>
        <h1 class="page-hero__title ao ao-d1">Presidentes<br>CDL Anápolis</h1>
        <p class="page-hero__sub ao ao-d2">Os líderes que construíram a história da CDL Anápolis ao longo de mais de 60 anos.</p>
    </div>
</section>

<!-- People Scroll -->
<section class="people-scroll" style="background:var(--light)">
    <div class="wrap" style="text-align:center;padding-bottom:40px">
        <div class="sec-tag ao">Desde 1962</div>
        <h2 class="sec-title ao ao-d1">Galeria de Presidentes</h2>
    </div>

    <div class="people-scroll__grid wrap">
        <div class="people-scroll__list">
            <?php foreach ($presidentes as $i => $p): ?>
            <div class="people-scroll__item<?php echo $i === 0 ? ' active' : ''; ?>" data-index="<?php echo $i; ?>">
                <span class="people-scroll__name"><?php echo esc_html($p['name']); ?></span>
                <span class="people-scroll__role"><span class="people-scroll__plus">+</span><?php echo esc_html($p['period']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="people-scroll__photo">
            <?php foreach ($presidentes as $i => $p):
                $has_photo = !empty($p['photo']) && is_array($p['photo']) && !empty($p['photo']['url']);
            ?>
                <?php if ($has_photo): ?>
                    <img src="<?php echo esc_url($p['photo']['url']); ?>" alt="<?php echo esc_attr($p['name']); ?>"<?php echo $i === 0 ? ' class="active"' : ''; ?>>
                <?php else: ?>
                    <div class="people-scroll__photo-placeholder<?php echo $i === 0 ? ' active' : ''; ?>">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                <?php endif; ?>
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
