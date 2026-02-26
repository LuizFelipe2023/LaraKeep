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

    public string $statusFilter = ''; 

    public $showDeleteModal = false;

    public $noteIdBeingDeleted = null;

    public function confirmNoteDeletion($noteId)
    {
        $this->noteIdBeingDeleted = $noteId;
        $this->showDeleteModal = true;
    }

    public function cancelDeletion()
    {
        $this->showDeleteModal = false;
        $this->noteIdBeingDeleted = null;
    }

    public function deleteNote()
    {
        if ($this->noteIdBeingDeleted) {
            $note = Note::find($this->noteIdBeingDeleted);
            
            if ($note) {
                $note->delete();
                
                $this->dispatch('note-deleted', message: 'Nota excluída com sucesso!');
            }
        }

        $this->showDeleteModal = false;
        $this->noteIdBeingDeleted = null; 
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $notes = Note::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                      ->orWhere('content', 'like', "%{$this->search}%"); 
                });
            })
            ->when($this->statusFilter, function ($query) { 
                $query->where('status', $this->statusFilter);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.list-notes', [
            'notes' => $notes,
        ]);
    }
}