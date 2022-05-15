@extends('layouts.app')

@section('title') Личный кабинет @endsection

@section('header')
    @parent
@endsection
@section('content')
    <form action="{{route('personalAccountInfo')}}" method="get">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Личный кабинет</div>
                        <div name="userName">Имя пользователя: {{Auth::user()->name}}</div>
                        <div>Email: {{Auth::user()->email}}</div>
                    </div>
                    @if(!empty($teacher))
                        <div class="card">
                            <div class="card-header">Дисциплины</div>
                            @foreach($teacher->disciplines as $discipline)
                                <div class="cart-item">{{$discipline->fullNameOfDiscipline}}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    @parent
@endsection
