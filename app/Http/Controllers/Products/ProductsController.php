<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{
    public function getListProducts()
	{
		return view('products',['product_list' => Product::orderBy('name','asc')->paginate(25)]);
	}
	
	public function saveNewPrice(Request $request)
	{
		$this->validate($request,[
    		'product_id'	=> 'required|integer|not_in:0',
    		'price' 		=> 'required|numeric|min:0'    		
    	]);    	
    	try{
    		$product = Product::find($request->product_id);
    			$product->price = $request->price;
    		$product->save();
	    }
	    catch(\Exception $e){
	       echo $e->getMessage(); 
	    }
	}
}
