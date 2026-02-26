<div class="container py-5">
    <link rel="stylesheet" href="{{ asset('css/notes/edit.css') }}">
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <h5 class="keep-page-title text-center">Editar Nota</h5>

            <div class="keep-edit-card shadow-lg">
                <form wire:submit.prevent="save">
                    
                    <div class="d-flex flex-column border-bottom" style="border-color: var(--keep-border) !important;">
                        <input type="text" 
                               wire:model.live="title" 
                               class="form-control keep-input border-0 shadow-none" 
                               placeholder="Título">
                    </div>

                    <div class="d-flex flex-column" wire:ignore>
                        <div id="editor" class="keep-quill-editor">
                            {!! $content !!}
                        </div>
                    </div>

                    @error('content')
                        <span class="keep-error-text">{{ $message }}</span>
                    @enderror

                    <div class="keep-select-container">
                        <select wire:model.live="status" class="form-select keep-select shadow-none">
                            <option value="active" class="bg-dark">🟢 Ativa</option>
                            <option value="closed" class="bg-dark">⚪ Arquivada</option>
                        </select>
                    </div>

                    <div class="keep-footer">
                        <a href="{{ route('notes.index') }}" class="btn-keep-text text-decoration-none">
                            Cancelar
                        </a>
                        <button type="submit" class="btn-keep-text btn-save-highlight">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>

            @error('title')
                <div class="mt-2 text-center">
                    <small class="text-danger">{{ $message }}</small>
                </div>
            @enderror
        </div>
    </div>

    <script src="{{ asset('js/quill-setup.js') }}"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            initLaraKeepEditor('#editor', 'content', @this);
        });
    </script>
</div>