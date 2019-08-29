<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    public function getListOrders()
	{
		return view('orders',['list_orders' => Order::all()]);
	}
	
	public function getPriceOrder()
	{
		//$price = Order::find($this->id);
		
		return 100;
	}
}
