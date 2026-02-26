<div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
        
        <div class="auth-card shadow-sm">
            <div class="google-logo">💡 LaraKeep</div>

            <div class="auth-header">
                <h1>Recuperar conta</h1>
                <span>Digite seu e-mail para receber o código</span>
            </div>

            <form wire:submit.prevent="sendResetLink">
                <div class="keep-field">
                    <input type="email" wire:model="email" class="keep-input @error('email') is-invalid @enderror" 
                           placeholder="E-mail de recuperação" autofocus>
                    @error('email') 
                        <small class="text-danger mt-1 d-block">{{ $message }}</small> 
                    @enderror
                </div>

                <div class="auth-footer mt-4">
                    <a href="{{ route('login') }}" class="link-google">Voltar</a>
                    <button type="submit" class="btn-google">
                        <span wire:loading.remove wire:target="sendResetLink">Próxima</span>
                        <span wire:loading wire:target="sendResetLink">Enviando...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>