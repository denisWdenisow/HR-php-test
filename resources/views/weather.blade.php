@extends('layouts.header')

@section('title')
	<title>Текущая температура в Брянске</title>
@endsection

@section('content')

	@include('layouts.top_menu')
    
    <div class="flex-center full-height">
    
        <div class="content">
            <div class="title m-b-md">
                Температура в Брянске
            </div>
            <div class="title m-b-md">
            	{{$temperature}} &deg;C
            </div>
        </div>
        
    </div>
        

@endsection