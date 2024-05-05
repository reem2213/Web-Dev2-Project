<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{asset('css/buyer/shopCart.css')}}">
</head>

<body>

    <h3>Shopping Cart</h3>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table cart-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>

                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cart as $item)
    <tr>
        <td>
            <!-- Assuming 'product' is the relationship name and 'image_url' is the column name for the image -->
            @if($item->product && $item->product->image)
            <img src="{{$item->product->image}}" />
            @endif
        </td>
        <td>
            <!-- Displaying product name -->
            {{ $item->product ? $item->product->name : 'Product name not available' }}
        </td>
        <td>${{ number_format($item->price, 2) }}</td>
        <td>
            <div class="input-group quantity-adjuster">
                <button class="btn btn-sm btn-outline-secondary" aria-label="Decrease quantity" onclick="updateQuantity({{ $item->id }}, 'decrement')">-</button>
                <form id="updateQuantityForm{{ $item->id }}" action="{{ route('cart.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="number" class="form-control quantity-input" name="quantity" value="{{ $item->quantity }}" data-product-id="{{ $item->id }}">
                </form>
                <button class="btn btn-sm btn-outline-secondary" aria-label="Increase quantity" onclick="updateQuantity({{ $item->id }}, 'increment')">+</button>
            </div>
        </td>
        <td class="total-price" id="totalPrice{{ $item->id }}">${{ number_format($item->price * $item->quantity, 2) }}</td>
        <td>
            <form action="{{ route('cart.delete', ['store_id' => $store_id, 'product_id' => $item->product_id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove</button>
            </form>
        </td>
    </tr>

            <script>
                function updateQuantity(itemId, action) {
                    const formElement = document.getElementById('updateQuantityForm' + itemId);
                    const quantityInput = formElement.querySelector('input[name="quantity"]');
                    const totalPriceElement = document.getElementById('totalPrice' + itemId); // Total price <td> element

                    let newQuantity = parseInt(quantityInput.value);

                    if (action === 'increment') {
                        newQuantity++;
                    } else if (action === 'decrement' && newQuantity > 1) {
                        newQuantity--;
                    }

                    quantityInput.value = newQuantity;

                    // Submit the form to update the quantity via AJAX
                    fetch(formElement.action, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                quantity: newQuantity
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                console.log('Quantity updated successfully');
                                // Update the total price displayed in the <td> element
                                const pricePerItem = parseFloat('{{ $item['price'] }}'); // Get the price per item from the backend
                                const newTotalPrice = pricePerItem * newQuantity;
                                totalPriceElement.textContent = `$${newTotalPrice.toFixed(2)}`;
                            } else {
                                console.error('Failed to update quantity');
                            }
                        })
                        .catch(error => {
                            console.error('Error updating quantity:', error);
                        });
                }
            </script>

            @endforeach
        </tbody>
    </table>

    {{-- Check if store_id is set, if not, you might want to set a default or handle differently --}}
    @php
    $store_id = $store_id ?? 'default_store_id'; // Set to a default or manage how you wish
    @endphp


</body>

</html>