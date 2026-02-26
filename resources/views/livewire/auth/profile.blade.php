<div>
    <div class="container py-5">
        <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-card shadow-sm w-100" style="max-width: 100%;">
                    <div class="google-logo mb-4">👤 Meu Perfil</div>

                    <div class="mb-4">
                        <label class="text-secondary small fw-bold text-uppercase">Informações da Conta</label>
                        <div class="keep-field mt-2 opacity-75">
                            <input type="text" value="{{ $name }}" class="keep-input" disabled
                                title="Nome não editável">
                        </div>
                        <div class="keep-field mt-3 opacity-75">
                            <input type="email" value="{{ $email }}" class="keep-input" disabled
                                title="E-mail não editável">
                            <small class="text-muted mt-1 d-block">O e-mail é usado para recuperação de conta.</small>
                        </div>
                    </div>

                    <hr class="border-secondary my-4">

                    <form wire:submit.prevent="updatePassword">
                        <label class="text-secondary small fw-bold text-uppercase">Segurança e Senha</label>

                        <div class="keep-field mt-3">
                            <input type="password" wire:model="current_password"
                                class="keep-input @error('current_password') is-invalid @enderror"
                                placeholder="Senha atual">
                            @error('current_password') <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="keep-field mt-3">
                            <input type="password" wire:model="password"
                                class="keep-input @error('password') is-invalid @enderror" placeholder="Nova senha">
                            @error('password') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                        </div>

                        <div class="keep-field mt-3">
                            <input type="password" wire:model="password_confirmation" class="keep-input"
                                placeholder="Confirmar nova senha">
                        </div>

                        <div class="auth-footer mt-5">
                            <span></span> <button type="submit" class="btn-google">
                                <span wire:loading.remove wire:target="updatePassword">Salvar Nova Senha</span>
                                <span wire:loading wire:target="updatePassword">Atualizando...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>