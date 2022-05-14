@extends('layouts.admin_layout')

@section('title', 'Ведомость')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <h1 class="text-center">Ведомость текущей успеваемости в семестре № {{ $report->id }}</h1>
                    <h1>В {{ $report->semester->semester }} семестре {{ $report->year->year }} учебного года
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
                @if(!empty($report->group->students) && !empty($report->group->students[0]->attestation))
                    @foreach($report->group->students[0]->attestation as $attestation)
                        <th style="writing-mode: vertical-rl">{{$attestation->date}}</th>
                    @endforeach
                @endif
                <th>Отметка текущей успеваемости</th>
            </tr>
            </thead>
            @foreach($report->group->students as $student)
                <tr>
                    <td>{{$student->studentId}}</td>
                    <td>{{$student->fioStudent}}</td>
                    @if(!empty($student->attestation))
                        @foreach($student->attestation as $attestation)
                            <td>{{$attestation->mark}}</td>
                        @endforeach
                    @endif
                    <td>{{ $student->avgAttestation('2021-05-04', '2021-05-19') }}</td>
                    <td>{{ $maxDate }}</td>
                </tr>
            @endforeach
        </table>

        <div class="card-footer">
            <a href="{{ route('attestation.create', $report->id) }}" class="btn-primary">Добавить отметку</a>
        </div>
    </div>

@endsection
