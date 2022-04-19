<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reportId',
        'studentId',
        'fioStudent',
        'groupCode'
    ];

    public $timestamps = false;
}
