@extends('layouts.header')

@section('title')
	<title>Заказы</title>
@endsection

@section('content')

	@include('layouts.top_menu')
    
    <div class="row">
  		<div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	              <!-- Навигация вкладки -->  
	              <ul class="nav nav-tabs" role="tablist">
	                	@foreach ($nav_tabs as $key => $tabs)
		                  <li class="nav-item {{$tabs['active']}}">
		                    	<a class="nav-link" data-toggle="tab" href="#{{$tabs['id']}}" role="tab">{{$tabs['name']}}</a>
		                  </li>
	                	@endforeach
	              </ul>

              	<!-- Вкладка панели -->  
              	<div class="tab-content">
	                @foreach ($nav_tabs as $key => $tabs)
	                  <!-- {{$tabs['name']}} -->
	                  <div class="tab-pane {{$tabs['active']}}" id="{{$tabs['id']}}" role="tabpanel">
	                    <table class="table">
	                      <thead>
	                        <tr>
	                            <th>ИД заказа</th>
	                            <th>Название партнера</th>
	                            <th>Стоимость заказа</th>
	                            <th>Наименование состав заказа</th>
	                            <th>Статус заказа</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        @foreach ($tabs['data'] as $order)
	                          <tr>                      
	                            <td><a href="add_order?order_id={{$order->id}}" target="_blank">Заказ №{{$order->id}}</a></td>
	                            <td>{{$order->partner->name}}</td>
	                            <td>{{$order->getPriceOrder()}}</td>
	                            <td>
	                              @foreach ($order->orderProducts as $orderProduct)
	                                {{$orderProduct->product->name}} ({{$orderProduct->quantity}} x {{$orderProduct->price}})<br />
	                              @endforeach
	                            </td>
	                            <td>{{$order->status}}</td>                       
	                          </tr>
	                        @endforeach
	                      </tbody>
	                    </table>
	                  </div>
	                @endforeach
            	</div>
            </div>
        </div>
    </div>        

@endsection