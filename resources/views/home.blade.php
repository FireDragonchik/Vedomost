@extends('layouts.app')

@section('title') Личный кабинет @endsection

@section('header')
    @parent
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет</div>
                    <div>Имя пользователя: {{Auth::user()->name}}</div>
                    <div>Email: {{Auth::user()->email}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
