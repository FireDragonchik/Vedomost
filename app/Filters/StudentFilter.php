<?php

namespace App\Filters;

class StudentFilter extends QueryFilter{

    public function group_id($group_id){

        return $this->builder->where('group_id', $group_id);
    }
}
