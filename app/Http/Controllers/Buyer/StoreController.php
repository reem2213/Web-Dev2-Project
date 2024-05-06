<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Add this line
    }
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $stores = Store::where('Accepted', 1)->get();
        return view('Buyer.stores')->with('store', $stores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }


    // StoreController.php
    public function followStore($storeId)
    {
        $user = Auth::user();
        $store = Store::findOrFail($storeId);
    
        $user->follows()->attach($store);
    
        return redirect()->back()->with('success', 'Followed store successfully');
    }
    
    public function unfollowStore($storeId)
    {
        $user = Auth::user();
        $store = Store::findOrFail($storeId);
    
        $user->follows()->detach($store);
    
        return redirect()->back()->with('success', 'Unfollowed store successfully');
    }



public function showEvents($storeId)
{
    $store = Store::findOrFail($storeId);

    // Check if the current user (buyer) follows the store
    $user = Auth::user();
    if ($user && $user->role === 'buyer' && $user->follows->contains('id', $storeId)) {
        // Fetch events only if the buyer follows the store
        $events = $store->events;

        return view('Buyer.Events')->with('events', $events);
    } else {
        // Redirect or show an error message indicating that the buyer doesn't follow the store
        return redirect()->back()->with('error', 'You are not following this store.');
    }
}

    
    


    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $store = Store::findOrFail($id);
        $productsQuery = Product::where('store_id', $id);
        $categoryQuery= Category::where('store_id', $id);

        if ($request->has('category')) {
            $productsQuery->where('category_id', $request->input('category'));
        }

        
        $products = $productsQuery->get();
        $categories = $categoryQuery->get();

        return view('Buyer.storeDetails', [
            'store' => $store,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
