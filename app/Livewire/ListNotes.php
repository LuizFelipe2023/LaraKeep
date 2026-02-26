<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ListNotes extends Component
{
    use WithPagination;
    public string $search = '';

    public string $status = '';

    public function delete(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada.');
        }

        $note->delete();
        session()->flash('success', 'Nota excluída.');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $notes = Note::query()
            ->where('user_id', auth()->id())
            ->when($this->search, fn ($query) => $query->where('title', 'like', "%{$this->search}%")
            )
            ->when($this->status, fn ($query) => $query->where('status', $this->status)
            )
            ->latest()
            ->paginate(10);

        return view('livewire.list-notes', [
            'notes' => $notes,
        ]);
    }
}
