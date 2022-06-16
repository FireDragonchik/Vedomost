@extends('layouts.user_layout')

@section('title', 'Редактировать ведомость')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать ведомость № {{ $report->id }}</h1>
                </div><!-- /.c  ol -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('updateReport', ['id'=>$report->id]) }}" method="GET">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Учебный год</label>
                                    <br>
                                    <select name="year_id"
                                            class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}"
                                                    @if($report->year_id == $year->id) selected @endif>
                                                {{ $year->year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Семестр</label>
                                    <br>
                                    <select name="semester_id"
                                            class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                        @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}"
                                                    @if($report->semester_id == $semester->id) selected @endif>
                                                {{ $semester->semester }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Группа</label>
                                    <br>
                                    <select name="group_id"
                                            class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}"
                                                    @if($report->group_id == $group->id) selected @endif>
                                                {{ $group->groupCode }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Дисциплина</label>
                                    <br>
                                    <select name="discipline_id"
                                            class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                        @foreach($disciplines as $discipline)
                                            <option value="{{ $discipline->id }}"
                                                    @if($report->discipline_id == $discipline->id) selected @endif>
                                                {{ $discipline->shortNameOfDiscipline }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="reportUpdate" id="reportUpdate" value="{{ $report->id }}">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
