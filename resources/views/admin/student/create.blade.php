@extends('layouts.admin_layout')

@section('title', 'Добавить студента')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить студента</h1>
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
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="studentId">Номер по журналу</label>
                                    <input type="number" name="studentId" class="form-control"
                                           id="studentId"
                                           placeholder="Введите номер по журналу">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="courseSelect">Группа</label>
                                    <br>
                                    <select class="js-select2" id="groupSelect" name="group_id">
                                        <option value=""></option>
                                        @foreach($groups as $group)
                                            <option class="group" value="{{ $group->id }}">
                                                {{ $group->groupCode }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="fioStudent">ФИО студента</label>
                                    <input type="text" name="fioStudent" class="form-control"
                                           id="fioStudent"
                                           placeholder="Введите ФИО студента">
                                </div>
                                <div class="form-group">
                                    <label for="subGroup">Индекс подгруппы</label>
                                    <input type="number" name="subGroup" class="form-control"
                                           id="subGroup"
                                           value="1"
                                           placeholder="Введите индекс подгруппы (1,2)">
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
