<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $students = Student::all();
        return view('livewire.student.index', [
            'students' => $students,
        ]);
    }
}
