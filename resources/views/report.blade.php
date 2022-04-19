@extends('layouts.app')

@section('title') Ведомость @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <section id="recommendations" class="section">
            <div class="section-title section-title-center">
                <h3>Ведомость №</h3>
            </div>
            <div class="section-content">
                <div class="goods-group">
                    <table class="goods" border="1">
                        <tr>
                            <th>studentId</th>
                            <th>groupCode</th>
                            <th>fioStudent</th>
                        </tr>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->studentId}}</td>
                                <td>{{$student->groupCode}}</td>
                                <td>{{$student->fioStudent}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @parent
@endsection
