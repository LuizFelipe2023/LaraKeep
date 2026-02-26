<div>
    <link rel="stylesheet" href="{{ asset('css/notes/list.css') }}">
    <div class="container-fluid page-content">
        <div class="search-area">
            <div class="keep-search-group">
                <span class="text-muted">🔍</span>
                <input type="text" placeholder="Pesquisar notas..." 
                       wire:model.live.debounce.400ms="search">
                <a href="{{ route('notes.create') }}" class="btn btn-dark btn-sm rounded-pill px-3 ms-2">
                    + Nota
                </a>
            </div>
        </div>

        <div class="notes-grid">
            @forelse($notes as $note)
                <div class="note-item">
                    <div class="card note-card">
                        <div class="card-body pb-1">
                            @if($note->title)
                                <h6 class="fw-bold mb-2">{{ $note->title }}</h6>
                            @endif
                            <p class="mb-2 text-secondary" style="font-size: 0.95rem; white-space: pre-wrap;">
                                {{ $note->content }}
                            </p>
                        </div>
                        
                        <div class="note-actions d-flex justify-content-end gap-1">
                            <span class="badge rounded-pill bg-light text-muted border align-self-center me-auto" style="font-size: 0.6rem;">
                                {{ strtoupper($note->status) }}
                            </span>
                            
                            <a href="{{ route('notes.edit', $note) }}" class="btn-keep text-decoration-none">
                                <small>✏️</small>
                            </a>
                            <button wire:click="delete({{ $note->id }})" 
                                    wire:confirm="Excluir nota?"
                                    class="btn-keep">
                                <small>🗑</small>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 w-100" style="column-span: all;">
                    <div class="text-muted">
                        <span style="font-size: 3rem;">💡</span>
                        <h5 class="fw-light mt-3">As notas que você adicionar aparecerão aqui.</h5>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>