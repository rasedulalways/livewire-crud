<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public function create(){
        $this->validateOnly('name');

        Todo::create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        session()->flash('success', 'Todo save successfully');
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->paginate(5),
        ]);
    }
}
