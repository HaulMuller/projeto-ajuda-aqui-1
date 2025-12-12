@section('styles')
    <link rel="stylesheet" href="{{ asset('css/listar-acoes.css') }}">
@endsection

<x-guest-layout title="Campanhas Solidárias">
    <div class="listagem-container">
        <!-- Header da página -->
        <div class="listagem-header">
            <h1 class="listagem-titulo">Campanhas Solidárias</h1>
            <p class="listagem-subtitulo">Encontre uma campanha e faça a diferença na sua comunidade</p>
        </div>

        <!-- Filtros -->
        <div class="filtros-container">
            <form action="{{ route('acoes.listar') }}" method="GET" class="filtros-form">
                <div class="filtros-grid">
                    <!-- Busca -->
                    <div class="filtro-item filtro-busca">
                        <label for="titulo">Buscar</label>
                        <input type="text" id="titulo" name="titulo"
                               placeholder="Digite o nome da campanha..."
                               value="{{ request('titulo') }}">
                    </div>

                    <!-- Categoria -->
                    <div class="filtro-item">
                        <label for="categoria_id">Categoria</label>
                        <select id="categoria_id" name="categoria_id">
                            <option value="">Todas as categorias</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->icone }} {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Urgência -->
                    <div class="filtro-item">
                        <label for="urgencia">Urgência</label>
                        <select id="urgencia" name="urgencia">
                            <option value="">Todas</option>
                            <option value="critica" {{ request('urgencia') == 'critica' ? 'selected' : '' }}>🔴 Crítica</option>
                            <option value="alta" {{ request('urgencia') == 'alta' ? 'selected' : '' }}>🟠 Alta</option>
                            <option value="media" {{ request('urgencia') == 'media' ? 'selected' : '' }}>🟡 Média</option>
                            <option value="baixa" {{ request('urgencia') == 'baixa' ? 'selected' : '' }}>🟢 Baixa</option>
                        </select>
                    </div>

                    <!-- Data -->
                    <div class="filtro-item">
                        <label for="data">A partir de</label>
                        <input type="date" id="data" name="data" value="{{ request('data') }}">
                    </div>

                    <!-- Botões -->
                    <div class="filtro-item filtro-acoes">
                        <button type="submit" class="btn-filtrar">
                            Filtrar
                        </button>
                        <a href="{{ route('acoes.listar') }}" class="btn-limpar">
                            Limpar
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Resultados -->
        <div class="resultados-info">
            <span>{{ $acoes->total() }} campanha(s) encontrada(s)</span>
        </div>

        <!-- Grid de Campanhas -->
        @if($acoes->count())
            <div class="campanhas-grid">
                @foreach ($acoes as $acao)
                    <article class="campanha-card">
                        <div class="campanha-imagem">
                            <img src="{{ $acao->imagem ? asset('storage/' . $acao->imagem) : asset('img/placeholder-acao.jpg') }}"
                                 alt="{{ $acao->titulo }}">
                            <span class="campanha-urgencia urgencia-{{ $acao->urgencia }}">
                                @if($acao->urgencia === 'critica')
                                    🔴 Crítica
                                @elseif($acao->urgencia === 'alta')
                                    🟠 Alta
                                @elseif($acao->urgencia === 'media')
                                    🟡 Média
                                @else
                                    🟢 Baixa
                                @endif
                            </span>
                        </div>
                        <div class="campanha-conteudo">
                            @if($acao->categoria)
                                <span class="campanha-categoria" style="background-color: {{ $acao->categoria->cor }}20; color: {{ $acao->categoria->cor }}">
                                    {{ $acao->categoria->icone }} {{ $acao->categoria->nome }}
                                </span>
                            @endif
                            <h2 class="campanha-titulo">{{ $acao->titulo }}</h2>
                            <p class="campanha-data">
                                📅 {{ $acao->data ? $acao->data->format('d/m/Y') : 'Data a definir' }}
                            </p>
                            <p class="campanha-descricao">{{ Str::limit($acao->descricao, 100) }}</p>

                            @if($acao->localizacao)
                                <p class="campanha-local">📍 {{ Str::limit($acao->localizacao, 30) }}</p>
                            @endif

                            <div class="campanha-footer">
                                <div class="campanha-stats">
                                    <span title="Voluntários">🙋 {{ $acao->quantidade_voluntarios }}</span>
                                    <span title="Doadores">💝 {{ $acao->quantidade_doadores }}</span>
                                </div>
                                <a href="{{ route('acoes.show', $acao->id) }}" class="btn-ver-mais">
                                    Ver detalhes →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Paginação -->
            <div class="paginacao">
                {{ $acoes->withQueryString()->links('vendor.pagination.custom') }}
            </div>
        @else
            <div class="sem-resultados">
                <div class="sem-resultados-icone">🔍</div>
                <h3>Nenhuma campanha encontrada</h3>
                <p>Tente ajustar os filtros ou buscar por outros termos.</p>
                <a href="{{ route('acoes.listar') }}" class="btn-limpar-filtros">
                    Ver todas as campanhas
                </a>
            </div>
        @endif
    </div>
</x-guest-layout>
