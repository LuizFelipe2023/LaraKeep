<div class="container py-5">
    <link rel="stylesheet" href="{{ asset('css/notes/create.css') }}">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            
            <h5 class="text-muted mb-4 text-center fw-light">Nova Nota</h5>

            <div class="keep-create-card">
                <form wire:submit.prevent="save">
                    
                    <div class="d-flex flex-column">
                        <input type="text" 
                               wire:model.live="title" 
                               class="form-control keep-input @error('title') is-invalid @enderror" 
                               placeholder="Título">
                        @error('title')
                            <span class="keep-error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex flex-column">
                        <textarea wire:model.live="content" 
                                  class="form-control keep-textarea @error('content') is-invalid @enderror" 
                                  placeholder="Criar uma nota..." 
                                  rows="6"></textarea>
                        @error('content')
                            <span class="keep-error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="keep-footer">
                        <a href="{{ route('notes.index') }}" class="btn-keep-close text-decoration-none">
                            Cancelar
                        </a>
                        <button type="submit" class="btn-keep-save">
                            Concluir
                        </button>
                    </div>

                </form>
            </div>

            @if ($errors->any())
                <div class="mt-4 text-center">
                    <small class="text-danger text-uppercase fw-bold" style="font-size: 0.65rem;">
                        Verifique os campos acima
                    </small>
                </div>
            @endif

        </div>
    </div>
</div>