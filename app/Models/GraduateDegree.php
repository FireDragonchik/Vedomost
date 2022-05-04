<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateDegree extends Model
{
    use HasFactory;

    protected $fillable = [
        'graduateDegreeShort',
        'graduateDegreeFull'
    ];

    public $timestamps = false;
}
