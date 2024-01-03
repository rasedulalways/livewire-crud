<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\UpdateStudent;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    use WithFileUploads;

    public Student $student;

    public UpdateStudent $form;

    #[Validate('required')]
    public $class_id = '';

    public $sections = [];

    public function mount()
    {
        $this->form->setStudent($this->student);

        $this->fill(
            $this->student->only('class_id'),
        );

        $this->sections = Section::where('class_id', $this->student->class_id)->get();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $classes = Classes::all();
        return view('livewire.student.edit', [
            'classes' => $classes,
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function update(){
        $this->validate();

        $this->form->update( $this->class_id );

        return redirect(route('students.index'))->with('status','Student successfully created');
    }

    public function updatedClassId($value){
        // dd($value);

        $this->sections = Section::where('class_id', $value)->get();
    }
}
