@extends('layouts.app')

@section('title') Начальная страница @endsection

@section('header')
    @parent
@endsection

@section('content')
    @auth
        <div class="container">
            <h3>Вы успешно вошли в систему как {{ @Auth::user()->roles[0]->name }}</h3>
        </div>
    @else
        <div class="container">
            <h3>Добро пожаловать в систему "Электронная ведомость успеваемости"</h3>
            <div>Для того чтобы начать работу с системой вам необходимо <a href="{{ route('login') }}">Войти</a> либо <a href="{{ route('register') }}">Зарегистрироваться</a></div>
        </div>
    @endauth
@endsection
@section('footer')
    @parent
@endsection
