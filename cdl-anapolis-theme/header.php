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
            <div class="nav-drop-menu nav-drop-menu--wide">
                <div class="mega-inner">
                    <div class="mega-col-label">
                        <h4>Benefícios</h4>
                        <p>Vantagens exclusivas para quem faz parte da CDL Anápolis</p>
                    </div>
                    <div class="mega-grid">
                        <a href="/planejamento-estrategico/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div><div><h5>Planejamento Estratégico</h5><p>Diagnóstico e metas para crescer</p></div></a>
                        <a href="/assessoria-contabil/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11H5a2 2 0 00-2 2v7h18v-7a2 2 0 00-2-2h-4"/><rect x="9" y="3" width="6" height="8" rx="1"/></svg></div><div><h5>Assessoria Contábil</h5><p>Suporte fiscal e financeiro</p></div></a>
                        <a href="/cdl-assessoria-juridica/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div><div><h5>Assessoria Jurídica</h5><p>Orientação empresarial e trabalhista</p></div></a>
                        <a href="/apoio-mei/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg></div><div><h5>Apoio ao MEI</h5><p>Formalização sem burocracia</p></div></a>
                        <a href="/cdl-saude/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div><div><h5>CDL Saúde</h5><p>Descontos em consultas e exames</p></div></a>
                        <a href="/rede-de-descontos/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div><div><h5>Rede de Descontos</h5><p>Economia em parceiros locais</p></div></a>
                        <a href="/espacos-corporativos/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div><div><h5>Espaços Corporativos</h5><p>Salas equipadas para reuniões</p></div></a>
                        <a href="/eventos-corporativos/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div><div><h5>Eventos Corporativos</h5><p>Networking e palestras</p></div></a>
                        <a href="/sede-campestre/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><h5>Espaço de Lazer</h5><p>Chácara para até 120 pessoas</p></div></a>
                        <a href="/nucleos-empresariais/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div><div><h5>Núcleos Empresariais</h5><p>CDL Jovem e CDL Mulher</p></div></a>
                        <a href="/treinamentos/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><div><h5>Treinamentos</h5><p>Capacitação para sua equipe</p></div></a>
                        <a href="/midia-divulgacao/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11l18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 11-5.8-1.6"/></svg></div><div><h5>Mídia e Divulgação</h5><p>Visibilidade nos canais CDL</p></div></a>
                        <a href="/recrutamento/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg></div><div><h5>Recrutamento</h5><p>Triagem de candidatos</p></div></a>
                        <a href="/exames-admissionais/" class="mega-item"><div class="mi-ico mi-ico-green"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="15" x2="15" y2="15"/></svg></div><div><h5>Exames Admissionais</h5><p>Admissão, demissão e periódicos</p></div></a>
                        <a href="/gestao-esocial/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M8 2v4M16 2v4M3 10h18"/></svg></div><div><h5>Gestão E-social</h5><p>Envio correto sem multas</p></div></a>
                    </div>
                </div>
                <div class="mega-footer"><span>Quer acessar todos os benefícios?</span><a href="/associe-se/">Seja um associado &rarr;</a></div>
            </div>
        </div>
        <div class="nav-dropdown">
            <a href="#servicos" class="nav-drop-trigger">Serviços <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></a>
            <div class="nav-drop-menu">
                <div class="mega-inner">
                    <div class="mega-col-label">
                        <h4>Serviços</h4>
                        <p>Soluções contratáveis para o seu negócio</p>
                    </div>
                    <div class="mega-grid">
                        <a href="/cdl-celular/" class="mega-item"><div class="mi-ico mi-ico-blue"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div><div><h5>CDL Celular</h5><p>Consultas e proteção mobile</p></div></a>
                        <a href="/central-de-cobrancas/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><div><h5>Central de Cobranças</h5><p>Recuperação de crédito</p></div></a>
                        <a href="/certificado-digital-cdl/" class="mega-item"><div class="mi-ico mi-ico-gold"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg></div><div><h5>Certificado Digital</h5><p>A1 e A3 para PF e PJ</p></div></a>
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
        <a href="/associe-se/" class="btn-nav btn-nav-fill">Seja um associado</a>
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
                <a href="/planejamento-estrategico/">Planejamento Estratégico</a>
                <a href="/assessoria-contabil/">Assessoria Contábil</a>
                <a href="/cdl-assessoria-juridica/">Assessoria Jurídica</a>
                <a href="/apoio-mei/">Apoio ao MEI</a>
                <a href="/cdl-saude/">CDL Saúde</a>
                <a href="/rede-de-descontos/">Rede de Descontos</a>
                <a href="/espacos-corporativos/">Espaços Corporativos</a>
                <a href="/eventos-corporativos/">Eventos Corporativos</a>
                <a href="/sede-campestre/">Espaço de Lazer</a>
                <a href="/nucleos-empresariais/">Núcleos Empresariais</a>
                <a href="/treinamentos/">Treinamentos</a>
                <a href="/midia-divulgacao/">Mídia e Divulgação</a>
                <a href="/recrutamento/">Recrutamento</a>
                <a href="/exames-admissionais/">Exames Admissionais</a>
                <a href="/gestao-esocial/">Gestão E-social</a>
            </div>
        </div>
        <div class="mobile-section">
            <button class="mobile-accordion">Serviços <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg></button>
            <div class="mobile-sub">
                <a href="/cdl-celular/">CDL Celular</a>
                <a href="/central-de-cobrancas/">Central de Cobranças</a>
                <a href="/certificado-digital-cdl/">Certificado Digital</a>
                <a href="/nfe-nfce/">NF-e / NFC-e</a>
                <a href="/spc/">SPC Brasil</a>
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
            <a href="/associe-se/" class="btn-nav btn-nav-fill" style="width:100%;justify-content:center;text-align:center">Seja um associado</a>
        </div>
    </div>
</div>

<main id="main-content">
