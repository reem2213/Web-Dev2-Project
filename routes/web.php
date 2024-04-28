<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admindashboardcontroller;
use App\Http\Controllers\storerequestcontroller;
use App\Http\Controllers\activatestore;

//listsellers

Route::get('admin',[admindashboardcontroller::class,'index']);
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
// Route::post('toggle-store/{storeId}',[admindashboardcontroller::class,'toggleStore'])->name('admin.toggle-store');
// Route::post('reset-password/{userId}',[admindashboardcontroller::class,'resetPassword'])->name('admin.reset-password');


Route::resource('request',storerequestcontroller::class);


