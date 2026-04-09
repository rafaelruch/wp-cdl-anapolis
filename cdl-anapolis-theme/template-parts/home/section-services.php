<?php
/**
 * Services Grid Section
 */
$tag      = get_field('services_tag', 'option') ?: 'O que oferecemos';
$title    = get_field('services_title', 'option') ?: 'Serviços';
$subtitle = get_field('services_subtitle', 'option') ?: 'Soluções completas para o seu negócio crescer com segurança.';
$services = get_field('services', 'option');

if (!$services) {
    $services = [
        ['icon' => null, 'title' => 'CDL Agência',          'description' => 'Comunicação visual e marketing digital.'],
        ['icon' => null, 'title' => 'CDL Celular',           'description' => 'Consultas e proteção para celulares.'],
        ['icon' => null, 'title' => 'Certificado Digital',    'description' => 'Certificados A1 e A3 para PF e PJ.'],
        ['icon' => null, 'title' => 'Central de Cobranças',   'description' => 'Recuperação de crédito profissional.'],
        ['icon' => null, 'title' => 'NF-e / NFC-e',          'description' => 'Emissão de notas fiscais eletrônicas.'],
        ['icon' => null, 'title' => 'SPC Brasil',             'description' => 'Consultas e proteção ao crédito.'],
        ['icon' => null, 'title' => 'Tempo &amp; Saúde',     'description' => 'Saúde ocupacional e segurança do trabalho.'],
    ];
}

$svg_icons = [
    '<rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>',
    '<rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>',
    '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>',
    '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>',
    '<path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/>',
    '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
    '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
];

$delays = ['', ' ao-d1', ' ao-d2', '', ' ao-d1', ' ao-d2', ''];
?>

<section class="sec" id="servicos">
    <div class="wrap">
        <div class="sec-tag ao"><?php echo esc_html($tag); ?></div>
        <h2 class="sec-title ao"><?php echo esc_html($title); ?></h2>
        <p class="sec-desc ao"><?php echo esc_html($subtitle); ?></p>
        <div class="svc-grid">
            <?php foreach ($services as $i => $service): ?>
            <div class="svc ao<?php echo $delays[$i % 7]; ?>">
                <div class="ico">
                    <?php if (!empty($service['icon'])): ?>
                        <img src="<?php echo esc_url($service['icon']['url']); ?>" alt="" width="18" height="18" loading="lazy">
                    <?php else: ?>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?php echo $svg_icons[$i % 7]; ?></svg>
                    <?php endif; ?>
                </div>
                <div>
                    <h4><?php echo esc_html($service['title']); ?></h4>
                    <p><?php echo esc_html($service['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
