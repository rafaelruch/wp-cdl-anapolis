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
// LGPD — Política de Privacidade completa (texto oficial do cliente)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_lgpd_v2', function () {
        $page = get_page_by_path('lgpd');
        if (!$page) return;

        update_field('lgpd_hero_tag',      'Institucional', $page->ID);
        update_field('lgpd_hero_title',    "Política de Privacidade\ne Proteção de Dados", $page->ID);
        update_field('lgpd_hero_subtitle', 'A CDL Anápolis respeita sua privacidade e trata seus dados pessoais em conformidade com a Lei Geral de Proteção de Dados (LGPD — Lei nº 13.709/2018).', $page->ID);

        update_field('lgpd_strip_entidade_titulo', 'CDL Anápolis', $page->ID);
        update_field('lgpd_strip_entidade_label',  'CNPJ 01.064.674/0001-12', $page->ID);
        update_field('lgpd_strip_lei_titulo',      'Lei nº 13.709/2018', $page->ID);
        update_field('lgpd_strip_lei_label',       'LGPD — Lei Geral de Proteção de Dados', $page->ID);
        update_field('lgpd_strip_dpo_titulo',      'lgpd@cdlanapolis.com.br', $page->ID);
        update_field('lgpd_strip_dpo_label',       'Canal oficial de atendimento LGPD', $page->ID);

        update_field('lgpd_intro_html', '<p>A <strong>Câmara de Dirigentes Lojistas de Anápolis — CDL Anápolis</strong>, pessoa jurídica de direito privado, sem fins lucrativos, inscrita no CNPJ nº 01.064.674/0001-12, com sede na Rua Conde Afonso Celso, nº 25, Centro, Anápolis/GO, CEP 75020-080, respeita a sua privacidade e está comprometida com a proteção dos dados pessoais tratados em suas atividades.</p><p>Esta Política de Privacidade estabelece as diretrizes para coleta, utilização, armazenamento, compartilhamento e proteção dos dados pessoais tratados pela CDL Anápolis, em conformidade com a Lei nº 13.709/2018 (Lei Geral de Proteção de Dados Pessoais — LGPD), Marco Civil da Internet e demais normas aplicáveis.</p>', $page->ID);

        update_field('lgpd_policy_tag',      'Política completa', $page->ID);
        update_field('lgpd_policy_title',    'Política de Privacidade e Proteção de Dados', $page->ID);
        update_field('lgpd_policy_subtitle', 'Versão completa — última atualização em junho de 2026.', $page->ID);

        // Texto completo das 13 seções do PDF, em HTML estruturado pro WYSIWYG.
        update_field('lgpd_corpo_html', cdl_seed_lgpd_corpo_html(), $page->ID);

        update_field('lgpd_dpo_title',    'Canal de Atendimento LGPD', $page->ID);
        update_field('lgpd_dpo_subtitle', 'As solicitações relacionadas à proteção de dados podem ser encaminhadas para o canal abaixo.', $page->ID);
        update_field('lgpd_dpo_nome',     'CDL Anápolis — Encarregado(a) de Proteção de Dados', $page->ID);
        update_field('lgpd_dpo_email',    'lgpd@cdlanapolis.com.br', $page->ID);
        update_field('lgpd_dpo_telefone', '(62) 3328-0008', $page->ID);
        update_field('lgpd_dpo_endereco', 'Rua Conde Afonso Celso, 43 — Centro, Anápolis — GO, CEP 75025-030', $page->ID);

        update_field('lgpd_versao_texto', 'Última atualização: junho de 2026 — Esta política pode ser alterada periodicamente para adequação às exigências legais, regulatórias ou operacionais.', $page->ID);

        update_field('lgpd_cta_title',    "Dúvidas sobre\nproteção de dados?", $page->ID);
        update_field('lgpd_cta_subtitle', 'Entre em contato com o canal oficial LGPD da CDL Anápolis.', $page->ID);
        update_field('lgpd_cta_btn_text', 'Fale conosco', $page->ID);
        update_field('lgpd_cta_btn_link', '/fale-conosco/', $page->ID);
    });
});

// Texto completo da Política de Privacidade. Separado em função pra
// não poluir o seed e facilitar futura edição.
function cdl_seed_lgpd_corpo_html() {
    return <<<'HTML'
<h2>1. A quem esta Política se aplica</h2>
<p>Esta Política aplica-se aos:</p>
<ul>
<li>Visitantes do site da CDL Anápolis;</li>
<li>Associados e seus representantes;</li>
<li>Participantes de eventos, cursos e treinamentos;</li>
<li>Fornecedores e parceiros comerciais;</li>
<li>Candidatos a vagas de emprego;</li>
<li>Usuários dos serviços disponibilizados pela CDL Anápolis;</li>
<li>Demais titulares de dados que mantenham relacionamento com a entidade.</li>
</ul>

<h2>2. Dados pessoais coletados</h2>
<p>A CDL Anápolis poderá coletar os seguintes dados pessoais:</p>
<h3>Dados de Identificação</h3>
<ul>
<li>Nome completo;</li>
<li>CPF;</li>
<li>RG;</li>
<li>Data de nascimento;</li>
<li>Cargo ou função;</li>
<li>Empresa vinculada.</li>
</ul>
<h3>Dados de Contato</h3>
<ul>
<li>E-mail;</li>
<li>Telefone;</li>
<li>Endereço.</li>
</ul>
<h3>Dados de Navegação</h3>
<ul>
<li>Endereço IP;</li>
<li>Data e hora de acesso;</li>
<li>Navegador utilizado;</li>
<li>Sistema operacional;</li>
<li>Dispositivo utilizado;</li>
<li>Cookies e tecnologias semelhantes.</li>
</ul>
<h3>Dados Relacionados aos Serviços</h3>
<ul>
<li>Informações fornecidas em formulários;</li>
<li>Dados necessários para adesão a serviços;</li>
<li>Histórico de participação em eventos e cursos;</li>
<li>Informações relacionadas aos serviços de proteção ao crédito, quando aplicável.</li>
</ul>

<h2>3. Finalidades do tratamento</h2>
<p>Os dados pessoais poderão ser tratados para:</p>
<ul>
<li>Atendimento de solicitações e contatos;</li>
<li>Gestão do relacionamento com associados;</li>
<li>Prestação dos serviços oferecidos pela CDL Anápolis;</li>
<li>Organização de eventos, cursos e campanhas;</li>
<li>Emissão de documentos e certificados;</li>
<li>Comunicação institucional;</li>
<li>Cumprimento de obrigações legais e regulatórias;</li>
<li>Exercício regular de direitos;</li>
<li>Segurança da informação;</li>
<li>Prevenção a fraudes;</li>
<li>Melhoria da experiência de navegação;</li>
<li>Atendimento às solicitações dos titulares.</li>
</ul>

<h2>4. Bases legais do tratamento</h2>
<p>A CDL Anápolis realizará o tratamento de dados pessoais com fundamento nas hipóteses previstas na LGPD, especialmente:</p>
<ul>
<li>Consentimento do titular;</li>
<li>Cumprimento de obrigação legal ou regulatória;</li>
<li>Execução de contrato;</li>
<li>Exercício regular de direitos;</li>
<li>Legítimo interesse;</li>
<li>Proteção ao crédito, quando aplicável.</li>
</ul>

<h2>5. Compartilhamento de dados</h2>
<p>Os dados pessoais poderão ser compartilhados apenas quando necessário para:</p>
<ul>
<li>Prestadores de serviços contratados pela CDL Anápolis;</li>
<li>Empresas responsáveis pela hospedagem e manutenção dos sistemas;</li>
<li>Instituições integrantes do Sistema CNDL/CDL, quando necessário para execução dos serviços;</li>
<li>Órgãos públicos e autoridades competentes;</li>
<li>Parceiros envolvidos na execução de projetos, eventos ou benefícios oferecidos aos associados.</li>
</ul>
<p><strong>A CDL Anápolis não comercializa dados pessoais.</strong></p>

<h2>6. Cookies e tecnologias de rastreamento</h2>
<p>O site poderá utilizar cookies necessários, estatísticos, funcionais e de marketing. Os cookies são utilizados para:</p>
<ul>
<li>Garantir o funcionamento do portal;</li>
<li>Melhorar a experiência do usuário;</li>
<li>Produzir estatísticas de acesso;</li>
<li>Personalizar conteúdos e serviços.</li>
</ul>
<p>O usuário poderá gerenciar suas preferências por meio do banner de consentimento disponibilizado no portal. Para mais informações, consulte a nossa <a href="/politica-de-cookies/">Política de Cookies</a>.</p>

<h2>7. Segurança da informação</h2>
<p>A CDL Anápolis adota medidas técnicas e administrativas destinadas à proteção dos dados pessoais, incluindo:</p>
<ul>
<li>Controle de acesso aos sistemas;</li>
<li>Monitoramento de ambientes tecnológicos;</li>
<li>Políticas internas de segurança;</li>
<li>Gestão de vulnerabilidades;</li>
<li>Backups periódicos;</li>
<li>Capacitação dos colaboradores.</li>
</ul>

<h2>8. Transferência internacional de dados</h2>
<p>Alguns dados poderão ser armazenados em servidores localizados no exterior por provedores de tecnologia contratados pela CDL Anápolis. Nesses casos, serão observados os requisitos previstos na LGPD e regulamentações da Autoridade Nacional de Proteção de Dados — ANPD.</p>

<h2>9. Prazo de retenção</h2>
<p>Os dados pessoais serão armazenados pelo período necessário para:</p>
<ul>
<li>Cumprimento das finalidades informadas;</li>
<li>Atendimento de obrigações legais;</li>
<li>Exercício regular de direitos;</li>
<li>Cumprimento de exigências regulatórias.</li>
</ul>
<p>Após o encerramento do tratamento, os dados serão eliminados, anonimizados ou armazenados nos termos permitidos pela legislação.</p>

<h2>10. Direitos dos titulares</h2>
<p>Nos termos do artigo 18 da LGPD, o titular poderá solicitar:</p>
<ul>
<li>Confirmação da existência de tratamento;</li>
<li>Acesso aos dados pessoais;</li>
<li>Correção de dados;</li>
<li>Anonimização, bloqueio ou eliminação;</li>
<li>Portabilidade;</li>
<li>Informações sobre compartilhamentos realizados;</li>
<li>Revogação do consentimento;</li>
<li>Oposição ao tratamento realizado em desconformidade com a LGPD.</li>
</ul>

<h2>11. Canal de atendimento LGPD</h2>
<p>As solicitações relacionadas à proteção de dados poderão ser encaminhadas para:</p>
<ul>
<li><strong>E-mail:</strong> <a href="mailto:lgpd@cdlanapolis.com.br">lgpd@cdlanapolis.com.br</a></li>
<li><strong>Telefone:</strong> (62) 3328-0008</li>
</ul>

<h2>12. Alterações desta Política</h2>
<p>Esta Política poderá ser alterada periodicamente para adequação às exigências legais, regulatórias ou operacionais. A versão vigente estará sempre disponível no portal da CDL Anápolis.</p>

<h2>13. Disposições finais</h2>
<p>Esta Política será interpretada de acordo com a legislação brasileira, especialmente a Lei Geral de Proteção de Dados Pessoais (Lei nº 13.709/2018). Fica eleito o Foro da Comarca de Anápolis/GO para dirimir eventuais controvérsias relacionadas a esta Política, ressalvadas as hipóteses de competência legal específica.</p>
HTML;
}

// =====================================================================
// DOCUMENTOS LEGAIS — Termos de Uso + Política de Cookies
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_legal_docs_v1', function () {
        // ─── Termos de Uso ─────────────────────────────────────
        $termos = get_page_by_path('termos-de-uso');
        if ($termos) {
            update_field('legal_hero_tag',      'Institucional', $termos->ID);
            update_field('legal_hero_title',    'Termos de Uso do Portal', $termos->ID);
            update_field('legal_hero_subtitle', 'Condições para acesso e utilização do portal da CDL Anápolis. Ao usar o site, você concorda com estes termos.', $termos->ID);
            update_field('legal_last_update',   'Junho de 2026', $termos->ID);
            update_field('legal_corpo_html',    cdl_seed_termos_corpo_html(), $termos->ID);
            update_field('legal_cta_title',     'Dúvidas sobre estes termos?', $termos->ID);
            update_field('legal_cta_subtitle',  'Entre em contato com a CDL Anápolis.', $termos->ID);
            update_field('legal_cta_btn_text',  'Fale conosco', $termos->ID);
            update_field('legal_cta_btn_link',  '/fale-conosco/', $termos->ID);
        }

        // ─── Política de Cookies ───────────────────────────────
        $cookies = get_page_by_path('politica-de-cookies');
        if ($cookies) {
            update_field('legal_hero_tag',      'Institucional', $cookies->ID);
            update_field('legal_hero_title',    'Política de Cookies', $cookies->ID);
            update_field('legal_hero_subtitle', 'Como utilizamos cookies e tecnologias semelhantes para melhorar sua experiência de navegação.', $cookies->ID);
            update_field('legal_last_update',   'Junho de 2026', $cookies->ID);
            update_field('legal_corpo_html',    cdl_seed_cookies_corpo_html(), $cookies->ID);
            update_field('legal_cta_title',     'Quer revisar suas preferências?', $cookies->ID);
            update_field('legal_cta_subtitle',  'Você pode alterar suas escolhas de cookies a qualquer momento pelo banner ou pelo botão flutuante no canto da tela.', $cookies->ID);
            update_field('legal_cta_btn_text',  'Fale conosco', $cookies->ID);
            update_field('legal_cta_btn_link',  '/fale-conosco/', $cookies->ID);
        }
    });
});

function cdl_seed_termos_corpo_html() {
    return <<<'HTML'
<h2>1. Objeto</h2>
<p>O presente Termo de Uso estabelece as condições para acesso e utilização do portal eletrônico da Câmara de Dirigentes Lojistas de Anápolis — CDL Anápolis, disponível em <a href="https://www.cdlanapolis.com.br" target="_blank" rel="noopener">www.cdlanapolis.com.br</a>, bem como dos serviços, conteúdos, formulários, sistemas e funcionalidades disponibilizados aos usuários.</p>
<p>Ao acessar ou utilizar o portal, o usuário declara ter lido, compreendido e concordado com as disposições deste Termo.</p>

<h2>2. Identificação da entidade</h2>
<p>A <strong>Câmara de Dirigentes Lojistas de Anápolis — CDL Anápolis</strong>, inscrita no CNPJ nº 01.064.674/0001-12, possui sede na Rua Conde Afonso Celso, nº 25, Centro, Anápolis/GO.</p>

<h2>3. Acesso ao portal</h2>
<p>O acesso ao portal é gratuito, podendo determinadas áreas ou serviços exigir cadastro prévio, vínculo associativo ou contratação específica.</p>
<p>O usuário compromete-se a fornecer informações verdadeiras, completas e atualizadas.</p>

<h2>4. Responsabilidades do usuário</h2>
<p>O usuário compromete-se a:</p>
<ul>
<li>Utilizar o portal de forma ética e lícita;</li>
<li>Não praticar atos que comprometam a segurança do ambiente digital;</li>
<li>Não utilizar robôs, softwares automatizados ou mecanismos destinados à extração indevida de informações;</li>
<li>Não transmitir vírus, códigos maliciosos ou conteúdos ilícitos;</li>
<li>Respeitar a legislação vigente e os direitos de terceiros.</li>
</ul>

<h2>5. Propriedade intelectual</h2>
<p>Todo o conteúdo disponibilizado no portal, incluindo textos, imagens, logotipos, marcas, vídeos, materiais institucionais, documentos e demais elementos gráficos, pertence à CDL Anápolis ou a terceiros licenciantes.</p>
<p>É proibida a reprodução, distribuição, alteração ou utilização comercial sem autorização prévia e expressa da CDL Anápolis.</p>

<h2>6. Links de terceiros</h2>
<p>O portal poderá conter links para páginas externas. A CDL Anápolis não se responsabiliza pelas práticas de privacidade, conteúdo ou disponibilidade desses ambientes externos.</p>

<h2>7. Disponibilidade dos serviços</h2>
<p>A CDL Anápolis envidará esforços para manter o portal disponível continuamente, porém não garante funcionamento ininterrupto, podendo ocorrer:</p>
<ul>
<li>Manutenções programadas;</li>
<li>Atualizações de sistema;</li>
<li>Falhas de comunicação;</li>
<li>Eventos de força maior.</li>
</ul>

<h2>8. Proteção de dados</h2>
<p>O tratamento de dados pessoais realizado por meio do portal observará a <a href="/lgpd/">Política de Privacidade</a> da CDL Anápolis e a legislação vigente de proteção de dados.</p>

<h2>9. Limitação de responsabilidade</h2>
<p>A CDL Anápolis não se responsabiliza por:</p>
<ul>
<li>Danos decorrentes do uso inadequado do portal;</li>
<li>Falhas causadas por terceiros;</li>
<li>Problemas decorrentes da conexão do usuário;</li>
<li>Conteúdos disponibilizados por sites externos.</li>
</ul>

<h2>10. Alterações</h2>
<p>A CDL Anápolis poderá alterar estes Termos de Uso a qualquer momento. A versão atualizada permanecerá disponível para consulta no portal.</p>

<h2>11. Legislação e foro</h2>
<p>Este Termo será regido pelas leis da República Federativa do Brasil. Fica eleito o Foro da Comarca de Anápolis/GO para dirimir eventuais controvérsias, observadas as disposições legais aplicáveis.</p>
HTML;
}

function cdl_seed_cookies_corpo_html() {
    return <<<'HTML'
<p>A <strong>Câmara de Dirigentes Lojistas de Anápolis — CDL Anápolis</strong> utiliza cookies e tecnologias semelhantes para melhorar a experiência de navegação dos usuários em seu portal.</p>
<p>Esta Política explica como essas tecnologias funcionam e como o usuário pode gerenciar suas preferências.</p>

<h2>1. O que são cookies</h2>
<p>Cookies são pequenos arquivos armazenados no navegador ou dispositivo do usuário durante a navegação em páginas da internet. Esses arquivos permitem reconhecer preferências, melhorar funcionalidades e gerar estatísticas de utilização do portal.</p>

<h2>2. Tipos de cookies utilizados</h2>

<h3>2.1 Cookies Necessários</h3>
<p>São essenciais para o funcionamento adequado do portal.</p>
<p><strong>Exemplos:</strong></p>
<ul>
<li>Controle de sessão;</li>
<li>Segurança da navegação;</li>
<li>Preferências básicas de funcionamento.</li>
</ul>
<p><em>Esses cookies não podem ser desativados.</em></p>

<h3>2.2 Cookies Funcionais</h3>
<p>Permitem memorizar escolhas realizadas pelo usuário.</p>
<p><strong>Exemplos:</strong></p>
<ul>
<li>Idioma;</li>
<li>Configurações de navegação;</li>
<li>Preferências de exibição.</li>
</ul>

<h3>2.3 Cookies Analíticos</h3>
<p>Utilizados para compreender como os usuários interagem com o portal.</p>
<p><strong>Exemplos:</strong></p>
<ul>
<li>Número de acessos;</li>
<li>Tempo de permanência;</li>
<li>Páginas mais visitadas;</li>
<li>Origem dos acessos.</li>
</ul>
<p>Os dados são tratados de forma agregada e estatística sempre que possível.</p>

<h3>2.4 Cookies de Marketing</h3>
<p>Podem ser utilizados para exibição de campanhas institucionais e mensuração de resultados de comunicação.</p>
<p>Esses cookies dependem do consentimento do usuário quando exigido pela legislação aplicável.</p>

<h2>3. Cookies de terceiros</h2>
<p>O portal poderá utilizar ferramentas de terceiros, tais como:</p>
<ul>
<li>Google Analytics;</li>
<li>Google Tag Manager;</li>
<li>Google Maps;</li>
<li>YouTube;</li>
<li>Meta Pixel;</li>
<li>Ferramentas de automação de marketing;</li>
<li>Sistemas de atendimento e relacionamento.</li>
</ul>
<p>A utilização dessas ferramentas está sujeita às respectivas políticas de privacidade dos seus fornecedores.</p>

<h2>4. Consentimento</h2>
<p>Ao acessar o portal pela primeira vez, o usuário poderá visualizar um aviso de cookies e selecionar suas preferências. O consentimento poderá ser revogado a qualquer momento.</p>

<h2>5. Gerenciamento dos cookies</h2>
<p>O usuário poderá:</p>
<ul>
<li>Aceitar todos os cookies;</li>
<li>Rejeitar cookies não essenciais;</li>
<li>Configurar categorias específicas;</li>
<li>Excluir cookies diretamente em seu navegador.</li>
</ul>
<p><em>A desativação de determinados cookies poderá afetar algumas funcionalidades do portal.</em></p>

<h2>6. Prazo de armazenamento</h2>
<p>Os cookies poderão permanecer armazenados durante a sessão de navegação ou por período determinado, conforme sua finalidade.</p>

<h2>7. Alterações desta Política</h2>
<p>Esta Política poderá ser atualizada periodicamente para refletir alterações legais, regulatórias ou operacionais.</p>

<h2>8. Contato</h2>
<p>Em caso de dúvidas relacionadas a esta Política de Cookies, o usuário poderá entrar em contato pelo e-mail:</p>
<ul>
<li><strong>E-mail:</strong> <a href="mailto:lgpd@cdlanapolis.com.br">lgpd@cdlanapolis.com.br</a></li>
<li><strong>Telefone:</strong> (62) 3328-0008</li>
</ul>
HTML;
}

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

// =====================================================================
// HOME — HERO SLIDER (3 slides institucionais)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_hero_slider_v1', function () {
        update_field('hero_slides', [
            [
                'slide_tag'                => 'Desde 1962',
                'slide_title_line1'        => 'O lugar certo',
                'slide_title_line2'        => 'pra você',
                'slide_title_line3'        => 'crescer',
                'slide_highlight'          => 'line3',
                'slide_subtitle'           => 'Junte-se a mais de 2.000 empreendedores que já contam com serviços exclusivos, networking e suporte para prosperar em Anápolis.',
                'slide_cta_primary_text'   => 'Quero fazer parte',
                'slide_cta_primary_link'   => '/associe-se/',
                'slide_cta_secondary_text' => 'Ver benefícios',
                'slide_cta_secondary_link' => '#beneficios',
            ],
            [
                'slide_tag'                => 'Para o MEI e pequeno empreendedor',
                'slide_title_line1'        => 'Aqui pra te',
                'slide_title_line2'        => 'ajudar a',
                'slide_title_line3'        => 'crescer',
                'slide_highlight'          => 'line3',
                'slide_subtitle'           => 'Crédito protegido, assessoria jurídica, saúde empresarial e muito mais. Ferramentas que você precisa, com condições que cabem no seu bolso.',
                'slide_cta_primary_text'   => 'Explorar serviços',
                'slide_cta_primary_link'   => '#servicos',
                'slide_cta_secondary_text' => 'SPC Online',
                'slide_cta_secondary_link' => '/spc/',
            ],
            [
                'slide_tag'                => 'Comunidade que faz acontecer',
                'slide_title_line1'        => 'Não precisa',
                'slide_title_line2'        => 'crescer',
                'slide_title_line3'        => 'sozinho',
                'slide_highlight'          => 'line3',
                'slide_subtitle'           => 'Eventos, capacitações, networking e uma comunidade de empreendedores que se apoiam. Juntos, o comércio de Anápolis vai mais longe.',
                'slide_cta_primary_text'   => 'Entrar para a comunidade',
                'slide_cta_primary_link'   => '/associe-se/',
                'slide_cta_secondary_text' => 'Ver notícias',
                'slide_cta_secondary_link' => '#informativo',
            ],
        ], 'option');
    });
});

// =====================================================================
// HOME — BENEFITS (apenas textos da section; cards são hardcoded)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_benefits_text_v1', function () {
        update_field('benefits_tag',      'Para quem faz parte', 'option');
        update_field('benefits_title',    'Benefícios que fazem a diferença', 'option');
        update_field('benefits_subtitle', 'Vantagens reais que impulsionam o crescimento do seu negócio todos os dias.', 'option');
    });
});

// =====================================================================
// HOME — SERVICES
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_services_v1', function () {
        update_field('services_tag',      'O que oferecemos', 'option');
        update_field('services_title',    'Serviços', 'option');
        update_field('services_subtitle', 'Soluções completas para o seu negócio crescer com segurança.', 'option');
        update_field('services', [
            ['title' => 'CDL Celular',          'description' => 'Consultas e proteção para celulares.',          'link' => '/cdl-celular/'],
            ['title' => 'Certificado Digital',  'description' => 'Certificados A1 e A3 para PF e PJ.',             'link' => '/certificado-digital-cdl/'],
            ['title' => 'Central de Cobranças', 'description' => 'Recuperação de crédito profissional.',           'link' => '/central-de-cobrancas/'],
            ['title' => 'NF-e / NFC-e',         'description' => 'Emissão de notas fiscais eletrônicas.',          'link' => '/nfe-nfce/'],
            ['title' => 'SPC Brasil',           'description' => 'Consultas e proteção ao crédito.',               'link' => '/spc/'],
            ['title' => 'Tempo & Saúde',        'description' => 'Saúde ocupacional e segurança do trabalho.',     'link' => '/tempo-saude/'],
        ], 'option');
    });
});

// =====================================================================
// HOME — SHOWCASE
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_showcase_v1', function () {
        update_field('showcase_tag',         'Por que a CDL', 'option');
        update_field('showcase_title',       "Mais do que uma<br>entidade, uma comunidade", 'option');
        update_field('showcase_description', 'Há mais de 60 anos conectando empreendedores e fortalecendo o comércio de Anápolis com serviços e relacionamentos que fazem a diferença.', 'option');
        update_field('showcase_items', [
            ['item_title' => '2.000+ Empreendedores',   'item_description' => 'A maior comunidade de lojistas da região'],
            ['item_title' => '7 Serviços Exclusivos',   'item_description' => 'Do crédito à saúde, tudo para o seu negócio'],
            ['item_title' => '60+ Anos de História',    'item_description' => 'Tradição e inovação caminhando juntas'],
        ], 'option');
    });
});

// =====================================================================
// HOME — QUICK ACCESS
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_quick_access_v1', function () {
        update_field('quick_access', [
            ['title' => '2ª Via Boletos',      'external_url' => home_url('/fale-conosco/'),            'icon' => 'file'],
            ['title' => 'CDL Celular',         'external_url' => home_url('/cdl-celular/'),             'icon' => 'phone'],
            ['title' => 'Certificado Digital', 'external_url' => home_url('/certificado-digital-cdl/'), 'icon' => 'lock'],
            ['title' => 'SPC Brasil',          'external_url' => home_url('/spc/'),                     'icon' => 'shield'],
        ], 'option');
    });
});

// =====================================================================
// HOME — CTA DARK / CTA GOLD
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_cta_dark_v1', function () {
        update_field('cta_dark_title',       "Junte-se a quem<br>faz o comércio de<br>Anápolis acontecer", 'option');
        update_field('cta_dark_button_text', 'Quero fazer parte', 'option');
        update_field('cta_dark_button_link', '/associe-se/', 'option');
    });
});

add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_cta_gold_v1', function () {
        update_field('cta_gold_title',       'Venha para a CDL Anápolis', 'option');
        update_field('cta_gold_subtitle',    'Junte-se a milhares de empreendedores que já fazem parte', 'option');
        update_field('cta_gold_button_text', 'Quero fazer parte', 'option');
        update_field('cta_gold_button_link', '/associe-se/', 'option');
    });
});

// =====================================================================
// DIRETORIA — intro + repeaters de membros e conselho fiscal
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_diretoria_v2', function () {
        $page = get_page_by_path('diretoria');
        if (!$page) return;

        update_field('diretoria_intro', '<p>A liderança da CDL Anápolis é formada por empresários que oferecem tempo e experiência, de forma voluntária, para fortalecer o comércio local. São profissionais que acreditam no poder da comunidade e na força de uma cidade que cresce unida.</p>', $page->ID);

        update_field('diretoria_membros', [
            ['name' => 'Luis Miguel Mendes',         'role' => 'Presidente'],
            ['name' => 'Ian Moreira Silva',          'role' => '1º Vice-Presidente'],
            ['name' => 'Wilmar Carvalho',            'role' => '2º Vice-Presidente'],
            ['name' => 'Ana Paula Perenne',          'role' => '1ª Diretora Financeira'],
            ['name' => 'Marcos Aurélio Rodovalho',   'role' => '2º Vice Dir. Financeiro'],
            ['name' => 'Kedima Barbosa',             'role' => 'Dir. Secr. Administrativo'],
            ['name' => 'Edson Debona',               'role' => 'Dir. Desen. Neg. e Inovação'],
            ['name' => 'Allan Peixoto',              'role' => 'Dir. Eventos e Promoções'],
            ['name' => 'Enival Ferreira de Souza',   'role' => 'Dir. Infraestrutura'],
            ['name' => 'Louise Ramiro da Costa',     'role' => 'Dir. Jur. e Rel. Institucionais'],
            ['name' => 'Christian Kleber Lisboa',    'role' => 'Dir. Capacitação Empresarial'],
            ['name' => 'Jaime Neto Alves Matos',     'role' => 'Dir. SPC'],
            ['name' => 'Maurício de Oliveira',       'role' => 'Dir. Suplente'],
        ], $page->ID);

        update_field('diretoria_conselho', [
            ['nome' => 'João Soares da Silva'],
            ['nome' => 'Munir Caixe'],
            ['nome' => 'Geraldo Pereira Braga'],
            ['nome' => 'Air Vasconcelos Ganzarolli'],
        ], $page->ID);
    });
});

// =====================================================================
// PRESIDENTES — galeria histórica (1962 → 2025)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_presidentes_v1', function () {
        $page = get_page_by_path('presidentes');
        if (!$page) return;

        update_field('presidentes_lista', [
            ['name' => 'Dennison Batista',             'period' => '1962 – 1963'],
            ['name' => 'Wagner Silva',                  'period' => '1963'],
            ['name' => 'Nelson de Abreu',               'period' => '1963 – 1974'],
            ['name' => 'Inácio Godinho',                'period' => '1974 – 1977'],
            ['name' => 'Décio Porto',                   'period' => '1977 – 1981'],
            ['name' => 'Zamir Menezes',                 'period' => 'Interino – Jul/1981'],
            ['name' => 'Rui Bueno Gomes',               'period' => '1981 – 1985'],
            ['name' => 'Wilmar Jardim de Carvalho',     'period' => '1985 – 1987'],
            ['name' => 'Iraci Custódio Ribeiro',        'period' => '1987 – 1989'],
            ['name' => 'José Roberto Santos',           'period' => '1989 – 1992'],
            ['name' => 'Air Ganzarolli',                'period' => '1992 – 1994'],
            ['name' => 'Élsio Alves Pereira',           'period' => '1994 – 1996'],
            ['name' => 'Roberto Naves de Assunção',     'period' => '1996 – 1998'],
            ['name' => 'Élsio Alves Pereira',           'period' => '1998 – 1999'],
            ['name' => 'Sultan Falluh',                 'period' => '2000 – 2002'],
            ['name' => 'Air Ganzarolli',                'period' => '2003 – 2004'],
            ['name' => 'João Itagiba Nunes Junior',     'period' => '2004'],
            ['name' => 'Wilmar Jardim de Carvalho',     'period' => '2005 – 2010'],
            ['name' => 'Reinaldo de Castro Del Fiaco',  'period' => '2011 – 2014'],
            ['name' => 'Wilmar Jardim de Carvalho',     'period' => '2015 – 2025'],
        ], $page->ID);
    });
});

// =====================================================================
// ASSOCIE-SE — campos institucionais (hero, benefícios destaque)
// (Planos já são seedados via cdl_seed_associe_planos_v1 em functions.php)
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_associe_se_inst_v1', function () {
        $page = get_page_by_path('associe-se');
        if (!$page) return;

        update_field('associe_hero_title',    'Faça parte da maior comunidade de empreendedores de Anápolis', $page->ID);
        update_field('associe_hero_subtitle', 'Acesso ao SPC Brasil, assessoria jurídica, planos de saúde exclusivos e muito mais. Tudo o que seu negócio precisa em um só lugar.', $page->ID);

        update_field('associe_benefits', [
            [
                'title'       => 'Proteção ao Crédito',
                'description' => 'Acesso completo ao SPC Brasil: consultas de CPF/CNPJ, inclusão de devedores e score de crédito para decisões seguras.',
            ],
            [
                'title'       => 'Assessoria Jurídica',
                'description' => 'Orientação empresarial, trabalhista e do consumidor sem custo adicional. Análise de contratos e mediação de conflitos.',
            ],
            [
                'title'       => 'CDL Saúde',
                'description' => 'Planos de saúde e odontológicos com valores até 40% menores. Cobertura para você, seus colaboradores e familiares.',
            ],
        ], $page->ID);

        update_field('balcao_mei_url', '/apoio-mei/', $page->ID);
    });
});

// =====================================================================
// FALE CONOSCO — intro + horário + mapa
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_fale_conosco_v1', function () {
        $page = get_page_by_path('fale-conosco');
        if (!$page) return;

        update_field('contato_intro',   'Estamos aqui para ajudar. Entre em contato com a CDL Anápolis.', $page->ID);
        update_field('contato_horario', 'Seg a Sex, 8h às 18h', $page->ID);
        update_field('contato_maps_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3828.831121972749!2d-48.9584482248586!3d-16.331570984386573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935ea478d32b8d87%3A0xd510418a62440c63!2sC%C3%A2mara%20de%20Dirigentes%20Lojistas%20de%20An%C3%A1polis!5e0!3m2!1spt-BR!2sbr!4v1780941013542!5m2!1spt-BR!2sbr', $page->ID);
    });
});

// =====================================================================
// BENEFÍCIOS — 15 páginas via array slug → dados
// =====================================================================
function cdl_seed_beneficios_data() {
    return [
        'cdl-assessoria-juridica' => [
            'intro' => '<p>A Assessoria Jurídica da CDL Anápolis é a sua aliada na hora de prevenir problemas legais e proteger sua empresa. Sem custo adicional para quem faz parte, ela oferece uma consultoria jurídica completa e preventiva.</p><p>Isso inclui análise de contratos, orientação trabalhista, defesa do consumidor e suporte contencioso com pareceres técnicos.</p>',
            'features' => [
                ['title' => 'Direito Civil e Trabalhista',   'description' => 'Suporte em admissões, demissões, acordos trabalhistas e conformidade com a legislação vigente.'],
                ['title' => 'Direito Comercial e Tributário','description' => 'Orientação sobre obrigações fiscais, planejamento tributário e questões comerciais.'],
                ['title' => 'Direito do Consumidor',         'description' => 'Mediação de conflitos com consumidores e adequação às normas do Código de Defesa do Consumidor.'],
                ['title' => 'Análise de Contratos',          'description' => 'Revisão e elaboração de contratos comerciais, de locação, prestação de serviços e parcerias.'],
                ['title' => 'Sem Custo Adicional',           'description' => 'Consultoria jurídica completa e preventiva incluída para quem faz parte da CDL Anápolis.'],
                ['title' => 'Prevenção de Riscos',           'description' => 'Pareceres técnicos e orientação preventiva para evitar problemas legais no seu negócio.'],
            ],
            'cta_text' => 'Fale com nossa equipe e proteja seu negócio.',
            'cta_link' => '/fale-conosco/',
        ],
        'cdl-saude' => [
            'intro' => '<p>O CDL Saúde é um convênio inteligente criado especialmente para quem faz parte da CDL Anápolis, seus familiares e funcionários. Ele não é um plano de saúde, mas sim uma rede de parcerias com profissionais e instituições da área da saúde, com descontos especiais.</p><p>Com o CDL Saúde, você cuida de quem importa com facilidade e tranquilidade. Acesse a plataforma online, emita guias digitais e tenha tudo em mãos, de forma simples e rápida.</p>',
            'features' => [
                ['title' => 'Rede Ampla de Atendimento', 'description' => 'Acesso a médicos, clínicas, hospitais e laboratórios com valores diferenciados para quem faz parte da CDL.'],
                ['title' => 'Benefício Familiar Completo','description' => 'Estenda os descontos para pais, mães, irmãos e filhos do empregador e do empregado. Saúde para toda a família.'],
                ['title' => 'Guias Digitais Liberadas',  'description' => 'Emita guias de exames e consultas online, com comodidade e agilidade, na hora que precisar, sem aprovação.'],
                ['title' => 'Sem Carência e Sem Espera', 'description' => 'Desfrute de consultas e exames sem período de carência. Atendimento imediato para você e sua equipe.'],
                ['title' => 'Convênio Inteligente',      'description' => 'Não é plano de saúde — é uma rede de parcerias com descontos especiais para quem faz parte da CDL Anápolis.'],
                ['title' => 'Plataforma Online',         'description' => 'Acesse a plataforma, emita guias e gerencie tudo de forma digital, simples e rápida.'],
            ],
            'cta_text' => 'Ative seu CDL Saúde e comece a cuidar de quem importa.',
            'cta_link' => 'https://cdlsaude.cdlanapolis.com.br/',
        ],
        'sede-campestre' => [
            'intro' => '<p>A Sede Campestre da CDL Anápolis é o lugar perfeito para a realização de festas, confraternizações e eventos especiais. Com um amplo salão de festas, churrasqueira, freezer, mesas e cadeiras, o local oferece total conforto e praticidade.</p><p>Celebre com conforto na Sede Campestre da CDL Anápolis. Com infraestrutura completa e uma localização privilegiada próxima ao Terras Alphaville, o local é ideal para festas e confraternizações em um ambiente tranquilo e seguro.</p>',
            'features' => [
                ['title' => 'Salão de Festas',          'description' => 'Espaço amplo e aconchegante para receber seus convidados com conforto e praticidade.'],
                ['title' => 'Churrasqueira',            'description' => 'Churrasqueira completa e coberta para confraternizações memoráveis com família e amigos.'],
                ['title' => 'Infraestrutura Completa',  'description' => 'Freezer, mesas e cadeiras à disposição para facilitar a organização do seu evento.'],
                ['title' => 'Localização Privilegiada', 'description' => 'Próximo ao Terras Alphaville, com fácil acesso e ambiente tranquilo.'],
                ['title' => 'Festas e Eventos',         'description' => 'Perfeito para aniversários, confraternizações de equipe, encontros familiares e eventos corporativos.'],
                ['title' => 'Exclusividade CDL',        'description' => 'Benefício exclusivo para quem faz parte da CDL Anápolis e suas famílias.'],
            ],
            'cta_text' => 'Faça parte da CDL Anápolis e aproveite este espaço exclusivo.',
            'cta_link' => '/associe-se/',
        ],
        'planejamento-estrategico' => [
            'intro' => '<p>O Planejamento Estratégico da CDL Anápolis é pensado para empresários que querem crescer com organização e previsibilidade. Um diagnóstico profundo combinado com metas claras e indicadores mensuráveis, permitindo decisões baseadas em estratégia e não em impulso.</p><p>Adaptável a qualquer porte — do negócio em fase inicial até estruturas já consolidadas — o serviço orienta a tomada de decisão, estrutura processos e projeta um crescimento sustentável.</p>',
            'features' => [
                ['title' => 'Clareza nas decisões',          'description' => 'Tenha uma visão mais estruturada do seu negócio, permitindo tomar decisões com mais segurança e menos incertezas no dia a dia.'],
                ['title' => 'Definição de metas realistas',  'description' => 'Estabeleça objetivos claros e alcançáveis, alinhados à realidade da sua empresa e ao seu momento de crescimento.'],
                ['title' => 'Organização de processos',      'description' => 'Identifique falhas e oportunidades de melhoria, estruturando processos mais eficientes e produtivos.'],
                ['title' => 'Crescimento sustentável',       'description' => 'Planeje o futuro da sua empresa com base em estratégia, evitando decisões impulsivas ou desalinhadas.'],
                ['title' => 'Apoio especializado',           'description' => 'Conte com orientação profissional para analisar cenários e direcionar melhor suas ações empresariais.'],
                ['title' => 'Redução de erros',              'description' => 'Evite retrabalho e decisões equivocadas que podem gerar prejuízos ou atrasar o crescimento do negócio.'],
            ],
            'cta_text' => 'Fale com nossa equipe e comece agora.',
            'cta_link' => '/associe-se/',
        ],
        'assessoria-contabil' => [
            'intro' => '<p>A Assessoria Contábil da CDL Anápolis complementa o trabalho do contador da empresa com uma visão estratégica e orientativa. Identificamos oportunidades dentro da legalidade, garantimos conformidade fiscal e estruturamos o controle financeiro do negócio.</p><p>O associado passa a tomar decisões baseadas em dados confiáveis, evita riscos com órgãos reguladores e ganha previsibilidade sobre as obrigações da empresa.</p>',
            'features' => [
                ['title' => 'Controle financeiro eficiente', 'description' => 'Tenha uma visão mais clara das finanças da empresa, facilitando o acompanhamento de receitas, despesas e resultados.'],
                ['title' => 'Redução de riscos fiscais',     'description' => 'Evite problemas com órgãos reguladores por meio de orientações que garantem conformidade com a legislação.'],
                ['title' => 'Planejamento tributário',       'description' => 'Identifique oportunidades de economia dentro da legalidade, pagando apenas o necessário em tributos.'],
                ['title' => 'Mais segurança nas decisões',   'description' => 'Tome decisões com base em dados contábeis e financeiros mais confiáveis e organizados.'],
                ['title' => 'Apoio técnico especializado',   'description' => 'Conte com profissionais qualificados para esclarecer dúvidas e orientar sua gestão contábil.'],
                ['title' => 'Organização da rotina',         'description' => 'Tenha mais controle e previsibilidade sobre obrigações e compromissos da empresa.'],
            ],
            'cta_text' => 'Fale com nossa equipe e tenha mais segurança na sua gestão.',
            'cta_link' => '/associe-se/',
        ],
        'apoio-mei' => [
            'intro' => '<p>O Apoio ao MEI da CDL Anápolis orienta o microempreendedor em todo o ciclo da formalização: desde a abertura até as obrigações rotineiras como emissão de notas, guia DAS e declaração anual. Um balcão de apoio pensado para quem quer empreender sem se perder na burocracia.</p><p>Com o benefício, o empreendedor conta com suporte contínuo, não precisa recorrer a serviços externos e mantém sua empresa sempre regular.</p>',
            'features' => [
                ['title' => 'Facilidade na formalização', 'description' => 'Abra sua empresa com orientação adequada, evitando erros e burocracias desnecessárias.'],
                ['title' => 'Regularização do negócio',   'description' => 'Mantenha sua empresa em dia com as obrigações legais de forma simples e organizada.'],
                ['title' => 'Notas fiscais simplificadas','description' => 'Configure e utilize a emissão de notas com mais facilidade no dia a dia.'],
                ['title' => 'Obrigações organizadas',     'description' => 'Tenha apoio para lidar com guias, declarações e exigências do MEI.'],
                ['title' => 'Redução de burocracia',      'description' => 'Evite perda de tempo com processos operacionais e foque no crescimento do seu negócio.'],
                ['title' => 'Apoio contínuo',             'description' => 'Conte com suporte sempre que precisar, sem recorrer a serviços externos.'],
            ],
            'cta_text' => 'Cuidamos da burocracia para você focar no negócio.',
            'cta_link' => '/associe-se/',
        ],
        'rede-de-descontos' => [
            'intro' => '<p>A Rede de Descontos da CDL Anápolis é um ciclo virtuoso: o associado economiza, consome melhor e ainda fortalece a economia da própria cidade. São parceiros qualificados em academias, saúde, segurança do trabalho, restaurantes, certificações e muito mais.</p><p>Utilização ilimitada, sempre que o associado precisar, em empresas que valorizam quem faz parte da comunidade CDL.</p>',
            'features' => [
                ['title' => 'Economia no dia a dia',     'description' => 'Reduza custos com serviços e produtos essenciais para sua empresa e uso pessoal.'],
                ['title' => 'Parceiros qualificados',    'description' => 'Conte com empresas selecionadas que oferecem condições especiais para associados.'],
                ['title' => 'Maior poder de compra',     'description' => 'Aproveite melhores condições comerciais em diversos segmentos.'],
                ['title' => 'Benefícios em várias áreas','description' => 'Tenha vantagens em saúde, serviços, alimentação, certificações e muito mais.'],
                ['title' => 'Uso ilimitado',             'description' => 'Utilize os descontos sempre que precisar, sem restrições.'],
                ['title' => 'Fortalecimento local',      'description' => 'Consuma dentro de uma rede que valoriza e impulsiona empresas da própria cidade.'],
            ],
            'cta_text' => 'Faça parte e acesse a Rede de Descontos da CDL Anápolis.',
            'cta_link' => '/associe-se/',
        ],
        'espacos-corporativos' => [
            'intro' => '<p>Os Espaços Corporativos da CDL Anápolis oferecem um ambiente alinhado à imagem profissional do seu negócio. Salas equipadas, prontas para uso, onde o associado realiza reuniões estratégicas com credibilidade e organização.</p><p>Elimina-se a necessidade de alugar salas externas ou manter estrutura física dedicada. Pragmatismo, economia e profissionalismo em um só benefício.</p>',
            'features' => [
                ['title' => 'Ambiente profissional', 'description' => 'Utilize espaços estruturados para receber clientes, parceiros e equipe com mais organização e credibilidade.'],
                ['title' => 'Imagem mais sólida',    'description' => 'Transmita uma imagem mais confiável ao realizar encontros em um ambiente adequado.'],
                ['title' => 'Economia em locações',  'description' => 'Evite custos com aluguel de salas ou espaços para reuniões e atendimentos.'],
                ['title' => 'Praticidade no dia a dia','description' => 'Tenha à disposição um local pronto para uso, sem necessidade de estrutura própria.'],
                ['title' => 'Reuniões estratégicas', 'description' => 'Utilize o ambiente para reuniões importantes que exigem mais formalidade e preparo.'],
                ['title' => 'Experiência ao cliente','description' => 'Proporcione um atendimento mais organizado e confortável para quem visita sua empresa.'],
            ],
            'cta_text' => 'Faça parte e utilize os Espaços Corporativos da CDL.',
            'cta_link' => '/associe-se/',
        ],
        'eventos-corporativos' => [
            'intro' => '<p>Os Eventos Corporativos da CDL Anápolis reúnem empresários, parceiros e especialistas em um ambiente propício para troca, aprendizado e geração de novas oportunidades. Talks, palestras, workshops e summits exclusivos ou com condições especiais para associados.</p><p>Uma forma de posicionar sua marca dentro de um ecossistema empresarial reconhecido, gerando conexões que evoluem para parcerias e negócios concretos.</p>',
            'features' => [
                ['title' => 'Networking qualificado',   'description' => 'Conecte-se com empresários, lideranças e profissionais do ambiente empresarial local.'],
                ['title' => 'Novas oportunidades',      'description' => 'Esteja presente em um ambiente propício para parcerias, negócios e crescimento.'],
                ['title' => 'Conteúdos relevantes',     'description' => 'Participe de encontros com temas estratégicos e atuais para o desenvolvimento empresarial.'],
                ['title' => 'Fortalecimento da marca',  'description' => 'Posicione sua empresa dentro de um ecossistema ativo e reconhecido no mercado.'],
                ['title' => 'Integração empresarial',   'description' => 'Esteja inserido em um ambiente que estimula troca de experiências e conexões.'],
                ['title' => 'Participação facilitada',  'description' => 'Acesso com condições especiais, exclusividade ou prioridade como associado.'],
            ],
            'cta_text' => 'Faça parte e participe da agenda empresarial da CDL.',
            'cta_link' => '/associe-se/',
        ],
        'nucleos-empresariais' => [
            'intro' => '<p>Os Núcleos Empresariais da CDL Anápolis — CDL Mulher, CDL Jovem e outros — reúnem empresários com interesses em comum e foco no desenvolvimento contínuo. Um espaço para construir conexões, trocar experiências e transformar relacionamentos em oportunidades concretas.</p><p>Participação incluída como benefício para associados, com encontros periódicos e ambiente colaborativo.</p>',
            'features' => [
                ['title' => 'Grupos estratégicos',          'description' => 'Participe de núcleos como CDL Mulher e CDL Jovem, com foco no desenvolvimento empresarial.'],
                ['title' => 'Networking intencional',       'description' => 'Construa conexões com empresários que compartilham objetivos e desafios semelhantes.'],
                ['title' => 'Troca de experiências',        'description' => 'Compartilhe vivências e aprenda com outros empresários em um ambiente colaborativo.'],
                ['title' => 'Desenvolvimento de liderança', 'description' => 'Fortaleça habilidades pessoais e profissionais por meio da participação ativa.'],
                ['title' => 'Parcerias comerciais',         'description' => 'Transforme relacionamentos em oportunidades concretas de negócios.'],
                ['title' => 'Ecossistema ativo',            'description' => 'Faça parte de um ambiente onde conexões evoluem para crescimento consistente.'],
            ],
            'cta_text' => 'Conecte-se com empresários que compartilham seus desafios.',
            'cta_link' => '/associe-se/',
        ],
        'treinamentos' => [
            'intro' => '<p>Os Treinamentos da CDL Anápolis oferecem conteúdo prático e aplicável, ministrado por especialistas, com foco real no desenvolvimento empresarial. Temas atualizados, boas práticas e estratégias que podem ser implementadas diretamente no negócio.</p><p>Benefício gratuito para associados, incluindo a possibilidade de levar a equipe — fortalecendo a gestão e o desempenho do time como um todo.</p>',
            'features' => [
                ['title' => 'Capacitação contínua',     'description' => 'Acesse treinamentos que contribuem para o desenvolvimento constante do empresário e da equipe.'],
                ['title' => 'Conteúdo aplicável',       'description' => 'Aprenda estratégias que podem ser implementadas diretamente no seu negócio.'],
                ['title' => 'Atualização de mercado',   'description' => 'Mantenha-se informado sobre tendências, mudanças e boas práticas empresariais.'],
                ['title' => 'Apoio de especialistas',   'description' => 'Conte com orientação de profissionais qualificados em diversas áreas.'],
                ['title' => 'Desenvolvimento da equipe','description' => 'Leve conhecimento também para colaboradores, fortalecendo o desempenho do time.'],
                ['title' => 'Melhor gestão empresarial','description' => 'Utilize o aprendizado para melhorar processos, decisões e resultados.'],
            ],
            'cta_text' => 'Acesse todos os treinamentos como associado.',
            'cta_link' => '/associe-se/',
        ],
        'midia-divulgacao' => [
            'intro' => '<p>A CDL Anápolis utiliza suas redes sociais, site e canais institucionais como ferramenta de visibilidade para empresas associadas. Um benefício que associa sua marca a uma entidade reconhecida e respeitada, ampliando o alcance local e gerando oportunidades comerciais.</p><p>Divulgação sem custo adicional, seguindo as diretrizes da entidade, com foco em fortalecer o reconhecimento do seu negócio no ecossistema empresarial de Anápolis.</p>',
            'features' => [
                ['title' => 'Mais visibilidade',         'description' => 'Divulgue sua marca em canais institucionais com credibilidade no mercado.'],
                ['title' => 'Presença digital',          'description' => 'Amplie o alcance da sua empresa por meio das redes sociais da CDL.'],
                ['title' => 'Marca forte',               'description' => 'Posicione seu negócio ao lado de uma entidade reconhecida e respeitada.'],
                ['title' => 'Alcance local',             'description' => 'Conecte-se com o público da cidade e região de forma mais estratégica.'],
                ['title' => 'Divulgação de ações',       'description' => 'Apresente produtos, serviços e iniciativas da sua empresa.'],
                ['title' => 'Oportunidades comerciais',  'description' => 'Aumente as chances de ser visto, lembrado e escolhido pelo mercado.'],
            ],
            'cta_text' => 'Seja associado e divulgue sua marca com a CDL.',
            'cta_link' => '/associe-se/',
        ],
        'recrutamento' => [
            'intro' => '<p>Encontrar bons profissionais é um dos grandes desafios da gestão. A CDL Anápolis atua como facilitadora no processo de recrutamento: divulgação de vagas, triagem inicial de candidatos e agilidade na contratação — tudo gratuito para associados.</p><p>O associado ganha tempo, reduz custos com processos de RH e aumenta a assertividade na hora de contratar, focando no que importa: o core do negócio.</p>',
            'features' => [
                ['title' => 'Agilidade na contratação',  'description' => 'Receba candidatos de forma mais rápida, reduzindo o tempo de preenchimento de vagas.'],
                ['title' => 'Candidatos qualificados',   'description' => 'Tenha contato com perfis alinhados às necessidades da sua empresa.'],
                ['title' => 'Economia em RH',            'description' => 'Reduza custos com divulgação e triagem de candidatos.'],
                ['title' => 'Processo simplificado',     'description' => 'Simplifique a etapa inicial da contratação com apoio da CDL.'],
                ['title' => 'Mais assertividade',        'description' => 'Aumente as chances de encontrar o profissional ideal para a vaga.'],
                ['title' => 'Foco no core do negócio',   'description' => 'Ganhe tempo para se dedicar à gestão enquanto o processo é facilitado.'],
            ],
            'cta_text' => 'Conte com a CDL para acelerar seu processo seletivo.',
            'cta_link' => '/associe-se/',
        ],
        'exames-admissionais' => [
            'intro' => '<p>A CDL Anápolis oferece suporte completo para a realização dos exames admissionais, demissionais e periódicos exigidos pela legislação trabalhista. Atendimento ágil, organizado e sem custos adicionais para associados.</p><p>Cumprimento das obrigações legais sem burocracia, com mais segurança para empresa e colaborador e menos impacto no fluxo operacional do negócio.</p>',
            'features' => [
                ['title' => 'Obrigações em dia',     'description' => 'Atenda às exigências trabalhistas com mais segurança e organização.'],
                ['title' => 'Agilidade nos processos','description' => 'Realize exames de forma rápida, sem comprometer o fluxo da empresa.'],
                ['title' => 'Redução de custos',     'description' => 'Evite gastos adicionais com clínicas e serviços externos.'],
                ['title' => 'Rotina organizada',     'description' => 'Estruture melhor os processos de admissão e desligamento.'],
                ['title' => 'Segurança para todos',  'description' => 'Garanta que todos os procedimentos estejam devidamente realizados.'],
                ['title' => 'Praticidade empresarial','description' => 'Centralize esse processo com mais facilidade e menos burocracia.'],
            ],
            'cta_text' => 'Seja associado e tenha suporte para cumprir obrigações legais.',
            'cta_link' => '/associe-se/',
        ],
        'gestao-esocial' => [
            'intro' => '<p>A gestão do eSocial exige atenção constante às obrigações legais e pode consumir muito tempo da rotina empresarial. A CDL Anápolis oferece suporte completo para que o associado cumpra suas responsabilidades com segurança e eficiência.</p><p>Envio correto das informações, redução de erros, prevenção de multas e mais tempo para focar no negócio — tudo incluso como benefício.</p>',
            'features' => [
                ['title' => 'Menos burocracia',         'description' => 'Deixe a gestão do eSocial com quem entende, evitando processos complexos.'],
                ['title' => 'Conformidade legal',       'description' => 'Mantenha sua empresa alinhada às exigências legais sem risco de falhas.'],
                ['title' => 'Prevenção de multas',      'description' => 'Evite erros que podem gerar custos desnecessários para o negócio.'],
                ['title' => 'Informações organizadas',  'description' => 'Tenha controle sobre dados e envios obrigatórios.'],
                ['title' => 'Mais tempo para o negócio','description' => 'Foque na gestão enquanto a parte operacional é facilitada.'],
                ['title' => 'Segurança de dados',       'description' => 'Tenha mais tranquilidade com o envio correto das informações.'],
            ],
            'cta_text' => 'Seja associado e cumpra as obrigações com segurança.',
            'cta_link' => '/associe-se/',
        ],
    ];
}

add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_beneficios_v2', function () {
        foreach (cdl_seed_beneficios_data() as $slug => $fb) {
            $page = get_page_by_path($slug);
            if (!$page) continue;
            update_field('beneficio_intro',    $fb['intro'],    $page->ID);
            update_field('beneficio_features', $fb['features'], $page->ID);
            update_field('beneficio_cta_text', $fb['cta_text'], $page->ID);
            update_field('beneficio_cta_link', $fb['cta_link'], $page->ID);
        }
    });
});

// =====================================================================
// SERVIÇOS — 6 páginas via array slug → dados
// =====================================================================
function cdl_seed_servicos_data() {
    return [
        'cdl-celular' => [
            'intro' => '<p>Com o CDL Celular, tenha um serviço de telefonia pensado para empresários e lojistas. Oferecemos planos com tarifas acessíveis e condições exclusivas para associados da CDL Anápolis, para que você mantenha sua equipe e seus clientes sempre conectados.</p><p>Juntos somamos valores! Devido ao volume de associados (50.000 usuários em todo o Brasil) conseguimos os menores valores para sua empresa, com conciliação financeira simplificada e atendimento personalizado.</p>',
            'features' => [
                ['title' => 'Menor Custo',              'description' => 'Planos de telefonia com os menores custos do mercado, negociados especialmente para empreendedores.'],
                ['title' => 'Planos Especiais',         'description' => 'Condições exclusivas e planos personalizados para atender as necessidades do seu negócio.'],
                ['title' => '50.000+ Usuários',         'description' => 'Mais de 50 mil usuários em todo o Brasil já confiam no CDL Celular para sua telefonia.'],
                ['title' => 'Conciliação Financeira',   'description' => 'Sua empresa pode ter várias operadoras em um mesmo contrato e demonstrativo financeiro.'],
                ['title' => 'Atendimento Personalizado','description' => 'Equipe dedicada para atender suas demandas com agilidade e atenção especial.'],
                ['title' => 'Cobertura Nacional',       'description' => 'Planos com cobertura em todo o território nacional pelas melhores operadoras do país.'],
            ],
            'faqs' => [
                ['question' => 'Quais são os benefícios exclusivos do CDL Celular?', 'answer' => 'O CDL Celular oferece tarifas reduzidas, planos personalizados, cobertura nacional e suporte exclusivo para associados.'],
                ['question' => 'Como faço para aderir ao CDL Celular?',              'answer' => 'Basta entrar em contato com a CDL Anápolis e informar seu interesse. Nossa equipe irá auxiliar na escolha do melhor plano para o seu negócio.'],
                ['question' => 'Posso alterar o plano depois de contratá-lo?',       'answer' => 'Sim, os planos do CDL Celular são flexíveis, permitindo ajustes conforme a necessidade do seu negócio.'],
                ['question' => 'Como é feito o pagamento?',                          'answer' => 'Os pagamentos são realizados de forma prática e direta, no boleto bancário de sua mensalidade CDL.'],
            ],
            'external_url' => '',
            'cta_text'     => 'Fale com nossa equipe e conheça os planos CDL Celular.',
            'cta_link'     => '/fale-conosco/',
        ],
        'certificado-digital' => [
            'intro' => '<p>O certificado certo para quem busca segurança e agilidade. A CDL Anápolis oferece emissão de certificado digital com segurança, praticidade e atendimento humanizado. Garante validade jurídica para documentos eletrônicos com soluções para pessoas físicas e empresas.</p><p>Emitimos certificados dos tipos e-CPF e e-CNPJ, nos formatos A1 (arquivo digital) e A3 (cartão ou token). Quem faz parte da CDL tem condições especiais e agendamento facilitado.</p>',
            'features' => [
                ['title' => 'e-CPF (Pessoa Física)',     'description' => 'Para declaração de imposto de renda, acesso ao e-CAC, assinatura de documentos e procurações eletrônicas.'],
                ['title' => 'e-CNPJ (Pessoa Jurídica)',  'description' => 'Para emissão de notas fiscais, acesso a sistemas da Receita Federal, FGTS Digital e mais.'],
                ['title' => 'Certificado A1',            'description' => 'Certificado digital em arquivo, instalado no computador, com validade de 1 ano. Prático e ágil.'],
                ['title' => 'Certificado A3',            'description' => 'Certificado em cartão ou token USB, com validade de até 3 anos. Mais segurança e mobilidade.'],
                ['title' => 'Agendamento Fácil',         'description' => 'Agende sua emissão presencial na sede da CDL Anápolis com atendimento rápido e sem burocracia.'],
                ['title' => 'Condições Especiais CDL',   'description' => 'Quem faz parte da CDL Anápolis tem condições diferenciadas e atendimento prioritário na emissão.'],
            ],
            'faqs' => [
                ['question' => 'O que é Certificado Digital?',       'answer' => 'Serve como identidade eletrônica de pessoas físicas e empresas, permitindo assinatura de documentos, emissão de notas fiscais, acesso a portais do governo e processos com validade jurídica.'],
                ['question' => 'Quais tipos são oferecidos?',        'answer' => 'Soluções para pessoas físicas (e-CPF) e empresas (e-CNPJ), com opções A1 (arquivo digital, 1 ano) e A3 (cartão ou token, até 3 anos).'],
                ['question' => 'É necessário agendar?',              'answer' => 'Sim, o agendamento garante seu horário e evita filas de espera, podendo ser feito pelo site, WhatsApp ou telefone.'],
                ['question' => 'Quais documentos são necessários?',  'answer' => 'Para pessoas físicas: documento com foto e CPF. Para empresas: contrato social, cartão CNPJ e documentos do representante legal.'],
            ],
            'external_url' => '',
            'cta_text'     => 'Solicite agora pelo WhatsApp — nossa equipe agenda sua emissão rapidinho.',
            'cta_link'     => '/fale-conosco/',
        ],
        'central-de-cobrancas' => [
            'intro' => '<p>A Central de Cobranças da CDL Anápolis oferece assessoria especializada para recuperação de crédito e negociação de dívidas. Com técnicas eficazes e abordagem ética, atuamos como ponte entre sua empresa e o cliente inadimplente.</p><p>Recupere seu crédito com ética, agilidade e eficiência. Nossa equipe qualificada realiza cobranças enquanto você foca no seu negócio, com relatórios e atualizações periódicas com transparência total.</p>',
            'features' => [
                ['title' => 'Ação Profissional com Empatia', 'description' => 'Abordagem humanizada que mantém bom relacionamento com o cliente durante a cobrança.'],
                ['title' => 'Maior Controle Financeiro',      'description' => 'Diminua a inadimplência e melhore o fluxo de caixa com cobrança eficaz e transparente.'],
                ['title' => 'Economia de Tempo e Recursos',   'description' => 'Nossa equipe realiza as cobranças enquanto sua empresa foca no que importa: o negócio.'],
                ['title' => 'Negociação Amigável',            'description' => 'Busca de acordos e parcelamentos antes de medidas judiciais, priorizando a resolução pacífica.'],
                ['title' => 'Inclusão no SPC',                'description' => 'Registro de devedores no SPC Brasil para proteção ao crédito quando necessário.'],
                ['title' => 'Acompanhamento Completo',        'description' => 'Relatórios detalhados e acompanhamento de todas as cobranças em andamento.'],
            ],
            'faqs' => [
                ['question' => 'O que é a Central de Cobranças da CDL?',                   'answer' => 'É uma assessoria especializada em recuperação de crédito que atua na cobrança de dívidas vencidas com abordagem ética e estratégica.'],
                ['question' => 'A cobrança é feita diretamente pela CDL?',                 'answer' => 'Sim, com equipe qualificada em contato humanizado e profissional, preservando a relação comercial.'],
                ['question' => 'A cobrança desgasta o relacionamento com o cliente?',     'answer' => 'Não. Técnicas humanizadas preservam a relação comercial e a imagem da empresa credora.'],
                ['question' => 'Como minha empresa acompanha o processo?',                 'answer' => 'Através de relatórios e atualizações periódicas com transparência total sobre cada cobrança.'],
            ],
            'external_url' => '',
            'cta_text'     => 'Fale com nossa equipe especializada em recuperação de crédito.',
            'cta_link'     => '/fale-conosco/',
        ],
        'nfe-nfce' => [
            'intro' => '<p>Você sabia que é possível otimizar a gestão fiscal da sua empresa, reduzir custos operacionais e garantir conformidade com a legislação tributária? Com a adoção da Nota Fiscal Eletrônica (NF-e) e da Nota Fiscal de Consumidor Eletrônica (NFC-e), isso é uma realidade ao alcance do seu negócio.</p><p>A CDL Anápolis está pronta para orientar e apoiar sua empresa nesse processo de transformação digital com NF-e e NFC-e — um passo essencial para a modernização e eficiência.</p>',
            'features' => [
                ['title' => 'Emissão de NF-e',         'description' => 'Documento digital que registra operações de circulação de mercadorias com validade jurídica garantida pela assinatura digital.'],
                ['title' => 'Emissão de NFC-e',        'description' => 'Nota Fiscal de Consumidor Eletrônica para vendas presenciais, substituindo o cupom fiscal com uso de impressoras comuns.'],
                ['title' => 'Redução de Custos',       'description' => 'Elimine gastos com impressoras fiscais e papel. Utilize impressoras comuns e reduza despesas com manutenção.'],
                ['title' => 'Armazenamento Digital',   'description' => 'Notas armazenadas digitalmente com segurança, facilitando a gestão e consulta quando necessário.'],
                ['title' => 'Conformidade Legal',      'description' => 'Garanta total conformidade com as exigências fiscais e evite problemas com o fisco.'],
                ['title' => 'Suporte Técnico',         'description' => 'Equipe especializada para configuração, treinamento e resolução de dúvidas técnicas.'],
            ],
            'faqs' => [
                ['question' => 'O que é NF-e?',                                       'answer' => 'A NF-e é um documento digital que registra operações de circulação de mercadorias entre empresas, com validade jurídica garantida pela assinatura digital e autorização da Secretaria da Fazenda.'],
                ['question' => 'O que é NFC-e?',                                      'answer' => 'A NFC-e é destinada às vendas presenciais ao consumidor final, substituindo o cupom fiscal. Permite uso de impressoras não fiscais e consulta via QR Code.'],
                ['question' => 'É necessário equipamento específico para NFC-e?',     'answer' => 'Não. A NFC-e pode ser emitida utilizando impressoras comuns, sem a necessidade de equipamentos fiscais específicos.'],
                ['question' => 'As soluções são compatíveis com sistemas de gestão?', 'answer' => 'Sim. As soluções de NF-e e NFC-e da CDL Anápolis podem ser integradas aos sistemas de gestão empresarial.'],
            ],
            'external_url' => '',
            'cta_text'     => 'Fale com nossa equipe e modernize a emissão fiscal do seu negócio.',
            'cta_link'     => '/fale-conosco/',
        ],
        'spc' => [
            'intro' => '<p>Com o SPC da CDL Anápolis, sua empresa acessa informações confiáveis para análise de crédito, reduzindo riscos e aumentando a segurança nas vendas. Conte com consultas de CPF e CNPJ, monitoramento de inadimplência e ferramentas para tomada de decisão mais assertiva.</p><p>Sua empresa tem uma ferramenta poderosa para análise de crédito e monitoramento de clientes. Acesse informações precisas, reduza riscos e fortaleça as operações comerciais com maior segurança.</p>',
            'features' => [
                ['title' => 'Consulta de CPF/CNPJ',     'description' => 'Verifique a situação cadastral, pendências, protestos e histórico de crédito de consumidores e empresas.'],
                ['title' => 'Monitoramento de Clientes','description' => 'Acompanhe alterações cadastrais e de crédito dos seus clientes em tempo real.'],
                ['title' => 'Análise de Crédito',       'description' => 'Análise completa e detalhada para tomada de decisão segura em operações de crédito.'],
                ['title' => 'Score SPC',                'description' => 'Acesse o Score SPC dos consumidores para análises de risco mais precisas e confiáveis.'],
                ['title' => 'Inclusão de Devedores',    'description' => 'Registre devedores no banco de dados do SPC Brasil de forma rápida e segura.'],
                ['title' => 'Acesso Online',            'description' => 'Plataforma online para consultas e gestão de registros 24 horas por dia, 7 dias por semana.'],
            ],
            'faqs' => [
                ['question' => 'O que é o SPC?',                          'answer' => 'Serviço que oferece acesso a informações de crédito para pessoas físicas e jurídicas, auxiliando empresas em decisões comerciais mais seguras.'],
                ['question' => 'Quais informações posso obter?',         'answer' => 'Consultas de CPF e CNPJ, histórico de crédito, pendências financeiras, protestos e outros dados relevantes para análise de risco.'],
                ['question' => 'O serviço é exclusivo para associados?', 'answer' => 'Voltado para associados, mas empresas interessadas podem entrar em contato para verificar condições de acesso.'],
                ['question' => 'Posso monitorar meus clientes?',         'answer' => 'Sim, o SPC oferece ferramentas de monitoramento que alertam sobre mudanças nos dados de clientes e parceiros comerciais.'],
            ],
            'external_url' => 'https://sistema.spc.org.br/spc/controleacesso/autenticacao/entry.action',
            'cta_text'     => 'Networking exclusivo, recursos e serviços especializados para seu negócio prosperar.',
            'cta_link'     => '/fale-conosco/',
        ],
        'cdl-locacoes' => [
            'intro' => '<p>A CDL Anápolis oferece ambientes preparados para empresas, profissionais, entidades e instituições que buscam realizar reuniões, treinamentos, palestras, eventos corporativos e encontros estratégicos com conforto e credibilidade.</p><p>Nossos espaços contam com estrutura adequada para diferentes formatos de eventos, localização privilegiada e suporte especializado para garantir uma excelente experiência aos participantes.</p>',
            'features' => [
                ['title' => 'Sala de Reuniões',               'description' => 'Espaço ideal para reuniões empresariais, apresentações comerciais, entrevistas e encontros corporativos.'],
                ['title' => 'Auditório para Eventos',         'description' => 'Estrutura preparada para palestras, workshops, treinamentos, assembleias e eventos institucionais.'],
                ['title' => 'Equipamentos para Apresentação', 'description' => 'Disponibilidade de recursos audiovisuais para apresentações profissionais.'],
                ['title' => 'Ambiente Climatizado',           'description' => 'Mais conforto para participantes durante todo o período do evento.'],
                ['title' => 'Localização Estratégica',        'description' => 'Facilidade de acesso para empresas, parceiros e convidados.'],
                ['title' => 'Suporte da Equipe CDL',          'description' => 'Atendimento dedicado para auxiliar na organização e realização do evento.'],
            ],
            'faqs' => [
                ['question' => 'Quais espaços estão disponíveis para locação?',     'answer' => 'A CDL Anápolis disponibiliza salas de reunião, salas corporativas e auditório para eventos empresariais, treinamentos, palestras e encontros institucionais.'],
                ['question' => 'Posso alugar o espaço por algumas horas?',           'answer' => 'Sim. Os espaços podem ser locados por hora, turno ou diária, conforme a necessidade do evento.'],
                ['question' => 'Os espaços possuem equipamentos para apresentação?', 'answer' => 'Sim. Dependendo do ambiente escolhido, estão disponíveis equipamentos audiovisuais para apoio às apresentações.'],
                ['question' => 'Qual a capacidade dos espaços?',                     'answer' => 'A capacidade varia conforme o ambiente contratado. Nossa equipe poderá indicar o espaço ideal de acordo com o número de participantes.'],
                ['question' => 'Como solicitar um orçamento?',                       'answer' => 'Basta preencher o formulário de interesse ou entrar em contato com a CDL Anápolis para receber uma proposta personalizada.'],
                ['question' => 'Posso realizar treinamentos e cursos no espaço?',    'answer' => 'Sim. Os ambientes foram preparados para receber treinamentos, workshops, cursos, reuniões empresariais e diversos formatos de eventos corporativos.'],
            ],
            'external_url' => '',
            'cta_text'     => 'Fale com nossa equipe e receba uma proposta personalizada para o seu evento.',
            'cta_link'     => '/fale-conosco/',
        ],
        'tempo-saude' => [
            'intro' => '<p>Com o Tempo &amp; Saúde, você e seus dependentes têm acesso a consultas médicas, exames laboratoriais e de imagem a preços acessíveis, sem comprometer a qualidade. Sem carência, com telemedicina 24 horas por dia, 7 dias por semana, e descontos de até 35% em medicamentos.</p><p>Uma ampla rede privada de saúde com mais de 50 especialidades médicas, milhares de farmácias credenciadas em todo o país e parceria com Saúde iD e Hospital Oswaldo Cruz.</p>',
            'features' => [
                ['title' => 'Plano Individual',         'description' => 'A partir de R$ 20/mês (assinatura anual) — acesso a mais de 50 especialidades médicas com valores acessíveis.'],
                ['title' => 'Plano Família',            'description' => 'A partir de R$ 24,90/mês (assinatura anual) — estenda os benefícios para toda a família com economia.'],
                ['title' => '50+ Especialidades',       'description' => 'Mais de 50 especialidades médicas disponíveis para consultas, exames e procedimentos.'],
                ['title' => 'Desconto em Medicamentos', 'description' => 'Até 35% de desconto em medicamentos nas farmácias parceiras em todo o Brasil.'],
                ['title' => 'Sem Carência',             'description' => 'Atendimento imediato, sem período de carência. Comece a usar assim que ativar o plano.'],
                ['title' => 'Telemedicina 24/7',        'description' => 'Consultas por telemedicina disponíveis 24 horas por dia, 7 dias por semana, onde você estiver.'],
            ],
            'faqs' => [
                ['question' => 'O que é o Tempo & Saúde?',          'answer' => 'Um serviço de saúde que oferece acesso a consultas médicas, exames, terapias e descontos em medicamentos a preços acessíveis, sem carência ou restrições.'],
                ['question' => 'Quem pode aderir?',                 'answer' => 'Qualquer pessoa individualmente ou com até três dependentes no plano familiar.'],
                ['question' => 'Há período de carência?',           'answer' => 'Não, Tempo & Saúde não tem período de carência; uso imediato após inscrição.'],
                ['question' => 'Como funciona o agendamento?',      'answer' => 'Serviço gratuito onde a equipe auxilia com consultas na data e local de preferência.'],
            ],
            'external_url' => '',
            'cta_text'     => 'Planos a partir de R$ 20/mês com mais de 50 especialidades.',
            'cta_link'     => '/fale-conosco/',
        ],
    ];
}

add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_servicos_v2', function () {
        foreach (cdl_seed_servicos_data() as $slug => $fb) {
            // Tenta o slug direto e também a variação certificado-digital-cdl
            $page = get_page_by_path($slug);
            if (!$page && $slug === 'certificado-digital') {
                $page = get_page_by_path('certificado-digital-cdl');
            }
            if (!$page) continue;

            update_field('servico_intro',        $fb['intro'],        $page->ID);
            update_field('servico_features',     $fb['features'],     $page->ID);
            update_field('servico_faqs',         $fb['faqs'],         $page->ID);
            update_field('servico_external_url', $fb['external_url'], $page->ID);
            update_field('servico_cta_text',     $fb['cta_text'],     $page->ID);
            update_field('servico_cta_link',     $fb['cta_link'],     $page->ID);
        }
    });
});

// =====================================================================
// BALCÃO DO MEI — popula admin com o conteúdo institucional
// =====================================================================
add_action('acf/init', function () {
    cdl_seed_run('cdl_seed_balcao_mei_v1', function () {
        $page = get_page_by_path('balcao-do-mei');
        if (!$page) return;

        update_field('balcao_hero_tag',      'Serviço CDL', $page->ID);
        update_field('balcao_hero_title',    'Balcão do MEI CDL Anápolis', $page->ID);
        update_field('balcao_hero_subtitle', 'Formalize seu negócio com segurança, orientação e apoio de quem entende de empreendedorismo.', $page->ID);

        update_field('balcao_intro', 'Com o Balcão do MEI da CDL Anápolis, você conta com suporte para abrir seu MEI, regularizar sua empresa e dar o próximo passo com mais tranquilidade.', $page->ID);

        update_field('balcao_opt1_title', 'Quero abrir meu MEI', $page->ID);
        update_field('balcao_opt1_desc',  'Preencha o formulário com seus dados e nossa equipe irá analisar as informações para iniciar o processo de abertura do seu MEI com segurança.', $page->ID);
        update_field('balcao_opt1_cta',   'Cadastrar meu MEI', $page->ID);

        update_field('balcao_opt2_title', 'Já sou MEI', $page->ID);
        update_field('balcao_opt2_desc',  'Se você já possui MEI, conheça o Plano MEI da CDL Anápolis e tenha acesso a soluções, benefícios e suporte para fortalecer o seu negócio.', $page->ID);
        update_field('balcao_opt2_cta',   'Conhecer Plano MEI', $page->ID);
        update_field('balcao_opt2_link',  '/associe-se/?abrir=bronze#planos', $page->ID);

        update_field('balcao_porque_title', 'Por que abrir seu MEI pela CDL Anápolis?', $page->ID);
        update_field('balcao_porque_text',  'Abrir seu MEI com a CDL é contar com orientação especializada desde o primeiro passo. Nossa equipe auxilia no processo de formalização, evita erros no cadastro e ajuda você a entender melhor suas obrigações como empreendedor.', $page->ID);

        update_field('balcao_beneficios', [
            ['titulo' => 'Atendimento orientado',                        'descricao' => 'Suporte para preencher corretamente as informações necessárias.'],
            ['titulo' => 'Mais segurança no cadastro',                   'descricao' => 'Evite erros na atividade, dados da empresa e informações obrigatórias.'],
            ['titulo' => 'Apoio após a formalização',                    'descricao' => 'Você não fica sozinho depois de abrir o MEI.'],
            ['titulo' => 'Acesso ao Plano MEI CDL',                      'descricao' => 'Benefícios exclusivos para quem quer crescer com mais estrutura.'],
            ['titulo' => 'Facilidade para emitir notas e se regularizar', 'descricao' => 'Orientação para deixar sua empresa pronta para vender mais.'],
        ], $page->ID);

        update_field('balcao_cta_title', 'Comece seu negócio do jeito certo.', $page->ID);
        update_field('balcao_cta_text',  'A CDL Anápolis está pronta para ajudar você a transformar sua ideia em uma empresa formalizada, regular e preparada para crescer.', $page->ID);
        update_field('balcao_cta_btn',   'Cadastrar meu MEI', $page->ID);
    });
});
