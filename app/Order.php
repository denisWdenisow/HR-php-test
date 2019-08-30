<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    protected $fillable = [
    	'status',
    	'client_email',
    	'partner_id',
    	'delivery_dt',
    	'created_at',
    	'updated_at'
	];
	
	// Связь с продуктами в заказе
	public function orderProducts()
	{
		return $this->hasMany('App\OrderProduct');
	}
	
	// Связь с партнером 
	public function partner()
	{
		return $this->belongsTo('App\Partner');
	}
	
	// Стоимость заказа
	public function getPriceOrder()
	{
		return $this->orderProducts->sum(
			function($orderProducts) {
				return $orderProducts->quantity * $orderProducts->price;
			}
		);
	}
}
