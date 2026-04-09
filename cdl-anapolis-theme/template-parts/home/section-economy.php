<?php
/**
 * Economia Local em Números
 */
$iframe_url = get_field('impostometro_iframe_url', 'option');
$gasto_url  = get_field('gastobrasil_url', 'option') ?: 'https://gastobrasil.com.br/municipios';
?>

<section class="sec" style="text-align:center;background:var(--light)">
    <div class="wrap">
        <div class="sec-tag ao">Anápolis - GO</div>
        <h2 class="sec-title ao">Economia Local<br>em Números</h2>
        <div class="eco-grid">
            <div class="eco-card ao">
                <h4>Impostômetro</h4>
                <?php if ($iframe_url): ?>
                    <div style="margin:12px 0">
                        <iframe src="<?php echo esc_url($iframe_url); ?>" width="100%" height="120" scrolling="no" frameborder="0" title="Impostômetro" loading="lazy"></iframe>
                    </div>
                <?php else: ?>
                    <p>Acompanhe quanto os brasileiros já pagaram em impostos neste ano.</p>
                <?php endif; ?>
                <a href="https://impostometro.com.br" target="_blank" rel="noopener" class="link">Acessar &rarr;</a>
            </div>
            <div class="eco-card ao ao-d1">
                <h4>Gastos do Município</h4>
                <p>Dados sobre despesas públicas de Anápolis-GO.</p>
                <a href="<?php echo esc_url($gasto_url); ?>" target="_blank" rel="noopener" class="link">Ver painel &rarr;</a>
            </div>
        </div>
    </div>
</section>
