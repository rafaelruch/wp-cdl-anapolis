<?php
/**
 * ACF Seeds — popula os field groups das páginas internas com o
 * conteúdo institucional atual, para que o cliente abra o admin e
 * encontre tudo preenchido, pronto pra editar.
 *
 * Estratégia:
 *  - Hook acf/init, prioridade default.
 *  - Cada seed roda apenas se a flag cdl_seed_{nome}_vN não existe.
 *  - Bumpe vN nos const map para repropagar em sites já atualizados.
 *
 * Imagens não são populadas (cliente sobe via Media Library quando
 * quiser trocar). Campos vazios continuam caindo no fallback PHP do
 * template.
 */

if (!defined('ABSPATH')) exit;

// =====================================================================
// HELPERS
// =====================================================================
function cdl_seed_run($flag_name, callable $callback) {
    if (!function_exists('update_field')) return;
    if (get_option($flag_name)) return;
    $callback();
    update_option($flag_name, true);
}

// =====================================================================
// CDL JOVEM
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_cdl_jovem_v1', function () {
        $page = get_page_by_path('cdl-jovem');
        if (!$page) return;

        update_field('cdl_jovem_hero_tag',      'Institucional', $page->ID);
        update_field('cdl_jovem_hero_title',    "O Futuro do Comércio\nComeça Aqui", $page->ID);
        update_field('cdl_jovem_hero_subtitle', 'A plataforma de crescimento pessoal e profissional para jovens empreendedores e líderes empresariais.', $page->ID);

        update_field('cdl_jovem_stats', [
            ['stat_numero' => '6',    'stat_label' => 'Diretores'],
            ['stat_numero' => 'FCDL', 'stat_label' => 'Representação estadual'],
            ['stat_numero' => 'CNDL', 'stat_label' => 'Representação nacional'],
        ], $page->ID);

        update_field('cdl_jovem_sobre_tag',   'Quem somos', $page->ID);
        update_field('cdl_jovem_sobre_title', "Mais do que uma\ncomunidade jovem", $page->ID);
        update_field('cdl_jovem_sobre_text',  '<p>A CDL Jovem Anápolis opera sob a Câmara de Dirigentes Lojistas, fornecendo suporte, recursos e oportunidades para jovens empreendedores transformarem ideias em negócios de sucesso.</p><p>É uma plataforma de crescimento pessoal e profissional, projetada para desenvolver jovens empresários lojistas com networking, capacitação e mentoria de profissionais experientes.</p>', $page->ID);

        update_field('cdl_jovem_valores_tag',   'Nossos valores', $page->ID);
        update_field('cdl_jovem_valores_title', 'O que nos move', $page->ID);
        update_field('cdl_jovem_valores', [
            ['titulo' => 'Paixão',          'descricao' => 'Dedicação com amor, alegria e satisfação em direção aos nossos ideais. Acreditamos no poder do entusiasmo para transformar negócios.'],
            ['titulo' => 'Respeito',        'descricao' => 'Preocupação com as pessoas e o bem-estar comum. Honestidade, transparência e lealdade em todas as relações.'],
            ['titulo' => 'Profissionalismo','descricao' => 'Disciplina, organização, comprometimento e responsabilidade na busca constante pela excelência.'],
        ], $page->ID);

        update_field('cdl_jovem_oferecimentos_tag',   'Oportunidades', $page->ID);
        update_field('cdl_jovem_oferecimentos_title', 'O que o CDL Jovem oferece', $page->ID);
        update_field('cdl_jovem_oferecimentos', [
            ['titulo' => 'Networking',        'descricao' => 'Conecte-se com jovens empreendedores e líderes de mercado.'],
            ['titulo' => 'Capacitação',       'descricao' => 'Workshops, palestras e cursos de desenvolvimento pessoal e profissional.'],
            ['titulo' => 'Mentoria',          'descricao' => 'Orientação de empresários experientes que compartilham conhecimento.'],
            ['titulo' => 'Eventos Exclusivos','descricao' => 'Feiras, rodadas de negócios e visitas técnicas para expandir sua rede.'],
            ['titulo' => 'Representação',     'descricao' => 'Defesa dos interesses dos jovens empreendedores junto ao poder público.'],
        ], $page->ID);

        update_field('cdl_jovem_diretoria_tag',   'Quem lidera', $page->ID);
        update_field('cdl_jovem_diretoria_title', 'Diretoria CDL Jovem', $page->ID);

        update_field('cdl_jovem_missao_tag',   'Missão', $page->ID);
        update_field('cdl_jovem_missao_texto', 'Fortalecer o Movimento Jovem Lojista, criando e desenvolvendo CDLs Jovens para formar futuros líderes do comércio de Anápolis e de todo o Brasil.', $page->ID);

        update_field('cdl_jovem_cta_title',    "Quer fazer parte\ndo CDL Jovem?", $page->ID);
        update_field('cdl_jovem_cta_subtitle', 'Transforme suas ideias em negócios de sucesso com a nossa comunidade.', $page->ID);
        update_field('cdl_jovem_cta_btn_text', 'Quero participar', $page->ID);
        update_field('cdl_jovem_cta_btn_link', '/associe-se/', $page->ID);
    });
});

// =====================================================================
// CDL MULHER
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_cdl_mulher_v1', function () {
        $page = get_page_by_path('cdl-mulher');
        if (!$page) return;

        update_field('cdl_mulher_hero_tag',      'Institucional', $page->ID);
        update_field('cdl_mulher_hero_title',    "Empoderando Mulheres,\nFortalecendo Negócios", $page->ID);
        update_field('cdl_mulher_hero_subtitle', 'O núcleo da CDL Anápolis dedicado ao desenvolvimento e protagonismo das mulheres empreendedoras.', $page->ID);

        update_field('cdl_mulher_stats', [
            ['stat_numero' => '7',    'stat_label' => 'Diretoras'],
            ['stat_numero' => '12',   'stat_label' => 'Eventos por ano'],
            ['stat_numero' => '100+', 'stat_label' => 'Participantes ativas'],
        ], $page->ID);

        update_field('cdl_mulher_sobre_tag',   'Quem somos', $page->ID);
        update_field('cdl_mulher_sobre_title', "Uma plataforma de\ncrescimento e liderança", $page->ID);
        update_field('cdl_mulher_sobre_text',  '<p>O CDL Mulher Anápolis é um programa dedicado a desenvolver todo o potencial das mulheres empreendedoras. A iniciativa visa identificar, capacitar e desenvolver mulheres lojistas e líderes de diversos setores para papéis de destaque dentro da comunidade, dos negócios e da sociedade.</p><p>Através de eventos mensais com palestras, workshops e oportunidades de networking, o programa enfatiza o espírito comunitário, o desenvolvimento de liderança e a ética profissional.</p>', $page->ID);

        update_field('cdl_mulher_oferecimentos_tag',   'Oportunidades', $page->ID);
        update_field('cdl_mulher_oferecimentos_title', 'O que o CDL Mulher oferece', $page->ID);
        update_field('cdl_mulher_oferecimentos_sub',   'Desenvolvimento profissional completo para a mulher empreendedora.', $page->ID);
        update_field('cdl_mulher_oferecimentos', [
            ['titulo' => 'Networking',        'descricao' => 'Conecte-se com outras empreendedoras, compartilhe experiências e aprenda com líderes de mercado em encontros mensais.'],
            ['titulo' => 'Capacitação',       'descricao' => 'Workshops, palestras e cursos focados em gestão, finanças, marketing digital e desenvolvimento de liderança feminina.'],
            ['titulo' => 'Mentoria',          'descricao' => 'Suporte de empresárias experientes que compartilham conhecimento, orientação prática e vivências de mercado.'],
            ['titulo' => 'Eventos Exclusivos','descricao' => 'Feiras, rodadas de negócios, visitas técnicas e encontros para expansão da sua rede de contatos.'],
            ['titulo' => 'Ação Social',       'descricao' => 'Projetos de capacitação profissional e sustentabilidade que impactam positivamente a vida das mulheres da comunidade.'],
            ['titulo' => 'Representação',     'descricao' => 'Defesa dos interesses das mulheres empreendedoras junto a autoridades públicas, FCDL e CNDL.'],
        ], $page->ID);

        update_field('cdl_mulher_diretoria_tag',   'Quem lidera', $page->ID);
        update_field('cdl_mulher_diretoria_title', 'Diretoria CDL Mulher', $page->ID);

        update_field('cdl_mulher_quote_texto', 'O movimento CDL Mulher Anápolis está transformando o cenário empresarial da nossa cidade, uma empreendedora de cada vez.', $page->ID);
        update_field('cdl_mulher_quote_autor', '— CDL Mulher Anápolis', $page->ID);

        update_field('cdl_mulher_cta_title',    "Quer fazer parte\ndo CDL Mulher?", $page->ID);
        update_field('cdl_mulher_cta_subtitle', 'Junte-se às mulheres empreendedoras que estão transformando o comércio de Anápolis.', $page->ID);
        update_field('cdl_mulher_cta_btn_text', 'Quero participar', $page->ID);
        update_field('cdl_mulher_cta_btn_link', '/associe-se/', $page->ID);
    });
});

// =====================================================================
// MÉRITO EMPRESARIAL
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_merito_v1', function () {
        $page = get_page_by_path('merito-empresarial');
        if (!$page) return;

        update_field('merito_hero_tag',      'Institucional', $page->ID);
        update_field('merito_hero_title',    "O Oscar do Comércio\nde Anápolis", $page->ID);
        update_field('merito_hero_subtitle', 'A maior e mais tradicional premiação do setor comercial da cidade, promovida pela CDL Anápolis.', $page->ID);

        update_field('merito_stats', [
            ['stat_numero' => '20 anos', 'stat_label' => 'de tradição'],
            ['stat_numero' => '1,7M+',   'stat_label' => 'avaliações realizadas'],
            ['stat_numero' => '★',       'stat_label' => 'Reconhecimento da excelência'],
        ], $page->ID);

        update_field('merito_oque_tag',   'O que é', $page->ID);
        update_field('merito_oque_title', "O reconhecimento que\na cidade constrói", $page->ID);
        update_field('merito_oque_text',  '<p>O Mérito Empresarial é a principal premiação do comércio de Anápolis — uma iniciativa da CDL Anápolis que reconhece e motiva empreendedores de diversos segmentos a manter a excelência na prestação de serviços.</p><p>A partir de 2019, o programa adotou transparência e participação comunitária através do aplicativo CDL Mais Você, permitindo que consumidores avaliem os estabelecimentos da cidade. São mais de 1,7 milhão de avaliações qualificadas, auxiliando os empresários a entender as necessidades dos clientes e melhorar as experiências de compra.</p>', $page->ID);

        update_field('merito_pilares_tag',   'Como funciona', $page->ID);
        update_field('merito_pilares_title', 'Os pilares da premiação', $page->ID);
        update_field('merito_pilares_sub',   'Do propósito à celebração, cada etapa fortalece o comércio local.', $page->ID);
        update_field('merito_pilares', [
            ['titulo' => 'Propósito',          'descricao' => 'Fortalecer a imagem dos estabelecimentos locais dentro da comunidade anapolina, homenageando empresas que demonstram qualidade excepcional de atendimento e incentivando a melhoria contínua.'],
            ['titulo' => 'Sistema de Avaliação','descricao' => 'Através do app CDL Mais Você, consumidores avaliam os estabelecimentos da cidade. São mais de 1,7 milhão de avaliações construindo o ranking das melhores empresas — a voz da comunidade decide.'],
            ['titulo' => 'Evento de Gala',     'descricao' => 'A cada ano, um evento formal de gala reúne figuras importantes da comunidade — liderança da CDL, representantes da indústria, autoridades e membros da organização — para celebrar a excelência.'],
        ], $page->ID);

        update_field('merito_categorias_tag',   'Categorias', $page->ID);
        update_field('merito_categorias_title', 'Reconhecimentos da premiação', $page->ID);
        update_field('merito_categorias_sub',   'Diversas categorias celebram a excelência em cada segmento.', $page->ID);
        update_field('merito_categorias', [
            ['titulo' => 'Avaliação Popular',         'descricao' => 'Mais de 1,7 milhão de avaliações via app CDL Mais Você constroem o ranking das melhores empresas da cidade.'],
            ['titulo' => 'Excelência no Atendimento', 'descricao' => 'Reconhecimento às empresas que se destacam pela qualidade no atendimento ao consumidor.'],
            ['titulo' => 'Destaque Comércio',         'descricao' => 'Premiação para a empresa do comércio que apresentou excelência em gestão e experiência do cliente.'],
            ['titulo' => 'Destaque Serviços',         'descricao' => 'Reconhecimento ao prestador de serviço que mais contribuiu com a comunidade anapolina.'],
            ['titulo' => 'Jovem Empreendedor',        'descricao' => 'Premiação para o jovem que se destacou pela inovação e pelo empreendedorismo na cidade.'],
            ['titulo' => 'Mulher Empreendedora',      'descricao' => 'Reconhecimento à mulher que se destacou no cenário empresarial de Anápolis.'],
        ], $page->ID);

        update_field('merito_quote_texto', 'O Mérito Empresarial celebra o comprometimento com qualidade, inovação e atendimento ao cliente. Mais que um prêmio, é o reconhecimento que a própria cidade constrói.', $page->ID);
        update_field('merito_quote_autor', '— CDL Anápolis, 20 anos de Mérito Empresarial', $page->ID);

        update_field('merito_cta_title',    "Quer indicar um\nempreendedor destaque?", $page->ID);
        update_field('merito_cta_subtitle', 'Fale com a CDL Anápolis e indique quem merece ser reconhecido.', $page->ID);
        update_field('merito_cta_btn_text', 'Fale conosco', $page->ID);
        update_field('merito_cta_btn_link', '/fale-conosco/', $page->ID);
    });
});

// =====================================================================
// LGPD
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_lgpd_v1', function () {
        $page = get_page_by_path('lgpd');
        if (!$page) return;

        update_field('lgpd_hero_tag',      'Institucional', $page->ID);
        update_field('lgpd_hero_title',    "Política de Privacidade\ne LGPD", $page->ID);
        update_field('lgpd_hero_subtitle', 'Transparência e proteção de dados pessoais em conformidade com a Lei Geral de Proteção de Dados.', $page->ID);

        update_field('lgpd_strip_entidade_titulo', 'CDL Anápolis', $page->ID);
        update_field('lgpd_strip_entidade_label',  'CNPJ 01.064.674/0001-12', $page->ID);
        update_field('lgpd_strip_lei_titulo',      'Lei nº 13.709/2018', $page->ID);
        update_field('lgpd_strip_lei_label',       'LGPD — Lei Geral de Proteção de Dados', $page->ID);
        update_field('lgpd_strip_dpo_titulo',      'Dra. Louise Ramiro', $page->ID);
        update_field('lgpd_strip_dpo_label',       'Encarregada de Proteção de Dados (DPO)', $page->ID);

        update_field('lgpd_intro_html', '<p>A CDL Anápolis (Câmara de Dirigentes Lojistas de Anápolis), com sede na Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030, está comprometida com a proteção dos dados pessoais dos seus membros, parceiros, colaboradores e visitantes, em conformidade com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018 — LGPD).</p>', $page->ID);

        update_field('lgpd_policy_tag',      'Política de Privacidade', $page->ID);
        update_field('lgpd_policy_title',    'Como tratamos seus dados', $page->ID);
        update_field('lgpd_policy_subtitle', 'Conheça cada aspecto da nossa política de proteção de dados pessoais.', $page->ID);
        // lgpd_corpo_html fica vazio de propósito — os cards visuais
        // ficam como fallback. Cliente preenche o WYSIWYG só se quiser
        // substituir os cards padrão por um texto contínuo.

        update_field('lgpd_dpo_title',    'Encarregada de Dados', $page->ID);
        update_field('lgpd_dpo_subtitle', 'Para exercer seus direitos ou esclarecer dúvidas sobre o tratamento de dados pessoais.', $page->ID);
        update_field('lgpd_dpo_nome',     'Advogada Dra. Louise Ramiro da Costa', $page->ID);
        update_field('lgpd_dpo_email',    'lgpd@cdlanapolis.com.br', $page->ID);
        update_field('lgpd_dpo_telefone', '(62) 3328-0008', $page->ID);
        update_field('lgpd_dpo_endereco', 'Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030', $page->ID);

        update_field('lgpd_versao_texto', 'Versão da política: 01/08/2021 — Esta política pode ser atualizada periodicamente.', $page->ID);

        update_field('lgpd_cta_title',    "Dúvidas sobre\nproteção de dados?", $page->ID);
        update_field('lgpd_cta_subtitle', 'Entre em contato com nosso Encarregado de Proteção de Dados.', $page->ID);
        update_field('lgpd_cta_btn_text', 'Fale conosco', $page->ID);
        update_field('lgpd_cta_btn_link', '/fale-conosco/', $page->ID);
    });
});

// =====================================================================
// SECTIONS EXTRAS DA HOME (Options Page)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_home_sections_extra_v1', function () {
        update_field('marquee_items', [
            ['texto' => 'SPC Brasil'],
            ['texto' => 'Assessoria Jurídica'],
            ['texto' => 'CDL Saúde'],
            ['texto' => 'Certificado Digital'],
            ['texto' => 'CDL Celular'],
            ['texto' => 'Balcão do MEI'],
            ['texto' => 'NF-e / NFC-e'],
            ['texto' => 'Central de Cobranças'],
        ], 'option');

        update_field('noticias_tag',       'Eventos e Notícias', 'option');
        update_field('noticias_title',     'Notícias CDL', 'option');
        update_field('noticias_desc',      'Fique por dentro do que acontece no comércio de Anápolis.', 'option');
        update_field('noticias_link_text', 'Ver todas as notícias', 'option');

        update_field('depoimentos_tag',   'O que dizem nossos associados', 'option');
        update_field('depoimentos_title', 'Depoimentos', 'option');
    });
});

// =====================================================================
// SOBRE NÓS (não foi reescrito mas tinha labels antigas — agora popula)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_sobre_nos_v1', function () {
        $page = get_page_by_path('sobre-nos');
        if (!$page) return;

        update_field('sobre_hero_title',    'Um Legado de Realizações', $page->ID);
        update_field('sobre_hero_subtitle', 'Uma casa acolhedora onde lojistas encontram apoio, ferramentas e conhecimento para prosperar. Uma parceira estratégica impulsionando o sucesso dos negócios.', $page->ID);

        update_field('sobre_historia_title', 'Nossa História', $page->ID);
        update_field('sobre_historia_text',  '<p>Fundada em 20 de setembro de 1962, a CDL Anápolis tem suas raízes em um grupo visionário de lojistas que estabeleceu o Serviço de Proteção ao Crédito (SPC). A fusão com o Clube de Diretores Lojistas, em 11 de maio de 1981, criou uma instituição unificada e mais forte.</p><p>Em 21 de setembro de 1994, a mudança de nome para Câmara de Dirigentes Lojistas refletiu a expansão institucional e a importância crescente da entidade. Hoje, com mais de 2.000 empreendedores, somos afiliados à FCDL (Federação de Goiás) e à CNDL (Confederação Nacional).</p><p>Somos mais do que uma entidade de classe — somos uma comunidade de empreendedores que acredita no poder da colaboração para transformar o comércio de Anápolis.</p>', $page->ID);

        update_field('sobre_missao',  'Defender os interesses dos lojistas e promover a prosperidade, fortalecendo o comércio local ao fornecer as melhores ferramentas e representação, contribuindo para o desenvolvimento econômico regional.', $page->ID);
        update_field('sobre_visao',   'Reconhecimento como a principal referência no apoio ao desenvolvimento dos negócios locais, elevando a competitividade e o alcance dos lojistas que fazem parte da comunidade.', $page->ID);
        update_field('sobre_valores', 'Comprometimento, Inovação, Excelência e Ética.', $page->ID);
    });
});
