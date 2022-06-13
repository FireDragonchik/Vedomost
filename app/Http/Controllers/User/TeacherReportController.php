<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Report;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\exactly;

class TeacherReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $teacher = Teacher::all()->where('fioTeacher', '=', $user->name)->first();
        $disciplines = Discipline::all()->where('teacher_id', '=', $teacher->id)->toArray();
        $disciplineIds = array();

        foreach ($disciplines as $discipline) {

            array_push($disciplineIds, $discipline['id']);
        }

        $result = Report::whereIn('discipline_id', $disciplineIds)->get();
        $sortedResult = $result->sortDesc();
        $reports = Report::paginate(10);
        $reports->setCollection($sortedResult);
        return view('user.report.index', compact(['reports']));
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
        return view('user.report.create', compact(['years', 'semesters', 'groups', 'disciplines']));
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
        return redirect()->back()->withSuccess('Ведомость № ' . $new_report->id . ' успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Report $report)
    {
        $maxDate = DB::table('attestations')->select(DB::raw('max(date) as maxDate'))
            ->where('report_id', '=', $report->id)
            ->first();
        $minDate = DB::table('attestations')->select(DB::raw('min(date) as minDate'))
            ->where('report_id', '=', $report->id)
            ->first();
        $dates = DB::table('attestations')->select(DB::raw('distinct date'))
            ->where('report_id', '=', $report->id)
            ->get()->toArray();

        return view('user.report.show', ['report' => $report, 'maxDate' => $maxDate->maxDate,
            'minDate' => $minDate->minDate, 'dates' => $dates]);
    }

    public function showThroughRequest(Request $request)
    {

        $report = Report::query()->where('id', '=', $request->report)->first();

        $maxDate = DB::table('attestations')->select(DB::raw('max(date) as maxDate'))
            ->where('report_id', '=', $report->id)
            ->first();
        $minDate = DB::table('attestations')->select(DB::raw('min(date) as minDate'))
            ->where('report_id', '=', $report->id)
            ->first();
        $dates = DB::table('attestations')->select(DB::raw('distinct date'))
            ->where('report_id', '=', $report->id)
            ->get()->toArray();

        return view('user.report.show', ['report' => $report, 'maxDate' => $maxDate->maxDate,
            'minDate' => $minDate->minDate, 'dates' => $dates]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Report $report)
    {
        $years = Year::all();
        $semesters = Semester::all();
        $groups = Group::all();
        $disciplines = Discipline::all();
        return view('user.report.edit', compact(['report', 'years', 'semesters', 'groups', 'disciplines']));
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
        return redirect()->back()->withSuccess('Ведомость № ' . $report->id . ' успешно обновлена!');
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
        return redirect()->back()->withSuccess('Ведомость № ' . $report->id . 'была успешно удалена!');
    }
}
