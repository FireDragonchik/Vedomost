<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $disciplines = Discipline::paginate(10);
        return view('admin.discipline.index', compact(['disciplines']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.discipline.create', compact(['teachers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_discipline = new Discipline();
        $new_discipline->shortNameOfDiscipline = $request->shortNameOfDiscipline;
        $new_discipline->fullNameOfDiscipline = $request->fullNameOfDiscipline;
        $new_discipline->teacher_id = $request->teacher_id;
        $new_discipline->save();

        return redirect()->back()->withSuccess('Дисциплина успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $discipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Discipline $discipline)
    {
        return view('admin.discipline.edit', compact(['discipline']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discipline $discipline)
    {
        $discipline->shortNameOfDiscipline = $request->shortNameOfDiscipline;
        $discipline->fullNameOfDiscipline = $request->fullNameOfDiscipline;
        $discipline->teacher_id = $request->teacher_id;
        $discipline->save();

        return redirect()->back()->withSuccess('Дисциплина успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline)
    {
        $discipline->delete();
        return redirect()->back()->withSuccess('Дисциплина была успешно удалена!');
    }
}
