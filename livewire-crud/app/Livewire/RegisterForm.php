<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|max:255|unique:users')]
    public $email;

    #[Rule('required|min:3')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create(){
        $validated = $this->validate();

        if($this->image){
            $validated['image'] = $this->image->store('uploads','public');
        }

        User::create($validated);

        $this->reset('name','email','password');

        session()->flash('success','User Created!');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.register-form');
    }
}
