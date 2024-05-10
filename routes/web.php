<?php

use Illuminate\Support\Facades\Facade;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\GroupController;
use App\Mail\MyEmail;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BuyerMiddleware;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\HomeeController;
use App\Http\Controllers\Buyer\StoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admindashboardcontroller;
use App\Http\Controllers\storerequestcontroller;
use App\Http\Controllers\activatestore;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StripePaymentController;

Auth::routes([
    'verify' => true
]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/select-role', function () {
    return view('Auth/setRole');
})->name('select.role');
Route::post('/role/select', [RegisterController::class, 'handleRoleSelection'])->name('role.select');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function () {
    return view('admindashboard');
})->name('admin')->middleware(AdminMiddleware::class)->middleware(EnsureEmailIsVerified::class);
Route::get('/seller', function () {
    return view('sellercategory/mystores');
})->name('seller')->middleware(SellerMiddleware::class)->middleware(EnsureEmailIsVerified::class);
Route::get('/buyer', function () {
    return view('Buyer.Home');
})->name('buyer')->middleware(BuyerMiddleware::class)->middleware(EnsureEmailIsVerified::class);
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);




 
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe','stripe')->name('stripe.index');
    Route::post('stripe/checkout','stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success','stripeCheckoutSuccess')->name('stripe.checkout.success');
});
 
Route::get('/refresh_shoppingcart', [CartController::class, 'refresh_shoppingcart']);

Route::get('/events', [HomeeController::class, 'eventPage'])->name('events');
Route::get('/orders', [HomeeController::class, 'orderPage'])->name('orders');
Route::get('/stores', [StoreController::class, 'index'])->name('stores');
Route::get('/stores/{id}', [StoreController::class, 'show'])->name('store.show');
Route::get('/contactUs', [HomeeController::class, 'contactUsPage'])->name('contactUs');
Route::get('/cart', [HomeeController::class, 'shoppingCart'])->name('cart');
Route::get('/profile', [HomeeController::class, 'profile'])->name('profile');
Route::get('/notifications', [HomeeController::class, 'notification'])->name('notifications');
// web.php
Route::middleware('auth')->group(function () {
    Route::get('/store/{storeId}/follow', [StoreController::class, 'followStore'])->name('store.follow');
    Route::get('/store/{storeId}/unfollow', [StoreController::class, 'unfollowStore'])->name('store.unfollow');
});


/*=========================Seller main page/*=========================*/
// go seller main page
Route::get('mystore/{id}', [SellerController::class, 'index']);
// go where seller create new store
Route::get('mystore/create/{id}', [SellerController::class, 'create']);
// store new store created by seller
Route::post('mystore/create', [SellerController::class, 'store']);
// create event page
Route::get('create_events/{seller_id}', [SellerController::class, 'create_events']);
// store created events in the DB
Route::post('create_events', [SellerController::class, 'store_events']);
// view events
Route::get('view_events/{seller_id}', [SellerController::class, 'view_events']);
// view orders
Route::get('view_orders/{seller_id}', [SellerController::class, 'view_orders']);
// view notifications
// view seller profile
Route::get('view_profile/{seller_id}', [SellerController::class, 'view_profile']);
//stop an order have been started
Route::get('stop_order/{order_id}', [SellerController::class, 'stop_order']);
//stop an order have been started
Route::get('start_order/{order_id}', [SellerController::class, 'start_order']);
//stop an order have been started
Route::get('reject_order/{order_id}', [SellerController::class, 'reject_order']);


/*=========================Seller store main page/*=========================*/

// go to the store main page where the seller chose
Route::get('enter_store/{id}', [ProductController::class, 'store_main_page']);
// store the category created by the seller in the DB
Route::post('store_create_category', [ProductController::class, 'store_create_category']);
// create product page in the store i seller entered
Route::get('store_create_products/{id}', [ProductController::class, 'create_products_page']);
// store the product created by the seller in the DB
Route::post('store_create_products', [ProductController::class, 'store_the_product']);
//store setting
Route::get('enter_store_setting/{id}', [ProductController::class, 'store_setting']);
//update store information
Route::put('enter_store_setting/{id}', [ProductController::class, 'store_setting_update']);
//delete product from store setting store
Route::get('store_delete_product/{id}', [ProductController::class, 'destroy_product']);
//delete store from store setting store
Route::get('store_delete_store/{store_id}', [ProductController::class, 'destroy_store']);
//edit product
Route::get('store_edit_product/{product_id}', [ProductController::class, 'store_edit_product']);
//update product
Route::put('store_update_product/{product_id}', [ProductController::class, 'store_update_product']);
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/{store_id}', [CartController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{store_id}/{product_id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');


//listsellers

Route::get('admin', [admindashboardcontroller::class, 'index'])->name('admin')
->middleware(AdminMiddleware::class)->middleware(EnsureEmailIsVerified::class);
Route::get('list', [admindashboardcontroller::class, 'listing'])->name('listStores');
Route::get('listsellers', [admindashboardcontroller::class, 'sellers'])->name('sellerview');
//Route::post('listsellers',[admindashboardcontroller::class,'sellers'])->name('sellerview');
Route::get('listbuyers', [admindashboardcontroller::class, 'buyers'])->name('buyerview');
Route::get('changepass/{id}', [admindashboardcontroller::class, 'edit'])->name('editt');
Route::get('changepassbuyer/{id}', [admindashboardcontroller::class, 'editpass'])->name('editpassbuyer');
Route::get('updated/{id}', [admindashboardcontroller::class, 'update'])->name('updatee');
Route::get('updatedpass/{id}', [admindashboardcontroller::class, 'updatepass'])->name('updatepassbuyer');
Route::get('storerequests', [storerequestcontroller::class, 'storeRequests'])->name('requests');
Route::get('updatestore/{id}', [storerequestcontroller::class, 'updated']);
Route::get('deletestore/{id}', [storerequestcontroller::class, 'destroy']);
Route::get('deactivatedstores', [activatestore::class, 'deactivate']);
Route::get('activatestore/{id}', [activatestore::class, 'activate']);
Route::get('deactivatestore/{id}', [admindashboardcontroller::class, 'deactivatedStores']);
Route::resource('request', storerequestcontroller::class);

use App\Http\Controllers\CoinGateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;

//crypto routes
Route::post('/singlePayment',[CoinGateController::class,'createPayment']); //for crypto currecy
Route::get('/coin-gate/callback/{?token}',[CoinGateController::class,'callback']); //for crypto currecy
Route::get('/coin-gate/success',[CoinGateController::class,'paymentSuccess']); //for payment successful in crypto currecy
Route::get('/coin-gate/cancel',[CoinGateController::class,'paymentCancel']); //for payment failed in crypto currency

//chatbot
Route::match(['get','post'],'botman',[BotmanController::class,'handle']);
Route::get('/chatbot',function(){

    return view('chatbot');

});

Route::get('/welcome', [HomeeController::class, 'anotherPage'])->name('welcome');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/orders', [HomeeController::class, 'orderPage'])->name('orders');
Route::get('/stores', [StoreController::class, 'index'])->name('stores');
Route::get('/stores/{id}', [StoreController::class, 'show'])->name('store.show');
Route::get('/contactUs', [HomeeController::class, 'contactUsPage'])->name('contactUs');
Route::get('/cart', [HomeeController::class, 'shoppingCart'])->name('cart');
Route::get('/profile', [HomeeController::class, 'profile'])->name('profile');
Route::get('/notifications', [HomeeController::class, 'notification'])->name('notifications');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/{store_id}', [CartController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{store_id}/{product_id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');
//biding

Route::post('/message', [EventController::class, 'sendMessage'])->name('message.send');
// Route::get('/message/{id}', [EventController::class, 'getMessage'])->name('message');
Route::get('/ShowMassage/{id}', [EventController::class, 'ShowMassage']);
Route::get('/message/{id}', [EventController::class, 'getMessag1'])->name('message');
Route::get('/subscribe', [EventController::class, 'subscribe']);
Route::delete('/unFollow/{id}', [EventController::class, 'remove_user']);

Route::get('/group/create', [GroupController::class, 'create_form']);
Route::post('/group/create', [GroupController::class, 'create']);
Route::get('/group/join', [GroupController::class, 'join_form']);
Route::post('/group/join', [GroupController::class, 'join'])->name('join');

Route::get('/group/edit/{id}', [GroupController::class, 'edit']);
Route::post('/group/update/{id}', [GroupController::class, 'update']);
Route::delete('/group/delete/{id}', [GroupController::class, 'deleteGroup']);
Route::get('/group/members_list/{id}', [GroupController::class, 'members_list']);
Route::get('/remove_user/{id}/{user_id}', [GroupController::class, 'remove_user']);

Route::post('/toggleEventStatus/{id}', [EventController::class, 'toggleEventStatus'])->name('toggleEventStatus');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::get('/order_details/{order_id}', [HomeeController::class, 'orderDetails'])->name('order_details');


Route::get('updatestatus/{order_id}',[NotificationController::class,'update']);
Route::get('view_notifications/{order_id}', [NotificationController::class, 'listunreadnotify'])->name('list');




Route::get('store_revenue/{id}', [ProductController::class, 'storerevenue']);
//best seller product
Route::get('best_seller/{id}', [ChartController::class, 'productData']);