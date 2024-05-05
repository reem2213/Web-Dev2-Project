<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function eventPage()
    {
        // Check if the current user (buyer) follows any stores
        $user = Auth::user();
        if ($user && $user->role === 'buyer') {
            // Fetch events only for the stores the buyer follows
            $followedStores = $user->follows()->pluck('store_id')->toArray();
            $events = Event::whereIn('store_id', $followedStores)->get();
    
            return view('Buyer.Events')->with('events', $events);
        } else {
            // Redirect or show an error message indicating that the user is not a buyer or not logged in
            return redirect()->back()->with('error', 'You are not logged in as a buyer or you are not following any stores.');
        }
    }
    

    
}
