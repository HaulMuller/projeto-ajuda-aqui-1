@section('styles')
<link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
@endsection

<x-guest-layout title="Bem-vindo">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-titulo">Juntos podemos fazer a diferença!</h1>
            <p class="hero-subtitulo">
                Conectamos pessoas que precisam de ajuda com aquelas que podem colaborar.
                Encontre campanhas solidárias ou cadastre sua própria ação.
            </p>
            <div class="hero-buttons">
                <div class="hero-buttons">
                    <a href="{{ route('acoes.listar') }}" class="btn-hero btn-hero-primary">
                        <i class="bi bi-search"></i> Encontrar Campanhas
                    </a>
                    <a href="{{ route('login') }}" class="btn-hero btn-hero-secondary">
                        <i class="bi bi-plus-circle" ></i> Cadastrar Ação
                    </a>
                </div>
            </div>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">{{ \App\Models\Acao::ativas()->count() }}</span>
                <span class="stat-label">Campanhas Ativas</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ \App\Models\Categoria::ativas()->count() }}</span>
                <span class="stat-label">Categorias</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ \App\Models\Voluntario::count() + \App\Models\Doador::count() }}</span>
                <span class="stat-label">Participantes</span>
            </div>
        </div>
    </section>

    <!-- Como Funciona -->
    <section class="como-funciona">
        <h2 class="titulo-secao">Como Funciona</h2>
        <p class="subtitulo-secao">Em apenas 3 passos simples você pode participar de uma campanha solidária</p>
        <div class="passos-container">
            <div class="passo-item">
                <div class="passo-numero">1</div>
                <div class="passo-icone">🔍</div>
                <h3 class="passo-titulo">Encontre uma Campanha</h3>
                <p class="passo-descricao">Navegue pelas campanhas disponíveis e filtre por categoria, localização ou urgência.</p>
            </div>
            <div class="passo-item">
                <div class="passo-numero">2</div>
                <div class="passo-icone">📝</div>
                <h3 class="passo-titulo">Inscreva-se</h3>
                <p class="passo-descricao">Escolha como deseja ajudar: seja como voluntário ou doador.</p>
            </div>
            <div class="passo-item">
                <div class="passo-numero">3</div>
                <div class="passo-icone">🤝</div>
                <h3 class="passo-titulo">Faça a Diferença</h3>
                <p class="passo-descricao">Participe da campanha e ajude a transformar vidas em sua comunidade.</p>
            </div>
        </div>
    </section>

    <!-- Ações em Destaque -->
    <section class="container-eventos-destaque">
        <h2 class="titulo-secao">Campanhas em Destaque</h2>
        <p class="subtitulo-secao">Ações que mais precisam de sua ajuda neste momento</p>

        @if($acoesDestaque->count() > 0)
            <div class="grid-destaque">
                @foreach ($acoesDestaque as $acao)
                    <div class="card-destaque">
                        <div class="card-imagem">
                            <img src="{{ $acao->imagem ? asset('storage/' . $acao->imagem) : asset('img/placeholder-acao.jpg') }}" alt="{{ $acao->titulo }}">
                            <span class="badge-urgencia urgencia-{{ $acao->urgencia }}">
                                {{ $acao->urgencia === 'critica' ? '🔴 Crítica' : ($acao->urgencia === 'alta' ? '🟠 Alta' : ($acao->urgencia === 'media' ? '🟡 Média' : '🟢 Baixa')) }}
                            </span>
                        </div>
                        <div class="card-conteudo">
                            @if($acao->categoria)
                                <span class="card-categoria" style="background-color: {{ $acao->categoria->cor }}20; color: {{ $acao->categoria->cor }}">
                                    {{ $acao->categoria->icone }} {{ $acao->categoria->nome }}
                                </span>
                            @endif
                            <h3 class="card-titulo">{{ $acao->titulo }}</h3>
                            <p class="card-descricao">{{ Str::limit($acao->descricao, 120) }}</p>
                            <div class="card-info">
                                @if($acao->data)
                                    <span class="info-item">📅 {{ $acao->data->format('d/m/Y') }}</span>
                                @endif
                                @if($acao->localizacao)
                                    <span class="info-item">📍 {{ Str::limit($acao->localizacao, 25) }}</span>
                                @endif
                            </div>
                            <a href="{{ route('acoes.show', $acao->id) }}" class="btn-participar">
                                Quero Participar →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="sem-campanhas">
                <p>🎉 Nenhuma campanha em destaque no momento.</p>
                <a href="{{ route('login') }}" class="btn-hero btn-hero-primary">Seja o primeiro a cadastrar!</a>
            </div>
        @endif
    </section>

    <!-- Próximas Ações -->
    @if($proximasAcoes->count() > 0)
    <section class="container-proximos-eventos">
        <h2 class="titulo-secao">Próximas Campanhas</h2>
        <p class="subtitulo-secao">Campanhas que acontecerão em breve</p>
        <div class="grid-eventos">
            @foreach ($proximasAcoes as $acao)
                <div class="evento-card">
                    <div class="evento-imagem">
                        <img src="{{ $acao->imagem ? asset('storage/' . $acao->imagem) : asset('img/placeholder-acao.jpg') }}" alt="{{ $acao->titulo }}">
                    </div>
                    <div class="evento-conteudo">
                        @if($acao->categoria)
                            <span class="evento-categoria">{{ $acao->categoria->icone }} {{ $acao->categoria->nome }}</span>
                        @endif
                        <h3 class="titulo-evento">{{ $acao->titulo }}</h3>
                        <p class="data-evento">📅 {{ $acao->data ? $acao->data->format('d/m/Y') : 'Data a definir' }}</p>
                        <p class="descricao-evento">{{ Str::limit($acao->descricao, 80) }}</p>
                        <a href="{{ route('acoes.show', $acao->id) }}" class="btn-saiba-mais">Saiba mais</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ver-todas">
            <a href="{{ route('acoes.listar') }}" class="btn-ver-todas">Ver todas as campanhas →</a>
        </div>
    </section>
    @endif

    <!-- Categorias -->
    <section class="container-categorias">
        <h2 class="titulo-secao">Categorias de Doação</h2>
        <p class="subtitulo-secao">Escolha a categoria que mais combina com você</p>
        <div class="grid-categorias">
            @foreach ($categorias as $categoria)
                <a href="{{ route('acoes.listar', ['categoria_id' => $categoria->id]) }}" class="categoria-card">
                    <div class="categoria-icone" style="background-color: {{ $categoria->cor }}20;">
                        <span style="font-size: 2rem;">{{ $categoria->icone }}</span>
                    </div>
                    <h4 class="categoria-nome">{{ $categoria->nome }}</h4>
                    <p class="categoria-descricao">{{ Str::limit($categoria->descricao, 60) }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <!-- CTA Final -->
    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-titulo">Tem uma campanha solidária?</h2>
            <p class="cta-descricao">
                Cadastre sua ação e alcance mais pessoas que desejam ajudar.
                É rápido, fácil e totalmente gratuito!
            </p>
            <a href="{{ route('login') }}" class="btn-hero btn-hero-white">
                <span>🚀</span> Cadastrar minha campanha
            </a>
        </div>
    </section>
</x-guest-layout>
