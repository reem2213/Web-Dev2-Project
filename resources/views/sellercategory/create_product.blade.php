<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/create_products.css')}}">
    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
</head>
<body>


    {{-- =========================================================================================== --}}
    <div class="products_page" id="products_page">

        <div class="products_sidebar_menu">
            <div class="menu_header">
                <i class="fa-brands fa-squarespace"></i>
                MultiStore
            </div>
            <div class="menu_options">
                <span class="menu_option"><a href="{{url('enter_store/'.$store->id)}}"><i class="fa-solid fa-box"></i> Products</a></span>
                <span class="menu_option choosen"><a href="{{url('store_create_products/'.$store->id)}}"><i class="fa-solid fa-plus"></i> Create Product</a></span>
                <span class="menu_option" id="menu_option"><i class="fa-solid fa-arrow-up"></i> Revenue</span>
                <span class="menu_option" id="menu_option"><i class="fa-solid fa-boxes-stacked"></i> Best Product</span>
                <span class="menu_option" id="menu_option"><a href="{{url('enter_store_setting/'.$store->id)}}"><i class="fa-solid fa-gear"></i> Setting</a></span>
                <span class="menu_option" id="menu_option"></span>
            </div>

            <div class="menu_footer">
                <img src="{{asset('assets/images/whi.png')}}" alt="" class="menu_footer_img">
                <span class="home_option" id="home_option"><a href="{{url('mystore/'.$store->user_id)}}"><i class="fa-solid fa-house"></i> Home</a></span>
            </div>
        </div>
        {{-- ===========================Products Body Nav=========================== --}}

        <div class="products_body">

            <div class="seller-navbar">
                <div class="free-side"></div>
                <div class="work-side">
                    {{-- <span class="create-store-btn">+ Create New Store</span> --}}
                    <button class="button-85" id="create_new_store">
                        <i class="fa-regular fa-eye" style="color: black"></i>
                        <a href="{{url('enter_store/'.$id)}}">See My Products</a>
                    </button>
                    <div class="circle-avatar"></div>

                </div>
            </div>
            {{-- ===========================Create Category form=========================== --}}
            <div class="body-form">
                <form action="{{url('store_create_products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="" class="create_store_label"><i class="fa-brands fa-product-hunt"></i> Product Name:</label>
                        <input type="text" name="name" class="create_store_input">
                        @error('name')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="create_store_label"><i class="fa-solid fa-sitemap"></i> Quantity:</label>
                        <input type="text" name='quantity' class="create_store_input">
                        @error('quantity')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="create_store_label"><i class="fa-solid fa-tag"></i> Price(USD):</label>
                        <input type="text" name="price" class="create_store_input" placeholder="USD...">
                        @error('price')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="create_store_label"><i class="fa-solid fa-file"></i> Description:</label>
                        <textarea name="description" id="" class="create_store_input" cols="30" rows="10"></textarea>
                        @error('description')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="create_store_label"><i class="fa-solid fa-image"></i> Upload Image:</label>
                        <input type="file" name="image" class="create_store_input_image" id="">
                        @error('image')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="create_store_label"><i class="fa-solid fa-id-card"></i> Store ID:</label>
                        <input type="text" name="store_id" class="create_store_input" id="" readonly value="{{$id}}">
                    </div>

                    <label for="" class="create_store_label"><i class="fa-solid fa-list"></i> Category:</label>
                    <select name="category_id" id="" class="create_store_input">
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        @error('category_id')
                            <h4 class="alert">{{$message}}</h4>
                        @enderror
                    </select>

                    <div>
                        <button type="submit" class="submit-store">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>


    <script src="{{asset('js/seller_js/create_product.js')}}"></script>
</body>
</html>
