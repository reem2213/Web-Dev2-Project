<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/products.css')}}">

    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="products_page" id="products_page">

        <div class="products_sidebar_menu">
            <div class="menu_header">
                <i class="fa-brands fa-squarespace"></i>
                MultiStore
                {{$sellerId}}
            </div>

            <div class="menu_options">
                <span class="menu_option choosen"><a href="{{url('enter_store/'.$id)}}" id="chose"><i class="fa-solid fa-box"></i> Products</a></span>
                <span class="menu_option" id="go_create_product" ><a href="{{url('store_create_products/'.$id)}}"><i class="fa-solid fa-plus"></i> Create Product</a></span>
                {{-- <span class="menu_option" id="menu_option"><i class="fa-solid fa-cart-shopping"></i> Orders</span> --}}
                <span class="menu_option" id="menu_option"><a href="{{url('store_revenue/'.$id)}}"><i class="fa-solid fa-arrow-up"></i> Revenue</a></span>
                <span class="menu_option " id="menu_option"><a href="{{url('best_seller/'.$id)}}"><i class="fa-solid fa-boxes-stacked"></i> Best Product</a></span>
                <span class="menu_option" id="menu_option"><a href="{{url('enter_store_setting/'.$id)}}"><i class="fa-solid fa-gear"></i> Setting</a></span>
                <span class="menu_option" id="menu_option"></span>
            </div>

            <div class="menu_footer">
                <img src="{{asset('assets/images/whi.png')}}" alt="" class="menu_footer_img">
                <span class="home_option" id="home_option"><a href="{{url('mystore/'.$sellerId)}}"><i class="fa-solid fa-house"></i> Home</a></span>
            </div>
        </div>
        {{-- ===========================Products Body Nav=========================== --}}

        <div class="products_body">
            @foreach ($store as $story)
                    <img src="{{asset($story->image)}}" alt="" class="products_nav_img">
            @endforeach

            <h1 class="products_store_name">Seller Products</h1>

            <div class="products_nav">

                <div class="products_nav_search_name">
                    <div class="products_nav_search_icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <input type="text" class="products_nav_search_input">
                </div>

                <button class="button-85 btn-open-popup" id="create_new_product"><a href="{{url('store_create_products',['id' =>$id])}}">+ Create New Product</a> </button>
                <button class="button-85 btn-open-popup btn-open" id="create_new_product" onclick="openForm()"> + Create New Category</button>

            </div>
            {{-- ===========================Create Category form=========================== --}}
            <div class="pop_body hidden">
                <form class="modal hidden" method="POST" action="{{url('store_create_category')}}">
                    @csrf
                    <div class="flex">
                        <span class="btn-close">⨉</span>
                    </div>
                    <div>
                        <h3>Create Category</h3>
                    </div>

                    <label for="">Category Name:</label>
                    <input type="text" name="name" placeholder="Category Name" />
                    <label for="">Store_ID:</label>
                    <input type="text" name="store_id" placeholder="Category Name" value="{{$id}}" readonly/>

                    <button type="submit" class="create_category_btn">Create</button>
                </form>
            </div>
        {{-- ===========================products filter=========================== --}}
            <div class="products_filter"></div>
        {{-- ===========================products=========================== --}}

            <div class="products_cards">



                @foreach ($products as $product)

                    <div class="product_card">
                        <label class="delete_product button demo-button" for="{{$product->id}}"><i class="fa-solid fa-x"></i></label>
                        {{-- ================================delete product popup=============================== --}}
                        <div class="modal__container">
                            <!-- Here is the hidden checkbox element which makes toggling the modal work -->
                            <input type="checkbox" id="{{$product->id}}" class="modal__toggler"  />
                            <!-- Here is the background mask. When clicked, it closes the modal. Change this to a div to disable that functionality. -->
                            <label class="modal__mask" for="{{$product->id}}"></label>
                            <div class="modal_popup">
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
                        <img src="{{asset($product->image)}}" alt="" class="product_card_img">

                        <div class="product_card_body">
                            <span class="product_card_head">{{$product->name}}</span>

                            <span class="product_card_desc">{{$product->description}}</span>

                            <div class="product_card_footer">
                                <span class="product_card_price">{{$product->price}}$</span>
                                <span class="product_card_edit"><a href="{{url('store_edit_product/'.$product->id)}}">Edit</a></span>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>


    <script src="{{asset('js/seller_js/products.js')}}"></script>
</body>
</html>
