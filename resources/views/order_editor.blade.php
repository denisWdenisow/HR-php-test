@extends('layouts.header')

@section('title')
	<title>Редактирование заказа</title>
@endsection

@include('layouts.top_menu')

@section('content')
    
    <div class="row">
  		<div class="container">
  		
  			<form id="post_form" method="post">{{ csrf_field() }}</form>
  			
            <div class="panel panel-success col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
                <div class="panel-heading">
                	@if(isset($info_order->id))
                	<label class="panel-title">Код заказа #{{$info_order->id}}</label>
                	@else
                	<label class="panel-title">Новый заказ</label>
                	@endif
                </div>
                
                <div class="panel-body">
                
	    			<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            			<label>E-mail клиента:</label>
            			<input form="post_form" class="form-control select2" type="email" name="client_mail" value="{{$info_order->client_email ?? old('client_mail')}}" >
          			</div>
          			
          			<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
		                <label>Партнер:</label>
		                <select form="post_form" class="form-control" name="partner" >
		                	<option selected="selected"  disabled="disabled" value="0">Партнер</option>
		                	@foreach ($partner_list as $partner)
		                	@if($partner->id == ($info_order->partner_id ?? old('partner')))
		                	<option selected="selected" value="{{$partner->id}}">{{$partner->name}}</option>
		                	@else 
		                	<option value="{{$partner->id}}">{{$partner->name}}</option>
		                	@endif			                  	
		                  	@endforeach
		                </select>
          			</div>
          			
          			<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
		                <label>Статус:</label>
		                <select form="post_form" class="form-control" name="status" >
		                	<option selected="selected"  disabled="disabled" value="-1">Статус</option>
		                	@foreach ($status_list as $status)
		                	@if($status->code == ($info_order->status ?? old('status')))
		                	<option selected="selected" value="{{$status->code}}">{{$status->name}}</option>
		                	@else 
		                	<option value="{{$status->code}}">{{$status->name}}</option>
		                	@endif			                  	
		                  	@endforeach
		                </select>
          			</div>
          			
          			<div class="row"></div>
          			@if(!empty($product_list))
          			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
	          			<table class="table">
	          				<thead>
		          				<tr>
		          					<th>id</th>
		          					<th>наименования</th>
		          					<th>количество</th>
		          				</tr>
		          			</thead>
		          			<tbody>
		          				@foreach ($product_list as $prod_list)
		          				<tr>
		          					<td>{{$prod_list->id}}</td>
		          					<td>{{$prod_list->name}}</td>
		          					<td>{{$prod_list->sum_quant}}</td>
		          				</tr>
		          				@endforeach
		          			</tbody>	          				
	          			</table>
	          		</div>
	          		@endif
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
	  					<label>Сумма заказа: {{$sum_order}}</label>
	  					<button form="post_form" type="submit" class="btn btn-primary pull-right">Сохранить</button>
	  				</div>
	  			</div>
	  			
            </div>
        </div>
    </div>
        

@endsection