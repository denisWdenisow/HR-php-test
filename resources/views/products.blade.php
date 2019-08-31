@extends('layouts.header')

@section('title')
	<title>Список заказов</title>
@endsection

@include('layouts.top_menu')

@section('content')
    
    <div class="row">
  		<div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	            <table class="table">
	              <thead>
	                <tr>
	                    <th width="10%">ид продукта</th>
	                    <th width="35">наименование продукта</th>
	                    <th width="40%">наименование поставщика</th>
	                    <th width="15%">цена</th>
	                </tr>
	              </thead>
	              <tbody>
	                @foreach ($product_list as $product)
	                  <tr>                      
	                    <td>{{$product->id}}</a></td>
	                    <td>{{$product->name}}</td>
	                    <td>{{$product->vendor->name}}</td>
	                    <td><input type="number" class="form-control product_price" value="{{$product->price}}" step="any" min="0"/></td>	                                           
	                  </tr>
	                @endforeach
	              </tbody>
	            </table>
	            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">{{$product_list->links()}}</div>
            </div>
        </div>
    </div>        

@endsection