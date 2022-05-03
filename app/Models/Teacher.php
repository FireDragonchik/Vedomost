<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'fioTeacher',
        'position',
        'department_id'
    ];

    public $timestamps = false;

    public function disciplines(){
        return $this->hasMany(Discipline::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $queryFilter){
        return $queryFilter->apply($builder);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
