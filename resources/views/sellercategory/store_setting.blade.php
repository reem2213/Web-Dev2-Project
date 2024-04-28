<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Setting</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/store_setting.css')}}">
    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>

</head>
<body>
    @php
        $productscounter=0;
        $orderscounter=0;
    @endphp

    @foreach ($products as $product)

        @php
            $productscounter=$productscounter+1;
        @endphp

    @endforeach

    @foreach ($products as $product)

        @php
            $orderscounter=$orderscounter+1;
        @endphp

    @endforeach


    <div class="products_sidebar_menu">
        <div class="menu_header">
            <i class="fa-brands fa-squarespace"></i>
            MultiStore
        </div>
        <div class="menu_options">
            <span class="menu_option"><a href="{{url('enter_store/'.$store->id)}}"><i class="fa-solid fa-box"></i> Products</a></span>
            <span class="menu_option" id="go_create_product" ><a href="{{url('store_create_products/'.$store->id)}}"><i class="fa-solid fa-plus"></i> Create Product</a></span>
            <span class="menu_option" id="menu_option"><i class="fa-solid fa-arrow-up"></i> Revenue</span>
            <span class="menu_option" id="menu_option"><i class="fa-solid fa-boxes-stacked"></i> Best Product</span>
            <span class="menu_option choosen" id="menu_option"><a href="{{url('enter_store_setting/'.$store->id)}}" id="chose"><i class="fa-solid fa-gear"></i> Setting</a></span>
        </div>

        <div class="menu_footer">
            <img src="{{asset('assets/images/whi.png')}}" alt="" class="menu_footer_img">
            <span class="home_option" id="home_option"><a href="{{url('mystore/'.$store->user_id)}}" id="home_option"><i class="fa-solid fa-house"></i> Home</a></span>
        </div>
    </div>
    <div class="store_setting_body">
        <div class="setting_header">
            {{-- description and buttons --}}
            <div class="left_container">
                <h1 class="header_name">{{$store->name}}</h1>
                <p class="header_desc">{{$store->description}}</p>
                <span class="header_btn"><a href="{{url('enter_store/'.$store->id)}}">View Products</a></span>
            </div>

            {{-- store image --}}
            <div class="right_container">
                <img src="{{asset($store->image)}}" alt="" class="store_setting_header_img">
            </div>
        </div>

        {{-- setting body --}}
        <div class="setting_body">
            <div class="store_achievments">
                <div class="total_products store_setting_card">
                    <h2 class="total_card">Total Products</h2>
                    <p class="nb_card">{{$productscounter}}</p>
                    <span class="view_products"><a href="{{url('enter_store/'.$store->id)}}">View products</a></span>
                </div>
                <div class="total_orders store_setting_card">
                    <h2 class="total_card">Total Orders</h2>
                    <p class="nb_card">{{$orderscounter}}</p>
                    <span class="view_products">View Orders</span>
                </div>
                <div class="total_revenues store_setting_card">
                    <h2 class="total_card">Total Customers</h2>
                    <p class="nb_card">18</p>
                    <span class="view_products">View Customers</span>
                </div>
            </div>
            {{-- store products --}}
            <div class="store_products">
                <h1>Products For This Store</h1>
                <table id="customers">
                    <colgroup>
                        <col style="width: 16%;">
                        <col style="width: 16%;">
                        <col style="width: 16%;">
                        <col style="width: 16%;">
                        <col style="width: 16%;">
                        <col style="width: 16%;">
                    </colgroup>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category_id}}</td>
                            <td><label class="button demo-button" for="{{$product->id}}">Delete</label></td>

                            {{-- ================================delete product popup=============================== --}}
                            <div class="modal__container">
                                <!-- Here is the hidden checkbox element which makes toggling the modal work -->
                                <input type="checkbox" id="{{$product->id}}" class="modal__toggler"  />
                                <!-- Here is the background mask. When clicked, it closes the modal. Change this to a div to disable that functionality. -->
                                <label class="modal__mask" for="{{$product->id}}"></label>
                                <div class="modal">
                                    <label class="modal__close" for="{{$product->id}}"></label>
                                    <div class="modal__content">
                                        <h2 class="modal__title">Are you sure you want to delete this product?</h2>
                                        <div class="sure_buttons">
                                            <label class="button" for="{{$product->id}}">Cancel</label>
                                            <label class="button" for="{{$product->id}}"><a href="{{url('store_delete_product/'.$product->id)}}">Delete</a></label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- =============================================================== --}}
                        </tr>
                    @endforeach

                </table>
            </div>

            {{-- ===============================store information edit================================ --}}

            <div class="store_info">
                <h1>Update Store Profile</h1>
                <form action="{{url('enter_store_setting/'.$store->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="update_store_input">
                        <label for="">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{$store->name}}">
                        @error('name')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div class="update_store_input">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control" id="" value="{{$store->image}}">
                        @error('image')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div class="update_store_input">
                        <label for="">Address:</label>
                        <input name="address" class="form-control" value='{{$store->address}}'>
                        @error('address')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div class="update_store_input">
                        <label for="">PhoneNo:</label>
                        <input name="phoneNo" class="form-control" value='{{$store->phoneNo}}'>
                        @error('phoneNo')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div class="desc">
                        <label for="">Description:</label>
                        <textarea name="description" class="form-control" cols="30" rows="10">{{$store->description}}</textarea>
                        @error('description')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>
                    <div class="update_store">
                        <button type="submit" >Update</button>
                    </div>
                </form>
            </div>
            <div class="delete_store_container">
                <label class="delete_store button demo-button" for="store_open-modal">
                    Delete
                </label>
                <div class="store_modal__container">
                    <!-- Here is the hidden checkbox element which makes toggling the modal work -->
                    <input type="checkbox" id="store_open-modal" class="store_modal__toggler"  />
                    <!-- Here is the background mask. When clicked, it closes the modal. Change this to a div to disable that functionality. -->
                    <label class="store_modal__mask" for="store_open-modal"></label>
                    <div class="store_modal">
                        <label class="store_modal__close" for="store_open-modal"></label>
                        <div class="store_modal__content">
                            <h2 class="store_modal__title">Are you sure you want to delete this Store?</h2>
                            <div class="store_sure_buttons">
                                <label class="store_button" for="store_open-modal">Cancel</label>
                                <label class="store_button" for="store_open-modal"><a href="{{url('store_delete_store/'.$store->id)}}">Delete</a></label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</body>
</html>
