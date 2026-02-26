<div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

    
        <div class="auth-card shadow-sm">
            <div class="google-logo">💡 LaraKeep</div>

            <div class="auth-header text-center">
                <h1>Verifique seu e-mail</h1>
                <p class="mt-2" style="color: #9aa0a6;">
                    Enviamos um código de 6 dígitos para <br>
                    <span style="color: #fbbc04; font-weight: 500;">{{ $email }}</span>
                </p>
            </div>

            <form wire:submit.prevent="verify" class="mt-4">
                <div class="keep-field text-center">
                    <label style="color: #e8eaed; font-size: 14px; margin-bottom: 12px; display: block;">Digite o código
                        abaixo:</label>
                    <input type="text" wire:model="token"
                        class="keep-input text-center @error('token') is-invalid @enderror"
                        style="letter-spacing: 10px; font-size: 24px; font-weight: bold;" maxlength="6"
                        placeholder="000000" autofocus>

                    @error('token')
                        <small class="text-danger mt-2 d-block text-start">{{ $message }}</small>
                    @enderror
                </div>

                <div class="auth-footer mt-5">
                    <button type="button" wire:click="resendCode" class="link-google"
                        style="border:none; background:none;">
                        Reenviar
                    </button>
                    <button type="submit" class="btn-google">Verificar</button>
                </div>
            </form>
        </div>
    </div>
</div>