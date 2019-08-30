<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Partner;

class AddOrderController extends Controller
{
    public function showOrder(Request $request)
	{
		return view('add_order',[
			'order_info' 	=> Order::find($request->order_id ?? 0),
			'partner_list'	=> Partner::all()
		]);
	}
}
