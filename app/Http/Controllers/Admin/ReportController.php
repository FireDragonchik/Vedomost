<?php

namespace App\Http\Controllers\Admin;

use App\Filters\StudentFilter;
use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Report;
use App\Models\Semester;
use App\Models\Specialty;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $reports = Report::paginate(10);
        return view('admin.report.index', compact(['reports']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $years = Year::all();
        $semesters = Semester::all();
        $groups = Group::all();
        $disciplines = Discipline::all();
        return view('admin.report.create', compact(['years', 'semesters', 'groups', 'disciplines']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_report = new Report();
        $new_report->year_id = $request->year_id;
        $new_report->semester_id = $request->semester_id;
        $new_report->group_id = $request->group_id;
        $new_report->discipline_id = $request->discipline_id;
        $new_report->save();
        return redirect()->back()->withSuccess('Ведомость успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Report $report)
    {
        $maxDate = DB::table('attestations')->select(DB::raw('MAX(date) as maxDate'))
            ->where('report_id', '=', $report->id)
            ->get();
        return view('admin.report.show', compact(['report', 'maxDate']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Report $report)
    {
        return view('admin.report.edit', compact(['report']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $report->year_id = $request->year_id;
        $report->semester_id = $request->semester_id;
        $report->group_id = $request->group_id;
        $report->discipline_id = $request->discipline_id;
        $report->save();
        return redirect()->back()->withSuccess('Ведомость успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back()->withSuccess('Ведомость была успешно удалена!');
    }
}
