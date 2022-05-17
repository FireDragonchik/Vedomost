<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraduateDegree;
use Illuminate\Http\Request;

class GraduateDegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $graduateDegrees = GraduateDegree::orderBy('id')->get();
        return view('admin.graduateDegree.index', compact(['graduateDegrees']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.graduateDegree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_graduateDegree= new GraduateDegree();
        $new_graduateDegree->graduateDegreeShort = $request->graduateDegreeShort;
        $new_graduateDegree->graduateDegreeFull = $request->graduateDegreeFull;
        $new_graduateDegree->save();

        return redirect()->back()->withSuccess('Ступень образования '. $new_graduateDegree->graduateDegreeFull .' успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GraduateDegree  $graduateDegree
     * @return \Illuminate\Http\Response
     */
    public function show(GraduateDegree $graduateDegree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GraduateDegree  $graduateDegree
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(GraduateDegree $graduateDegree)
    {
        return view('admin.graduateDegree.edit', compact(['graduateDegree']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GraduateDegree  $graduateDegree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GraduateDegree $graduateDegree)
    {
        $graduateDegree->graduateDegreeShort = $request->graduateDegreeShort;
        $graduateDegree->graduateDegreeFull = $request->graduateDegreeFull;
        $graduateDegree->save();

        return redirect()->back()->withSuccess('Ступень образования '. $graduateDegree->graduateDegreeFull .' успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GraduateDegree  $graduateDegree
     * @return \Illuminate\Http\Response
     */
    public function destroy(GraduateDegree $graduateDegree)
    {
        $graduateDegree->delete();
        return redirect()->back()->withSuccess('Ступень образования '. $graduateDegree->graduateDegreeFull .' была успешно удалена!');
    }
}
