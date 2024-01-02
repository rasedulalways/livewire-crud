<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
