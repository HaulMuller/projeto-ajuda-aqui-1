<x-guest-layout title="Inscritos na ação">
    <div class="p-4 max-w-5xl mt-4 mb-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Inscritos na ação
        </h2>

        <!-- Nome da ação -->
        <p class="text-gray-600 mb-6">
            Ação: <span class="text-blue-600 font-semibold">{{ $acao->titulo }}</span>
        </p>

        <!-- Resumo de estatísticas -->
        <div style="display:flex; gap:2px; margin-bottom:1.5rem;">
            <div style="flex:1; padding:1rem; background:#f0f9ff; border:1px solid #dbeafe; border-radius:8px; min-width:0;">
                <p style="font-size:.875rem; color:#075985; font-weight:600;">Total de voluntários</p>
                <p style="font-size:1.25rem; font-weight:700; color:#075985;">{{ $voluntarios->count() }}</p>
            </div>
            <div style="flex:1; padding:1rem; background:#ecfdf5; border:1px solid #bbf7d0; border-radius:8px; min-width:0;">
                <p style="font-size:.875rem; color:#065f46; font-weight:600;">Total de doadores</p>
                <p style="font-size:1.25rem; font-weight:700; color:#065f46;">{{ $doadores->count() }}</p>
            </div>
            <div style="flex:1; padding:1rem; background:#ecfdf5; border:1px solid #bbf7d0; border-radius:8px; min-width:0;">
                <p style="font-size:.875rem; color:#065f46; font-weight:600;">Valor estimado total</p>
                <p style="font-size:1.25rem; font-weight:700; color:#065f46;">
                    R$ {{ number_format($doadores->sum('valor_estimado'), 2, ',', '.') }}
                </p>
            </div>
        </div>

        <!-- Card Voluntários -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-2 mt-4">Voluntários</h3>

            @if($voluntarios->isEmpty())
                <p class="text-gray-500">Nenhum voluntário inscrito.</p>
            @else
                <ul class="divide-y divide-gray-200">
                    @foreach ($voluntarios as $v)
                        <li class="py-3">
                            <span class="font-medium text-gray-800">{{ $v->nome }}</span>
                            <span class="text-gray-500">— {{ $v->email }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Card Doadores -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-2 mt-4">Doadores</h3>

            @if($doadores->isEmpty())
                <p class="text-gray-500">Nenhum doador inscrito.</p>
            @else
                <ul class="divide-y divide-gray-200">
                    @foreach ($doadores as $d)
                        <li class="py-3">
                            <span class="font-medium text-gray-800">{{ $d->nome }}</span>
                            <span class="text-gray-500">— {{ $d->email }}</span>

                            @if($d->valor_estimado)
                                <span class="text-green-600 font-semibold">
                                    — R$ {{ number_format($d->valor_estimado, 2, ',', '.') }}
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-guest-layout>
