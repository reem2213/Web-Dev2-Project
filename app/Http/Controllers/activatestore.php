<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;


class activatestore extends Controller

{

    // public function listdeactivatedstores(){

    //     $storelist= Store::where('Accepted', 0)->get();
    //     return view('deactivatedstores')-> with('all',$storelist);
    // }

    
  
    public function activate(int $id)
    {
        $activated_store= Store::find($id);
        $activated_store->Accepted=1;
        $activated_store->save();

        $deactivated_stores=Store::where('Accepted', 0)->get();
        return view('deactivatedstores',compact('deactivated_stores'));
    }

    public function deactivate(){
        $deactivated_stores=Store::where('Accepted', 0)->get();
        return view('deactivatedstores',compact('deactivated_stores')) ;
    }
}
