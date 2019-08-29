@extends('layouts.header')

@section('title')
    <title>Главная страница тестового задания</title>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                {{ config('app.name') }}
            </div>
            @include('layouts.top_menu')
        </div>
    </div>
@endsection