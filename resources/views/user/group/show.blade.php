@extends('layouts.user_layout')

@section('title', 'Группа')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <h1 class="text-center">Группа {{ $group->groupCode }}</h1>
                </div><!-- /.c  ol -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 7%">
                                Номер по журналу
                            </th>
                            <th style="width: 10%">
                                Группа
                            </th>
                            <th style="width: 25%">
                                ФИО студента
                            </th>
                            <th style="width: 12%">
                                Индекс подгруппы
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>
                                    {{ $student->studentId }}
                                </td>
                                <td>
                                    {{ $group->groupCode }}
                                </td>
                                <td>
                                    {{ $student->fioStudent }}
                                </td>
                                <td>
                                    {{ $student->subGroup }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
