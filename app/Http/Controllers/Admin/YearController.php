<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $years = Year::paginate(10);
        return view('admin.year.index', compact(['years']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_year = new Year();
        $new_year->year = $request->year;
        $new_year->save();
        return redirect()->back()->withSuccess($new_year->year . ' учебный год успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Year $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Year $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Year $year)
    {
        return view('admin.year.edit', compact(['year']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Year $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Year $year)
    {
        $year->year = $request->year;
        $year->save();
        return redirect()->back()->withSuccess($year->year . ' учебный год успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Year $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(Year $year)
    {
        $year->delete();
        return redirect()->back()->withSuccess($year->year . ' учебный год был успешно удален!');
    }
}
