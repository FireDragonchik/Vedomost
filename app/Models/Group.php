<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'groupCode',
        'course_id',
        'education_form_id',
        'graduate_degree_id',
        'numberOfStudents',
        'specialty_id'
    ];

    public $timestamps = false;

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function educationForm(){
        return $this->belongsTo(EducationForm::class);
    }

    public function graduateDegree(){
        return $this->belongsTo(GraduateDegree::class);
    }

    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }
}
