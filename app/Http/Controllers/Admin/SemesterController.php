<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $semesters = Semester::paginate(10);
        return view('admin.semester.index', compact(['semesters']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_semester = new Semester();
        $new_semester->semester = $request->semester;
        $new_semester->save();
        return redirect()->back()->withSuccess('Учебный семестр успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Semester $semester)
    {
        return view('admin.semester.edit', compact(['semester']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $semester->semester = $request->semester;
        $semester->save();
        return redirect()->back()->withSuccess('Учебный семестр успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect()->back()->withSuccess('Учебный семестр был успешно удален!');
    }
}
