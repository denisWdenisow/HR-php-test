<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'price',
    	'vendor_id'
	];
	
	// Связь с поставщиком 
	public function vendor()
	{
		return $this->belongsTo('App\Vendor');
	}
}
