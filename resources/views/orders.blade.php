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
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" data-toggle="tab" href="#overdue" role="tab">просроченные</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#current" role="tab">текущие</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#new_order" role="tab">новые</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#done_order" role="tab">выполненные</a>
                </li>
              </ul>

              <!-- Вкладка панели -->  
              <div class="tab-content">

                <!-- просроченные -->
                <div class="tab-pane active" id="overdue" role="tabpanel">
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
                      @foreach ($overdue_orders as $order)
                        <tr>                      
                          <td><a href="order_editor?order_id={{$order->id}}">Заказ №{{$order->id}} {{$order->delivery_dt}} - {{date("Y-m-d H:i:s")}}</a></td>
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

                <!-- текущие -->
                <div class="tab-pane" id="current" role="tabpanel">
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
                      @foreach ($current_orders as $order)
                        <tr>                      
                          <td><a href="order_editor?order_id={{$order->id}}">Заказ №{{$order->id}}  - {{date("Y-m-d H:i:s")}} < {{$order->delivery_dt}} < {{date("Y-m-d H:i:s", strtotime("+24 hours"))}}</a></td>
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

                <!-- новые -->
                <div class="tab-pane" id="new_order" role="tabpanel">
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
                      @foreach ($new_orders as $order)
                        <tr>                      
                          <td><a href="order_editor?order_id={{$order->id}}">Заказ №{{$order->id}}  - {{date("Y-m-d H:i:s")}} > {{$order->delivery_dt}}</a></td>
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

                <!-- выполненные -->
                <div class="tab-pane" id="done_order" role="tabpanel">
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
                      @foreach ($done_orders as $order)
                        <tr>                      
                          <td><a href="order_editor?order_id={{$order->id}}">Заказ №{{$order->id}}  - {{date("Y-m-d")}} > {{$order->delivery_dt}} > {{date("Y-m-d 00:00:00")}}</a></td>
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
              </div>

				
				
            </div>
        </div>
    </div>
        

@endsection