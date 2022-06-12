<?php


namespace App\Filters;


class ReportFilter extends QueryFilter
{
    public function reportYear($year_id, $semester_id)
    {
        return $this->builder->where('year_id', $year_id, 'semester_id', $semester_id);
    }
}
