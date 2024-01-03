<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Student;
use Livewire\Attributes\Validate;

class StoreStudent extends Form
{
    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|image')]
    public $image;

    #[Validate('required')]
    public $section_id;

    public function store($class_id)
    {
        $student = Student::create(
            $this->all() + ['class_id' => $class_id],
        );

        $student
            ->addMedia($this->image)
            ->toMediaCollection();
    }
}
