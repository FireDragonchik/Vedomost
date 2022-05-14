@extends('layouts.admin_layout')

@section('title', 'Редактирование дисциплины')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование дисциплины {{ $discipline->shortNameOfDiscipline }}</h1>
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
                        <form action="{{ route('discipline.update', $discipline->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="shortNameOfDiscipline">Краткое наименование дисциплины</label>
                                    <input type="text" name="shortNameOfDiscipline" class="form-control"
                                           id="shortNameOfDiscipline"
                                           value="{{ $discipline->shortNameOfDiscipline}}"
                                           placeholder="Введите краткое наименование дисциплины">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fullNameOfDiscipline">Полное наименование дисциплины</label>
                                    <input type="text" name="fullNameOfDiscipline" class="form-control"
                                           id="fullNameOfDiscipline"
                                           value="{{ $discipline->fullNameOfDiscipline}}"
                                           placeholder="Введите полное наименование дисциплины">
                                </div>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="teacherFormSelect">Преподаватель</label>
                                <br>
                                <select id="teacherFormSelect" name="teacher_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $discipline->teacher_id}}">
                                    @foreach($teachers as $teacher)
                                        <option class="teacher" value="{{ $teacher->id }}">
                                            {{ $teacher->fioTeacher }}
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
