<div class="container py-5">
    <link rel="stylesheet" href="{{ asset('css/notes/create.css') }}">
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <h5 class="keep-page-title mb-4 text-center">Nova Nota</h5>

            <div class="keep-create-card shadow-lg">
                <form wire:submit.prevent="save">
                    
                    <div class="d-flex flex-column border-bottom" style="border-color: var(--keep-border) !important;">
                        <input type="text" 
                               wire:model.live="title" 
                               class="form-control keep-input border-0 shadow-none @error('title') is-invalid @enderror" 
                               placeholder="Título">
                    </div>
                    @error('title')
                        <span class="keep-error-text">{{ $message }}</span>
                    @enderror

                    <div class="d-flex flex-column" wire:ignore>
                        <div id="editor" class="keep-quill-editor">
                            {!! $content !!}
                        </div>
                    </div>

                    @error('content')
                        <span class="keep-error-text">{{ $message }}</span>
                    @enderror

                    <div class="keep-footer">
                        <a href="{{ route('notes.index') }}" class="btn-keep-text text-decoration-none">
                            Cancelar
                        </a>
                        <button type="submit" class="btn-keep-text btn-save-highlight">
                            Concluir
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/quill-setup.js') }}"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            initLaraKeepEditor('#editor', 'content', @this);
        });
    </script>
</div>