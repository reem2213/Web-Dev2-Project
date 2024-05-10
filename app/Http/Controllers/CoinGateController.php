<?php
 
namespace App\Http\Controllers;
use CoinGate\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\ShoppingCart;
 
class CoinGateController extends Controller
{
    public function createPayment(Request $request)
    {
        $productsJson=$request->products;
        $productsArray = json_decode($productsJson, true);
        // return $productsArray[0];
 
 
        $total_amount=0;
        $user = auth()->user();
 
        foreach ($productsArray as $item) {
            $total_amount=$total_amount+$item['product']['price'];
        }
 
        $myorder=Order::create([
            'total_amount'=>$total_amount,
            'status'=>'waiting',
            'user_id'=>$user->id
        ]);
 
 
 
        foreach ($productsArray as $item) {
            OrderDetails::create([
                'product_id'=> $item['product']['id'],
                'order_id'=> $myorder->id,
            ]);
        }
 
        $mystoreid=$productsArray[0]['product']['store_id'];
 
        ShoppingCart::where('user_id',$user->id)->where('store_id', $mystoreid)->delete();
 
 
        $order_id = uniqid();
        $description = "Payment for order #$myorder->id";
        $amount = $total_amount; // Replace with your desired amount
        $currency = 'USD'; // Replace with your desired currency
 
        // if you can secure the api key then get from .env
        $client = new Client('6Fy_hgvDyWsfJsVrV82Wvu7wJPeB6AbqQW8Q3sXG', true);
        $token = hash('sha512', 'coingate' . rand());
 
        $params = array(
            'order_id'          => $myorder->id,
            'price_amount'      => $amount ,
            'price_currency'    =>$currency ,
            'receive_currency'  => 'EUR',
            'callback_url'      => 'http://localhost:8000/coin-gate/callback?token=' . $token,
            'cancel_url'        => 'http://localhost:8000/coin-gate/cancel',
            'success_url'       => 'http://localhost:8000/coin-gate/success',
            'title'             => 'Order #112',
            'description'       => $description ,
        );
        $order = $client->order->create($params);
        return redirect($order->payment_url);
    }
 
    public function handleCallback()
    {
        // Handle the CoinGate callback here
    }
    public function paymentSuccess(Request $request)
    {
        $order_id = $request->query('order_id');
 
        return redirect()->route('stores');
    }
 
    public function paymentCancel(Request $request)
    {
        Log::warning('Payment failed for order ID: ' . $request->query('order_id'));
        return redirect()->route('stores');
    }
 
}