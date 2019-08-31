<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{
    public function getListProducts()
	{
		return view('products',['product_list' => Product::orderBy('name')->paginate(25)]);
	}
}
