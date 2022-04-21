<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormOfEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'formOfEducation'
    ];

    public $timestamps = false;
}
