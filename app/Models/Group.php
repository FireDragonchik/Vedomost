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
        'formOfEducation_id',
        'graduateDegree_id',
        'numberOfStudents',
        'specialty_id'
    ];

    public $timestamps = false;

    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }
}
