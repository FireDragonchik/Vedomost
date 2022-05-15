@extends('layouts.admin_layout')

@section('title', 'Добавить преподавателя')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить преподавателя</h1>
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
                        <form action="{{ route('teacher.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fioTeacher">ФИО преподавателя</label>
                                    <input type="text" name="fioTeacher" class="form-control" id="fioTeacher"
                                           placeholder="Введите ФИО преподавателя" required>
                                </div>
                                <div class="form-group">
                                    <label for="position">Должность</label>
                                    <input type="text" name="position" class="form-control" id="position"
                                           placeholder="Введите должность преподавателя" required>
                                </div>
                                <div class="form-group">
                                    <label for="departmentSelect">Кафедра</label>
                                    <br>
                                    <select name="department_id"
                                            class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                        <option selected disabled>Выберите кафедру</option>
                                        @foreach($departments as $department)
                                            <option class="department" value="{{ $department->id }}">
                                                {{ $department->department }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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
