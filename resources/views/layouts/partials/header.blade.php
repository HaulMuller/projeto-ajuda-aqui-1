<header class="header">
    <div class="header-container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="header-logo">
            <img class="logo" src="{{ asset('img/2.png') }}" alt="Ajuda Aqui">
        </a>
        
        <!-- Navegação -->
        <nav class="header-nav">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Início
            </a>
            <a href="{{ route('acoes.listar') }}" class="nav-link {{ request()->routeIs('acoes.listar') ? 'active' : '' }}">
                Campanhas
            </a>
            <a href="{{ route('acoes.listar.hoje') }}" class="nav-link {{ request()->routeIs('acoes.listar.hoje') ? 'active' : '' }}">
                Hoje
            </a>
            <a href="{{ route('sobre') }}" class="nav-link {{ request()->routeIs('sobre') ? 'active' : '' }}">
                Sobre
            </a>
        </nav>

        <!-- Ações -->
        <div class="header-actions">
            @auth
                <!-- Dropdown para usuários logados -->
                <div class="dropdown">
                    <button class="btn-usuario dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <span>➕</span> Cadastrar Ação
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <span>👤</span> Meu Perfil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">
                                    <span>🚪</span> Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Botões para visitantes -->
                <a href="{{ route('login') }}" class="btn-cadastrar-acao">
                    <span>➕</span> Cadastrar Ação
                </a>
                <a href="{{ route('login') }}" class="btn-entrar">
                    Entrar
                </a>
            @endauth
        </div>

        <!-- Menu Mobile -->
        <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
            <span class="hamburger"></span>
        </button>
    </div>

    <!-- Menu Mobile Expandido -->
    <div class="collapse mobile-menu" id="mobileMenu">
        <nav class="mobile-nav">
            <a href="{{ route('home') }}" class="mobile-nav-link">Início</a>
            <a href="{{ route('acoes.listar') }}" class="mobile-nav-link">Campanhas</a>
            <a href="{{ route('acoes.listar.hoje') }}" class="mobile-nav-link">Hoje</a>
            <a href="{{ route('sobre') }}" class="mobile-nav-link">Sobre</a>
            @auth
                <a href="{{ route('dashboard') }}" class="mobile-nav-link">Cadastrar Ação</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="mobile-nav-link text-danger" type="submit">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mobile-nav-link">Entrar</a>
                <a href="{{ route('register') }}" class="mobile-nav-link">Cadastrar</a>
            @endauth
        </nav>
    </div>
</header>
