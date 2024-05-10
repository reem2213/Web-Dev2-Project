<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product; // Make sure to import your Product model
use App\Models\OrderDetails;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
 
class ChartController extends Controller
{
 
    public function productData(int $id) {
        // Fetching all orders by the specific user (Although this might not be used directly here, just an example)
        $allorders = Order::where('user_id', $id)->get();
 
        // Join OrderDetails with Orders to filter by user_id
        $counts = OrderDetails::select('order_details.order_id', DB::raw('count(order_details.id) as total'))
                                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                                ->where('orders.user_id', $id)
                                ->groupBy('order_details.order_id')
                                ->get();
 
        //return $counts;
 
        $labels = $counts->pluck('order_id')->toArray(); // Assuming you need IDs of the orders
        $data = $counts->pluck('total'); // Assuming you need the counts of details for visualization
 
        $datasets = [
            [
                'label' => 'Product Distribution by Order for User ID 1',
                'data' => $data,
                'backgroundColor' => array_fill(0, count($data), '#007bff')  // Assign a blue color for all bars
            ]
        ];
 
        $user = auth()->user();
        $sellerId=$user->id;
 
        return view('sellercategory.best_seller', compact('datasets', 'labels', 'id', 'counts','sellerId'));
    }
}