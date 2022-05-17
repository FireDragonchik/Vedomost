<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $specialties = Specialty::paginate(10);
        return view('admin.specialty.index', compact(['specialties']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.specialty.create', ['faculties' => $faculties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_specialty = new Specialty();
        $new_specialty->shortNameOfSpecialty = $request->shortNameOfSpecialty;
        $new_specialty->fullNameOfSpecialty = $request->fullNameOfSpecialty;
        $new_specialty->faculty_id = $request->faculty_id;
        $new_specialty->save();

        return redirect()->back()->withSuccess('Специальность ' . $new_specialty->fullNameOfSpecialty . ' успешна добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Specialty $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Specialty $specialty
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Specialty $specialty)
    {
        $faculties = Faculty::all();
        return view('admin.specialty.edit', compact(['specialty', 'faculties']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Specialty $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $specialty)
    {
        $specialty->shortNameOfSpecialty = $request->shortNameOfSpecialty;
        $specialty->fullNameOfSpecialty = $request->fullNameOfSpecialty;
        $specialty->faculty_id = $request->faculty_id;
        $specialty->save();

        return redirect()->back()->withSuccess('Специальность ' . $specialty->fullNameOfSpecialty . ' успешна обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Specialty $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return redirect()->back()->withSuccess('Специальность ' . $specialty->fullNameOfSpecialty . ' была успешно удалена!');
    }
}
