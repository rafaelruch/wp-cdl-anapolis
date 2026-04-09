<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link sr-only" href="#main-content">Pular para o conteudo</a>

<!-- Nav -->
<nav class="nav" id="nav"><div class="wrap">
    <a href="<?php echo home_url(); ?>" class="nav-logo">
        <img src="<?php echo CDL_THEME_URI; ?>/assets/img/logo-branca.svg" alt="CDL Anapolis" class="nav-logo-img nav-logo-white">
        <img src="<?php echo CDL_THEME_URI; ?>/assets/img/logo.svg" alt="CDL Anapolis" class="nav-logo-img nav-logo-color">
    </a>
    <div class="nav-links">
        <a href="<?php echo home_url(); ?>">Início</a>
        <div class="nav-dropdown">
            <a href="#" class="nav-drop-trigger">A CDL <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></a>
            <div class="nav-drop-menu">
                <div class="mega-inner">
                    <div class="mega-col-label">
                        <h4>Institucional</h4>
                        <p>Conheça a história e a estrutura da CDL Anápolis</p>
                    </div>
                    <div class="mega-grid">
                        <a href="/sobre-nos/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg></div><div><h5>Sobre Nós</h5><p>Nossa história e missão</p></div></a>
                        <a href="/diretoria/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div><div><h5>Diretoria</h5><p>Gestão e liderança</p></div></a>
                        <a href="/presidentes/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div><div><h5>Presidentes</h5><p>Galeria de presidentes</p></div></a>
                        <a href="/cdl-jovem/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div><div><h5>CDL Jovem</h5><p>Programa jovens líderes</p></div></a>
                        <a href="/cdl-mulher/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div><div><h5>CDL Mulher</h5><p>Empreendedorismo feminino</p></div></a>
                        <a href="/merito-empresarial/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><div><h5>Mérito Empresarial</h5><p>Premiação anual</p></div></a>
                        <a href="/lgpd/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div><h5>LGPD</h5><p>Política de privacidade</p></div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-dropdown">
            <a href="#beneficios" class="nav-drop-trigger">Benefícios <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></a>
            <div class="nav-drop-menu">
                <div class="mega-inner">
                    <div class="mega-col-label">
                        <h4>Benefícios</h4>
                        <p>Vantagens exclusivas para quem faz parte</p>
                    </div>
                    <div class="mega-grid">
                        <a href="/cdl-assessoria-juridica/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div><div><h5>Assessoria Jurídica</h5><p>Orientação empresarial e trabalhista</p></div></a>
                        <a href="/cdl-mais-voce/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div><div><h5>CDL Mais Você</h5><p>Descontos e vantagens para membros</p></div></a>
                        <a href="/cdl-saude/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div><div><h5>CDL Saúde</h5><p>Planos com condições especiais</p></div></a>
                        <a href="/sede-campestre/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><h5>Sede Campestre</h5><p>Lazer para membros e família</p></div></a>
                    </div>
                </div>
                <div class="mega-footer"><span>Quer todos os benefícios?</span><a href="/associe-se/">Faça parte agora &rarr;</a></div>
            </div>
        </div>
        <div class="nav-dropdown">
            <a href="#servicos" class="nav-drop-trigger">Serviços <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></a>
            <div class="nav-drop-menu">
                <div class="mega-inner">
                    <div class="mega-col-label">
                        <h4>Serviços</h4>
                        <p>Soluções completas para o seu negócio</p>
                    </div>
                    <div class="mega-grid">
                        <a href="/cdl-agencia/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div><div><h5>CDL Agência</h5><p>Marketing e comunicação visual</p></div></a>
                        <a href="/cdl-celular/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div><div><h5>CDL Celular</h5><p>Consultas e proteção mobile</p></div></a>
                        <a href="/certificado-digital-cdl/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg></div><div><h5>Certificado Digital</h5><p>A1 e A3 para PF e PJ</p></div></a>
                        <a href="/central-de-cobrancas/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><div><h5>Central de Cobranças</h5><p>Recuperação de crédito</p></div></a>
                        <a href="/nfe-nfce/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div><div><h5>NF-e / NFC-e</h5><p>Notas fiscais eletrônicas</p></div></a>
                        <a href="/spc/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div><h5>SPC Brasil</h5><p>Proteção ao crédito</p></div></a>
                        <a href="/tempo-saude/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><h5>Tempo &amp; Saúde</h5><p>Saúde ocupacional</p></div></a>
                    </div>
                </div>
                <div class="mega-footer"><span>Precisa de ajuda para escolher?</span><a href="/fale-conosco/">Fale conosco &rarr;</a></div>
            </div>
        </div>
        <a href="/quem-faz-parte/">Quem Faz Parte</a>
        <a href="/informativo/">Informativos</a>
        <a href="/fale-conosco/">Fale Conosco</a>
    </div>
    <div class="nav-actions">
        <a href="/associe-se/" class="btn-nav btn-nav-fill">Quero fazer parte</a>
    </div>
    <button class="nav-hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
</div></nav>

<!-- Mobile menu overlay -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-inner">
        <div class="mobile-section">
            <a href="<?php echo home_url(); ?>" class="mobile-link">Início</a>
        </div>
        <div class="mobile-section">
            <button class="mobile-accordion">A CDL <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></button>
            <div class="mobile-sub">
                <a href="/sobre-nos/">Sobre Nós</a>
                <a href="/presidentes/">Presidentes</a>
                <a href="/diretoria/">Diretoria</a>
                <a href="/cdl-jovem/">CDL Jovem</a>
                <a href="/cdl-mulher/">CDL Mulher</a>
                <a href="/merito-empresarial/">Mérito Empresarial</a>
                <a href="/lgpd/">LGPD</a>
            </div>
        </div>
        <div class="mobile-section">
            <button class="mobile-accordion">Benefícios <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></button>
            <div class="mobile-sub">
                <a href="/cdl-assessoria-juridica/">Assessoria Jurídica</a>
                <a href="/cdl-mais-voce/">CDL Mais Você</a>
                <a href="/cdl-saude/">CDL Saúde</a>
                <a href="/sede-campestre/">Sede Campestre</a>
            </div>
        </div>
        <div class="mobile-section">
            <button class="mobile-accordion">Serviços <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></button>
            <div class="mobile-sub">
                <a href="/cdl-agencia/">CDL Agência</a>
                <a href="/cdl-celular/">CDL Celular</a>
                <a href="/certificado-digital-cdl/">Certificado Digital</a>
                <a href="/central-de-cobrancas/">Central de Cobranças</a>
                <a href="/nfe-nfce/">NF-e/NFC-e</a>
                <a href="/spc/">SPC</a>
                <a href="/tempo-saude/">Tempo &amp; Saúde</a>
            </div>
        </div>
        <div class="mobile-section">
            <a href="/quem-faz-parte/" class="mobile-link">Quem Faz Parte</a>
        </div>
        <div class="mobile-section">
            <a href="/informativo/" class="mobile-link">Informativos</a>
        </div>
        <div class="mobile-section">
            <a href="/fale-conosco/" class="mobile-link">Fale Conosco</a>
        </div>
        <div class="mobile-section" style="margin-top:20px">
            <a href="/associe-se/" class="btn-nav btn-nav-fill" style="width:100%;justify-content:center;text-align:center">Quero fazer parte</a>
        </div>
    </div>
</div>

<main id="main-content">
