<?php

namespace App\Http\Controllers\UsersControllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser(){

        return $teacher = Teacher::where('fioTeacher', Auth::user()->name)->get();
    }
}
