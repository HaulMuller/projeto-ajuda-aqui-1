<section class="profile-container">

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações do perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize as informações do perfil e o endereço de e-mail da sua conta.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div class="container-inputs-perfil">
            {{-- Nome --}}
            <div class="profile-group">
                <label for="name" class="sr-only">Nome</label>
                <input id="name"
                       name="name"
                       type="text"
                       class="profile-input"
                       placeholder="Nome completo"
                       value="{{ old('name', $user->name) }}"
                       required
                       autofocus
                       autocomplete="name"
                />
                <x-input-error class="profile-error" :messages="$errors->get('name')" />
            </div>

            {{-- Email --}}
            <div class="profile-group">
                <label for="email" class="sr-only">Email</label>
                <input id="email"
                       name="email"
                       type="email"
                       class="profile-input"
                       placeholder="email@exemplo.com"
                       value="{{ old('email', $user->email) }}"
                       required
                       autocomplete="username"
                />
                <x-input-error class="profile-error" :messages="$errors->get('email')" />

                {{-- Verificação de email --}}
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 text-center">
                        <p class="text-sm text-gray-800">
                            {{ __('Seu e-mail ainda não foi verificado.') }}

                            <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Clique aqui para reenviar o link de verificação.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('Um novo link de verificação foi enviado para seu e-mail.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            {{-- Botão --}}
            <button class="profile-btn">Salvar</button>

            @if (session('status') === 'profile-updated')
                <p class="profile-saved-msg"
                   x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)">
                    {{ __('Salvo.') }}
                </p>
            @endif
        </div>
    </form>

</section>
