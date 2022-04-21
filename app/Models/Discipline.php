<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortNameOfDiscipline',
        'fullNameOfDiscipline',
        'teacher_id'
    ];

    public $timestamps = false;
}
