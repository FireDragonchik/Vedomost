<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'year_id',
        'semester_id',
        'group_id',
        'discipline_id'
    ];

    public $timestamps = false;

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }

    /**
     * @return false|string
     */
    public function maxAttestationDate()
    {

        $maxDate = DB::table('attestations')->select(DB::raw('MAX(date)'))
            ->where('report_id', '=', $this->id)
            ->get();
        return $maxDate;
    }
}
