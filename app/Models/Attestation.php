<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'student_id',
        'date',
        'mark'
    ];

    public $timestamps = false;

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
