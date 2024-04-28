<?php

use App\Http\Controllers\BotmanController;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\FollowController;
use App\Http\Controllers\Buyer\HomeeController;
use App\Http\Controllers\Buyer\StoreController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;

use App\Http\Controllers\FirstController;
use App\Http\Controllers\GroupController;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('page1',function(){

    return "my age is 20!";

});
Route::get('/',function(){

    return view('chatbot');

});

Auth::routes();

Route::get('/homee', [HomeeController::class, 'index'])->name('homee');


Route::get('/welcome', [HomeeController::class, 'anotherPage'])->name('welcome');
Route::get('/events', [HomeeController::class, 'eventPage'])->name('events');
Route::get('/orders', [HomeeController::class, 'orderPage'])->name('orders');
Route::get('/stores', [StoreController::class, 'index'])->name('stores');
Route::get('/stores/{id}', [StoreController::class, 'show'])->name('store.show');



Route::get('/contactUs', [HomeeController::class, 'contactUsPage'])->name('contactUs');

Route::get('/cart', [HomeeController::class, 'shoppingCart'])->name('cart');
Route::get('/profile', [HomeeController::class, 'profile'])->name('profile');
Route::get('/notifications', [HomeeController::class, 'notification'])->name('notifications');

Route::get('/admin',function(){
    return view('admin');
})->name('admin')->middleware('admin');

Route::get('/seller',function(){
    return view('seller');
})->name('seller')->middleware('seller');

Route::get('/buyer',function(){
    return view('buyer');
})->name('buyer')->middleware('buyer');





Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/{store_id}', [CartController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');

Route::delete('/cart/{store_id}/{product_id}',[CartController::class, 'deleteCartItem'])->name('cart.delete');


