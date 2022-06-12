@extends('layouts.user_layout')

@section('title', 'Все ведомости')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все ведомости</h1>
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
                                Учебный год
                            </th>
                            <th style="width: 10%">
                                Семестр
                            </th>
                            <th style="width: 10%">
                                Группа
                            </th>
                            <th>
                                Дисциплина
                            </th>
                            <th style="width: 20%">
                                Преподаватель
                            </th>
                            <th style="width:30%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>
                                    <a href="{{ route('t_report.show', $report) }}"> {{ $report->id }} </a>
                                </td>
                                <td>
                                    {{ $report->year->year }}
                                </td>
                                <td>
                                    {{ $report->semester->semester }}
                                </td>
                                <td>
                                    {{ $report->group->groupCode }}
                                </td>
                                <td>
                                    {{ $report->discipline->fullNameOfDiscipline }}
                                </td>
                                <td>
                                    {{ $report->discipline->teacher->fioTeacher }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('t_report.edit', $report->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>
                                    <form action="{{ route('t_report.destroy', $report->id) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn delete-btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {:echo "
                <pre/>
                "}}
            {{var_dump($reports[1])}}
            <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
        {{ $reports->withQueryString()->links() }}
    </section>
    <!-- /.content -->
@endsection
