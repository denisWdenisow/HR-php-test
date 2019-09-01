<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    public function getListOrders()
	{
		return view('orders',['nav_tabs' =>array(
		    [
		    	'name' 	=> 'Просроченные',
				'id'	=> 'overdue',
				'active'=> 'active',
				'data'	=> Order::where('status',10)
					->where('delivery_dt','<',date("Y-m-d H:i:s"))
					->orderBy('delivery_dt','desc')
					->take(50)
					->get()
		 	],
		 	[
		    	'name' 	=> 'Текущие',
				'id'	=> 'current',
				'active'=> '',
				'data'	=> Order::where('status',10)
					->where('delivery_dt','>',date("Y-m-d H:i:s"))
					->where('delivery_dt','<',date("Y-m-d H:i:s", strtotime("+24 hours")))
					->orderBy('delivery_dt','asc')
					->get()
		    ],
		    [
		    	'name' 	=> 'Новые',
				'id'	=> 'new_order',
				'active'=> '',
				'data'	=> Order::where('status',0)
					->where('delivery_dt','>',date("Y-m-d H:i:s"))
					->orderBy('delivery_dt','asc')
					->take(50)
					->get()
		    ],
		    [
		    	'name' 	=> 'Выполненные',
				'id'	=> 'done_order',
				'active'=> '',
				'data'	=> Order::where('status',20)
					->where('delivery_dt','<',date("Y-m-d H:i:s"))
					->where('delivery_dt','>',date("Y-m-d 00:00:00"))
					->orderBy('delivery_dt','desc')
					->take(50)
					->get()
		    ]
		)]);
	}	
}
