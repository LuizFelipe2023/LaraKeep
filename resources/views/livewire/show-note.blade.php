<div class="container py-5">
    <link rel="stylesheet" href="{{ asset('css/notes/show.css') }}">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <div class="keep-view-card">
                <div class="p-3 d-flex justify-content-between align-items-center">
                    <a href="{{ route('notes.index') }}" class="btn-keep-action">
                        ← Voltar
                    </a>
                    <span class="keep-status-badge">
                        {{ $note->status }}
                    </span>
                </div>

                <div class="keep-view-body">
                    @if($note->title)
                        <h1 class="keep-view-title">{{ $note->title }}</h1>
                    @endif
                    
                    <div class="keep-view-content">
                        {{ $note->content }}
                    </div>
                </div>

                <div class="keep-view-footer">
                    <div class="keep-timestamp">
                        Criado em {{ $note->created_at->format('d/m/Y \à\s H:i') }}
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('notes.edit', $note) }}" class="btn-keep-action btn-edit-main">
                            Editar nota
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>