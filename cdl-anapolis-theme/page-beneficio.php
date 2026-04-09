<?php
/**
 * Template Name: Benefício
 */
get_header();

$slug = get_post_field('post_name', get_the_ID());

// ─── SVG icon library for varied icons per slug ───
$icon_sets = [
    'cdl-assessoria-juridica' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
    ],
    'cdl-mais-voce' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    ],
    'cdl-saude' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 11-7.778 7.778 5.5 5.5 0 017.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>',
    ],
    'sede-campestre' => [
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 18a5 5 0 00-10 0"/><line x1="12" y1="9" x2="12" y2="2"/><line x1="4.22" y1="10.22" x2="5.64" y2="11.64"/><line x1="1" y1="18" x2="3" y2="18"/><line x1="21" y1="18" x2="23" y2="18"/><line x1="18.36" y1="11.64" x2="19.78" y2="10.22"/><line x1="23" y1="22" x2="1" y2="22"/><polyline points="16 5 12 9 8 5"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
        '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
    ],
];

// Fallback data per slug
$fallbacks = [
    'cdl-assessoria-juridica' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Sua Parceira Jurídica de Confiança — proteção jurídica para o seu negócio, sem custo adicional.',
        'intro'    => '<p>A Assessoria Jurídica da CDL Anápolis é a sua aliada na hora de prevenir problemas legais e proteger sua empresa. Sem custo adicional para quem faz parte, ela oferece uma consultoria jurídica completa e preventiva.</p><p>Isso inclui análise de contratos, orientação trabalhista, defesa do consumidor e suporte contencioso com pareceres técnicos.</p>',
        'highlights' => [
            'Suporte jurídico especializado sem custo adicional',
            'Análise e revisão de contratos comerciais',
            'Segurança nos contratos e prevenção de riscos',
            'Direito Civil e Trabalhista',
            'Direito Comercial e Tributário',
            'Direito do Consumidor',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&q=80',
        'features' => [
            ['title' => 'Direito Civil e Trabalhista', 'description' => 'Suporte em admissões, demissões, acordos trabalhistas e conformidade com a legislação vigente.'],
            ['title' => 'Direito Comercial e Tributário', 'description' => 'Orientação sobre obrigações fiscais, planejamento tributário e questões comerciais.'],
            ['title' => 'Direito do Consumidor', 'description' => 'Mediação de conflitos com consumidores e adequação às normas do Código de Defesa do Consumidor.'],
            ['title' => 'Análise de Contratos', 'description' => 'Revisão e elaboração de contratos comerciais, de locação, prestação de serviços e parcerias.'],
            ['title' => 'Sem Custo Adicional', 'description' => 'Consultoria jurídica completa e preventiva incluída para quem faz parte da CDL Anápolis.'],
            ['title' => 'Prevenção de Riscos', 'description' => 'Pareceres técnicos e orientação preventiva para evitar problemas legais no seu negócio.'],
        ],
        'faqs' => [
            ['q' => 'A assessoria jurídica tem custo adicional?', 'a' => 'Não. A consultoria jurídica é completa e preventiva, incluída para quem faz parte da CDL Anápolis, sem nenhum custo adicional.'],
            ['q' => 'Quais áreas do direito são atendidas?', 'a' => 'Direito Civil e Trabalhista, Direito Comercial e Tributário, e Direito do Consumidor, além de análise e revisão de contratos.'],
            ['q' => 'Como solicitar atendimento jurídico?', 'a' => 'Entre em contato com a CDL Anápolis pelo telefone (62) 3328-0008 ou WhatsApp (62) 99193-3275 para agendar sua consulta.'],
            ['q' => 'A assessoria ajuda com contratos?', 'a' => 'Sim. A equipe realiza revisão e elaboração de contratos comerciais, de locação, prestação de serviços e parcerias comerciais.'],
        ],
        'cta_title' => 'Precisa de orientação<br>jurídica?',
        'cta_text' => 'Fale com nossa equipe e proteja seu negócio.',
        'cta_link' => '/fale-conosco/',
        'hero_img' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920&q=80',
    ],
    'cdl-mais-voce' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Ganhe prêmios avaliando as empresas de Anápolis — app gratuito para Android e iOS.',
        'intro'    => '<p>O aplicativo CDL Mais Você foi criado para transformar a forma como os anapolinos se conectam com a cidade. Um app que gera engajamento, fideliza clientes e ainda traz vantagens reais para você!</p><p>Avalie empresas, participe de pesquisas, concorra a prêmios exclusivos, retire cupons de desconto e fique por dentro das principais notícias e vagas de emprego de Anápolis.</p>',
        'highlights' => [
            'Avalie empresas da cidade e contribua com a reputação delas',
            'Participe de pesquisas e concorra a prêmios exclusivos',
            'Retire cupons para descontos em estabelecimentos locais',
            'Acompanhe notícias e vagas de emprego em tempo real',
            'Totalmente gratuito para o público em geral',
            'Disponível para Android e iOS',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=80',
        'features' => [
            ['title' => 'Concorra a Prêmios', 'description' => 'Avalie empresas, participe de ações e esteja sempre concorrendo a sorteios e campanhas especiais exclusivas do app.'],
            ['title' => 'Cupons e Descontos', 'description' => 'Resgate cupons direto no app e aproveite descontos imperdíveis em lojas, serviços e parceiros.'],
            ['title' => 'Notícias e Vagas', 'description' => 'Fique por dentro das principais notícias da cidade, eventos e novas vagas de emprego em tempo real.'],
            ['title' => 'App Fácil e Intuitivo', 'description' => 'Disponível para Android e iOS, o app é leve, fácil de navegar e foi feito para o dia a dia de Anápolis.'],
            ['title' => 'Avaliação de Empresas', 'description' => 'Contribua avaliando os estabelecimentos da cidade e ajude a melhorar o atendimento ao consumidor.'],
            ['title' => 'Totalmente Gratuito', 'description' => 'O aplicativo é gratuito para todos. Você não precisa ser membro da CDL para utilizar o app.'],
        ],
        'faqs' => [
            ['q' => 'O que é o aplicativo CDL Mais Você?', 'a' => 'O CDL Mais Você é um aplicativo gratuito, disponível para Android e iOS, que permite avaliar estabelecimentos, participar de pesquisas, concorrer a prêmios, resgatar cupons de desconto e acompanhar notícias e vagas.'],
            ['q' => 'Como posso ganhar prêmios pelo app?', 'a' => 'Ao se cadastrar, usuários podem participar de pesquisas de opinião e campanhas de empresas locais. Cada participação gera pontos ou chances em sorteios.'],
            ['q' => 'Como funcionam os cupons de desconto?', 'a' => 'Os cupons são oferecidos por empresas parceiras da CDL. Basta acessar a seção de cupons no app, selecionar a promoção e apresentar o cupom no estabelecimento participante.'],
            ['q' => 'O aplicativo é gratuito? Preciso ser associado?', 'a' => 'Sim, o aplicativo é totalmente gratuito. Você não precisa ser associado da CDL para utilizar o app, porém associados recebem benefícios adicionais.'],
        ],
        'cta_title' => 'Baixe o CDL Mais Você<br>e comece a ganhar prêmios',
        'cta_text' => 'Disponível gratuitamente para Android e iOS.',
        'cta_link' => '/fale-conosco/',
        'hero_img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1920&q=80',
    ],
    'cdl-saude' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Sua saúde sem gastar com plano! Um convênio inteligente para quem faz parte da CDL Anápolis.',
        'intro'    => '<p>O CDL Saúde é um convênio inteligente criado especialmente para quem faz parte da CDL Anápolis, seus familiares e funcionários. Ele não é um plano de saúde, mas sim uma rede de parcerias com profissionais e instituições da área da saúde, com descontos especiais.</p><p>Com o CDL Saúde, você cuida de quem importa com facilidade e tranquilidade. Acesse a plataforma online, emita guias digitais e tenha tudo em mãos, de forma simples e rápida.</p>',
        'highlights' => [
            'Descontos reais em saúde para toda a família',
            'Rede ampla de médicos, clínicas, hospitais e laboratórios',
            'Sem carência — atendimento imediato',
            'Extensivo a familiares e equipe',
            'Guias digitais 100% liberadas online',
            'Não é plano de saúde — é convênio inteligente',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&q=80',
        'features' => [
            ['title' => 'Rede Ampla de Atendimento', 'description' => 'Acesso a médicos, clínicas, hospitais e laboratórios com valores diferenciados para quem faz parte da CDL.'],
            ['title' => 'Benefício Familiar Completo', 'description' => 'Estenda os descontos para pais, mães, irmãos e filhos do empregador e do empregado. Saúde para toda a família.'],
            ['title' => 'Guias Digitais Liberadas', 'description' => 'Emita guias de exames e consultas online, com comodidade e agilidade, na hora que precisar, sem aprovação.'],
            ['title' => 'Sem Carência e Sem Espera', 'description' => 'Desfrute de consultas e exames sem período de carência. Atendimento imediato para você e sua equipe.'],
            ['title' => 'Convênio Inteligente', 'description' => 'Não é plano de saúde — é uma rede de parcerias com descontos especiais para quem faz parte da CDL Anápolis.'],
            ['title' => 'Plataforma Online', 'description' => 'Acesse a plataforma, emita guias e gerencie tudo de forma digital, simples e rápida.'],
        ],
        'faqs' => [
            ['q' => 'O que é o CDL Saúde?', 'a' => 'O CDL Saúde é um convênio que oferece descontos em serviços de saúde para associados da CDL Anápolis, seus colaboradores e familiares de 1º grau.'],
            ['q' => 'Quem pode utilizar o CDL Saúde?', 'a' => 'Associados da CDL Anápolis, seus funcionários e familiares diretos (pais, mães, irmãos e filhos) têm acesso aos benefícios do CDL Saúde.'],
            ['q' => 'Como faço para emitir guias?', 'a' => 'Você pode emitir suas guias online através do site do CDL Saúde, acessando a área de emissão de guias, com comodidade e agilidade.'],
            ['q' => 'Há período de carência?', 'a' => 'Não. O CDL Saúde oferece acesso imediato a consultas e exames, sem necessidade de cumprir carência.'],
        ],
        'cta_title' => 'Cuide da saúde<br>da sua equipe',
        'cta_text' => 'Ative seu CDL Saúde e comece a cuidar de quem importa.',
        'cta_link' => '/fale-conosco/',
        'hero_img' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1920&q=80',
    ],
    'sede-campestre' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Seu evento merece um lugar especial — espaço exclusivo para quem faz parte da CDL Anápolis.',
        'intro'    => '<p>A Sede Campestre da CDL Anápolis é o lugar perfeito para a realização de festas, confraternizações e eventos especiais. Com um amplo salão de festas, churrasqueira, freezer, mesas e cadeiras, o local oferece total conforto e praticidade.</p><p>Celebre com conforto na Sede Campestre da CDL Anápolis. Com infraestrutura completa e uma localização privilegiada próxima ao Terras Alphaville, o local é ideal para festas e confraternizações em um ambiente tranquilo e seguro.</p>',
        'highlights' => [
            'Salão de festas amplo e equipado',
            'Churrasqueira completa para confraternizações',
            'Freezer, mesas e cadeiras disponíveis',
            'Localização privilegiada próximo ao Terras Alphaville',
            'Ideal para festas e confraternizações',
            'Exclusivo para quem faz parte da CDL Anápolis',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800&q=80',
        'features' => [
            ['title' => 'Salão de Festas', 'description' => 'Espaço amplo e aconchegante para receber seus convidados com conforto e praticidade.'],
            ['title' => 'Churrasqueira', 'description' => 'Churrasqueira completa e coberta para confraternizações memoráveis com família e amigos.'],
            ['title' => 'Infraestrutura Completa', 'description' => 'Freezer, mesas e cadeiras à disposição para facilitar a organização do seu evento.'],
            ['title' => 'Localização Privilegiada', 'description' => 'Próximo ao Terras Alphaville, com fácil acesso e ambiente tranquilo.'],
            ['title' => 'Festas e Eventos', 'description' => 'Perfeito para aniversários, confraternizações de equipe, encontros familiares e eventos corporativos.'],
            ['title' => 'Exclusividade CDL', 'description' => 'Benefício exclusivo para quem faz parte da CDL Anápolis e suas famílias.'],
        ],
        'faqs' => [
            ['q' => 'Quem pode alugar a Sede Campestre?', 'a' => 'A Sede Campestre pode ser alugada por associados da CDL Anápolis, seus familiares e empresas associadas. É necessário verificar a disponibilidade e assinar o termo de responsabilidade.'],
            ['q' => 'Quais são as instalações disponíveis?', 'a' => 'A sede oferece salão de festas, churrasqueira, freezer, mesas e cadeiras. Tudo o que você precisa para realizar um evento confortável e organizado.'],
            ['q' => 'Como posso fazer a reserva?', 'a' => 'As reservas podem ser feitas pelo telefone ou WhatsApp da CDL Anápolis. Consulte a disponibilidade da data e realize a confirmação com antecedência.'],
            ['q' => 'Posso realizar eventos noturnos?', 'a' => 'Sim, a Sede Campestre está preparada para receber eventos durante o dia ou a noite, respeitando as regras de horário e volume de som.'],
        ],
        'cta_title' => 'Quer reservar a<br>Sede Campestre?',
        'cta_text' => 'Faça parte da CDL Anápolis e aproveite este espaço exclusivo.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1920&q=80',
    ],
];

$fb = $fallbacks[$slug] ?? $fallbacks['cdl-assessoria-juridica'];
$icons = $icon_sets[$slug] ?? $icon_sets['cdl-assessoria-juridica'];

// ACF fields with fallbacks
$hero_image   = get_field('beneficio_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : $fb['hero_img'];
$subtitle     = get_the_excerpt() ?: $fb['subtitle'];
$intro        = get_field('beneficio_intro') ?: $fb['intro'];
$features     = get_field('beneficio_features') ?: $fb['features'];
$cta_link     = get_field('beneficio_cta_link') ?: $fb['cta_link'];
$icon         = get_field('beneficio_icon');
$highlights   = get_field('beneficio_highlights') ?: ($fb['highlights'] ?? []);
$highlight_img_field = get_field('beneficio_highlight_image');
$highlight_img = $highlight_img_field ? $highlight_img_field['url'] : ($fb['highlight_img'] ?? $fb['hero_img']);
$faqs = $fb['faqs'] ?? [];

// Other benefits for cross-linking
$all_benefits = [
    'cdl-assessoria-juridica' => 'Assessoria Jurídica',
    'cdl-mais-voce'           => 'CDL Mais Você',
    'cdl-saude'               => 'CDL Saúde',
    'sede-campestre'          => 'Sede Campestre',
];
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo esc_html($fb['tag']); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php the_title(); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($subtitle); ?></p>
    </div>
</section>

<!-- Stats strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <?php if ($slug === 'cdl-assessoria-juridica'): ?>
                <div class="ao"><span class="conv-social-strip__number">3</span><span class="conv-social-strip__label">Áreas do Direito</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">R$ 0</span><span class="conv-social-strip__label">Custo adicional</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">100%</span><span class="conv-social-strip__label">Preventiva</span></div>
            <?php elseif ($slug === 'cdl-mais-voce'): ?>
                <div class="ao"><span class="conv-social-strip__number">1,7M+</span><span class="conv-social-strip__label">Avaliações realizadas</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">Gratuito</span><span class="conv-social-strip__label">Para todos</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">Android & iOS</span><span class="conv-social-strip__label">Disponível</span></div>
            <?php elseif ($slug === 'cdl-saude'): ?>
                <div class="ao"><span class="conv-social-strip__number">Sem</span><span class="conv-social-strip__label">Carência</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">100%</span><span class="conv-social-strip__label">Guias digitais online</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">Família</span><span class="conv-social-strip__label">Extensivo a todos</span></div>
            <?php elseif ($slug === 'sede-campestre'): ?>
                <div class="ao"><span class="conv-social-strip__number">Salão</span><span class="conv-social-strip__label">Festas amplo</span></div>
                <div class="ao ao-d1"><span class="conv-social-strip__number">Completa</span><span class="conv-social-strip__label">Infraestrutura</span></div>
                <div class="ao ao-d2"><span class="conv-social-strip__number">Exclusivo</span><span class="conv-social-strip__label">Para associados CDL</span></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Split Section: Image + Highlights -->
<?php if ($highlights): ?>
<section class="sec text-left">
    <div class="wrap">
        <div class="beneficio-split ao">
            <div class="beneficio-split__img">
                <img src="<?php echo esc_url($highlight_img); ?>" alt="<?php the_title(); ?>" loading="lazy">
            </div>
            <div class="beneficio-split__content">
                <div class="sec-tag" style="text-align:left">Principais vantagens</div>
                <h2 class="sec-title" style="text-align:left;font-size:clamp(1.3rem,2.2vw,1.8rem)">Por que escolher este benefício?</h2>
                <ul class="beneficio-split__list">
                    <?php foreach ($highlights as $item): ?>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span><?php echo esc_html(is_array($item) ? $item['texto'] : $item); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Vantagens / Features with varied icons -->
<?php if ($features): ?>
<section class="sec page-features" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">O que você ganha</div>
        <h2 class="sec-title ao ao-d1">Vantagens do benefício</h2>
        <div class="page-features__grid">
            <?php foreach ($features as $i => $feat): ?>
            <div class="sobre-mvv__card ao ao-d<?php echo $i % 3; ?>">
                <div class="sobre-mvv__ico">
                    <?php if (!empty($feat['icon']) && is_array($feat['icon'])): ?>
                        <img src="<?php echo esc_url($feat['icon']['url']); ?>" alt="" style="width:28px;height:28px">
                    <?php else: ?>
                        <?php echo $icons[$i % count($icons)]; ?>
                    <?php endif; ?>
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

<!-- Outros Benefícios -->
<?php
$other_benefits = array_diff_key($all_benefits, [$slug => '']);
if ($other_benefits):
?>
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Conheça também</div>
        <h2 class="sec-title ao ao-d1">Outros benefícios da CDL</h2>
        <div class="related-grid" style="margin-top:clamp(32px,4vw,48px)">
            <?php foreach ($other_benefits as $ben_slug => $ben_title): ?>
            <a href="<?php echo esc_url(home_url('/' . $ben_slug . '/')); ?>" class="related-grid__card ao">
                <div class="related-grid__ico">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <h4><?php echo esc_html($ben_title); ?></h4>
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
    <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-dark ao ao-d2">Quero saber mais <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
