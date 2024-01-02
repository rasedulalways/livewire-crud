<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'section_id', 'name', 'email'];

    public function sections(){
        return $this->belongsTo(Section::class);
    }

    public function class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
