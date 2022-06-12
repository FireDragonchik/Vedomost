@extends('layouts.admin_layout')

@section('title', 'Все ведомости')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все ведомости</h1>
                </div><!-- /.c  ol -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <form action="{{ route('report.index') }}">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <h3 class="m-0">Фильтр</h3>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label">Учебный год</label>
                        <br>
                        <select class="js-select2" name="year_id" style="width: 100%">
                            <option value=""></option>
                            @foreach($years as $year)
                                <option value="{{ $year->id }}"
                                        @if(isset($_GET['year_id'])) @if($_GET['year_id'] == $year->id)
                                        selected @endIf @endIf>
                                    {{ $year->year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label">Семестр</label>
                        <br>
                        <select class="js-select2" name="semester_id" style="width: 100%">
                            <option value=""></option>
                            @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}"
                                        @if(isset($_GET['semester_id']))@if($_GET['semester_id'] == $semester->id)
                                        selected @endIf @endIf>
                                    {{ $semester->semester }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 7%">
                                Учебный год
                            </th>
                            <th style="width: 10%">
                                Семестр
                            </th>
                            <th style="width: 10%">
                                Группа
                            </th>
                            <th>
                                Дисциплина
                            </th>
                            <th style="width: 20%">
                                Преподаватель
                            </th>
                            <th style="width:30%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>
                                    <a href="{{ route('report.show', $report) }}"> {{ $report->id }} </a>
                                </td>
                                <td>
                                    {{ $report->year->year }}
                                </td>
                                <td>
                                    {{ $report->semester->semester }}
                                </td>
                                <td>
                                    {{ $report->group->groupCode }}
                                </td>
                                <td>
                                    {{ $report->discipline->fullNameOfDiscipline }}
                                </td>
                                <td>
                                    {{ $report->discipline->teacher->fioTeacher }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('report.edit', $report->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>
                                    <form action="{{ route('report.destroy', $report->id) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn delete-btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
        {{ $reports->withQueryString()->links() }}
    </section>
    <!-- /.content -->
@endsection
