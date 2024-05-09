<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;

class StripePaymentController extends Controller
{
    public function stripe():view{
        return view("stripe");
    }
    public function stripeCheckout(Request $request){
        // return $request->products;

        $productsJson=$request->products;
        $productsArray = json_decode($productsJson, true);
        // return $productsArray[0]['product']['quantity'];


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
                    'unit_amount' => 100 * $item['product']['price'],
                    'currency' => 'USD',
                ],
                'quantity' => $item['quantity'],
            ];
        }
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
