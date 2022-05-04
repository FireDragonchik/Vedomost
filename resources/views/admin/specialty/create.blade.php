@extends('layouts.admin_layout')

@section('title', 'Добавить специальность')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить специальность</h1>
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
                        <form action="{{ route('specialty.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="shortNameOfSpecialty">Краткое наименование специальности</label>
                                    <input type="text" name="shortNameOfSpecialty" class="form-control"
                                           id="shortNameOfSpecialty"
                                           placeholder="Введите краткое наименование специальности" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fullNameOfSpecialty">Полное наименование специальности</label>
                                    <input type="text" name="fullNameOfSpecialty" class="form-control"
                                           id="fullNameOfSpecialty"
                                           placeholder="Введите полное наименование специальности" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="facultySelect">Факультет</label>
                                <select id="facultySelect" name="faculty_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        required>
                                    <option selected disabled>Выберите факультет</option>
                                    @foreach($faculties as $faculty)
                                        <option class="department" value="{{ $faculty->id }}">
                                            {{ $faculty->shortNameOfFaculty }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
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
