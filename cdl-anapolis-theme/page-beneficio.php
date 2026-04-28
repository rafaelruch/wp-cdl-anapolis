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

// Generic icon pool (reused for new benefits by rotating starting index)
$generic_icon_pool = [
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
];
// Auto-generate 6-icon rotations for the new benefits (reuses generic pool)
$new_slugs = ['planejamento-estrategico','assessoria-contabil','apoio-mei','rede-de-descontos','espacos-corporativos','eventos-corporativos','nucleos-empresariais','treinamentos','midia-divulgacao','recrutamento','exames-admissionais','gestao-esocial'];
foreach ($new_slugs as $idx => $ns) {
    $start = ($idx * 2) % count($generic_icon_pool);
    $icons_rot = [];
    for ($i = 0; $i < 6; $i++) {
        $icons_rot[] = $generic_icon_pool[($start + $i) % count($generic_icon_pool)];
    }
    $icon_sets[$ns] = $icons_rot;
}

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
    'planejamento-estrategico' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Apoio especializado para analisar o momento da sua empresa, identificar oportunidades e estruturar ações eficientes para crescimento sustentável.',
        'intro'    => '<p>O Planejamento Estratégico da CDL Anápolis é pensado para empresários que querem crescer com organização e previsibilidade. Um diagnóstico profundo combinado com metas claras e indicadores mensuráveis, permitindo decisões baseadas em estratégia e não em impulso.</p><p>Adaptável a qualquer porte — do negócio em fase inicial até estruturas já consolidadas — o serviço orienta a tomada de decisão, estrutura processos e projeta um crescimento sustentável.</p>',
        'highlights' => [
            'Diagnóstico empresarial completo',
            'Planejamento estratégico personalizado',
            'Estruturação de metas e indicadores',
            'Apoio especializado na tomada de decisão',
            'Organização dos processos internos',
            'Redução de erros estratégicos',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80',
        'features' => [
            ['title' => 'Clareza nas decisões', 'description' => 'Tenha uma visão mais estruturada do seu negócio, permitindo tomar decisões com mais segurança e menos incertezas no dia a dia.'],
            ['title' => 'Definição de metas realistas', 'description' => 'Estabeleça objetivos claros e alcançáveis, alinhados à realidade da sua empresa e ao seu momento de crescimento.'],
            ['title' => 'Organização de processos', 'description' => 'Identifique falhas e oportunidades de melhoria, estruturando processos mais eficientes e produtivos.'],
            ['title' => 'Crescimento sustentável', 'description' => 'Planeje o futuro da sua empresa com base em estratégia, evitando decisões impulsivas ou desalinhadas.'],
            ['title' => 'Apoio especializado', 'description' => 'Conte com orientação profissional para analisar cenários e direcionar melhor suas ações empresariais.'],
            ['title' => 'Redução de erros', 'description' => 'Evite retrabalho e decisões equivocadas que podem gerar prejuízos ou atrasar o crescimento do negócio.'],
        ],
        'faqs' => [
            ['q' => 'Preciso ter uma empresa grande para utilizar esse benefício?', 'a' => 'Não. O planejamento estratégico é adaptado à realidade de cada negócio, atendendo desde empresas em fase inicial até empresas mais estruturadas.'],
            ['q' => 'Esse serviço ajuda no crescimento da empresa?', 'a' => 'Sim. Ao organizar metas, processos e decisões, ele contribui diretamente para um crescimento mais consistente e sustentável.'],
            ['q' => 'O acompanhamento é contínuo?', 'a' => 'Pode ser pontual ou contínuo, conforme a necessidade e o momento da empresa.'],
            ['q' => 'Existe custo adicional?', 'a' => 'Não. O benefício está incluso para associados.'],
        ],
        'cta_title' => 'Quer planejar<br>o crescimento da sua empresa?',
        'cta_text' => 'Fale com nossa equipe e comece agora.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1920&q=80',
    ],
    'assessoria-contabil' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Suporte técnico para compreender a realidade contábil e fiscal da empresa, com mais segurança e organização financeira.',
        'intro'    => '<p>A Assessoria Contábil da CDL Anápolis complementa o trabalho do contador da empresa com uma visão estratégica e orientativa. Identificamos oportunidades dentro da legalidade, garantimos conformidade fiscal e estruturamos o controle financeiro do negócio.</p><p>O associado passa a tomar decisões baseadas em dados confiáveis, evita riscos com órgãos reguladores e ganha previsibilidade sobre as obrigações da empresa.</p>',
        'highlights' => [
            'Consultoria tributária especializada',
            'Orientação fiscal e contábil',
            'Redução de riscos e erros fiscais',
            'Apoio na gestão financeira',
            'Planejamento tributário estratégico',
            'Conformidade com a legislação',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&q=80',
        'features' => [
            ['title' => 'Controle financeiro eficiente', 'description' => 'Tenha uma visão mais clara das finanças da empresa, facilitando o acompanhamento de receitas, despesas e resultados.'],
            ['title' => 'Redução de riscos fiscais', 'description' => 'Evite problemas com órgãos reguladores por meio de orientações que garantem conformidade com a legislação.'],
            ['title' => 'Planejamento tributário', 'description' => 'Identifique oportunidades de economia dentro da legalidade, pagando apenas o necessário em tributos.'],
            ['title' => 'Mais segurança nas decisões', 'description' => 'Tome decisões com base em dados contábeis e financeiros mais confiáveis e organizados.'],
            ['title' => 'Apoio técnico especializado', 'description' => 'Conte com profissionais qualificados para esclarecer dúvidas e orientar sua gestão contábil.'],
            ['title' => 'Organização da rotina', 'description' => 'Tenha mais controle e previsibilidade sobre obrigações e compromissos da empresa.'],
        ],
        'faqs' => [
            ['q' => 'Esse serviço substitui o contador da empresa?', 'a' => 'Não. Ele complementa o trabalho contábil com uma visão mais estratégica e orientativa.'],
            ['q' => 'Ajuda a reduzir impostos?', 'a' => 'Sim, dentro da legalidade, por meio de planejamento tributário adequado.'],
            ['q' => 'Como impacta a gestão financeira?', 'a' => 'Proporciona mais controle, organização e segurança nas decisões financeiras.'],
            ['q' => 'Precisa agendar atendimento?', 'a' => 'Sim, para garantir um suporte mais direcionado.'],
        ],
        'cta_title' => 'Precisa de apoio<br>contábil e fiscal?',
        'cta_text' => 'Fale com nossa equipe e tenha mais segurança na sua gestão.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80',
    ],
    'apoio-mei' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Facilita a formalização e manutenção do microempreendedor, com menos burocracia e mais agilidade.',
        'intro'    => '<p>O Apoio ao MEI da CDL Anápolis orienta o microempreendedor em todo o ciclo da formalização: desde a abertura até as obrigações rotineiras como emissão de notas, guia DAS e declaração anual. Um balcão de apoio pensado para quem quer empreender sem se perder na burocracia.</p><p>Com o benefício, o empreendedor conta com suporte contínuo, não precisa recorrer a serviços externos e mantém sua empresa sempre regular.</p>',
        'highlights' => [
            'Abertura de MEI com orientação completa',
            'Registro na prefeitura',
            'Emissão de notas fiscais',
            'Guia DAS e declaração anual',
            'Regularização e organização de obrigações',
            'Apoio contínuo ao empreendedor',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=800&q=80',
        'features' => [
            ['title' => 'Facilidade na formalização', 'description' => 'Abra sua empresa com orientação adequada, evitando erros e burocracias desnecessárias.'],
            ['title' => 'Regularização do negócio', 'description' => 'Mantenha sua empresa em dia com as obrigações legais de forma simples e organizada.'],
            ['title' => 'Notas fiscais simplificadas', 'description' => 'Configure e utilize a emissão de notas com mais facilidade no dia a dia.'],
            ['title' => 'Obrigações organizadas', 'description' => 'Tenha apoio para lidar com guias, declarações e exigências do MEI.'],
            ['title' => 'Redução de burocracia', 'description' => 'Evite perda de tempo com processos operacionais e foque no crescimento do seu negócio.'],
            ['title' => 'Apoio contínuo', 'description' => 'Conte com suporte sempre que precisar, sem recorrer a serviços externos.'],
        ],
        'faqs' => [
            ['q' => 'A CDL realiza a abertura do MEI?', 'a' => 'Sim. Todo o processo pode ser orientado e realizado com apoio da equipe.'],
            ['q' => 'Auxilia após a abertura?', 'a' => 'Sim. Inclui suporte contínuo com obrigações e rotinas.'],
            ['q' => 'Preciso entender de contabilidade?', 'a' => 'Não. O serviço é pensado para simplificar tudo para o empreendedor.'],
            ['q' => 'Tem custo?', 'a' => 'Não para associados.'],
        ],
        'cta_title' => 'É MEI e quer<br>apoio completo?',
        'cta_text' => 'Cuidamos da burocracia para você focar no negócio.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1920&q=80',
    ],
    'rede-de-descontos' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Economia contínua, maior poder de compra e fortalecimento do comércio local em um só benefício.',
        'intro'    => '<p>A Rede de Descontos da CDL Anápolis é um ciclo virtuoso: o associado economiza, consome melhor e ainda fortalece a economia da própria cidade. São parceiros qualificados em academias, saúde, segurança do trabalho, restaurantes, certificações e muito mais.</p><p>Utilização ilimitada, sempre que o associado precisar, em empresas que valorizam quem faz parte da comunidade CDL.</p>',
        'highlights' => [
            'Academias e saúde',
            'Segurança do trabalho',
            'Restaurantes e serviços',
            'Certificações e muito mais',
            'Uso ilimitado do benefício',
            'Fortalecimento do comércio local',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=80',
        'features' => [
            ['title' => 'Economia no dia a dia', 'description' => 'Reduza custos com serviços e produtos essenciais para sua empresa e uso pessoal.'],
            ['title' => 'Parceiros qualificados', 'description' => 'Conte com empresas selecionadas que oferecem condições especiais para associados.'],
            ['title' => 'Maior poder de compra', 'description' => 'Aproveite melhores condições comerciais em diversos segmentos.'],
            ['title' => 'Benefícios em várias áreas', 'description' => 'Tenha vantagens em saúde, serviços, alimentação, certificações e muito mais.'],
            ['title' => 'Uso ilimitado', 'description' => 'Utilize os descontos sempre que precisar, sem restrições.'],
            ['title' => 'Fortalecimento local', 'description' => 'Consuma dentro de uma rede que valoriza e impulsiona empresas da própria cidade.'],
        ],
        'faqs' => [
            ['q' => 'Como acesso os descontos?', 'a' => 'Por meio dos parceiros credenciados da CDL.'],
            ['q' => 'Existe limite de uso?', 'a' => 'Não. Pode ser utilizado sempre que necessário.'],
            ['q' => 'Os descontos são relevantes?', 'a' => 'Sim. São condições negociadas diretamente com parceiros.'],
            ['q' => 'Preciso comprovar associação?', 'a' => 'Sim, normalmente por meio de identificação como associado.'],
        ],
        'cta_title' => 'Economize e valorize<br>o comércio local',
        'cta_text' => 'Faça parte e acesse a Rede de Descontos da CDL Anápolis.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1920&q=80',
    ],
    'espacos-corporativos' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Estrutura profissional para reuniões com clientes, parceiros e equipe — sem investir em espaço próprio.',
        'intro'    => '<p>Os Espaços Corporativos da CDL Anápolis oferecem um ambiente alinhado à imagem profissional do seu negócio. Salas equipadas, prontas para uso, onde o associado realiza reuniões estratégicas com credibilidade e organização.</p><p>Elimina-se a necessidade de alugar salas externas ou manter estrutura física dedicada. Pragmatismo, economia e profissionalismo em um só benefício.</p>',
        'highlights' => [
            'Salas equipadas',
            'Ambiente corporativo profissional',
            'Estrutura pronta para uso',
            'Ideal para reuniões estratégicas',
            'Economia com locações externas',
            'Experiência diferenciada ao cliente',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
        'features' => [
            ['title' => 'Ambiente profissional', 'description' => 'Utilize espaços estruturados para receber clientes, parceiros e equipe com mais organização e credibilidade.'],
            ['title' => 'Imagem mais sólida', 'description' => 'Transmita uma imagem mais confiável ao realizar encontros em um ambiente adequado.'],
            ['title' => 'Economia em locações', 'description' => 'Evite custos com aluguel de salas ou espaços para reuniões e atendimentos.'],
            ['title' => 'Praticidade no dia a dia', 'description' => 'Tenha à disposição um local pronto para uso, sem necessidade de estrutura própria.'],
            ['title' => 'Reuniões estratégicas', 'description' => 'Utilize o ambiente para reuniões importantes que exigem mais formalidade e preparo.'],
            ['title' => 'Experiência ao cliente', 'description' => 'Proporcione um atendimento mais organizado e confortável para quem visita sua empresa.'],
        ],
        'faqs' => [
            ['q' => 'Preciso pagar para utilizar?', 'a' => 'Associados possuem condições especiais ou gratuidade.'],
            ['q' => 'Os espaços são equipados?', 'a' => 'Sim. Preparados para reuniões e encontros profissionais.'],
            ['q' => 'Posso atender clientes nesses espaços?', 'a' => 'Sim, é ideal para isso.'],
            ['q' => 'Como faço a reserva?', 'a' => 'Mediante agendamento com a CDL.'],
        ],
        'cta_title' => 'Precisa de um espaço<br>profissional para reuniões?',
        'cta_text' => 'Faça parte e utilize os Espaços Corporativos da CDL.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80',
    ],
    'eventos-corporativos' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Networking qualificado, parcerias comerciais e fortalecimento de marca em ambientes empresariais ativos.',
        'intro'    => '<p>Os Eventos Corporativos da CDL Anápolis reúnem empresários, parceiros e especialistas em um ambiente propício para troca, aprendizado e geração de novas oportunidades. Talks, palestras, workshops e summits exclusivos ou com condições especiais para associados.</p><p>Uma forma de posicionar sua marca dentro de um ecossistema empresarial reconhecido, gerando conexões que evoluem para parcerias e negócios concretos.</p>',
        'highlights' => [
            'Talks e palestras',
            'Oficinas e workshops',
            'Summits e encontros empresariais',
            'Condições especiais para associados',
            'Networking com empresários e especialistas',
            'Fortalecimento de marca',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80',
        'features' => [
            ['title' => 'Networking qualificado', 'description' => 'Conecte-se com empresários, lideranças e profissionais do ambiente empresarial local.'],
            ['title' => 'Novas oportunidades', 'description' => 'Esteja presente em um ambiente propício para parcerias, negócios e crescimento.'],
            ['title' => 'Conteúdos relevantes', 'description' => 'Participe de encontros com temas estratégicos e atuais para o desenvolvimento empresarial.'],
            ['title' => 'Fortalecimento da marca', 'description' => 'Posicione sua empresa dentro de um ecossistema ativo e reconhecido no mercado.'],
            ['title' => 'Integração empresarial', 'description' => 'Esteja inserido em um ambiente que estimula troca de experiências e conexões.'],
            ['title' => 'Participação facilitada', 'description' => 'Acesso com condições especiais, exclusividade ou prioridade como associado.'],
        ],
        'faqs' => [
            ['q' => 'Os eventos são exclusivos para associados?', 'a' => 'Muitos são exclusivos ou possuem condições diferenciadas.'],
            ['q' => 'Vale a pena participar?', 'a' => 'Sim. São oportunidades reais de networking e geração de negócios.'],
            ['q' => 'Posso levar minha equipe?', 'a' => 'Dependendo do evento, sim.'],
            ['q' => 'Como fico sabendo dos eventos?', 'a' => 'Pelos canais oficiais da CDL.'],
        ],
        'cta_title' => 'Quer acessar eventos<br>exclusivos e qualificados?',
        'cta_text' => 'Faça parte e participe da agenda empresarial da CDL.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920&q=80',
    ],
    'nucleos-empresariais' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Grupos estratégicos voltados ao desenvolvimento empresarial, troca de experiências e geração de oportunidades.',
        'intro'    => '<p>Os Núcleos Empresariais da CDL Anápolis — CDL Mulher, CDL Jovem e outros — reúnem empresários com interesses em comum e foco no desenvolvimento contínuo. Um espaço para construir conexões, trocar experiências e transformar relacionamentos em oportunidades concretas.</p><p>Participação incluída como benefício para associados, com encontros periódicos e ambiente colaborativo.</p>',
        'highlights' => [
            'CDL Mulher',
            'CDL Jovem',
            'Networking qualificado',
            'Troca de experiências reais',
            'Desenvolvimento de liderança',
            'Geração de parcerias comerciais',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&q=80',
        'features' => [
            ['title' => 'Grupos estratégicos', 'description' => 'Participe de núcleos como CDL Mulher e CDL Jovem, com foco no desenvolvimento empresarial.'],
            ['title' => 'Networking intencional', 'description' => 'Construa conexões com empresários que compartilham objetivos e desafios semelhantes.'],
            ['title' => 'Troca de experiências', 'description' => 'Compartilhe vivências e aprenda com outros empresários em um ambiente colaborativo.'],
            ['title' => 'Desenvolvimento de liderança', 'description' => 'Fortaleça habilidades pessoais e profissionais por meio da participação ativa.'],
            ['title' => 'Parcerias comerciais', 'description' => 'Transforme relacionamentos em oportunidades concretas de negócios.'],
            ['title' => 'Ecossistema ativo', 'description' => 'Faça parte de um ambiente onde conexões evoluem para crescimento consistente.'],
        ],
        'faqs' => [
            ['q' => 'Quem pode participar dos núcleos?', 'a' => 'Associados da CDL.'],
            ['q' => 'Existe custo adicional?', 'a' => 'Não. Está incluso como benefício.'],
            ['q' => 'Os encontros são frequentes?', 'a' => 'Sim, com reuniões periódicas.'],
            ['q' => 'Posso participar de mais de um núcleo?', 'a' => 'Sim, conforme interesse.'],
        ],
        'cta_title' => 'Faça parte de um<br>núcleo empresarial',
        'cta_text' => 'Conecte-se com empresários que compartilham seus desafios.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=1920&q=80',
    ],
    'treinamentos' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Capacitação contínua e atualização de mercado para empresários e equipes.',
        'intro'    => '<p>Os Treinamentos da CDL Anápolis oferecem conteúdo prático e aplicável, ministrado por especialistas, com foco real no desenvolvimento empresarial. Temas atualizados, boas práticas e estratégias que podem ser implementadas diretamente no negócio.</p><p>Benefício gratuito para associados, incluindo a possibilidade de levar a equipe — fortalecendo a gestão e o desempenho do time como um todo.</p>',
        'highlights' => [
            'Cursos gratuitos para associados',
            'Consultorias especializadas',
            'Conteúdos práticos e aplicáveis',
            'Atualização constante de mercado',
            'Desenvolvimento da equipe',
            'Certificação em muitos casos',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&q=80',
        'features' => [
            ['title' => 'Capacitação contínua', 'description' => 'Acesse treinamentos que contribuem para o desenvolvimento constante do empresário e da equipe.'],
            ['title' => 'Conteúdo aplicável', 'description' => 'Aprenda estratégias que podem ser implementadas diretamente no seu negócio.'],
            ['title' => 'Atualização de mercado', 'description' => 'Mantenha-se informado sobre tendências, mudanças e boas práticas empresariais.'],
            ['title' => 'Apoio de especialistas', 'description' => 'Conte com orientação de profissionais qualificados em diversas áreas.'],
            ['title' => 'Desenvolvimento da equipe', 'description' => 'Leve conhecimento também para colaboradores, fortalecendo o desempenho do time.'],
            ['title' => 'Melhor gestão empresarial', 'description' => 'Utilize o aprendizado para melhorar processos, decisões e resultados.'],
        ],
        'faqs' => [
            ['q' => 'Os treinamentos são gratuitos?', 'a' => 'Sim para associados.'],
            ['q' => 'Os conteúdos são aplicáveis?', 'a' => 'Sim. São voltados para a prática empresarial.'],
            ['q' => 'Posso levar minha equipe?', 'a' => 'Sim, conforme disponibilidade.'],
            ['q' => 'Tem certificação?', 'a' => 'Em muitos casos, sim.'],
        ],
        'cta_title' => 'Capacite-se e<br>faça sua equipe crescer',
        'cta_text' => 'Acesse todos os treinamentos como associado.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1920&q=80',
    ],
    'midia-divulgacao' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Valorização e fortalecimento da sua empresa através dos canais institucionais da CDL.',
        'intro'    => '<p>A CDL Anápolis utiliza suas redes sociais, site e canais institucionais como ferramenta de visibilidade para empresas associadas. Um benefício que associa sua marca a uma entidade reconhecida e respeitada, ampliando o alcance local e gerando oportunidades comerciais.</p><p>Divulgação sem custo adicional, seguindo as diretrizes da entidade, com foco em fortalecer o reconhecimento do seu negócio no ecossistema empresarial de Anápolis.</p>',
        'highlights' => [
            'Divulgação no site institucional',
            'Presença nas redes sociais',
            'Maior alcance local',
            'Fortalecimento de marca',
            'Associação a uma marca forte',
            'Geração de oportunidades comerciais',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=800&q=80',
        'features' => [
            ['title' => 'Mais visibilidade', 'description' => 'Divulgue sua marca em canais institucionais com credibilidade no mercado.'],
            ['title' => 'Presença digital', 'description' => 'Amplie o alcance da sua empresa por meio das redes sociais da CDL.'],
            ['title' => 'Marca forte', 'description' => 'Posicione seu negócio ao lado de uma entidade reconhecida e respeitada.'],
            ['title' => 'Alcance local', 'description' => 'Conecte-se com o público da cidade e região de forma mais estratégica.'],
            ['title' => 'Divulgação de ações', 'description' => 'Apresente produtos, serviços e iniciativas da sua empresa.'],
            ['title' => 'Oportunidades comerciais', 'description' => 'Aumente as chances de ser visto, lembrado e escolhido pelo mercado.'],
        ],
        'faqs' => [
            ['q' => 'Minha empresa pode ser divulgada?', 'a' => 'Sim, conforme ações da CDL.'],
            ['q' => 'Tem custo para divulgação?', 'a' => 'Não para associados.'],
            ['q' => 'Posso divulgar promoções?', 'a' => 'Sim, seguindo diretrizes.'],
            ['q' => 'A divulgação gera retorno?', 'a' => 'Sim, aumenta visibilidade e reconhecimento.'],
        ],
        'cta_title' => 'Amplie a visibilidade<br>do seu negócio',
        'cta_text' => 'Seja associado e divulgue sua marca com a CDL.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=1920&q=80',
    ],
    'recrutamento' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Apoio ágil e gratuito para encontrar profissionais qualificados para a sua empresa.',
        'intro'    => '<p>Encontrar bons profissionais é um dos grandes desafios da gestão. A CDL Anápolis atua como facilitadora no processo de recrutamento: divulgação de vagas, triagem inicial de candidatos e agilidade na contratação — tudo gratuito para associados.</p><p>O associado ganha tempo, reduz custos com processos de RH e aumenta a assertividade na hora de contratar, focando no que importa: o core do negócio.</p>',
        'highlights' => [
            'Divulgação de vagas',
            'Triagem inicial de candidatos',
            'Agilidade no processo',
            'Serviço gratuito para associados',
            'Candidatos qualificados',
            'Economia com processos de RH',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=800&q=80',
        'features' => [
            ['title' => 'Agilidade na contratação', 'description' => 'Receba candidatos de forma mais rápida, reduzindo o tempo de preenchimento de vagas.'],
            ['title' => 'Candidatos qualificados', 'description' => 'Tenha contato com perfis alinhados às necessidades da sua empresa.'],
            ['title' => 'Economia em RH', 'description' => 'Reduza custos com divulgação e triagem de candidatos.'],
            ['title' => 'Processo simplificado', 'description' => 'Simplifique a etapa inicial da contratação com apoio da CDL.'],
            ['title' => 'Mais assertividade', 'description' => 'Aumente as chances de encontrar o profissional ideal para a vaga.'],
            ['title' => 'Foco no core do negócio', 'description' => 'Ganhe tempo para se dedicar à gestão enquanto o processo é facilitado.'],
        ],
        'faqs' => [
            ['q' => 'A CDL faz o processo completo?', 'a' => 'Realiza a triagem inicial de candidatos.'],
            ['q' => 'Recebo candidatos qualificados?', 'a' => 'Sim, conforme o perfil da vaga.'],
            ['q' => 'O processo é rápido?', 'a' => 'Sim, mais ágil que métodos tradicionais.'],
            ['q' => 'Tem custo?', 'a' => 'Não para associados.'],
        ],
        'cta_title' => 'Precisa contratar<br>bons profissionais?',
        'cta_text' => 'Conte com a CDL para acelerar seu processo seletivo.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=1920&q=80',
    ],
    'exames-admissionais' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Exames obrigatórios com praticidade, agilidade e economia para o associado.',
        'intro'    => '<p>A CDL Anápolis oferece suporte completo para a realização dos exames admissionais, demissionais e periódicos exigidos pela legislação trabalhista. Atendimento ágil, organizado e sem custos adicionais para associados.</p><p>Cumprimento das obrigações legais sem burocracia, com mais segurança para empresa e colaborador e menos impacto no fluxo operacional do negócio.</p>',
        'highlights' => [
            'Exames admissionais',
            'Exames demissionais',
            'Exames periódicos',
            'Atendimento ágil',
            'Cumprimento das obrigações legais',
            'Redução de custos operacionais',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1504813184591-01572f98c85f?w=800&q=80',
        'features' => [
            ['title' => 'Obrigações em dia', 'description' => 'Atenda às exigências trabalhistas com mais segurança e organização.'],
            ['title' => 'Agilidade nos processos', 'description' => 'Realize exames de forma rápida, sem comprometer o fluxo da empresa.'],
            ['title' => 'Redução de custos', 'description' => 'Evite gastos adicionais com clínicas e serviços externos.'],
            ['title' => 'Rotina organizada', 'description' => 'Estruture melhor os processos de admissão e desligamento.'],
            ['title' => 'Segurança para todos', 'description' => 'Garanta que todos os procedimentos estejam devidamente realizados.'],
            ['title' => 'Praticidade empresarial', 'description' => 'Centralize esse processo com mais facilidade e menos burocracia.'],
        ],
        'faqs' => [
            ['q' => 'Esses exames são obrigatórios?', 'a' => 'Sim, conforme legislação trabalhista.'],
            ['q' => 'O atendimento é rápido?', 'a' => 'Sim, com foco em agilidade.'],
            ['q' => 'Inclui exames periódicos?', 'a' => 'Sim.'],
            ['q' => 'Tem custo?', 'a' => 'Não para associados.'],
        ],
        'cta_title' => 'Exames admissionais<br>sem burocracia',
        'cta_text' => 'Seja associado e tenha suporte para cumprir obrigações legais.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1504813184591-01572f98c85f?w=1920&q=80',
    ],
    'gestao-esocial' => [
        'tag'      => 'Benefício',
        'subtitle' => 'Gestão completa do eSocial com segurança, eficiência e conformidade legal.',
        'intro'    => '<p>A gestão do eSocial exige atenção constante às obrigações legais e pode consumir muito tempo da rotina empresarial. A CDL Anápolis oferece suporte completo para que o associado cumpra suas responsabilidades com segurança e eficiência.</p><p>Envio correto das informações, redução de erros, prevenção de multas e mais tempo para focar no negócio — tudo incluso como benefício.</p>',
        'highlights' => [
            'Gestão completa do sistema',
            'Redução de erros',
            'Economia operacional',
            'Prevenção de multas e penalidades',
            'Conformidade com a legislação',
            'Praticidade no dia a dia',
        ],
        'highlight_img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&q=80',
        'features' => [
            ['title' => 'Menos burocracia', 'description' => 'Deixe a gestão do eSocial com quem entende, evitando processos complexos.'],
            ['title' => 'Conformidade legal', 'description' => 'Mantenha sua empresa alinhada às exigências legais sem risco de falhas.'],
            ['title' => 'Prevenção de multas', 'description' => 'Evite erros que podem gerar custos desnecessários para o negócio.'],
            ['title' => 'Informações organizadas', 'description' => 'Tenha controle sobre dados e envios obrigatórios.'],
            ['title' => 'Mais tempo para o negócio', 'description' => 'Foque na gestão enquanto a parte operacional é facilitada.'],
            ['title' => 'Segurança de dados', 'description' => 'Tenha mais tranquilidade com o envio correto das informações.'],
        ],
        'faqs' => [
            ['q' => 'A CDL faz toda a gestão?', 'a' => 'Sim, incluindo envio e organização das informações.'],
            ['q' => 'Evita multas?', 'a' => 'Sim, reduz riscos de erros e atrasos.'],
            ['q' => 'Serve para qualquer empresa?', 'a' => 'Sim.'],
            ['q' => 'Tem custo adicional?', 'a' => 'Não para associados.'],
        ],
        'cta_title' => 'Gestão do eSocial<br>sem dor de cabeça',
        'cta_text' => 'Seja associado e cumpra as obrigações com segurança.',
        'cta_link' => '/associe-se/',
        'hero_img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80',
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
    'planejamento-estrategico' => 'Planejamento Estratégico',
    'assessoria-contabil'      => 'Assessoria Contábil',
    'cdl-assessoria-juridica'  => 'Assessoria Jurídica',
    'apoio-mei'                => 'Apoio ao MEI',
    'cdl-saude'                => 'CDL Saúde',
    'rede-de-descontos'        => 'Rede de Descontos',
    'espacos-corporativos'     => 'Espaços Corporativos',
    'eventos-corporativos'     => 'Eventos Corporativos',
    'sede-campestre'           => 'Espaço de Lazer',
    'nucleos-empresariais'     => 'Núcleos Empresariais',
    'treinamentos'             => 'Treinamentos',
    'midia-divulgacao'         => 'Mídia e Divulgação',
    'recrutamento'             => 'Recrutamento',
    'exames-admissionais'      => 'Exames Admissionais',
    'gestao-esocial'           => 'Gestão E-social',
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
                        <img src="<?php echo esc_url($feat['icon']['url']); ?>" alt="" style="width:28px;height:28px" loading="lazy" decoding="async">
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
