<?php
/**
 * Quick Access - Dark Band with Icon Cards
 */
$items = get_field('quick_access', 'option');

if (!$items) {
    $items = [
        ['title' => '2ª Via Boletos',     'external_url' => '#', 'icon' => 'file'],
        ['title' => 'CDL Celular',        'external_url' => 'https://cdlcelular.com.br/home/', 'icon' => 'phone'],
        ['title' => 'Certificado Digital', 'external_url' => 'https://www.certificadocdlanapolis.com.br/', 'icon' => 'lock'],
        ['title' => 'SPC Brasil',          'external_url' => 'https://sistema.spc.org.br/', 'icon' => 'shield'],
    ];
}

$svg_map = [
    'file'   => '<path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/>',
    'phone'  => '<rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>',
    'lock'   => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>',
    'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
];
$delays = ['', ' ao-d1', ' ao-d2', ' ao-d3'];
?>

<section class="dark-band">
    <div class="wrap">
        <div class="qa-title">Acesso Rápido</div>
        <div class="qa-grid">
            <?php foreach ($items as $i => $item):
                $icon_key = $item['icon'] ?? array_keys($svg_map)[$i % 4];
                $svg = $svg_map[$icon_key] ?? $svg_map['file'];
            ?>
            <a href="<?php echo esc_url($item['external_url']); ?>" target="_blank" rel="noopener" class="qa-card ao<?php echo $delays[$i % 4]; ?>">
                <div class="qa-ico">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?php echo $svg; ?></svg>
                </div>
                <span><?php echo esc_html($item['title']); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
