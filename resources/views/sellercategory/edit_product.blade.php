<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/edit_product.css')}}">
    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="header_nav">
        <h3><i class="fa-solid fa-backward"></i><a href="{{url('enter_store/'.$product->store_id)}}"> Back To Store</a></h3>
        <h3>Edit Your Product!</h3>
        <p class="nav_product_name">{{$product->name}}</p>

    </div>

    <div class="edit_product_body">
        <img src="{{asset($product->image)}}" alt="" class="edit_product_img">

        <h1>Update {{$product->name}} Information</h1>

        <form action="{{url('store_update_product/'.$product->id)}}" method="POST" enctype="multipart/form-data" class="edit_product_form">
            @csrf
            @method('PUT')

            <div class="update_product_name_image">
                <div class="update_product_name">
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    @error('name')
                        <h4 class="alert">{{$message}}</h4>
                    @enderror
                </div>

                <div class="update_product_image">
                    <label for="">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="">
                    @error('image')
                        <h4 class="alert">{{$message}}</h4>
                    @enderror
                </div>
            </div>

            <div class="update_product_desc_price_qauntity">
                <div class="update_product_desc">
                    <label for="">Description:</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
                    @error('description')
                        <h4 class="alert">{{$message}}</h4>
                    @enderror
                </div>

                <div class="update_product_price_quantity">
                    <div class="update_product_price">
                        <label for="">Price:</label>
                        <div class="incr_decr_price">
                            <div class="decr_price" id="decr_price">-</div>
                            <input type="text" name="price" class="form-control" id="product_price" value="{{$product->price}}">
                            <div class="incr_price" id="incr_price">+</div>
                            @error('price')
                                <h4 class="alert">{{$message}}</h4>
                            @enderror
                        </div>
                    </div>
                    <div class="update_product_quantity">
                        <label for="">Quantity:</label>
                        <div class="incr_decr_quantity">
                            <div class="decr_quantity" id="decr_quantity">-</div>
                            <input type="text" name="quantity" class="form-control" id="product_quantity" value="{{$product->quantity}}">
                            <div class="incr_quantity" id="incr_quantity">+</div>
                            @error('quantity')
                                <h4 class="alert">{{$message}}</h4>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="update_product">
                <button type="submit" class="update_product_btn">Update</button>
            </div>

        </form>

    </div>

    <script src="{{asset('js/seller_js/edit_product.js')}}"></script>
</body>
</html>
