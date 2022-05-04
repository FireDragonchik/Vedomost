<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortNameOfSpecialty',
        'fullNameOfSpecialty',
        'faculty_id'
    ];

    public $timestamps = false;

    public function faculty(){

        return $this->belongsTo(Faculty::class);
    }
}
