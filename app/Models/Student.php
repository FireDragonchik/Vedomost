<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use phpDocumentor\Reflection\Types\String_;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId',
        'group_id',
        'fioStudent',
        'subGroup'
    ];

    public $timestamps = false;

    public function scopeFilter(Builder $builder, QueryFilter $queryFilter)
    {
        return $queryFilter->apply($builder);
    }

    public function attestation()
    {
        return $this->hasMany(Attestation::class);
    }


    public function avgAttestation($start, $end)
    {
        $marks = $this->hasMany(Attestation::class)->whereBetween('date', [$start, $end])->get('mark');
        $sum = 0;
        $count = 0;
        foreach ($marks as $mark) {
            $sum = $sum + $mark->mark;
            $count++;
        }
        return intdiv($sum, $count);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
