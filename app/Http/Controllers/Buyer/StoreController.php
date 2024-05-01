<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $obj = Store::all();
        return view('Buyer.stores')->with('store', $obj);
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
