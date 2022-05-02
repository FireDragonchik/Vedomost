<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

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
