@extends('layouts.header')

@section('title')
	<title>Погода в Брянске</title>
@endsection

@include('layouts.top_menu')

@section('content')
    
    <div class="flex-center full-height">
    
        <div class="content">
            <div class="title m-b-md">
                Текущая температура в Брянске
            </div>
            <div class="title m-b-md">
            	{{$temperature}} &deg;C
            </div>
        </div>
        
    </div>
        

@endsection