@section('styles')
    <link rel="stylesheet" href="{{ asset('css/detalhe-acao.css')}}">
@endsection

<x-guest-layout title="{{ $acao->titulo }}">
    <div class="detalhe-container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb-nav">
            <a href="{{ route('home') }}">Início</a>
            <span>›</span>
            <a href="{{ route('acoes.listar') }}">Campanhas</a>
            <span>›</span>
            <span class="current">{{ Str::limit($acao->titulo, 30) }}</span>
        </nav>

        <div class="detalhe-grid">
            <!-- Coluna Principal -->
            <div class="detalhe-principal">
                <!-- Imagem -->
                <div class="detalhe-imagem">
                    <img src="{{ $acao->imagem ? asset('storage/' . $acao->imagem) : asset('img/placeholder-acao.jpg') }}" alt="{{ $acao->titulo }}">
                    <span class="badge-urgencia urgencia-{{ $acao->urgencia }}">
                        @if($acao->urgencia === 'critica')
                            🔴 Urgência Crítica
                        @elseif($acao->urgencia === 'alta')
                            🟠 Urgência Alta
                        @elseif($acao->urgencia === 'media')
                            🟡 Urgência Média
                        @else
                            🟢 Urgência Baixa
                        @endif
                    </span>
                </div>

                <!-- Informações -->
                <div class="detalhe-info">
                    @if($acao->categoria)
                        <span class="detalhe-categoria" style="background-color: {{ $acao->categoria->cor }}20; color: {{ $acao->categoria->cor }}">
                            {{ $acao->categoria->icone }} {{ $acao->categoria->nome }}
                        </span>
                    @endif
                    
                    <h1 class="detalhe-titulo">{{ $acao->titulo }}</h1>
                    
                    <div class="detalhe-meta">
                        @if($acao->data)
                            <span class="meta-item">📅 {{ $acao->data->format('d/m/Y') }}</span>
                        @endif
                        @if($acao->localizacao)
                            <span class="meta-item">📍 {{ $acao->localizacao }}</span>
                        @endif
                    </div>

                    <div class="detalhe-descricao">
                        <h3>Sobre a Campanha</h3>
                        <p>{{ $acao->descricao ?? 'Descrição não disponível.' }}</p>
                    </div>

                    <!-- Progresso -->
                    @if($acao->meta)
                    <div class="detalhe-progresso">
                        <h3>Progresso da Campanha</h3>
                        <div class="progresso-container">
                            <div class="progresso-barra">
                                <div class="progresso-fill" style="width: {{ $acao->progresso }}%"></div>
                            </div>
                            <div class="progresso-info">
                                <span>{{ $acao->progresso }}% concluído</span>
                                <span>Meta: R$ {{ number_format($acao->meta, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Estatísticas -->
                    <div class="detalhe-stats">
                        <div class="stat-card">
                            <span class="stat-icon">🙋</span>
                            <span class="stat-numero">{{ $acao->quantidade_voluntarios }}</span>
                            <span class="stat-label">Voluntários</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-icon">💝</span>
                            <span class="stat-numero">{{ $acao->quantidade_doadores }}</span>
                            <span class="stat-label">Doadores</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-icon">👥</span>
                            <span class="stat-numero">{{ $acao->total_participantes }}</span>
                            <span class="stat-label">Total</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coluna Lateral -->
            <div class="detalhe-sidebar">
                <!-- Card de Contato -->
                <div class="sidebar-card">
                    <h3>📞 Contato</h3>
                    @if($acao->email_contato)
                        <p class="contato-item">
                            <strong>Email:</strong><br>
                            <a href="mailto:{{ $acao->email_contato }}">{{ $acao->email_contato }}</a>
                        </p>
                    @endif
                    @if($acao->telefone_contato)
                        <p class="contato-item">
                            <strong>Telefone:</strong><br>
                            <a href="tel:{{ $acao->telefone_contato }}">{{ $acao->telefone_contato }}</a>
                        </p>
                    @endif
                    @if($acao->organizador)
                        <p class="contato-item">
                            <strong>Organizador:</strong><br>
                            {{ $acao->organizador->name }}
                        </p>
                    @endif
                </div>

                <!-- Formulário de Inscrição -->
                <div class="sidebar-card inscricao-card">
                    <h3>🤝 Quero Participar!</h3>
                    <p class="inscricao-descricao">Preencha o formulário abaixo para se inscrever nesta campanha.</p>
                    
                    @if(session('inscricao_sucesso'))
                        <div class="alert alert-success">
                            {{ session('inscricao_sucesso') }}
                        </div>
                    @endif

                    <form action="{{ route('inscricao.store', $acao->id) }}" method="POST" class="form-inscricao">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nome">Nome Completo *</label>
                            <input type="text" id="nome" name="nome" required 
                                   placeholder="Seu nome completo" value="{{ old('nome') }}">
                            @error('nome')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required 
                                   placeholder="seu@email.com" value="{{ old('email') }}">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" id="telefone" name="telefone" 
                                   placeholder="(82) 99999-9999" value="{{ old('telefone') }}">
                        </div>

                        <div class="form-group">
                            <label for="tipo">Como deseja participar? *</label>
                            <select id="tipo" name="tipo" required>
                                <option value="">Selecione...</option>
                                <option value="voluntario" {{ old('tipo') == 'voluntario' ? 'selected' : '' }}>
                                    🙋 Quero ser Voluntário
                                </option>
                                <option value="doador" {{ old('tipo') == 'doador' ? 'selected' : '' }}>
                                    💝 Quero ser Doador
                                </option>
                            </select>
                            @error('tipo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mensagem">Mensagem (opcional)</label>
                            <textarea id="mensagem" name="mensagem" rows="3" 
                                      placeholder="Deixe uma mensagem...">{{ old('mensagem') }}</textarea>
                        </div>

                        <button type="submit" class="btn-inscricao">
                            Confirmar Inscrição
                        </button>
                    </form>
                </div>

                <!-- Compartilhar -->
                <div class="sidebar-card">
                    <h3>📢 Compartilhar</h3>
                    <p>Ajude a divulgar esta campanha!</p>
                    <div class="share-buttons">
                        <a href="https://wa.me/?text={{ urlencode($acao->titulo . ' - ' . route('acoes.show', $acao->id)) }}" 
                           target="_blank" class="share-btn whatsapp">
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('acoes.show', $acao->id)) }}" 
                           target="_blank" class="share-btn facebook">
                            Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Voltar -->
        <div class="voltar-container">
            <a href="{{ route('acoes.listar') }}" class="btn-voltar">
                ← Voltar para Campanhas
            </a>
        </div>
    </div>
</x-guest-layout>
