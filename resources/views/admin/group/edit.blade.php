@extends('layouts.admin_layout')

@section('title', 'Редактирование группы')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование группы {{ $group->groupCode }}</h1>
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
                        <form action="{{ route('group.update', $group->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="groupCode">Шифр группы</label>
                                    <input type="text" value="{{ $group->groupCode }}" name="groupCode"
                                           class="form-control"
                                           id="groupCode"
                                           placeholder="Введите шифр группы">
                                </div>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="courseSelect">Курс</label>
                                <br>
                                <select id="courseSelect" name="course_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $group->course->course }}">
                                    <option disabled>Выберите курс</option>
                                    @foreach($courses as $course)
                                        <option class="course" value="{{ $course->id }}">
                                            {{ $course->course }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="educationFormSelect">Форма обучения</label>
                                <br>
                                <select id="educationFormSelect" name="education_form_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $group->educationForm->educationForm }}">
                                    <option selected disabled>Выберите форму обучения</option>
                                    @foreach($educationForms as $educationForm)
                                        <option class="educationForm" value="{{ $educationForm->id }}">
                                            {{ $educationForm->educationForm }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="graduateDegreeSelect">Ступень образования</label>
                                <br>
                                <select id="graduateDegreeSelect" name="graduate_degree_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $group->graduateDegree->graduateDegreeShort }}">
                                    <option disabled>Выберите ступень образования</option>
                                    @foreach($graduateDegrees as $graduateDegree)
                                        <option class="graduateDegree" value="{{ $graduateDegree->id }}">
                                            {{ $graduateDegree->graduateDegreeShort }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="graduateDegreeSelect">Наименование специальности</label>
                                <br>
                                <select id="specialtySelect" name="specialty_id"
                                        class="form-select form-select-sm"
                                        aria-label=".form-select-sm example"
                                        value="{{ $group->specialty->shortNameOfSpecialty }}">
                                    <option disabled>Выберите специальность</option>
                                    @foreach($specialties as $specialty)
                                        <option class="specialty" value="{{ $specialty->id }}">
                                            {{ $specialty->shortNameOfSpecialty }}
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
