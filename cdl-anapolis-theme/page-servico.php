<?php
/**
 * Template Name: Serviço
 */
get_header();

$slug = get_post_field('post_name', get_the_ID());
// Normalize slug alias
if ($slug === 'certificado-digital-cdl') $slug = 'certificado-digital';

// ─── SVG icon library for varied icons per slug ───
$icon_sets = [
    'cdl-celular' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
    ],
    'certificado-digital' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
    ],
    'central-de-cobrancas' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><path d="M20 8v6M23 11h-6"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
    ],
    'nfe-nfce' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>',
    ],
    'spc' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><path d="M20 8v6M23 11h-6"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    ],
    'tempo-saude' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    ],
];

// Fallback data per slug
$fallbacks = [
    'cdl-celular' => [
        'tag'      => 'Serviço',
        'subtitle' => 'Conecte-se ao Melhor em Telefonia — planos exclusivos para empreendedores.',
        'intro'    => '<p>Com o CDL Celular, tenha um serviço de telefonia pensado para empresários e lojistas. Oferecemos planos com tarifas acessíveis e condições exclusivas para associados da CDL Anápolis, para que você mantenha sua equipe e seus clientes sempre conectados.</p><p>Juntos somamos valores! Devido ao volume de associados (50.000 usuários em todo o Brasil) conseguimos os menores valores para sua empresa, com conciliação financeira simplificada e atendimento personalizado.</p>',
        'split_img' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&q=80',
        'split_highlights' => [
            'Menor custo do Brasil — 50.000 usuários somando valores',
            'Planos especiais junto às maiores operadoras',
            'Conciliação financeira — várias operadoras em um contrato',
            'Atendimento personalizado com profissionais qualificados',
        ],
        'features' => [
            ['title' => 'Menor Custo', 'description' => 'Planos de telefonia com os menores custos do mercado, negociados especialmente para empreendedores.'],
            ['title' => 'Planos Especiais', 'description' => 'Condições exclusivas e planos personalizados para atender as necessidades do seu negócio.'],
            ['title' => '50.000+ Usuários', 'description' => 'Mais de 50 mil usuários em todo o Brasil já confiam no CDL Celular para sua telefonia.'],
            ['title' => 'Conciliação Financeira', 'description' => 'Sua empresa pode ter várias operadoras em um mesmo contrato e demonstrativo financeiro.'],
            ['title' => 'Atendimento Personalizado', 'description' => 'Equipe dedicada para atender suas demandas com agilidade e atenção especial.'],
            ['title' => 'Cobertura Nacional', 'description' => 'Planos com cobertura em todo o território nacional pelas melhores operadoras do país.'],
        ],
        'has_pricing' => false,
        'faqs' => [
            ['q' => 'Quais são os benefícios exclusivos do CDL Celular?', 'a' => 'O CDL Celular oferece tarifas reduzidas, planos personalizados, cobertura nacional e suporte exclusivo para associados.'],
            ['q' => 'Como faço para aderir ao CDL Celular?', 'a' => 'Basta entrar em contato com a CDL Anápolis e informar seu interesse. Nossa equipe irá auxiliar na escolha do melhor plano para o seu negócio.'],
            ['q' => 'Posso alterar o plano depois de contratá-lo?', 'a' => 'Sim, os planos do CDL Celular são flexíveis, permitindo ajustes conforme a necessidade do seu negócio.'],
            ['q' => 'Como é feito o pagamento?', 'a' => 'Os pagamentos são realizados de forma prática e direta, no boleto bancário de sua mensalidade CDL.'],
        ],
        'cta_title' => 'Quer economizar na telefonia<br>do seu negócio?',
        'cta_text' => 'Fale com nossa equipe e conheça os planos CDL Celular.',
        'cta_link' => '/fale-conosco/',
        'external_url' => '',
        'hero_img' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=1920&q=80',
    ],
    'certificado-digital' => [
        'tag'      => 'Serviço',
        'subtitle' => 'Seu certificado é com a CDL Anápolis — e-CPF e e-CNPJ com condições especiais.',
        'intro'    => '<p>O certificado certo para quem busca segurança e agilidade. A CDL Anápolis oferece emissão de certificado digital com segurança, praticidade e atendimento humanizado. Garante validade jurídica para documentos eletrônicos com soluções para pessoas físicas e empresas.</p><p>Emitimos certificados dos tipos e-CPF e e-CNPJ, nos formatos A1 (arquivo digital) e A3 (cartão ou token). Quem faz parte da CDL tem condições especiais e agendamento facilitado.</p>',
        'split_img' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&q=80',
        'split_highlights' => [
            'e-CPF e e-CNPJ nos formatos A1 e A3',
            'Agendamento fácil e rápido, sem filas',
            'Validade jurídica garantida para seus documentos',
            'Condições especiais para associados CDL Anápolis',
        ],
        'features' => [
            ['title' => 'e-CPF (Pessoa Física)', 'description' => 'Para declaração de imposto de renda, acesso ao e-CAC, assinatura de documentos e procurações eletrônicas.'],
            ['title' => 'e-CNPJ (Pessoa Jurídica)', 'description' => 'Para emissão de notas fiscais, acesso a sistemas da Receita Federal, FGTS Digital e mais.'],
            ['title' => 'Certificado A1', 'description' => 'Certificado digital em arquivo, instalado no computador, com validade de 1 ano. Prático e ágil.'],
            ['title' => 'Certificado A3', 'description' => 'Certificado em cartão ou token USB, com validade de até 3 anos. Mais segurança e mobilidade.'],
            ['title' => 'Agendamento Fácil', 'description' => 'Agende sua emissão presencial na sede da CDL Anápolis com atendimento rápido e sem burocracia.'],
            ['title' => 'Condições Especiais CDL', 'description' => 'Quem faz parte da CDL Anápolis tem condições diferenciadas e atendimento prioritário na emissão.'],
        ],
        'has_pricing' => false,
        'faqs' => [
            ['q' => 'O que é Certificado Digital?', 'a' => 'Serve como identidade eletrônica de pessoas físicas e empresas, permitindo assinatura de documentos, emissão de notas fiscais, acesso a portais do governo e processos com validade jurídica.'],
            ['q' => 'Quais tipos são oferecidos?', 'a' => 'Soluções para pessoas físicas (e-CPF) e empresas (e-CNPJ), com opções A1 (arquivo digital, 1 ano) e A3 (cartão ou token, até 3 anos).'],
            ['q' => 'É necessário agendar?', 'a' => 'Sim, o agendamento garante seu horário e evita filas de espera, podendo ser feito pelo site, WhatsApp ou telefone.'],
            ['q' => 'Quais documentos são necessários?', 'a' => 'Para pessoas físicas: documento com foto e CPF. Para empresas: contrato social, cartão CNPJ e documentos do representante legal.'],
        ],
        'cta_title' => 'Pronto para emitir<br>seu Certificado Digital?',
        'cta_text' => 'Solicite agora pelo WhatsApp — nossa equipe agenda sua emissão rapidinho.',
        'cta_link' => '/fale-conosco/',
        'cta_whatsapp_message' => 'Olá! Gostaria de contratar o Certificado Digital com a CDL Anápolis. Pode me passar as condições e como funciona o agendamento?',
        'external_url' => '',
        'hero_img' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1920&q=80',
    ],
    'central-de-cobrancas' => [
        'tag'      => 'Serviço',
        'subtitle' => 'Recupere dívidas com segurança — assessoria especializada com abordagem ética e humanizada.',
        'intro'    => '<p>A Central de Cobranças da CDL Anápolis oferece assessoria especializada para recuperação de crédito e negociação de dívidas. Com técnicas eficazes e abordagem ética, atuamos como ponte entre sua empresa e o cliente inadimplente.</p><p>Recupere seu crédito com ética, agilidade e eficiência. Nossa equipe qualificada realiza cobranças enquanto você foca no seu negócio, com relatórios e atualizações periódicas com transparência total.</p>',
        'split_img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&q=80',
        'split_highlights' => [
            'Cobrança humanizada que preserva o relacionamento comercial',
            'Equipe especializada em recuperação de crédito',
            'Atuação preventiva e corretiva com relatórios detalhados',
            'Respaldo e credibilidade da marca CDL Anápolis',
        ],
        'features' => [
            ['title' => 'Ação Profissional com Empatia', 'description' => 'Abordagem humanizada que mantém bom relacionamento com o cliente durante a cobrança.'],
            ['title' => 'Maior Controle Financeiro', 'description' => 'Diminua a inadimplência e melhore o fluxo de caixa com cobrança eficaz e transparente.'],
            ['title' => 'Economia de Tempo e Recursos', 'description' => 'Nossa equipe realiza as cobranças enquanto sua empresa foca no que importa: o negócio.'],
            ['title' => 'Negociação Amigável', 'description' => 'Busca de acordos e parcelamentos antes de medidas judiciais, priorizando a resolução pacífica.'],
            ['title' => 'Inclusão no SPC', 'description' => 'Registro de devedores no SPC Brasil para proteção ao crédito quando necessário.'],
            ['title' => 'Acompanhamento Completo', 'description' => 'Relatórios detalhados e acompanhamento de todas as cobranças em andamento.'],
        ],
        'has_pricing' => false,
        'faqs' => [
            ['q' => 'O que é a Central de Cobranças da CDL?', 'a' => 'É uma assessoria especializada em recuperação de crédito que atua na cobrança de dívidas vencidas com abordagem ética e estratégica.'],
            ['q' => 'A cobrança é feita diretamente pela CDL?', 'a' => 'Sim, com equipe qualificada em contato humanizado e profissional, preservando a relação comercial.'],
            ['q' => 'A cobrança desgasta o relacionamento com o cliente?', 'a' => 'Não. Técnicas humanizadas preservam a relação comercial e a imagem da empresa credora.'],
            ['q' => 'Como minha empresa acompanha o processo?', 'a' => 'Através de relatórios e atualizações periódicas com transparência total sobre cada cobrança.'],
        ],
        'cta_title' => 'Precisa recuperar dívidas<br>com segurança?',
        'cta_text' => 'Fale com nossa equipe especializada em recuperação de crédito.',
        'cta_link' => '/fale-conosco/',
        'external_url' => '',
        'hero_img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80',
    ],
    'nfe-nfce' => [
        'tag'      => 'Serviço',
        'subtitle' => 'Agilidade, economia e conformidade — NF-e e NFC-e para o seu negócio.',
        'intro'    => '<p>Você sabia que é possível otimizar a gestão fiscal da sua empresa, reduzir custos operacionais e garantir conformidade com a legislação tributária? Com a adoção da Nota Fiscal Eletrônica (NF-e) e da Nota Fiscal de Consumidor Eletrônica (NFC-e), isso é uma realidade ao alcance do seu negócio.</p><p>A CDL Anápolis está pronta para orientar e apoiar sua empresa nesse processo de transformação digital com NF-e e NFC-e — um passo essencial para a modernização e eficiência.</p>',
        'split_img' => 'https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=800&q=80',
        'split_highlights' => [
            'Redução de custos com impressoras comuns',
            'Agilidade na emissão e transmissão em tempo real',
            'Maior controle e organização fiscal',
            'Conformidade com as exigências legais e fiscais',
        ],
        'features' => [
            ['title' => 'Emissão de NF-e', 'description' => 'Documento digital que registra operações de circulação de mercadorias com validade jurídica garantida pela assinatura digital.'],
            ['title' => 'Emissão de NFC-e', 'description' => 'Nota Fiscal de Consumidor Eletrônica para vendas presenciais, substituindo o cupom fiscal com uso de impressoras comuns.'],
            ['title' => 'Redução de Custos', 'description' => 'Elimine gastos com impressoras fiscais e papel. Utilize impressoras comuns e reduza despesas com manutenção.'],
            ['title' => 'Armazenamento Digital', 'description' => 'Notas armazenadas digitalmente com segurança, facilitando a gestão e consulta quando necessário.'],
            ['title' => 'Conformidade Legal', 'description' => 'Garanta total conformidade com as exigências fiscais e evite problemas com o fisco.'],
            ['title' => 'Suporte Técnico', 'description' => 'Equipe especializada para configuração, treinamento e resolução de dúvidas técnicas.'],
        ],
        'has_pricing' => false,
        'faqs' => [
            ['q' => 'O que é NF-e?', 'a' => 'A NF-e é um documento digital que registra operações de circulação de mercadorias entre empresas, com validade jurídica garantida pela assinatura digital e autorização da Secretaria da Fazenda.'],
            ['q' => 'O que é NFC-e?', 'a' => 'A NFC-e é destinada às vendas presenciais ao consumidor final, substituindo o cupom fiscal. Permite uso de impressoras não fiscais e consulta via QR Code.'],
            ['q' => 'É necessário equipamento específico para NFC-e?', 'a' => 'Não. A NFC-e pode ser emitida utilizando impressoras comuns, sem a necessidade de equipamentos fiscais específicos.'],
            ['q' => 'As soluções são compatíveis com sistemas de gestão?', 'a' => 'Sim. As soluções de NF-e e NFC-e da CDL Anápolis podem ser integradas aos sistemas de gestão empresarial.'],
        ],
        'cta_title' => 'Precisa de ajuda com<br>notas fiscais eletrônicas?',
        'cta_text' => 'Fale com nossa equipe e modernize a emissão fiscal do seu negócio.',
        'cta_link' => '/fale-conosco/',
        'external_url' => '',
        'hero_img' => 'https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=1920&q=80',
    ],
    'spc' => [
        'tag'      => 'Serviço',
        'subtitle' => 'Proteja seu negócio com o SPC — consultas, monitoramento e análise de crédito.',
        'intro'    => '<p>Com o SPC da CDL Anápolis, sua empresa acessa informações confiáveis para análise de crédito, reduzindo riscos e aumentando a segurança nas vendas. Conte com consultas de CPF e CNPJ, monitoramento de inadimplência e ferramentas para tomada de decisão mais assertiva.</p><p>Sua empresa tem uma ferramenta poderosa para análise de crédito e monitoramento de clientes. Acesse informações precisas, reduza riscos e fortaleça as operações comerciais com maior segurança.</p>',
        'split_img' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&q=80',
        'split_highlights' => [
            'Consultas completas de CPF e CNPJ',
            'Monitoramento de alterações cadastrais em tempo real',
            'Ferramentas de análise de crédito e Score SPC',
            'Redução de perdas financeiras com decisões seguras',
        ],
        'features' => [
            ['title' => 'Consulta de CPF/CNPJ', 'description' => 'Verifique a situação cadastral, pendências, protestos e histórico de crédito de consumidores e empresas.'],
            ['title' => 'Monitoramento de Clientes', 'description' => 'Acompanhe alterações cadastrais e de crédito dos seus clientes em tempo real.'],
            ['title' => 'Análise de Crédito', 'description' => 'Análise completa e detalhada para tomada de decisão segura em operações de crédito.'],
            ['title' => 'Score SPC', 'description' => 'Acesse o Score SPC dos consumidores para análises de risco mais precisas e confiáveis.'],
            ['title' => 'Inclusão de Devedores', 'description' => 'Registre devedores no banco de dados do SPC Brasil de forma rápida e segura.'],
            ['title' => 'Acesso Online', 'description' => 'Plataforma online para consultas e gestão de registros 24 horas por dia, 7 dias por semana.'],
        ],
        'has_pricing' => false,
        'faqs' => [
            ['q' => 'O que é o SPC?', 'a' => 'Serviço que oferece acesso a informações de crédito para pessoas físicas e jurídicas, auxiliando empresas em decisões comerciais mais seguras.'],
            ['q' => 'Quais informações posso obter?', 'a' => 'Consultas de CPF e CNPJ, histórico de crédito, pendências financeiras, protestos e outros dados relevantes para análise de risco.'],
            ['q' => 'O serviço é exclusivo para associados?', 'a' => 'Voltado para associados, mas empresas interessadas podem entrar em contato para verificar condições de acesso.'],
            ['q' => 'Posso monitorar meus clientes?', 'a' => 'Sim, o SPC oferece ferramentas de monitoramento que alertam sobre mudanças nos dados de clientes e parceiros comerciais.'],
        ],
        'cta_title' => 'Proteja seu negócio<br>com o SPC Brasil',
        'cta_text' => 'Acesse informações confiáveis para decisões seguras de crédito.',
        'cta_link' => '/fale-conosco/',
        'external_url' => 'https://sistema.spc.org.br/',
        'hero_img' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1920&q=80',
    ],
    'tempo-saude' => [
        'tag'      => 'Serviço',
        'subtitle' => 'Cuidar da saúde ficou mais fácil — planos a partir de R$ 20/mês com 50+ especialidades.',
        'intro'    => '<p>Com o Tempo &amp; Saúde, você e seus dependentes têm acesso a consultas médicas, exames laboratoriais e de imagem a preços acessíveis, sem comprometer a qualidade. Sem carência, com telemedicina 24 horas por dia, 7 dias por semana, e descontos de até 35% em medicamentos.</p><p>Uma ampla rede privada de saúde com mais de 50 especialidades médicas, milhares de farmácias credenciadas em todo o país e parceria com Saúde iD e Hospital Oswaldo Cruz.</p>',
        'split_img' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=80',
        'split_highlights' => [
            'Sem carência — atendimento imediato após cadastro',
            'Sem restrição de idade ou condições preexistentes',
            'Telemedicina 24/7 — pronto-atendimento digital',
            'Descontos de até 35% em medicamentos',
            '50+ especialidades médicas disponíveis',
        ],
        'features' => [
            ['title' => 'Plano Individual', 'description' => 'A partir de R$ 20/mês (assinatura anual) — acesso a mais de 50 especialidades médicas com valores acessíveis.'],
            ['title' => 'Plano Família', 'description' => 'A partir de R$ 24,90/mês (assinatura anual) — estenda os benefícios para toda a família com economia.'],
            ['title' => '50+ Especialidades', 'description' => 'Mais de 50 especialidades médicas disponíveis para consultas, exames e procedimentos.'],
            ['title' => 'Desconto em Medicamentos', 'description' => 'Até 35% de desconto em medicamentos nas farmácias parceiras em todo o Brasil.'],
            ['title' => 'Sem Carência', 'description' => 'Atendimento imediato, sem período de carência. Comece a usar assim que ativar o plano.'],
            ['title' => 'Telemedicina 24/7', 'description' => 'Consultas por telemedicina disponíveis 24 horas por dia, 7 dias por semana, onde você estiver.'],
        ],
        'has_pricing' => true,
        'faqs' => [
            ['q' => 'O que é o Tempo & Saúde?', 'a' => 'Um serviço de saúde que oferece acesso a consultas médicas, exames, terapias e descontos em medicamentos a preços acessíveis, sem carência ou restrições.'],
            ['q' => 'Quem pode aderir?', 'a' => 'Qualquer pessoa individualmente ou com até três dependentes no plano familiar.'],
            ['q' => 'Há período de carência?', 'a' => 'Não, Tempo & Saúde não tem período de carência; uso imediato após inscrição.'],
            ['q' => 'Como funciona o agendamento?', 'a' => 'Serviço gratuito onde a equipe auxilia com consultas na data e local de preferência.'],
        ],
        'cta_title' => 'Cuide da saúde da sua equipe<br>com o Tempo &amp; Saúde',
        'cta_text' => 'Planos a partir de R$ 20/mês com mais de 50 especialidades.',
        'cta_link' => '/fale-conosco/',
        'external_url' => '',
        'hero_img' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1920&q=80',
    ],
];

$fb = $fallbacks[$slug] ?? $fallbacks['spc'];
$icons = $icon_sets[$slug] ?? $icon_sets['spc'];

// ACF fields with fallbacks
$hero_image   = get_field('servico_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : $fb['hero_img'];
$subtitle     = get_the_excerpt() ?: $fb['subtitle'];
$intro        = get_field('servico_intro') ?: $fb['intro'];
$features     = get_field('servico_features') ?: $fb['features'];
$cta_link     = get_field('servico_cta_link') ?: $fb['cta_link'];
$external_url = get_field('servico_external_url') ?: $fb['external_url'];

// CTA via WhatsApp — quando a fallback do serviço definir uma mensagem,
// o botão final aponta para wa.me com o texto pré-preenchido.
$cta_whatsapp_msg = $fb['cta_whatsapp_message'] ?? '';
$whatsapp_number  = function_exists('get_field') ? (get_field('whatsapp_number', 'option') ?: '5562991933275') : '5562991933275';
$faqs = $fb['faqs'] ?? [];
$split_highlights = $fb['split_highlights'] ?? [];
$split_img = $fb['split_img'] ?? $fb['hero_img'];

// All services for cross-linking
$all_services = [
    'spc'                   => ['title' => 'SPC Brasil',           'desc' => 'Consultas CPF/CNPJ, monitoramento e análise de crédito.'],
    'cdl-celular'           => ['title' => 'CDL Celular',          'desc' => 'Telefonia com menor custo para empreendedores.'],
    'certificado-digital'   => ['title' => 'Certificado Digital',  'desc' => 'e-CPF e e-CNPJ (A1/A3) com condições especiais.'],
    'central-de-cobrancas'  => ['title' => 'Central de Cobranças', 'desc' => 'Recuperação de dívidas com abordagem ética.'],
    'nfe-nfce'              => ['title' => 'NF-e / NFC-e',        'desc' => 'Agilidade, economia e conformidade fiscal.'],
    'tempo-saude'           => ['title' => 'Tempo & Saúde',       'desc' => 'Saúde a partir de R$ 20/mês, 50+ especialidades.'],
];
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo esc_html($fb['tag']); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php the_title(); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($subtitle); ?></p>
        <?php if ($external_url): ?>
        <div class="ao ao-d3" style="margin-top:24px">
            <a href="<?php echo esc_url($external_url); ?>" class="btn btn-gold" target="_blank" rel="noopener">
                Acessar plataforma <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Stats strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <?php if ($slug === 'cdl-celular'): ?>
                <div class="ao"><span class="conv-social-strip__number">50K+</span><span class="conv-social-strip__label">Usuários no Brasil</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">Menor</span><span class="conv-social-strip__label">Custo do mercado</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">Nacional</span><span class="conv-social-strip__label">Cobertura completa</span></div>
            <?php elseif ($slug === 'certificado-digital'): ?>
                <div class="ao"><span class="conv-social-strip__number">e-CPF</span><span class="conv-social-strip__label">Pessoa Física</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">e-CNPJ</span><span class="conv-social-strip__label">Pessoa Jurídica</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">A1 & A3</span><span class="conv-social-strip__label">Formatos disponíveis</span></div>
            <?php elseif ($slug === 'central-de-cobrancas'): ?>
                <div class="ao"><span class="conv-social-strip__number">Ética</span><span class="conv-social-strip__label">Abordagem humanizada</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">100%</span><span class="conv-social-strip__label">Transparência</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">CDL</span><span class="conv-social-strip__label">Respaldo e credibilidade</span></div>
            <?php elseif ($slug === 'nfe-nfce'): ?>
                <div class="ao"><span class="conv-social-strip__number">NF-e</span><span class="conv-social-strip__label">Nota Fiscal Eletrônica</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">NFC-e</span><span class="conv-social-strip__label">Nota Fiscal Consumidor</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">Digital</span><span class="conv-social-strip__label">Armazenamento seguro</span></div>
            <?php elseif ($slug === 'spc'): ?>
                <div class="ao"><span class="conv-social-strip__number">CPF/CNPJ</span><span class="conv-social-strip__label">Consultas completas</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">Score</span><span class="conv-social-strip__label">Análise de risco</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">24/7</span><span class="conv-social-strip__label">Acesso online</span></div>
            <?php elseif ($slug === 'tempo-saude'): ?>
                <div class="ao"><span class="conv-social-strip__number">R$ 20</span><span class="conv-social-strip__label">A partir de / mês</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">50+</span><span class="conv-social-strip__label">Especialidades médicas</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">35%</span><span class="conv-social-strip__label">Desconto em medicamentos</span></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Split section: Image + Highlights -->
<?php if ($split_highlights): ?>
<section class="sec text-left">
    <div class="wrap">
        <div class="beneficio-split ao">
            <div class="beneficio-split__img">
                <img src="<?php echo esc_url($split_img); ?>" alt="<?php the_title(); ?>" loading="lazy">
            </div>
            <div class="beneficio-split__content">
                <div class="sec-tag" style="text-align:left">Sobre o serviço</div>
                <h2 class="sec-title" style="text-align:left;font-size:clamp(1.3rem,2.2vw,1.8rem)">Por que escolher este serviço?</h2>
                <div class="sobre-texto" style="margin-bottom:20px">
                    <?php echo wp_kses_post($intro); ?>
                </div>
                <ul class="beneficio-split__list">
                    <?php foreach ($split_highlights as $item): ?>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span><?php echo esc_html($item); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php if ($external_url): ?>
                <div style="margin-top:24px">
                    <a href="<?php echo esc_url($external_url); ?>" class="btn btn-gold" target="_blank" rel="noopener" style="font-size:.85rem">
                        Acessar plataforma <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Pricing Cards (Tempo & Saúde) -->
<?php if ($slug === 'tempo-saude' && !empty($fb['has_pricing'])): ?>
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Planos e preços</div>
        <h2 class="sec-title ao ao-d1">Escolha o plano ideal</h2>
        <p class="sec-desc ao ao-d2" style="margin:0 auto">Assinaturas anuais com acesso imediato e sem carência.</p>

        <div class="pricing-grid" style="max-width:700px;margin-left:auto;margin-right:auto;grid-template-columns:repeat(2,1fr)">
            <div class="pricing-card ao">
                <div class="pricing-card__name">Individual</div>
                <div class="pricing-card__price">R$ 20</div>
                <div class="pricing-card__period">/mês (assinatura anual)</div>
                <ul class="pricing-card__features">
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Cartão para o titular</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> 50+ especialidades</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Telemedicina 24/7</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Até 35% off medicamentos</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Sem carência</li>
                </ul>
                <a href="/fale-conosco/" class="btn btn-dark" style="width:100%">Ativar plano</a>
            </div>
            <div class="pricing-card pricing-card--featured ao ao-d1">
                <div class="pricing-card__name">Família</div>
                <div class="pricing-card__price">R$ 24,90</div>
                <div class="pricing-card__period">/mês (assinatura anual)</div>
                <ul class="pricing-card__features">
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Titular + até 3 dependentes</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> 50+ especialidades</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Telemedicina 24/7</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Até 35% off medicamentos</li>
                    <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Sem carência</li>
                </ul>
                <a href="/fale-conosco/" class="btn btn-dark" style="width:100%">Ativar plano</a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Features with varied icons -->
<?php if ($features): ?>
<section class="sec page-features"<?php echo ($slug !== 'tempo-saude') ? ' style="background:var(--light)"' : ''; ?>>
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Como funciona</div>
        <h2 class="sec-title ao ao-d1">Recursos e funcionalidades</h2>
        <div class="page-features__grid">
            <?php foreach ($features as $i => $feat): ?>
            <div class="sobre-mvv__card ao ao-d<?php echo $i % 3; ?>">
                <div class="sobre-mvv__ico">
                    <?php echo $icons[$i % count($icons)]; ?>
                </div>
                <h3><?php echo esc_html($feat['title']); ?></h3>
                <p><?php echo esc_html($feat['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- FAQ Section -->
<?php if ($faqs): ?>
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Tire suas dúvidas</div>
        <h2 class="sec-title ao ao-d1">Perguntas frequentes</h2>

        <div class="faq-grid">
            <?php foreach ($faqs as $faq): ?>
            <div class="faq-item ao">
                <h4 class="faq-item__q"><?php echo esc_html($faq['q']); ?></h4>
                <p class="faq-item__a"><?php echo esc_html($faq['a']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Outros Serviços -->
<?php
$other_services = array_diff_key($all_services, [$slug => '']);
if ($other_services):
?>
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Conheça também</div>
        <h2 class="sec-title ao ao-d1">Outros serviços da CDL</h2>
        <div class="related-grid related-grid--wide" style="margin-top:clamp(32px,4vw,48px)">
            <?php foreach ($other_services as $svc_slug => $svc): ?>
            <a href="<?php echo esc_url(home_url('/' . $svc_slug . '/')); ?>" class="related-grid__card ao">
                <div class="related-grid__ico">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div>
                    <h4><?php echo esc_html($svc['title']); ?></h4>
                    <p><?php echo esc_html($svc['desc']); ?></p>
                </div>
                <span class="related-grid__arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao"><?php echo wp_kses_post($fb['cta_title']); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($fb['cta_text']); ?></p>
    <?php if ($cta_whatsapp_msg): ?>
        <a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>?text=<?php echo rawurlencode($cta_whatsapp_msg); ?>"
           class="btn btn-whatsapp ao ao-d2"
           target="_blank"
           rel="noopener">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Adquirir Certificado Digital pelo WhatsApp
        </a>
    <?php else: ?>
        <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-dark ao ao-d2">Fale conosco <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
