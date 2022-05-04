@extends('layouts.admin_layout')

@section('title', 'Редактирование факультета')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование факультета {{ $faculty->shortNameOfFaculty }}</h1>
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
                        <form action="{{ route('faculty.update', $faculty->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="shortNameOfFaculty">Краткое наименование факультета</label>
                                    <input type="text" name="shortNameOfFaculty" value="{{ $faculty->shortNameOfFaculty }}" class="form-control" id="shortNameOfFaculty"
                                           placeholder="Введите краткое наименование факультета" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fullNameOfFaculty">Полное наименование факультета</label>
                                    <input type="text" name="fullNameOfFaculty" value="{{ $faculty->fullNameOfFaculty }}" class="form-control" id="fullNameOfFaculty"
                                           placeholder="Введите полное наименование факультета" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fioDean">Декан</label>
                                    <input type="text" name="fioDean" value="{{ $faculty->fioDean }}" class="form-control" id="fioDean"
                                           placeholder="Введите ФИО декана" required>
                                </div>
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
