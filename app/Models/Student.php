<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function scopeFilter(Builder $builder, QueryFilter $queryFilter){
        return $queryFilter->apply($builder);
    }

    public function attestation(){
        return $this->hasMany(Attestation::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
