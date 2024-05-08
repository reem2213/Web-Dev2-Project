<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Support\Facades\File;

class SellerController extends Controller 
{
    public function index(int $id){
        // $stores=Store::all($id);
        $stores = Store::where('user_id', $id)->get();
        return view('sellercategory.mystores',compact('stores','id'));
    }

    public function create(int $id){
        return view("sellercategory.createstore",compact("id"));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255|string',
            'address'=>'required|max:255|string',
            'phoneNo'=>'required|max:20|string',
            'description'=>'required|max:1000|string',
            'image'=>'required|mimes:png,jpg,jpeg,webp',
        ]);

        if($request->has('image')){
            $file = $request->file('image');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $path='assets/uploads/';
            $file->move($path,$filename);
        }

        if (is_null($request->Accepted)) {
            // Value is null
            $accept=false;
        }

        Store::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'phoneNo'=>$request->phoneNo,
            'description'=>$request->description,
            'image'=>$path.$filename,
            'Accepted'=>$accept,
            'user_id'=>$request->user_id,
        ]);

        return back();
    }

    public function create_events(int $id){
        $stores=Store::get();
        $products=Product::get();
        return view('sellercategory.create_events',compact('id','products','stores'));
    }

    public function store_events(Request $request){

        $request->validate([
            'name'=>'required|max:255|string',
            'capacity'=>'required|max:255|string',
            'time'=>'required',
            'store_id'=>'required|max:255|string',
            'product_id'=>'required|max:255|string',
            'date' => 'required|date|after_or_equal:today',
        ]);

        Event::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'time'=>$request->time,
            'capacity'=>$request->capacity,
            'store_id'=>$request->store_id,
            'product_id'=>$request->product_id,
        ]);

        return back();
    }

    public function view_events(int $id){
        $events=Event::get();
        return view('sellercategory.view_events',compact('id','events'));
    }
    public function view_orders(int $id){
        $orders=Order::get();
        return view('sellercategory.orders',compact('orders','id'));
    }
    public function view_notifications(int $id){
        return view('sellercategory.notifications',compact('id'));
    }
    public function view_profile(int $id){
        return view('sellercategory.seller_profile',compact('id'));
    }
    public function stop_order(int $order_id){
        $order=Order::findOrFail($order_id);

        $order->status= 'stoped';
        $order->save();

        return back();
    }
    public function start_order(int $order_id){
        $order=Order::findOrFail($order_id);

        $order->status= 'started';
        $order->save();

        return back();
    }
    public function reject_order(int $order_id){
        $order=Order::findOrFail($order_id);

        $order->status= 'rejected';
        $order->save();

        return back();
    }
}
