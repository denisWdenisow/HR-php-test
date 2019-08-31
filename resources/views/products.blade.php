@extends('layouts.header')

@section('title')
	<title>Продукты</title>
@endsection

@section('content')
	
	@include('layouts.top_menu')
    
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
	                    <td>{{$product->id}}</td>
	                    <td>{{$product->name}}</td>
	                    <td>{{$product->vendor->name}}</td>
	                    <td>
	                    	<input 
	                    		type="number" 
	                    		class="form-control product_price" 
	                    		value="{{$product->price}}" 
	                    		data-product_id="{{$product->id}}" 
	                    		step="any" 
	                    		min="0"/>
	                    </td>	                                           
	                  </tr>
	                @endforeach
	              </tbody>
	            </table>
	            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">{{$product_list->links()}}</div>
            </div>
        </div>
    </div>     

@endsection