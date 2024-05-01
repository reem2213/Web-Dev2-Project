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

        //create
        ShoppingCart::updateOrCreate(
            ['product_id' => $product->id, 'store_id' => $storeId],
            [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'totalPrice' => $cart[$product->id]['price'] * $cart[$product->id]['quantity'],
            ]
        );

        $request->session()->put($storeCartKey, $cart);
        return redirect()->route('cart.show', ['store_id' => $storeId])->with('success', 'Product added to cart!');
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

    public function showCart(Request $request, $store_id)
    {
        $cart = $request->session()->get("cart_" . $store_id, []);
        $cartItems = ShoppingCart::with('product')  // Adjust this line if your relationship name is different
            ->where('store_id', $store_id)
            ->whereIn('product_id', array_keys($cart))
            ->get();

        return view('Buyer.ShoppingCart', ['cart' => $cartItems, 'store_id' => $store_id]);
    }


    public function deleteCartItem(Request $request, $store_id, $product_id)
    {
        // Remove the item from the session cart
        $cart = $request->session()->get("cart" . $store_id, []);
        if (array_key_exists($product_id, $cart)) {
            unset($cart[$product_id]); // Remove the item from the cart array
            $request->session()->put("cart" . $store_id, $cart); // Update the session with the modified cart
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
