<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\newpassnotification;
use App\Models\Store;
use App\Models\UserAuth;


class admindashboardcontroller extends Controller
{
   
    
        
 
        public function index()
        {
            // Get data for the dashboard
            
            $storesscount=Store::where('Accepted', 1)->count();
            $sellerscount=UserAuth::where('role', 'seller')->count();
            $buyerscount=UserAuth::where('role', 'buyer')->count();

            return view('admindashboard', compact('storesscount','sellerscount','buyerscount'));
        }
    
        public function listing(){

            $storelist= Store::where('Accepted', 1)->get();
            return view('listStores')-> with('all',$storelist);
        }
        
        public function sellers(){

            $seller= UserAuth::where('role', 'seller')->get();
            return view('sellerview')-> with('all',$seller);
        }
        public function buyers(){

            $buyer= UserAuth::where('role', 'buyer')->get();
            return view('buyerview')-> with('all',$buyer);
        }

        public function update(Request $request, int $id){

            $obj= UserAuth::find($id);
            $obj->password=$request->thepass;
            $obj->save();

            return redirect()->route('sellerview');
        }
        public function edit(string $id)
        {
            $obj= UserAuth::find($id);
            return view('editingpassword')->with('all',$obj);
        }
        public function editpass(string $id)
        {
            $obj= UserAuth::find($id);
            return view('editingpasswordbuyer')->with('all',$obj);
        }
        public function updatepass(Request $request, int $id){

            $obj= UserAuth::find($id);
            $obj->password=$request->thepass;
            $obj->save();

            return redirect()->route('buyerview');
        }
        
        
          
         
    
        public function deactivatedStores(int $id)
        {
            $deactivated_store= Store::find($id);
            $deactivated_store->Accepted=0;
            $deactivated_store->save();



            $all = Store::where('Accepted', 1)->get();
    
            return view('listStores', compact('all'));
        }
    
        
    }
    








