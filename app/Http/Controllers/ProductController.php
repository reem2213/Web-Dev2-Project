<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function store_main_page($id){

        $id=(int)$id;

        $store = Store::find($id);
        $sellerId = $store->user_id;

        $products = Product::where('store_id',$id)->get();
        $store = Store::where('id',$id)->get();

        return view('sellercategory.store_page',compact('products','id','store','sellerId'));
    }

    public function store_create_category(Request $request){

        $request->validate([
            'name'=>'required|max:255|string',
            'store_id'=>'required|max:255|string',
        ]);

        Category::create([
            'name'=>$request->name,
            'store_id'=>$request->store_id,
        ]);

        return back();
    }

    public function create_products_page(int $id){
        $categories = Category::where('store_id', $id)->get();
        $store=Store::find($id);

        return view('sellercategory.create_product',compact('categories','id','store'));
    }

    public function store_the_product(Request $request){

        $request->validate([
            'name'=>'required|max:255|string',
            'quantity'=>'required|max:20|string',
            'category_id'=>'required|max:20|string',
            'price'=>'required|max:10|string',
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

        Product::create([
            'name'=>$request->name,
            'image'=>$path.$filename,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'store_id'=>$request->store_id,
        ]);

        return back();
    }

    public function store_setting(int $id){
        $store = Store::find($id);
        $products = Product::where('store_id', $id)->get();
        return view('sellercategory.store_setting',compact('store','products'));
    }

    public function store_setting_update(Request $request,int $id){


        $request->validate([
            'name'=>'required|max:255|string',
            'address'=>'required|max:255|string',
            'phoneNo'=>'required|max:10|string',
            'description'=>'required|max:1000|string',
            'image'=> 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $store=Store::findOrFail($id);
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

        if($request->has('image')){
            $store->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'phoneNo'=>$request->phoneNo,
                'description'=>$request->description,
                'image'=>$path.$filename,
                'Accepted'=>$store->Accepted,
                'user_id'=>$store->user_id,
            ]);
        }else{
            $store->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'phoneNo'=>$request->phoneNo,
                'description'=>$request->description,
                'image'=>$store->image,
                'Accepted'=>$store->Accepted,
                'user_id'=>$store->user_id,
            ]);
        }

        $store = Store::find($id);
        $products = Product::where('store_id', $id)->get();
        return view('sellercategory.store_setting',compact('store','products'));
    }

    public function destroy_product($id){
        $product=Product::findOrFail($id);

        if(File::exists($product->image)){
            File::delete($product->image);
        }

        $product->delete();
        return back();

    }

    public function destroy_store($store_id){
        $store=Store::findOrFail($store_id);
        // return $store;
        $id=$store->user_id;

        if(File::exists($store->image)){
            File::delete($store->image);
        }

        $store->delete();

        $stores=Store::get();
        //

        return view('sellercategory.mystores',compact('stores','id'));

    }

    public function store_edit_product($product_id){

        $product=Product::findOrFail($product_id);

        return view('sellercategory.edit_product',compact('product'));
    }


    public function store_update_product(Request $request,$product_id){


        $request->validate([
            'name'=>'required|max:255|string',
            'quantity'=>'required|max:20|string',
            'price'=>'required|max:20|string',
            'description'=>'required|max:1000|string',
            'image'=> 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $product=Product::findOrFail($product_id);

        if($request->has('image')){
            $file = $request->file('image');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $path='assets/uploads/';
            $file->move($path,$filename);
        }

        if($request->has('image')){

            $product->update([
                'name'=>$request->name,
                'image'=>$path.$filename,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'description'=>$request->description,
                'category_id'=>$product->category_id,
                'store_id'=>$product->store_id,
            ]);
        }else{
            $product->update([
                'name'=>$request->name,
                'image'=>$product->image,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'description'=>$request->description,
                'category_id'=>$product->category_id,
                'store_id'=>$product->store_id,
            ]);
        }

        return back();

    }
    public function storerevenue(int $id){
        $user = auth()->user();
        $sellerId=$user->id;
        $orders=Order::all();
        $orderdetails=OrderDetails::all();
        $totalAmounts = Order::selectRaw('SUM(total_amount) as total_amount')
                            ->groupBy('user_id')
                            ->pluck('total_amount');
 
 
        return view('sellercategory.store_revenue',compact('sellerId','id','orders','orderdetails','totalAmounts'));
    }
}
