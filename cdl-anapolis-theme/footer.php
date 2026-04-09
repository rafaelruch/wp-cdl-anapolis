</main>

<?php
$footer_desc = get_field('footer_description', 'option') ?: 'Uma comunidade de empreendedores fortalecendo o comércio de Anápolis há mais de 60 anos.';
$address = get_field('footer_address', 'option') ?: 'Rua Conde Afonso Celso, 43 - Centro, Anápolis - GO';
$phone = get_field('top_bar_phone', 'option') ?: '(62) 3328-0008';
$email = get_field('top_bar_email', 'option') ?: 'contato@cdlanapolis.com.br';
$whatsapp_number = get_field('whatsapp_number', 'option') ?: '5562991933275';
$instagram = get_field('social_instagram', 'option') ?: '#';
$facebook = get_field('social_facebook', 'option') ?: '#';
$linkedin = get_field('social_linkedin', 'option') ?: '#';
$youtube = get_field('social_youtube', 'option') ?: '#';
?>

<!-- Footer -->
<footer class="footer" id="contato"><div class="wrap">
    <div class="f-grid">
        <div>
            <div class="f-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo CDL_THEME_URI; ?>/assets/img/logo-branca.svg" alt="CDL Anápolis" style="height:36px;width:auto">
                </a>
            </div>
            <p class="f-desc"><?php echo esc_html($footer_desc); ?></p>
        </div>
        <div>
            <div class="f-head">Institucional</div>
            <div class="f-links">
                <a href="/sobre-nos/">Sobre Nós</a>
                <a href="/diretoria/">Diretoria</a>
                <a href="/cdl-jovem/">CDL Jovem</a>
                <a href="/cdl-mulher/">CDL Mulher</a>
                <a href="/lgpd/">LGPD</a>
            </div>
        </div>
        <div>
            <div class="f-head">Serviços</div>
            <div class="f-links">
                <a href="/certificado-digital-cdl/">Certificado Digital</a>
                <a href="/spc/">SPC</a>
                <a href="/cdl-celular/">CDL Celular</a>
                <a href="/nfe-nfce/">NF-e/NFC-e</a>
            </div>
        </div>
        <div>
            <div class="f-head">Contato</div>
            <p style="color:rgba(255,255,255,.3);font-size:.78rem;line-height:1.6;margin-bottom:8px">
                <?php echo esc_html($address); ?>
            </p>
            <div class="f-links">
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
            </div>
        </div>
    </div>
    <div class="f-social">
        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </a>
        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="Facebook">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" aria-label="Instagram">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
        </a>
        <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener" aria-label="YouTube">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
        </a>
    </div>
    <div class="f-bottom"><p>&copy; <?php echo date('Y'); ?> CDL Anápolis. Todos os direitos reservados.</p></div>
</div></footer>

<!-- WhatsApp Chat Widget -->
<div class="wpp-widget" id="wppWidget">
    <div class="wpp-popup">
        <div class="wpp-header">
            <div class="wpp-avatar"><svg viewBox="0 0 32 32"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg></div>
            <div class="wpp-header-info">
                <h6>CDL Anápolis</h6>
                <span>Normalmente responde em minutos</span>
            </div>
            <button class="wpp-close" onclick="document.getElementById('wppWidget').classList.remove('open')">&times;</button>
        </div>
        <div class="wpp-body">
            <div class="wpp-bubble">
                <p>Olá! Quer <strong>fazer parte</strong> da CDL ou tem alguma <strong>dúvida</strong>?</p>
                <p style="margin-top:6px">Clique abaixo e fale direto com nossa equipe no WhatsApp.</p>
                <div class="wpp-time">agora</div>
            </div>
        </div>
        <div class="wpp-action">
            <a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>?text=<?php echo rawurlencode('Olá! Gostaria de saber mais sobre a CDL Anápolis.'); ?>" target="_blank" rel="noopener">
                <svg viewBox="0 0 32 32"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg>
                Iniciar conversa
            </a>
        </div>
    </div>
    <button class="wpp-fab" onclick="document.getElementById('wppWidget').classList.toggle('open')" aria-label="WhatsApp">
        <svg viewBox="0 0 32 32"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg>
    </button>
</div>

<?php wp_footer(); ?>
</body>
</html>
