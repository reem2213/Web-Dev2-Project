<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/revenue.css')}}">

    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
</head>
<body>

    {{-- {{$totalAmounts[0]}} --}}

    <div class="products_page" id="products_page">

        <div class="products_sidebar_menu">
            <div class="menu_header">
                <i class="fa-brands fa-squarespace"></i>
                MultiStore
                {{$sellerId}}
            </div>

            <div class="menu_options">
                <span class="menu_option "><a href="{{url('enter_store/'.$id)}}" ><i class="fa-solid fa-box"></i> Products</a></span>
                <span class="menu_option" id="go_create_product" ><a href="{{url('store_create_products/'.$id)}}"><i class="fa-solid fa-plus"></i> Create Product</a></span>
                {{-- <span class="menu_option" id="menu_option"><i class="fa-solid fa-cart-shopping"></i> Orders</span> --}}
                <span class="menu_option choosen" id="menu_option"><a href="{{url('store_revenue/'.$id)}}"   id="chose"><i class="fa-solid fa-arrow-up"></i> Revenue</a></span>
                <span class="menu_option " id="menu_option"><a href="{{url('best_seller/'.$id)}}"><i class="fa-solid fa-boxes-stacked"></i> Best Product</a></span>
                <span class="menu_option" id="menu_option"><a href="{{url('enter_store_setting/'.$id)}}"><i class="fa-solid fa-gear"></i> Setting</a></span>
                <span class="menu_option" id="menu_option"></span>
            </div>

            <div class="menu_footer">
                <img src="{{asset('assets/images/whi.png')}}" alt="" class="menu_footer_img">
                <span class="home_option" id="home_option"><a href="{{url('mystore/'.$sellerId)}}"><i class="fa-solid fa-house"></i> Home</a></span>
            </div>
        </div>

        <div class="products_body">
            <div class="illustration">
                <div>
                    <p class="welcome_name">
                        Welcome Seller<br>
                    </p>
                    <span class="welcome_text">
                        Welcome to MultiStore, the thriving hub where your products<br>
                        meet their future owners! We are thrilled to have you join our<br>
                        community of innovative sellers.
                    </span>
                </div>

                <img src="{{asset('assets\images\ecomillust.png')}}" alt="" class="illustration_img">
            </div>
            <div class="cards_container">
                <div class="seller_profile_cards">
                    <div class="seller_profile_card seller_profile_card_main">
                        <i class="fa-solid fa-inbox seller_profile_total_stores_icon"></i>
                        <span class="seller_profile_total_stores">Total Amount:
                            <br><span>$ {{$totalAmounts[0]}}</span></span>
                        <span class="seller_profile_create_store">
                            + Create Store
                        </span>
                    </div>
                    {{-- <div class="seller_profile_card"></div> --}}
                    <div class="seller_profile_card seller_profile_card_main">
                        <i class="fa-solid fa-inbox seller_profile_total_stores_icon"></i>
                        <span class="seller_profile_total_stores">Net Profit:
                            <br><span>$ {{$totalAmounts[0]/2}}</span></span>
                        <span class="seller_profile_create_store">
                            + Net Profit
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{asset('js/seller_js/products.js')}}"></script>
</body>
</html>
