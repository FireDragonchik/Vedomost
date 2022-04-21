<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'year_id',
        'semester_id',
        'group_id',
        'discipline_id',
        'teacher_id'
    ];

    public $timestamps = false;
}
