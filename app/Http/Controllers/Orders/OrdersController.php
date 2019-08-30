<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    public function getListOrders()
	{
		return view('orders',[
			'overdue_orders' => Order::where('status',10)
				->where('delivery_dt','<',date("Y-m-d H:i:s"))
				->orderBy('delivery_dt','desc')
				->take(50)
				->get(),
			'current_orders' => Order::where('status',10)
				->where('delivery_dt','>',date("Y-m-d H:i:s"))
				->where('delivery_dt','<',date("Y-m-d H:i:s", strtotime("+24 hours")))
				->orderBy('delivery_dt','asc')
				->get(),
			'new_orders' => Order::where('status',0)
				->where('delivery_dt','>',date("Y-m-d H:i:s"))
				->orderBy('delivery_dt','asc')
				->take(50)
				->get(),
			'done_orders' => Order::where('status',20)
				->where('delivery_dt','<',date("Y-m-d H:i:s"))
				->where('delivery_dt','>',date("Y-m-d 00:00:00"))
				->orderBy('delivery_dt','desc')
				->take(50)
				->get()
		]);
	}
	
}
