<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BuyerMiddleware;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
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
    return view('Admin/adminPanel');
})->name('admin')->middleware(AdminMiddleware::class)->middleware(EnsureEmailIsVerified::class);

Route::get('/seller',function(){
    return view('Seller.home');
})->name('seller')->middleware(SellerMiddleware::class)->middleware(EnsureEmailIsVerified::class);

Route::get('/buyer',function(){
    return view('Buyer.home');
})->name('buyer')->middleware(BuyerMiddleware::class)->middleware(EnsureEmailIsVerified::class);


 
Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
 
Route::get('/auth/{provider}/callback', [ProviderController::class,'callback']);

