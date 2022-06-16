@extends('layouts.user_layout')

@section('title', 'Редактирование отметки')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <h1 class="text-center">Редактирование отметки {{ $attestation->mark }}</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('attestationUpdate', ['id'=>$attestation->id]) }}" method="GET">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Ведомость</label>
                                    <br>
                                    <select class="js-select2" name="report_id">
                                        <option value=""></option>
                                        @foreach($reports as $report)
                                            <option value="{{ $report->id }}"
                                                    @if($attestation->report_id == $report->id) selected @endif>
                                                {{ $report->year->year }} {{ $report->semester->semester }} семестр
                                                группа {{ $report->group->groupCode }}
                                                дисциплина {{ $report->discipline->fullNameOfDiscipline }}
                                                преподаватель {{ $report->discipline->teacher->fioTeacher }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="courseSelect">Студент</label>
                                    <br>
                                    <select class="js-select2" name="student_id">
                                        <option value=""></option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}"
                                                    @if($attestation->student_id == $student->id) selected @endif>
                                                {{ $student->group->groupCode }} {{ $student->fioStudent }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="course">Дата</label>
                                    <input type="date" name="date" class="form-control" required
                                           value="{{ $attestation->date }}">
                                </div>
                                <div class="form-group">
                                    <label for="course">Отметка</label>
                                    <input type="number" name="mark" class="form-control"
                                           placeholder="Введите отметку" required
                                           value="{{ $attestation->mark }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="attestation" id="attestation" value="{{ $attestation->id }}">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
