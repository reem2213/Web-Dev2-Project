<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class storerequestcontroller extends Controller
{
    
    /**
     * Display a listing of the resource.
     * 
     */
    
    public function storeRequests()
    {
        // Retrieve stores where 'accepted' is 0
        $stores = Store::where('Accepted', 0)->get();
        // return $stores;

        return view('storerequests', compact('stores'));
       
    }
    public function show($id)
    {
        $store = Store::findOrFail($id); // Find the store or fail
        return view('storerequests', compact('store'));
    }
    
    public function updated(string $store_id){
       $obj= Store::find($store_id);
       $obj->Accepted=1;
       $obj->save();
        //return $obj;
        return redirect()->route('home'); 
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

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
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obj= Store::find($id);
        $obj->delete();
        return redirect()->route('home');
    }
    public function deactivate(string $id)
    {
        $obj= Store::find($id);
        $obj->Accepted=0;
        $obj->save();
        return redirect()->route('listStores');
    }

    
    
    

}