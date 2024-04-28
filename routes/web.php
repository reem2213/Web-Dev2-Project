<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('mystore', function () {
//     return view('mystores');
// });


/*=========================Seller main page/*=========================*/
// go seller main page
Route::get('mystore/{id}',[SellerController::class,'index']);
// go where seller create new store
Route::get('mystore/create/{id}',[SellerController::class,'create']);
// store new store created by seller
Route::post('mystore/create',[SellerController::class,'store']);
// create event page
Route::get('create_events/{seller_id}',[SellerController::class,'create_events']);
// store created events in the DB
Route::post('create_events',[SellerController::class,'store_events']);
// view events
Route::get('view_events/{seller_id}',[SellerController::class,'view_events']);
// view orders
Route::get('view_orders/{seller_id}',[SellerController::class,'view_orders']);
// view notifications
Route::get('view_notifications/{seller_id}',[SellerController::class,'view_notifications']);
// view seller profile
Route::get('view_profile/{seller_id}',[SellerController::class,'view_profile']);
//stop an order have been started
Route::get('stop_order/{order_id}',[SellerController::class,'stop_order']);
//stop an order have been started
Route::get('start_order/{order_id}',[SellerController::class,'start_order']);
//stop an order have been started
Route::get('reject_order/{order_id}',[SellerController::class,'reject_order']);


/*=========================Seller store main page/*=========================*/

// go to the store main page where the seller chose
Route::get('enter_store/{id}',[ProductController::class,'store_main_page']);


// store the category created by the seller in the DB
Route::post('store_create_category',[ProductController::class,'store_create_category']);

// create product page in the store i seller entered
Route::get('store_create_products/{id}',[ProductController::class,'create_products_page']);
// store the product created by the seller in the DB
Route::post('store_create_products',[ProductController::class,'store_the_product']);

//store setting
Route::get('enter_store_setting/{id}',[ProductController::class,'store_setting']);
//update store information
Route::put('enter_store_setting/{id}',[ProductController::class,'store_setting_update']);

//delete product from store setting store
Route::get('store_delete_product/{id}',[ProductController::class,'destroy_product']);
//delete store from store setting store
Route::get('store_delete_store/{store_id}',[ProductController::class,'destroy_store']);

//edit product
Route::get('store_edit_product/{product_id}',[ProductController::class,'store_edit_product']);
//update product
Route::put('store_update_product/{product_id}',[ProductController::class,'store_update_product']);
