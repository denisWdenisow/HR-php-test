@extends('layouts.header')

@section('title')
	<title>Редактирование заказа</title>
@endsection

@include('layouts.top_menu')

@section('content')
    
    <div class="row">
  		<div class="container">
  		
  			<form id="post_form" method="post">{{ csrf_field() }}</form>
  			
            <div class="panel panel-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
                <div class="panel-heading">                	
                	<label class="panel-title">{{isset($order_info->id) ? '№ заказа '.$order_info->id : 'Новый заказ'}}</label>
                </div>
                
                <div class="panel-body">
                
	    			<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
            			<label>E-mail клиента:</label>
            			<input form="post_form" class="form-control" type="email" name="client_mail" value="{{$order_info->client_email ?? old('client_mail')}}" >
          			</div>
          			
          			<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                <label>Партнер:</label>
		                <select form="post_form" class="form-control" name="partner" >
		                	<option value="0">Выбор партнера</option>
		                	@if ($partner_list->count() > 0)
			                	@foreach ($partner_list as $partner)
			                		<option {{$partner->id == ($order_info->partner_id ?? old('partner')) ? 'selected=selected' : ''}} value="{{$partner->id}}">{{$partner->name}}</option>
			                	@endforeach	
			                @endif	                	
		                </select>
          			</div>
          			
          			<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                <label>Статус:</label>
		                <select form="post_form" class="form-control" name="status" >
		                	<option {{isset($order_info->status) && $order_info->status == 0 ? 'selected=selected' : ''}} value="0">новый</option>
		                	<option {{isset($order_info->status) && $order_info->status == 10 ? 'selected=selected' : ''}} value="10">подтвержден</option>
		                	<option {{isset($order_info->status) && $order_info->status == 20 ? 'selected=selected' : ''}} value="20">завершен</option>
		                </select>
          			</div>
          			
          			<div class="row"></div>
          			
          			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
	          			<table class="table">
	          				<thead>
		          				<tr>
		          					<th>uid</th>
		          					<th>Наименование</th>
		          					<th>Количество</th>
		          				</tr>
		          			</thead>
		          			<tbody>
		          				@if (isset($order_info) && $order_info->orderProducts->count() > 0)
			          				@foreach ($order_info->orderProducts as $orderProduct)
				          				<tr>
				          					<td>{{$orderProduct->product_id}}</td>
				          					<td>{{$orderProduct->product->name}}</td>
				          					<td>{{$orderProduct->quantity}}</td>
				          				</tr>
		          					@endforeach
		          				@endif
		          			</tbody>
	          			</table>
	          		</div>
	          		<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
	          			<button class="btn btn-default">Добавить продукт</button>
	          		</div>
	  			</div>
	  			
	  			@if ($errors->any())
      				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <div class="alert alert-danger" role="alert">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
				    </div>
				@endif
	  			
	  			<div class="panel-footer">
	  				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  					<label>Сумма заказа: {{isset($order_info) ? $order_info->getPriceOrder() : 0}}</label>
	  					<button form="post_form" type="submit" class="btn btn-primary pull-right">Сохранить</button>
	  				</div>
	  			</div>
	  			
            </div>
        </div>
    </div>
        

@endsection