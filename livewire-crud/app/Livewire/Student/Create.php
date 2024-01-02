<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public  $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|image')]
    public $image;

    #[Validate('required')]
    public $class_id = '';

    #[Validate('required')]
    public $section_id = '';

    public $sections = [];

    public function render()
    {
        $classes = Classes::all();
        return view('livewire.student.create', [
            'classes' => $classes,
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function save(){
        $this->validate();

        $student = Student::create(
            $this->only(['name', 'email','class_id','section_id'])
        );

        $student
            ->addMedia( $this->image )
            ->toMediaCollection();

        return redirect(route('students.index'))->with('status','Student successfully created');
    }

    public function updatedClassId($value){
        // dd($value);

        $this->sections = Section::where('class_id', $value)->get();
    }
}
