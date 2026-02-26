<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowNote extends Component
{
    public Note $note;

    public function mount(Note $note)
    {
        $this->note = $note;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.show-note');
    }
}