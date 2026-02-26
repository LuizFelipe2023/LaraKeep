<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Note;

class CreateNote extends Component
{
    #[Validate('required|min:2|max:255')]
    public string $title = '';

    #[Validate('required|string')]
    public string $content = '';

    public function save()
    {
           $this->validate();

           Note::create([
               'title' => $this->title,
               'content' => $this->content,
               'user_id' => Auth::id()
           ]);

           session()->flash('success','Note created successfully');

           return redirect()->route('notes.index');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.create-note');
    }
}
