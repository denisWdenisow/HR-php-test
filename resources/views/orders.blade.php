@extends('layouts.header')

@section('title')
	<title>Список всех заказов</title>
@endsection

@include('layouts.top_menu')

@section('content')
    
    <div class="row">
  		<div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Навигация вкладки -->  
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
  </li>
</ul>

<!-- Вкладка панели -->  
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel">1</div>
  <div class="tab-pane" id="profile" role="tabpanel">2</div>
  <div class="tab-pane" id="messages" role="tabpanel">3</div>
  <div class="tab-pane" id="settings" role="tabpanel">4</div>
</div>

<script>
	$('#myTab a[href="#profile"]').tab('show');
</script>
				
				<table class="table">
                	<thead>
		                <tr>
		                  	<th>ид_заказа</th>
		                  	<th>название_партнера</th>
		                  	<th>стоимость_заказа</th>
		                  	<th>наименование_состав_заказа</th>
		                  	<th>статус_заказа</th>
		                </tr>
                	</thead>
                	<tbody>
                		@foreach ($list_orders as $order)
                		<tr>                			
		                  	<td><a href="order_editor?order_id={{$order->id}}">Заказ №{{$order->id}}</a></td>
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
                	<tfoot>
                		<tr>
		                  	<th></th>
		                  	<th>Сумма</th>
		                  	<th></th>
		                  	<th></th>
		                  	<th></th>
		                </tr>
                	</tfoot>
                </table>
            </div>
        </div>
    </div>
        

@endsection