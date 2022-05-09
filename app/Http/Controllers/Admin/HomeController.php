<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index(){

        $groupsCount = Group::all()->count();
        $studentsCount = Student::all()->count();
        $teachersCount = Teacher::all()->count();
        return view('admin.home.index', compact(['groupsCount','studentsCount','teachersCount']));
    }
}
