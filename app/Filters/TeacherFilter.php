<?php

namespace App\Filters;

class TeacherFilter extends QueryFilter{

    public function userName($userName){

        return $this->builder->where('fioTeacher', $userName);
    }
}
