<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- Logo e descrição -->
            <div class="footer-brand">
                <a href="{{ route('home') }}">
                    <img class="footer-logo" src="{{ asset('img/2.png') }}" alt="Ajuda Aqui">
                </a>
                <p class="footer-descricao">
                    Conectando pessoas que precisam de ajuda com aquelas que podem colaborar. 
                    Juntos fazemos a diferença!
                </p>
            </div>

            <!-- Links rápidos -->
            <div class="footer-links">
                <h4 class="footer-titulo">Links Rápidos</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Início</a></li>
                    <li><a href="{{ route('acoes.listar') }}">Campanhas</a></li>
                    <li><a href="{{ route('acoes.listar.hoje') }}">Ações de Hoje</a></li>
                    <li><a href="{{ route('sobre') }}">Sobre Nós</a></li>
                </ul>
            </div>

            <!-- Categorias -->
            <div class="footer-categorias">
                <h4 class="footer-titulo">Categorias</h4>
                <ul>
                    @php
                        $categoriasFooter = \App\Models\Categoria::where('ativo', true)
                            ->orderBy('nome')
                            ->limit(6)
                            ->get();
                    @endphp
                    @foreach($categoriasFooter as $categoria)
                        <li>
                            <a href="{{ route('acoes.listar', ['categoria_id' => $categoria->id]) }}">
                                {{ $categoria->icone }} {{ $categoria->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contato -->
            <div class="footer-contato">
                <h4 class="footer-titulo">Instituição</h4>
                <p>Instituto Federal de Alagoas</p>
                <p>Campus Maceió</p>
                <p>Sistemas de Informação</p>
                <p class="footer-projeto">Projeto Integrador I</p>
            </div>
        </div>

        <div class="footer-divider"></div>

        <!-- Rodapé inferior -->
        <div class="footer-bottom">
            <div class="footer-copyright">
                <p>© 2025 Ajuda Aqui. Desenvolvido com 💙 pela equipe:</p>
                <p class="footer-equipe">Karla Cristina • Ingrid Mônica • Haul Muller</p>
            </div>
            <div class="footer-actions">
                <a href="{{ route('login') }}" class="btn-footer">Cadastrar Ação</a>
            </div>
        </div>
    </div>
</footer>
