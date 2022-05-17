<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index(){
        return view('user.home.index');
    }
}
