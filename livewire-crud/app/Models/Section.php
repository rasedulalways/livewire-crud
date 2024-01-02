<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'name'];

    public function class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
