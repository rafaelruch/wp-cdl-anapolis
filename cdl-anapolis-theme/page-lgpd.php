<?php
/**
 * Template Name: LGPD
 */
get_header();

$hero_image   = get_field('lgpd_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1920&q=80';
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Institucional</div>
        <h1 class="page-hero__title ao ao-d1">Política de Privacidade<br>e LGPD</h1>
        <p class="page-hero__sub ao ao-d2">Transparência e proteção de dados pessoais em conformidade com a Lei Geral de Proteção de Dados.</p>
    </div>
</section>

<!-- Info strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <div class="ao"><span class="conv-social-strip__number" style="font-size:clamp(1rem,2vw,1.4rem)">CDL Anápolis</span><span class="conv-social-strip__label">CNPJ 01.064.674/0001-12</span></div>
            <div class="ao ao-d1"><span class="conv-social-strip__number" style="font-size:clamp(1rem,2vw,1.4rem)">Lei nº 13.709/2018</span><span class="conv-social-strip__label">LGPD — Lei Geral de Proteção de Dados</span></div>
            <div class="ao ao-d2"><span class="conv-social-strip__number" style="font-size:clamp(1rem,2vw,1.4rem)">Dra. Louise Ramiro</span><span class="conv-social-strip__label">Encarregada de Proteção de Dados (DPO)</span></div>
        </div>
    </div>
</section>

<!-- Intro -->
<section class="sec">
    <div class="wrap" style="max-width:800px;text-align:center">
        <div class="sobre-texto ao">
            <p>A CDL Anápolis (Câmara de Dirigentes Lojistas de Anápolis), com sede na Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030, está comprometida com a proteção dos dados pessoais dos seus membros, parceiros, colaboradores e visitantes, em conformidade com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018 — LGPD).</p>
        </div>
    </div>
</section>

<!-- LGPD Cards — Visual sections -->
<section class="sec" style="background:var(--light)">
    <div class="wrap">
        <div style="text-align:center">
            <div class="sec-tag ao">Política de Privacidade</div>
            <h2 class="sec-title ao ao-d1">Como tratamos seus dados</h2>
            <p class="sec-desc ao ao-d2" style="margin:0 auto">Conheça cada aspecto da nossa política de proteção de dados pessoais.</p>
        </div>

        <div class="lgpd-cards">
            <!-- Dados Coletados -->
            <div class="lgpd-card ao">
                <div class="lgpd-card__ico" style="background:rgba(3,66,142,.07);color:var(--blue)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                </div>
                <h4>Dados Coletados</h4>
                <ul>
                    <li><strong>Identificação:</strong> Nome, CPF, CNPJ, RG, razão social</li>
                    <li><strong>Contato:</strong> Endereço, telefone, e-mail, WhatsApp</li>
                    <li><strong>Navegação:</strong> Cookies, IP, dados de acesso ao site e apps</li>
                    <li><strong>Comerciais:</strong> Dados para SPC, Certificado Digital, Central de Cobranças e CDL Saúde</li>
                    <li><strong>Avaliação:</strong> Informações do app CDL Mais Você</li>
                </ul>
            </div>

            <!-- Finalidades -->
            <div class="lgpd-card ao ao-d1">
                <div class="lgpd-card__ico" style="background:rgba(255,214,0,.1);color:#b89a00">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                </div>
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

            <!-- Compartilhamento -->
            <div class="lgpd-card ao ao-d2">
                <div class="lgpd-card__ico" style="background:rgba(0,135,67,.07);color:#008743">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                </div>
                <h4>Compartilhamento</h4>
                <ul>
                    <li><strong>SPC Brasil</strong> — proteção ao crédito e consultas</li>
                    <li><strong>Parceiros conveniados</strong> — CDL Saúde, Tempo &amp; Saúde e prestadores</li>
                    <li><strong>Certificadoras digitais</strong> — emissão de e-CPF e e-CNPJ</li>
                    <li><strong>FCDL e CNDL</strong> — fins institucionais</li>
                    <li><strong>Autoridades</strong> — quando exigido por lei</li>
                </ul>
            </div>

            <!-- Seus Direitos -->
            <div class="lgpd-card ao">
                <div class="lgpd-card__ico" style="background:rgba(3,66,142,.07);color:var(--blue)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
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

            <!-- Segurança -->
            <div class="lgpd-card ao ao-d1">
                <div class="lgpd-card__ico" style="background:rgba(255,214,0,.1);color:#b89a00">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                </div>
                <h4>Segurança</h4>
                <p>Adotamos medidas técnicas e organizacionais para proteger os dados pessoais contra acesso não autorizado, perda, alteração ou destruição, incluindo criptografia, controle de acesso e monitoramento contínuo.</p>
            </div>

            <!-- Retenção e Cookies -->
            <div class="lgpd-card ao ao-d2">
                <div class="lgpd-card__ico" style="background:rgba(0,135,67,.07);color:#008743">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <h4>Retenção e Cookies</h4>
                <p>Os dados pessoais são mantidos pelo período necessário ao cumprimento das finalidades descritas. Nosso site utiliza cookies para melhorar a experiência de navegação. Você pode gerenciar as configurações de cookies no seu navegador a qualquer momento.</p>
            </div>
        </div>
    </div>
</section>

<!-- Base Legal -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Base Legal</div>
        <h2 class="sec-title ao ao-d1">Fundamentos jurídicos do tratamento</h2>
        <p class="sec-desc ao ao-d2" style="margin:0 auto">O tratamento dos dados pessoais é realizado com base nas hipóteses legais previstas na LGPD.</p>

        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <h3>Consentimento</h3>
                <p>Consentimento do titular e execução de contrato ou diligências pré-contratuais.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <h3>Obrigação Legal</h3>
                <p>Cumprimento de obrigação legal ou regulatória e exercício regular de direitos em processos judiciais ou administrativos.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Legítimo Interesse</h3>
                <p>Proteção ao crédito e legítimo interesse da CDL Anápolis para melhoria contínua dos serviços.</p>
            </div>
        </div>
    </div>
</section>

<!-- DPO Contact Card -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="max-width:800px">
        <div style="text-align:center;margin-bottom:clamp(24px,3vw,32px)">
            <div class="sec-tag ao">Encarregada de Dados</div>
            <h2 class="sec-title ao ao-d1">Entre em contato com a DPO</h2>
            <p class="sec-desc ao ao-d2" style="margin:0 auto">Para exercer seus direitos ou esclarecer dúvidas sobre o tratamento de dados pessoais.</p>
        </div>

        <div class="lgpd-dpo ao">
            <div class="lgpd-dpo__ico">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div>
                <h4>Advogada Dra. Louise Ramiro da Costa</h4>
                <p><strong>E-mail:</strong> <a href="mailto:lgpd@cdlanapolis.com.br">lgpd@cdlanapolis.com.br</a></p>
                <p><strong>Telefone:</strong> (62) 3328-0008</p>
                <p><strong>Endereço:</strong> Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030</p>
            </div>
        </div>

        <div style="text-align:center;margin-top:24px">
            <p class="ao" style="font-size:.78rem;color:var(--gray)">Versão da política: 01/08/2021 — Esta política pode ser atualizada periodicamente.</p>
        </div>
    </div>
</section>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao">Dúvidas sobre<br>proteção de dados?</h2>
    <p class="ao ao-d1">Entre em contato com nosso Encarregado de Proteção de Dados.</p>
    <a href="/fale-conosco/" class="btn btn-dark ao ao-d2">Fale conosco <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
