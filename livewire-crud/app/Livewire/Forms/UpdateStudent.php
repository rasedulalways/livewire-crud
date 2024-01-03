<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Student;
use Livewire\Attributes\Validate;

class UpdateStudent extends Form
{
    public Student $student;

    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('nullable|image')]
    public $image;

    #[Validate('required')]
    public $section_id;

    public function setStudent(Student $student)
    {
        $this->student = $student;

        $this->name = $student->name;
        $this->section_id = $student->section_id;
        $this->email = $student->email;
    }

    public function update($class_id)
    {
        $this->student->update([
            'name' => $this->name,
            'class_id' => $class_id,
            'section_id' => $this->section_id,
            'email' => $this->email,
        ]);

        if ($this->image) {
            $this->student
                ->addMedia($this->image)
                ->toMediaCollection();
        }
    }
}
