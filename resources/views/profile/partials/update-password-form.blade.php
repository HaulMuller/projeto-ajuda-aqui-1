<section class="profile-container">

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar senha') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Certifique-se de usar uma senha forte e segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6">
        @csrf
        @method('put')

        <div class="container-inputs-perfil">

            {{-- Senha atual --}}
            <div class="profile-group">
                <label for="update_password_current_password" class="sr-only">Senha Atual</label>
                <input id="update_password_current_password"
                       name="current_password"
                       type="password"
                       class="profile-input"
                       placeholder="Senha atual"
                       autocomplete="current-password"
                />
                <x-input-error class="profile-error" :messages="$errors->updatePassword->get('current_password')" />
            </div>

            {{-- Nova senha --}}
            <div class="profile-group">
                <label for="update_password_password" class="sr-only">Nova senha</label>
                <input id="update_password_password"
                       name="password"
                       type="password"
                       class="profile-input"
                       placeholder="Nova senha"
                       autocomplete="new-password"
                />
                <x-input-error class="profile-error" :messages="$errors->updatePassword->get('password')" />
            </div>

            {{-- Confirmar nova senha --}}
            <div class="profile-group" style="width: 82%">
                <label for="update_password_password_confirmation" class="sr-only">Confirmar senha</label>
                <input id="update_password_password_confirmation"
                       name="password_confirmation"
                       type="password"
                       class="profile-input"
                       placeholder="Confirmar nova senha"
                       autocomplete="new-password"
                />
                <x-input-error class="profile-error" :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>

            {{-- Botão --}}
            <button class="profile-btn">Salvar</button>

            @if (session('status') === 'password-updated')
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
