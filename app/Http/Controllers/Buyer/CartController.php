<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function addToCart(Request $request, Product $product)
    {
        $user = $request->user(); // Retrieve the authenticated user

        $storeId = $product->store_id;
        $storeCartKey = "cart_" . $storeId;
        $cart = $request->session()->get($storeCartKey, []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'totalPrice' =>  $product->price
            ];
        }


        ShoppingCart::updateOrCreate(
            ['product_id' => $product->id, 'store_id' => $storeId, 'user_id' => $user->id],
            [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'totalPrice' => $cart[$product->id]['price'] * $cart[$product->id]['quantity'],
            ]
        );

        $request->session()->put($storeCartKey, $cart);
        return redirect()->route('cart.show', ['store_id' => $storeId, 'user_id' => $user->id])->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, Product $product, $id)
    {
        // Retrieve the cart item from the database
        $cartItem = ShoppingCart::findOrFail($id);

        // Update the quantity based on the request input
        $newQuantity = $request->input('quantity', 1);
        $cartItem->quantity = $newQuantity;
        $cartItem->totalPrice = $cartItem->price * $newQuantity; // Recalculate totalPrice based on new quantity

        // Save the updated cart item to the database
        $cartItem->save();

        // Update the session cart if needed (optional)
        // Note: If you're directly updating the database, session update may not be necessary

        return response()->json(['success' => true, 'message' => 'Cart item updated successfully']);
    }

    public function refresh_shoppingcart(){
        return back();
    }

    public function showCart(Request $request, $store_id)
    {
        // return $request;
        // return $store_id;
        $user = $request->user(); // Retrieve the authenticated user
        // return $user;
        $cart = $request->session()->get("cart_" . $store_id, []);
        // Schema::create('stores', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('location')->nullable();
        //     $table->timestamps();
        // });

        $cartItems = ShoppingCart::with('product')
            ->where('store_id', $store_id)
            ->where('user_id', $user->id)
            ->get();
        // return $cartItems;
        return view('Buyer.ShoppingCart', ['cart' => $cartItems, 'store_id' => $store_id]);
    }
    public function deleteCartItem(Request $request, $store_id, $product_id)
    {
        $cart = $request->session()->get("cart" . $store_id, []);
        if (array_key_exists($product_id, $cart)) {
            unset($cart[$product_id]);
            $request->session()->put("cart" . $store_id, $cart);
        }

        // Remove the item from the database
        $deleted = ShoppingCart::where('store_id', $store_id)
            ->where('product_id', $product_id)
            ->delete();

        if ($deleted) {
            // If deletion was successful, return a success response or redirect
            return redirect()->back()->with('success', 'Item removed successfully from the cart.');
        } else {
            // Handle the case where the item was not found or could not be deleted
            return redirect()->back()->with('error', 'Failed to remove the item from the cart.');
        }
    }
}
