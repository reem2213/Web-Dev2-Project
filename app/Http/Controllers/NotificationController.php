<?php
 
namespace App\Http\Controllers;
 
 
use Illuminate\Http\Request;
use App\Models\Order;
 
class NotificationController extends Controller
{
    public function listunreadnotify(){
 
        $orders= Order::where('status', 'unread')->get();
        return view('sellercategory.notifications')-> with('all',$orders);
    }
 
    public function update(string $order_id){
        $obj= Order::find($order_id);
        $obj->status='read';
        $obj->save();
         //return $obj;
         return redirect()->route('list', ['order_id' => $order_id]);     }
 
 
}
 