<div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

      
        <div class="auth-card shadow-sm">
            <div class="google-logo">💡 LaraKeep</div>

            <div class="auth-header">
                <h1>Criar nova senha</h1>
                <span>Escolha uma senha forte para sua segurança</span>
            </div>

            <form wire:submit.prevent="resetPassword">
                <div class="keep-field">
                    <input type="password" wire:model="password"
                        class="keep-input @error('password') is-invalid @enderror" placeholder="Nova senha" autofocus>

                    @error('password')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="keep-field mt-3">
                    <input type="password" wire:model="password_confirmation" class="keep-input"
                        placeholder="Confirmar nova senha">
                </div>

                <div class="auth-footer mt-5">
                    <button type="submit" class="btn-google w-100" style="padding: 12px;">
                        <span wire:loading.remove wire:target="resetPassword">Alterar Senha e Entrar</span>
                        <span wire:loading wire:target="resetPassword">Processando...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>