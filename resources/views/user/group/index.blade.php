@extends('layouts.user_layout')

@section('title', 'Все группы')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все группы</h1>
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
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 7%">
                                Шифр группы
                            </th>
                            <th style="width: 10%">
                                Курс
                            </th>
                            <th style="width: 10%">
                                Форма обучения
                            </th>
                            <th style="width: 12%">
                                Ступень образования
                            </th>
                            <th style="width: 10%">
                                Количество студентов
                            </th>
                            <th style="width: 25%">
                                Наименование специальности
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>
                                    <a href="{{ route('t_group.show', $group) }}"> {{ $group->id }} </a>
                                </td>
                                <td>
                                    {{ $group->groupCode }}
                                </td>
                                <td>
                                    {{ $group->course->course }}
                                </td>
                                <td>
                                    {{ $group->educationForm->educationForm }}
                                </td>
                                <td>
                                    {{ $group->graduateDegree->graduateDegreeShort }}
                                </td>
                                <td>
                                    {{ @count($group->students) }}
                                </td>
                                <td>
                                    {{ $group->specialty->fullNameOfSpecialty }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
        {{ $groups->withQueryString()->links() }}
    </section>
    <!-- /.content -->
@endsection
