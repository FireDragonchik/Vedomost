<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('admin.teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.teacher.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_teacher = new Teacher();
        $new_teacher->fioTeacher = $request->fioTeacher;
        $new_teacher->position = $request->position;
        $new_teacher->department_id = $request->department_id;
        $new_teacher->save();

        return redirect()->back()->withSuccess('Преподаватель ' . $new_teacher->fioTeacher . ' успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Teacher $teacher)
    {
        $departments = Department::all();
        return view('admin.teacher.edit', compact(['teacher', 'departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->fioTeacher = $request->fioTeacher;
        $teacher->position = $request->position;
        $teacher->department_id = $request->department_id;
        $teacher->save();

        return redirect()->back()->withSuccess('Преподаватель ' . $teacher->fioTeacher . ' был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->back()->withSuccess('Преподаватель ' . $teacher->fioTeacher . ' был успешно удален!');
    }
}
