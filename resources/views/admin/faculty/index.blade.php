@extends('layouts.admin_layout')

@section('title', 'Все факультеты')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все факультеты</h1>
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
                            <th style="width: 20%">
                                Краткое наименование факультета
                            </th>
                            <th style="width: 25%">
                                Полное наименование факультета
                            </th>
                            <th style="width: 25%">
                                Декан
                            </th>
                            <th style="width:30%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faculties as $faculty)
                            <tr>
                                <td>
                                    {{ $faculty->id }}
                                </td>
                                <td>
                                    {{ $faculty->shortNameOfFaculty }}
                                </td>
                                <td>
                                    {{ $faculty->fullNameOfFaculty }}
                                </td>
                                <td>
                                    {{ $faculty->fioDean }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('faculty.edit', $faculty->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>
                                    <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST"
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
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
        {{ $faculties->withQueryString()->links() }}
    </section>
    <!-- /.content -->
@endsection
