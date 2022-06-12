<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\Report;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $teacher = Teacher::all()->where('fioTeacher', '=', $user->name)->first();
        $disciplines = Discipline::all()->where('teacher_id', '=', $teacher->id)->toArray();
        $disciplineIds = array();

        foreach ($disciplines as $discipline) {

            array_push($disciplineIds, $discipline['id']);
        }

        $reportCount = Report::whereIn('discipline_id', $disciplineIds)->count();
        return view('user.home.index', ['reportCount' => $reportCount]);
    }
}
