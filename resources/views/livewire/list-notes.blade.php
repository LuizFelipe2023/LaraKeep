<div>
    <link rel="stylesheet" href="{{ asset('css/notes/list.css') }}">

    <div class="container-fluid page-content">
        <div class="search-area">
            <div class="keep-search-group shadow-sm">
                <span class="text-muted">🔍</span>
                <input type="text" placeholder="Pesquisar notas..." wire:model.live.debounce.400ms="search">
                <a href="{{ route('notes.create') }}" class="btn btn-dark btn-sm rounded-pill px-3 ms-2 text-nowrap">
                    + Nota
                </a>
            </div>
        </div>

        <div class="notes-grid">
            @forelse($notes as $note)
                <div class="note-item" wire:key="note-{{ $note->id }}">
                    <div class="card note-card">
                        <div class="card-body pb-1">
                            @if($note->title)
                                <h6 class="fw-bold mb-2 text-dark">{{ $note->title }}</h6>
                            @endif
                            <p class="mb-2 text-secondary note-content">
                                {{ $note->content }}
                            </p>
                        </div>

                        <div class="note-actions d-flex justify-content-end gap-1">
                            <span class="badge rounded-pill bg-light text-muted border align-self-center me-auto"
                                style="font-size: 0.65rem;">
                                {{ strtoupper($note->status) }}
                            </span>

                            <a href="{{ route('notes.edit', $note) }}" class="btn-keep text-decoration-none">
                                <small>✏️</small>
                            </a>

                            <button type="button" wire:click="confirmNoteDeletion({{ $note->id }})" class="btn-keep">
                                <small>🗑</small>
                            </button>


                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <span class="empty-icon">💡</span>
                    <h5 class="fw-light mt-3">As notas que você adicionar aparecerão aqui.</h5>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $notes->links() }}
        </div>
    </div>
    @if($showDeleteModal)
        <div class="modal d-block" tabindex="-1" style="background: rgba(0,0,0,0.7); backdrop-filter: blur(4px);">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content border-0 shadow-lg"
                    style="background-color: var(--keep-surface); border-radius: 15px;">
                    <div class="modal-body text-center p-4">
                        <div class="mb-3" style="font-size: 3rem;">⚠️</div>
                        <h5 class="fw-bold" style="color: var(--keep-text-main);">Excluir nota?</h5>
                        <p style="color: var(--keep-text-secondary); font-size: 0.9rem;">Esta ação não
                            pode ser desfeita.</p>

                        <div class="d-flex flex-column gap-2 mt-4">
                            <button type="button" wire:click="deleteNote" class="btn btn-danger py-2 fw-bold">
                                Confirmar Exclusão
                            </button>
                            <button type="button" wire:click="cancelDeletion" class="btn btn-link text-decoration-none py-2"
                                style="color: var(--keep-text-secondary);">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>