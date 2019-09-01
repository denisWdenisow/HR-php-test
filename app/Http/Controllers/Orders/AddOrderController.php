<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Partner;
use App\Http\Controllers\MailController;

class AddOrderController extends Controller
{
    public function showOrder(Request $request)
	{
		return view('add_order',[
			'order_info' 	=> Order::find($request->order_id ?? 0),
			'partner_list'	=> Partner::all()
		]);
	}
	
	public function saveOrder(Request $request)
	{
		$this->validate($request,[
    		'client_mail'	=> 'required|email',
    		'partner' 		=> 'required|integer|not_in:0',
    		'status' 		=> 'required|integer|in:0,10,20',
    		'delivery_d'	=> 'required|date',
    		'delivery_t'	=> 'required'
    	]);    	
    	try{
    		$data = [
	    		'status' 		=> $request->status,
		    	'client_email' 	=> $request->client_mail,
		    	'partner_id'	=> $request->partner,
		    	'delivery_dt' 	=> $request->delivery_d.' '.$request->delivery_t
    		];
	       	$order = Order::updateOrCreate(
	       		['id' => $request->order_id],
	       		$data
	       	);
	       	if ($order->status == 20){
				$mes = new MailController;
				$mes->prepareSendingEmails($order->id);
			}	       	
	       	return redirect('add_order?order_id='.$order->id);
	    }
	    catch(\Exception $e){
	       echo $e->getMessage(); 
	    }
	}
}
