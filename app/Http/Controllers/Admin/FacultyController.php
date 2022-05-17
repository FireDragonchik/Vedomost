<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $faculties = Faculty::paginate(10);
        return view('admin.faculty.index', ['faculties' => $faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_faculty = new Faculty();
        $new_faculty->shortNameOfFaculty = $request->shortNameOfFaculty;
        $new_faculty->fullNameOfFaculty = $request->fullNameOfFaculty;
        $new_faculty->fioDean = $request->fioDean;
        $new_faculty->save();

        return redirect()->back()->withSuccess($new_faculty->fullNameOfFaculty . ' успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Faculty $faculty
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Faculty $faculty)
    {
        return view('admin.faculty.edit', ['faculty' => $faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $faculty->shortNameOfFaculty = $request->shortNameOfFaculty;
        $faculty->fullNameOfFaculty = $request->fullNameOfFaculty;
        $faculty->fioDean = $request->fioDean;
        $faculty->save();

        return redirect()->back()->withSuccess($faculty->fullNameOfFaculty . ' успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->back()->withSuccess($faculty->fullNameOfFaculty . ' был успешно удален!');
    }
}
