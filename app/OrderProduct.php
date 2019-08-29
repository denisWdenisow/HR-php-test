<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    // Связь с продуктом 
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
