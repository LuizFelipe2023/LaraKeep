<div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 90vh;">
        <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
        <div class="auth-card shadow-sm">
            <div class="google-logo">💡 LaraKeep</div>

            <div class="auth-header">
                <h1>Criar sua conta</h1>
                <span class="text-secondary">Use seu e-mail para começar</span>
            </div>

            <form wire:submit.prevent="register">
                <div class="keep-field">
                    <input type="text" wire:model="name" class="keep-input @error('name') is-invalid @enderror"
                        placeholder="Nome completo">
                    @error('name') <span class="error-label">{{ $message }}</span> @enderror
                </div>

                <div class="keep-field">
                    <input type="email" wire:model="email" class="keep-input @error('email') is-invalid @enderror"
                        placeholder="Seu endereço de e-mail">
                    @error('email') <span class="error-label">{{ $message }}</span> @enderror
                </div>

                <div class="row g-2">
                    <div class="col-md-6 keep-field">
                        <input type="password" wire:model="password"
                            class="keep-input @error('password') is-invalid @enderror" placeholder="Senha">
                    </div>
                    <div class="col-md-6 keep-field">
                        <input type="password" wire:model="password_confirmation" class="keep-input"
                            placeholder="Confirmar">
                    </div>
                </div>
                @error('password') <span class="error-label"
                style="margin-top: -10px; margin-bottom: 10px;">{{ $message }}</span> @enderror

                <small class="text-muted d-block" style="font-size: 11px;">
                    Use 8 ou mais caracteres com uma combinação de letras e números.
                </small>

                <div class="auth-footer">
                    <a href="{{ route('login') }}" class="link-google">Faça login em vez disso</a>
                    <button type="submit" class="btn-google">Próxima</button>
                </div>
            </form>
        </div>
    </div>
</div>