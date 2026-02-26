<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditNote extends Component
{
    public Note $note;

    #[Validate('required|min:2|max:255')]
    public string $title;

    #[Validate('nullable|string')]
    public string $content;

    #[Validate('required')]
    public string $status;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->title = $note->title;
        $this->content = $note->content;
        $this->status = $note->status;
    }

    public function save()
    {
           $this->validate();

           $this->note->update([
                'title' => $this->title,
                'content' => $this->content ?? null,
                'status' => $this->status
           ]);

           return redirect()->route('notes.index')->with('success','Note updated.');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.edit-note');
    }
}
