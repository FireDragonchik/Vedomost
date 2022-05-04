@extends('layouts.admin_layout')

@section('title', 'Добавить курс')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить курс</h1>
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
                        <form action="{{ route('course.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="course">Курс</label>
                                    <input type="text" name="course" class="form-control" id="course"
                                           placeholder="Введите курс" required>
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
