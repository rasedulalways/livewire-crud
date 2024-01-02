<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $students = Student::latest()->paginate(5);
        return view('livewire.student.index', [
            'students' => $students,
        ]);
    }
}
