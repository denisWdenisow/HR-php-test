<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Главная 
Route::get('/', function () {
    return view('welcome');
});

// Текущая температура в Брянске
Route::get('weather', 'Weather\WeatherController@showTemperature');

// Заказы
Route::get('orders', 'Orders\OrdersController@getListOrders');
// Редактирование заказа
Route::get('add_order', 'Orders\AddOrderController@showOrder');
Route::post('add_order', 'Orders\AddOrderController@saveOrder');

// Продукты
Route::get('products', 'Products\ProductsController@getListProducts');
Route::post('saveNewPrice', 'Products\ProductsController@saveNewPrice');