<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Report;
use App\Models\Semester;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if (isset($request->year_id)) {
            $result = Report::all()->where('year_id', $request->year_id)->where('semester_id', $request->semester_id);
            $reports = Report::paginate(10);
            $reports->setCollection($result);
        } else {
            $result = Report::all()->sortByDesc('id');
            $reports = Report::paginate(10);
            $reports->setCollection($result);
        }
        $years = Year::all();
        $semesters = Semester::all();

        return view('admin.report.index', compact(['reports', 'years', 'semesters']));
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
     * @return Response
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
        return view('admin.report.show', ['report' => $report, 'maxDate' => $maxDate->maxDate,
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
        return view('admin.report.edit', compact(['report', 'years', 'semesters', 'groups', 'disciplines']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Report $report
     * @return Response
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
     * @param Request $report
     * @return Response
     */
    public function destroy(Request $report)
    {
        $report->delete();
        return redirect()->back()->withSuccess('Ведомость № ' . $report->id . 'была успешно удалена!');
    }

    public function download($id)
    {
        $report = Report::query()->where('id', '=', $id)->first();

        $maxDate = DB::table('attestations')->select(DB::raw('max(date) as maxDate'))
            ->where('report_id', '=', $report->id)
            ->first();
        $minDate = DB::table('attestations')->select(DB::raw('min(date) as minDate'))
            ->where('report_id', '=', $report->id)
            ->first();
        $dates = DB::table('attestations')->select(DB::raw('distinct date'))
            ->where('report_id', '=', $report->id)
            ->get()->toArray();

        $styleArray = array(
            'font' => array(
                'size' => 14,
                'name' => 'Times New Roman',
                'wrapText' => true
            ));

        $startLine = 8;
        $firstColumn = 4;
        $currentColumn = 6;

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getDefaultStyle()->applyFromArray($styleArray);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('D4', 'ВЕДОМОСТЬ ТЕКУЩЕЙ УСПЕВАЕМОСТИ В СЕМЕСТРЕ');
        $sheet->getStyle('D4')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D4')->getFont()->setBold(true);
        $sheet->mergeCells('D4:U4');

        switch ($report->semester->semester) {
            case 'Осенний':
                $semester = 'осеннем';
                break;
            case 'Весенний':
                $semester = 'весеннем';
                break;
        }

        $sheet->setCellValue('D5', 'В ' . $semester . ' семестре ' . $report->year->year .
            ' учебного года по дисциплине "' . $report->discipline->fullNameOfDiscipline . '"');
        $sheet->setCellValue('D6', 'Лектор (Ф.И.О.)/Преподаватель (Ф.И.О.): ' .
            $report->discipline->teacher->fioTeacher);
        $sheet->setCellValue('D7', $report->group->specialty->faculty->fullNameOfFaculty);
        $sheet->setCellValue('H7', 'Группа: ' . $report->group->groupCode);
        $sheet->setCellValue('K7', 'Специальность: ' . $report->group->specialty->fullNameOfSpecialty);

        $sheet->setCellValue('D8', '№')
            ->getStyle('D8')->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center');
        $sheet->setCellValue('E8', 'ФИО студента')
            ->getStyle('E8')->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center');

        foreach ($dates as $date) {
            try {
                $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $date->date)
                    ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
                    ->setTextRotation(90)
                    ->setHorizontal('center')
                    ->setVertical('center');
            } catch (Exception $e) {
            }
            $currentColumn++;
        }

        $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, 'Отметка текущей успеваемости')
            ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center')->setWrapText(true);

        $spreadsheet->getActiveSheet()->getColumnDimensionByColumn($currentColumn)->setAutoSize(true);


        $startLine++;
        $currentColumn = $firstColumn;

        foreach ($report->group->students as $student) {

            $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $student->studentId)
                ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
                ->setHorizontal('center')
                ->setVertical('center');;

            $currentColumn++;

            $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $student->fioStudent)
                ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
                ->setVertical('center');;
            $spreadsheet->getActiveSheet()->getColumnDimensionByColumn($currentColumn)->setAutoSize(true);
            $currentColumn++;

            if (!empty($student->attestation)) {
                for ($i = 0; $i < sizeof($dates); $i++) {
                    if (sizeof($student->attestation) > $i) {
                        if (strpos(json_encode($dates), $student->attestation[$i]->date) !== false) {

                            $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $student->attestation[$i]->mark)
                                ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
                                ->setHorizontal('center')
                                ->setVertical('center');
                        } else {
                            $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, '-')
                                ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
                                ->setHorizontal('center')
                                ->setVertical('center');
                        }
                    }
                    $currentColumn++;
                }
                $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $student->avgAttestation($minDate->minDate, $maxDate->maxDate))
                    ->getStyleByColumnAndRow($currentColumn, $startLine)->getAlignment()
                    ->setHorizontal('center')
                    ->setVertical('center');
            }
            $currentColumn = $firstColumn;
            $startLine++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Ведомость ' . $report->id . '.xlsx"');
        $writer->save('php://output');
    }
}
