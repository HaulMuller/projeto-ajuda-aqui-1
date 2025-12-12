@section('styles')
<link rel="stylesheet" href="{{ asset('css/sobre.css')}}">
@endsection

<x-guest-layout title="Sobre Nós">
    <!-- Hero Sobre -->
    <section class="sobre-hero">
        <h1 class="sobre-titulo">Sobre o Ajuda Aqui</h1>
        <p class="sobre-subtitulo">
            Conectando pessoas que precisam de ajuda com aquelas que podem colaborar
        </p>
    </section>

    <!-- O Projeto -->
    <section class="sobre-projeto">
        <div class="projeto-content">
            <h2 class="secao-titulo">O Projeto</h2>
            <p class="projeto-texto">
                O <strong>Ajuda Aqui</strong> é uma plataforma web desenvolvida para centralizar, organizar e divulgar 
                campanhas solidárias, facilitando a conexão entre pessoas que precisam de ajuda e aquelas dispostas a colaborar.
            </p>
            <p class="projeto-texto">
                Este projeto foi desenvolvido como parte do <strong>Projeto Integrador I</strong> do curso de 
                <strong>Bacharelado em Sistemas de Informação</strong> do Instituto Federal de Alagoas - Campus Maceió, 
                com o objetivo de aplicar conhecimentos técnicos em benefício da comunidade.
            </p>
        </div>
    </section>

    <!-- Problema e Solução -->
    <section class="problema-solucao">
        <div class="problema-card">
            <div class="card-icone">⚠️</div>
            <h3>O Problema</h3>
            <ul>
                <li>Dificuldade para centralizar e divulgar campanhas solidárias</li>
                <li>Falta de visibilidade das ações sociais</li>
                <li>Baixo engajamento da comunidade em campanhas</li>
                <li>Desorganização na comunicação entre organizadores e colaboradores</li>
            </ul>
        </div>
        <div class="solucao-card">
            <div class="card-icone">💡</div>
            <h3>A Solução</h3>
            <ul>
                <li>Plataforma centralizada para todas as campanhas</li>
                <li>Interface intuitiva e acessível</li>
                <li>Facilidade para voluntários e doadores participarem</li>
                <li>Categorização e filtros para encontrar campanhas</li>
            </ul>
        </div>
    </section>

    <!-- Funcionalidades -->
    <section class="funcionalidades">
        <h2 class="secao-titulo">Funcionalidades</h2>
        <div class="func-grid">
            <div class="func-item">
                <span class="func-icone">🔍</span>
                <h4>Buscar Campanhas</h4>
                <p>Encontre campanhas por categoria, urgência, data ou localização</p>
            </div>
            <div class="func-item">
                <span class="func-icone">📋</span>
                <h4>Visualizar Detalhes</h4>
                <p>Veja informações completas incluindo meta, progresso e contatos</p>
            </div>
            <div class="func-item">
                <span class="func-icone">➕</span>
                <h4>Cadastrar Ações</h4>
                <p>Organizadores podem criar e gerenciar suas campanhas</p>
            </div>
            <div class="func-item">
                <span class="func-icone">🖼️</span>
                <h4>Upload de Imagens</h4>
                <p>Adicione fotos para ilustrar suas ações solidárias</p>
            </div>
            <div class="func-item">
                <span class="func-icone">🏷️</span>
                <h4>Categorização</h4>
                <p>Alimentos, Roupas, Livros, Brinquedos, Sangue, Dinheiro e mais</p>
            </div>
            <div class="func-item">
                <span class="func-icone">🚨</span>
                <h4>Níveis de Urgência</h4>
                <p>Campanhas classificadas por urgência: baixa, média, alta e crítica</p>
            </div>
        </div>
    </section>

    <!-- Impacto Social -->
    <section class="impacto-social">
        <h2 class="secao-titulo">Impacto Social</h2>
        <p class="impacto-texto">
            O projeto conecta a universidade com a comunidade externa, facilitando o acesso da população 
            a oportunidades de ajuda mútua e promovendo a responsabilidade social e cidadania.
        </p>
        <div class="impacto-grid">
            <div class="impacto-item">
                <span class="impacto-icone">🎓</span>
                <h4>Comunidade Acadêmica</h4>
                <p>Estudantes, professores e funcionários</p>
            </div>
            <div class="impacto-item">
                <span class="impacto-icone">🏘️</span>
                <h4>Comunidade Local</h4>
                <p>Maceió e região metropolitana</p>
            </div>
            <div class="impacto-item">
                <span class="impacto-icone">🤝</span>
                <h4>ONGs e Organizações</h4>
                <p>Grupos sociais e diretórios acadêmicos</p>
            </div>
        </div>
    </section>

    <!-- Equipe -->
    <section class="equipe">
        <h2 class="secao-titulo">Nossa Equipe</h2>
        <p class="equipe-subtitulo">Conheça os desenvolvedores do projeto</p>
        <div class="equipe-grid">
            <div class="membro-card">
                <div class="membro-avatar">
                    <span>KC</span>
                </div>
                <h4 class="membro-nome">Karla Cristina</h4>
                <p class="membro-cargo">Desenvolvedora Full Stack</p>
                <p class="membro-descricao">Frontend, Backend e UX/UI</p>
            </div>
            <div class="membro-card">
                <div class="membro-avatar">
                    <span>IM</span>
                </div>
                <h4 class="membro-nome">Ingrid Mônica</h4>
                <p class="membro-cargo">Desenvolvedora Full Stack</p>
                <p class="membro-descricao">Frontend, Backend e UX/UI</p>
            </div>
            <div class="membro-card">
                <div class="membro-avatar">
                    <span>HM</span>
                </div>
                <h4 class="membro-nome">Haul Muller</h4>
                <p class="membro-cargo">Desenvolvedor Full Stack</p>
                <p class="membro-descricao">Frontend, Backend e UX/UI</p>
            </div>
        </div>
    </section>

    <!-- Instituição -->
    <section class="instituicao">
        <div class="inst-content">
            <h2 class="secao-titulo">Instituição</h2>
            <div class="inst-info">
                <p><strong>Instituto Federal de Alagoas - Campus Maceió</strong></p>
                <p>Bacharelado em Sistemas de Informação</p>
                <p>Projeto Integrador I</p>
                <p class="inst-orientador">
                    <strong>Orientador:</strong> Prof. Augusto Melo
                </p>
            </div>
        </div>
    </section>

    <!-- Tecnologias -->
    <section class="tecnologias">
        <h2 class="secao-titulo">Tecnologias Utilizadas</h2>
        <div class="tech-grid">
            <div class="tech-item">
                <span class="tech-badge backend">Backend</span>
                <p>PHP 8.2+ • Laravel 11 • Laravel Breeze</p>
            </div>
            <div class="tech-item">
                <span class="tech-badge frontend">Frontend</span>
                <p>Blade Templates • Bootstrap 5 • Alpine.js • CSS3</p>
            </div>
            <div class="tech-item">
                <span class="tech-badge database">Banco de Dados</span>
                <p>SQLite / MySQL</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="sobre-cta">
        <h2>Pronto para fazer a diferença?</h2>
        <p>Junte-se a nós e ajude a transformar vidas em sua comunidade!</p>
        <div class="cta-buttons">
            <a href="{{ route('acoes.listar') }}" class="btn-cta btn-primary">Ver Campanhas</a>
            <a href="{{ route('login') }}" class="btn-cta btn-secondary">Cadastrar Ação</a>
        </div>
    </section>
</x-guest-layout>

