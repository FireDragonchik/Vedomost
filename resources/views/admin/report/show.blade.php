@extends('layouts.admin_layout')

@section('title', 'Ведомость')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <h1 class="text-center">Ведомость текущей успеваемости в семестре № {{ $report->id }}</h1>
                    <h1>{{ $report->semester->semester }} семестр {{ $report->year->year }} учебного года
                        по дисциплине - {{ $report->discipline->fullNameOfDiscipline }}
                    </h1>
                    <h1>Лектор (Ф.И.О)/Преподаватель (Ф.И.О): {{ $report->discipline->teacher->fioTeacher }}</h1>
                    <h1>{{ $report->group->specialty->faculty->fullNameOfFaculty }}
                        Группа: {{ $report->group->groupCode }}
                        Специальность: {{ $report->group->specialty->fullNameOfSpecialty }}
                    </h1>
                </div><!-- /.c  ol -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="report">
        <table class="pure-table pure-table-bordered">
            <thead>
            <tr>
                <th>№</th>
                <th>ФИО студента</th>
                @foreach($dates as $date)
                    <th style="writing-mode: vertical-rl">{{ $date->date }}</th>
                @endforeach
                <th>Отметка текущей успеваемости</th>
            </tr>
            </thead>
            @foreach($report->group->students as $student)
                <tr>
                    <td>{{$student->studentId}}</td>
                    <td>{{$student->fioStudent}}</td>
                    @if(!empty($student->attestation))
                        @for($i=0;$i<sizeof($dates);$i++)
                            @if(sizeof($student->attestation) > $i)
                                @if(strpos(json_encode($dates), $student->attestation[$i]->date) !== false)
                                    <td>{{ $student->attestation[$i]->mark }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @endfor
                        <td>{{ $student->avgAttestation($minDate, $maxDate) }}</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>

@endsection
