<?php

namespace App\Filters;

class StudentFilter extends QueryFilter{

    public function groupCode($groupCode){

        return $this->builder->where('groupCode', $groupCode);
    }
}
