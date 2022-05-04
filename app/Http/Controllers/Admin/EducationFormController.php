<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationForm;
use Illuminate\Http\Request;

class EducationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $educationForms = EducationForm::orderBy('id')->get();
        return view('admin.educationForm.index', compact(['educationForms']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.educationForm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_educationForm = new EducationForm();
        $new_educationForm->educationForm = $request->educationForm;
        $new_educationForm->save();

        return redirect()->back()->withSuccess('Форма обучения успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationForm  $educationForm
     * @return \Illuminate\Http\Response
     */
    public function show(EducationForm $educationForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationForm  $educationForm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(EducationForm $educationForm)
    {
        return view('admin.educationForm.edit', compact(['educationForm']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EducationForm  $educationForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationForm $educationForm)
    {
        $educationForm->educationForm = $request->educationForm;
        $educationForm->save();

        return redirect()->back()->withSuccess('Форма обучения успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationForm  $educationForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationForm $educationForm)
    {
        $educationForm->delete();
        return redirect()->back()->withSuccess('Форма обучения была успешно удалена!');
    }
}
