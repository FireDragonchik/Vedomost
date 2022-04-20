<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupCode',
        'course',
        'shortNameOfFaculty',
        'formOfEducation',
        'graduateDegree',
        'numberOfStudents',
        'shortNameOfSpecialty',
        'specialty_id'
    ];

    public $timestamps = false;

    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }
}
