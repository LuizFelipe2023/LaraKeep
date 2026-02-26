<div class="container py-5">
    <link rel="stylesheet" href="{{ asset('css/notes/edit.css') }}">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            
            <h5 class="text-muted mb-4 text-center fw-light">Editar Nota</h5>

            <div class="keep-edit-card">
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
                                  placeholder="Nota" 
                                  rows="8"></textarea>
                        @error('content')
                            <span class="keep-error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center">
                        <select wire:model.live="status" class="form-select keep-select">
                            <option value="active">🟢 Ativa</option>
                            <option value="closed">⚪ Arquivada</option>
                        </select>
                    </div>

                    <div class="keep-footer">
                        <a href="{{ route('notes.index') }}" class="btn-keep-text">
                            Cancelar
                        </a>
                        <button type="submit" class="btn-keep-text" style="color: #202124;">
                            Salvar
                        </button>
                    </div>

                </form>
            </div>

            @if ($errors->any())
                <div class="mt-3 text-center">
                    <small class="text-danger fw-bold" style="font-size: 0.7rem;">CORRIJA OS ERROS PARA SALVAR</small>
                </div>
            @endif

        </div>
    </div>
</div>