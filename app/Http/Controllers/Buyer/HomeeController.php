<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeeController extends Controller
{
    public function index()
    {
        return view('./Buyer/Home');
    }

    public function anotherPage()
    {
        return view('welcome');
    }
    public function eventPage()
    {
        return view('./Buyer/Events');
    }
    public function orderPage()
    {
        return view('./Buyer/MyOrders');
    }
    public function contactUsPage()
    {
        return view('./Buyer/ContactUs');
    }
    public function shoppingCart()
    {
        return view('./Buyer/ShoppingCart');
    }
    public function profile()
    {
        return view('./Buyer/Profile');
    }public function notification()
    {
        return view('./Buyer/Notifications');
    }
    public function storesPage()
    {
        return view('./Buyer/stores');
    }


    
}
