<div>
    <link rel="stylesheet" href="{{ asset('css/notes/list.css') }}">

    <div class="container-fluid page-content">
        <div class="search-area">
            <div class="keep-search-group shadow-sm">
                <span class="search-icon">🔍</span>

                <input type="text" placeholder="Pesquisar notas..." wire:model.live.debounce.400ms="search">

                <div class="filter-divider"></div>
                
                <div class="filter-wrapper">
                    <select wire:model.live="statusFilter" class="keep-search-select">
                        <option value="">Todas</option>
                        <option value="active">Ativas</option>
                        <option value="closed">Arquivadas</option>
                    </select>
                </div>

                <a href="{{ route('notes.create') }}" class="btn-new-note">
                    <span class="plus-icon">+</span>
                    <span>Nova Nota</span>
                </a>
            </div>

            <!-- Result count indicator -->
            @if($search || $statusFilter)
                <div class="search-stats">
                    <span>{{ $notes->total() }} {{ $notes->total() == 1 ? 'nota encontrada' : 'notas encontradas' }}</span>
                    @if($search || $statusFilter)
                        <button wire:click="$set('search', ''); $set('statusFilter', '')" class="clear-filters">
                            Limpar filtros ✕
                        </button>
                    @endif
                </div>
            @endif
        </div>

        <div class="notes-grid">
            @forelse($notes as $note)
                <div class="note-item" wire:key="note-{{ $note->id }}">
                    <div class="card note-card">
                        <div class="card-body pb-1">
                            @if($note->title)
                                <h6 class="fw-bold mb-2 text-dark">{{ $note->title }}</h6>
                            @endif
                            <div class="mb-2 text-secondary note-content">
                                {!! $note->content !!}
                            </div>
                        </div>

                        <div class="note-actions d-flex justify-content-end gap-1">
                            <span class="badge rounded-pill bg-light text-muted border align-self-center me-auto"
                                style="font-size: 0.65rem;">
                                {{ strtoupper($note->status) }}
                            </span>

                            <a href="{{ route('notes.edit', $note) }}" class="btn-keep text-decoration-none" title="Editar">
                                <small>✏️</small>
                            </a>

                            <button type="button" wire:click="confirmNoteDeletion({{ $note->id }})" class="btn-keep" title="Excluir">
                                <small>🗑</small>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <span class="empty-icon">💡</span>
                    <h5 class="fw-light mt-3">
                        @if($search || $statusFilter)
                            Nenhuma nota encontrada com esses filtros.
                        @else
                            As notas que você adicionar aparecerão aqui.
                        @endif
                    </h5>
                    @if($search || $statusFilter)
                        <button wire:click="$set('search', ''); $set('statusFilter', '')" class="btn btn-link mt-2">
                            Limpar filtros
                        </button>
                    @endif
                </div>
            @endforelse
        </div>

        @if($notes->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $notes->links() }}
            </div>
        @endif
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