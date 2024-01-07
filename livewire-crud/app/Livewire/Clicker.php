<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Clicker extends Component
{
    use WithPagination;

    #[Rule('required|min:3')]
    public $name;

    #[Validate('required|email|unique:users')]
    public $email;

    #[Validate('required')]
    Public $password;

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.clicker', [
            'users' => $users,
        ]);
    }

    public function save(){
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();

        request()->session()->flash('success', 'User Created Successfully !');
    }
}
