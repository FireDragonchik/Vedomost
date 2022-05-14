@extends('layouts.admin_layout')

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
                        <form action="{{ route('report.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <label class="form-label">Год обучения</label>
                                <br>
                                <select name="year_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $report->year_id }}">
                                    @foreach($years as $year)
                                        <option class="course" value="{{ $year->id }}">
                                            {{ $year->year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <label class="form-label">Семестр</label>
                                <br>
                                <select name="semester_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $report->semester_id }}">
                                    @foreach($semesters as $semester)
                                        <option class="course" value="{{ $semester->id }}">
                                            {{ $semester->semester }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <label class="form-label">Группа</label>
                                <br>
                                <select name="group_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $report->group_id }}">
                                    @foreach($groups as $group)
                                        <option class="course" value="{{ $group->id }}">
                                            {{ $group->groupCode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <label class="form-label">Дисциплина</label>
                                <br>
                                <select name="discipline_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $report->discipline_id }}">
                                    @foreach($disciplines as $discipline)
                                        <option class="course" value="{{ $discipline->id }}">
                                            {{ $discipline->shortNameOfDiscipline }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
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
