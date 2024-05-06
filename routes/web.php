<?php


use Illuminate\Support\Facades\Facade;

use App\Http\Controllers\FirstController;
use App\Http\Controllers\GroupController;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\HomeeController;
use App\Http\Controllers\Buyer\StoreController;
use App\Http\Controllers\HomeController;

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




Route::get('/homee', [HomeeController::class, 'index'])->name('home');


Route::get('/welcome', [HomeeController::class, 'anotherPage'])->name('welcome');
Route::get('/events', [HomeeController::class, 'eventPage'])->name('events');
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

Route::delete('/cart/{store_id}/{product_id}',[CartController::class, 'deleteCartItem'])->name('cart.delete');
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BuyerMiddleware;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/select-role', function () {
    return view('Auth/setRole');
})->name('select.role');

Route::post('/role/select',[RegisterController::class,'handleRoleSelection'])->name('role.select');


Auth::routes([
    'verify'=>true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(EnsureEmailIsVerified::class);

Route::get('/admin',function(){
    return view('admindashboard');
})->name('admin')->middleware(AdminMiddleware::class)->middleware(EnsureEmailIsVerified::class);

Route::get('/seller',function(){
    return view('sellercategory/mystores');
})->name('seller')->middleware(SellerMiddleware::class)->middleware(EnsureEmailIsVerified::class);

Route::get('/buyer',function(){
    return view('Buyer.Home');
})->name('buyer')->middleware(BuyerMiddleware::class)->middleware(EnsureEmailIsVerified::class);



Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class,'callback']);






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



Route::get('/homee', [HomeeController::class, 'index'])->name('home');


Route::get('/welcome', [HomeeController::class, 'anotherPage'])->name('welcome');
Route::get('/events', [HomeeController::class, 'eventPage'])->name('events');
Route::get('/orders', [HomeeController::class, 'orderPage'])->name('orders');
Route::get('/stores', [StoreController::class, 'index'])->name('stores');
Route::get('/stores/{id}', [StoreController::class, 'show'])->name('store.show');



Route::get('/contactUs', [HomeeController::class, 'contactUsPage'])->name('contactUs');

Route::get('/cart', [HomeeController::class, 'shoppingCart'])->name('cart');
Route::get('/profile', [HomeeController::class, 'profile'])->name('profile');
Route::get('/notifications', [HomeeController::class, 'notification'])->name('notifications');



use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;




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





Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/{store_id}', [CartController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');

Route::delete('/cart/{store_id}/{product_id}',[CartController::class, 'deleteCartItem'])->name('cart.delete');



use App\Http\Controllers\admindashboardcontroller;
use App\Http\Controllers\storerequestcontroller;
use App\Http\Controllers\activatestore;

//listsellers
//reem

Route::get('admin',[admindashboardcontroller::class,'index'])->name('admin');
Route::get('list',[admindashboardcontroller::class,'listing'])->name('listStores');
Route::get('listsellers',[admindashboardcontroller::class,'sellers'])->name('sellerview');
//Route::post('listsellers',[admindashboardcontroller::class,'sellers'])->name('sellerview');
Route::get('listbuyers',[admindashboardcontroller::class,'buyers'])->name('buyerview');

Route::get('changepass/{id}',[admindashboardcontroller::class,'edit'])->name('editt');
Route::get('changepassbuyer/{id}',[admindashboardcontroller::class,'editpass'])->name('editpassbuyer');

Route::get('updated/{id}',[admindashboardcontroller::class,'update'])->name('updatee');
Route::get('updatedpass/{id}',[admindashboardcontroller::class,'updatepass'])->name('updatepassbuyer');


Route::get('storerequests',[storerequestcontroller::class,'storeRequests'])->name('home');
Route::get('updatestore/{id}',[storerequestcontroller::class,'updated']);
Route::get('deletestore/{id}',[storerequestcontroller::class,'destroy']);

Route::get('deactivatedstores',[activatestore::class,'deactivate']);
Route::get('activatestore/{id}',[activatestore::class,'activate']);


Route::get('deactivatestore/{id}',[admindashboardcontroller::class,'deactivatedStores']);


Route::resource('request',storerequestcontroller::class);
