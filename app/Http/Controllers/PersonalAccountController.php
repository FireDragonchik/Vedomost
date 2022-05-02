<?php

namespace App\Http\Controllers;

use App\Filters\TeacherFilter;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class PersonalAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('personalAccount');
    }

    /**
     * Display a listing of the resource.
     *
     * @param TeacherFilter $filter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getUser(TeacherFilter $filter){
        $teacher = Teacher::filter($filter)->get();
        return view('personalAccount',
        [$teacher]);
    }
}
