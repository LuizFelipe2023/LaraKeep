<div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
        <div class="auth-card shadow-sm">
            <div class="google-logo">💡 LaraKeep</div>

            <div class="auth-header">
                <h1>Fazer login</h1>
                <span>Prosseguir para o Keep</span>
            </div>

            @if(session()->has('success'))
                <div class="keep-snackbar" id="global-alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn btn-sm btn-link text-warning text-decoration-none fw-bold"
                        onclick="this.parentElement.remove()">
                        FECHAR
                    </button>
                </div>
            @endif

            <script src="{{ asset('js/global-alert.js') }}"></script>

            <form wire:submit.prevent="login">
                <div class="keep-field">
                    <input type="email" wire:model="email" class="keep-input" placeholder="E-mail ou telefone">
                    @error('email') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                </div>

                <div class="keep-field">
                    <input type="password" wire:model="password" class="keep-input" placeholder="Digite sua senha">
                    @error('password') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" wire:model="remember" id="remember">
                        <label class="form-check-label text-secondary" for="remember">
                            Lembrar de mim
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="link-google" style="font-size: 0.9rem;">Esqueceu a
                        senha?</a>
                </div>

                <div class="auth-footer">
                    <a href="{{ route('register') }}" class="link-google">Criar conta</a>
                    <button type="submit" class="btn-google">Próxima</button>
                </div>
            </form>
        </div>
    </div>
</div>