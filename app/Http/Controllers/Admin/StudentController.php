<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('admin.student.index', compact(['students']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $groups = Group::all();
        return view('admin.student.create', compact(['groups']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $new_student = new Student();
        $new_student->studentId = $request->studentId;
        $new_student->group_id = $request->group_id;
        $new_student->fioStudent = $request->fioStudent;
        $new_student->subGroup = $request->subGroup;
        $new_student->save();

        return redirect()->back()->withSuccess('Студент ' . $new_student->fioStudent . ' успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Student $student)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Student $student)
    {
        $groups = Group::all();
        return view('admin.student.edit', compact(['student', 'groups']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->studentId = $request->studentId;
        $student->group_id = $request->group_id;
        $student->fioStudent = $request->fioStudent;
        $student->subGroup = $request->subGroup;
        $student->save();

        return redirect()->back()->withSuccess('Студент ' . $student->fioStudent . ' успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()->withSuccess('Студент ' . $student->fioStudent . ' был успешно удален!');
    }
}
