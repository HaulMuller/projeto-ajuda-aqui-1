@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination-list">
            {{-- Botão Anterior --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled">
                    <span aria-disabled="true" aria-label="@lang('pagination.previous')">
                        ← Anterior
                    </span>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        ← Anterior
                    </a>
                </li>
            @endif

            {{-- Números das páginas --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item">
                                <span aria-current="page" class="active">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination-item">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botão Próxima --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        Próxima →
                    </a>
                </li>
            @else
                <li class="pagination-item disabled">
                    <span aria-disabled="true" aria-label="@lang('pagination.next')">
                        Próxima →
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
