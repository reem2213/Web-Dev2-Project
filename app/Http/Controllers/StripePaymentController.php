<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\ShoppingCart;


class StripePaymentController extends Controller
{
    public function stripe():view{
        return view("stripe");
    }
    public function stripeCheckout(Request $request){
        // return $request->products;
        // return $request->currency;

        $productsJson=$request->products;
        $productsArray = json_decode($productsJson, true);
        // return $productsArray[0]['product']['quantity'];

        $apiKey = env('EXCHANGERATE_API_KEY');
        $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");
        $data=$response->json();

        $rate= $data['conversion_rates'][$request->currency];
        $stripe=new \Stripe\StripeClient(env("STRIPE_SECRET"));
        // $redirectUrl=route("stripe.checkout.success").'?session_id{CHECKOUT_SESSION_ID}';
        $redirectUrl=route("stripe.checkout.success") . '?session_id={CHECKOUT_SESSION_ID}';
        $lineItems=[];
        foreach ($productsArray as $item) {
            $lineItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $item['product']['name'],
                    ],
                    'unit_amount' =>round($rate * (100*$item['product']['price'])),
                    'currency' => $request->currency,
                ],
                'quantity' => $item['quantity'],
            ];

            // OrderDetails::create([

            // ]);
        }
        $total_amount=0;
        $user = auth()->user();

        foreach ($productsArray as $item) {
            $total_amount=$total_amount+100*$item['product']['price'];
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




        // Check if lineItems is empty and handle the case
        // if (empty($lineItems)) {
        //     return 'error';
        //     return back()->withErrors('No products found or missing product information.');
        // }
        $response=$stripe->checkout->sessions->create([
            'success_url'=> $redirectUrl,
            'customer_email'=> 'demo@gmail.com',
            'payment_method_types'=>['link','card'],
            'line_items'=>$lineItems,
            'mode'=>'payment',
            'allow_promotion_codes'=>true,
        ]);
        return redirect($response['url']);
        // return back();
    }

    public function stripeCheckoutSuccess(Request $request){
        $stripe=new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $response=$stripe->checkout->sessions->retrieve($request->session_id);

        return redirect('stores')->with("success","Payment successful.");
    }
}
