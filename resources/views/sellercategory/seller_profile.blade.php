<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/seller_profile.css')}}">
    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
</head>
<body>
    {{-----------------------------------Sidebar-----------------------------------}}
    <div id="nav-bar">
        <input id="nav-toggle" type="checkbox"/>
        <div id="nav-header"><a id="nav-title" href="https://codepen.io" target="_blank"><i class="fab fa-codepen"></i><span>Menu</span></a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>

        </div>
        <div id="nav-content">
            <div class="nav-button"><i class="fa-solid fa-store"></i><span><a href="{{url('mystore/'.$id)}}">My Stores</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-plus"></i><span><a href="{{url('mystore/create/'.$id)}}">Create New Store</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-calendar-days"></i><span><a href="{{url('view_events/'.$id)}}">My Events</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-plus"></i><span><a href="{{url('create_events/'.$id)}}">Create new Event</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-cart-shopping"></i><span><a href="{{url('view_orders/'.$id)}}">Orders</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-bell"></i><span><a href="{{url('view_notifications/'.$id)}}">Notifications</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-user"></i><span><a href="{{url('view_profile/'.$id)}}">My Profile</a></span></div>

            <div class="nav-button"><i class="fa-solid fa-right-from-bracket log-out"></i><span class="log-out">Log Out</span></div>
            <div id="nav-content-highlight"></div>
        </div>
        <input id="nav-footer-toggle" type="checkbox"/>
        <div id="nav-footer">
            <div id="nav-footer-heading">
            <div id="nav-footer-avatar"></div>
            <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">Seller {{$id}}</a><span id="nav-footer-subtitle">Seller</span></div>
            <label for="nav-footer-toggle"><i class="fas fa-caret-up" style="color: black"></i></label>
            </div>
        </div>
    </div>
    {{-----------------------------------navbar-----------------------------------}}
    <div class="seller-navbar">
        <div class="free-side"></div>
        <div class="nav-search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <p>Search...</p>
        </div>
        <div class="work-side">
            {{-- <span class="create-store-btn">+ Create New Store</span> --}}
            {{-- <button class="button-85 button-851" id="create_new_event"><a href="{{url('create_events/'.$id)}}"> + Create New Event</a></button> --}}
            {{-- <button class="button-85" id="create_new_store"><a href="{{url('mystore/create/'.$id)}}"> + Create New Store</a></button> --}}
            <div class="circle-avatar"></div>

        </div>
    </div>
    {{-----------------------------------body-----------------------------------}}
    <div class="profile_body">
        <div class="illustration">
            <div>
                <p class="welcome_name">
                    Welcome <br>
                    {{$seller->username}}
                </p>
                <span class="welcome_text">
                    Welcome to MultiStore, the thriving hub where your products<br>
                    meet their future owners! We are thrilled to have you join our<br>
                    community of innovative sellers.
                </span>
            </div>

            <img src="{{asset('assets\images\ecomillust.png')}}" alt="" class="illustration_img">
        </div>
        <div class="seller_profile_cards">
            <div class="seller_profile_card seller_profile_card_main">
                <i class="fa-solid fa-inbox seller_profile_total_stores_icon"></i>
                <span class="seller_profile_total_stores">Total Stores: 34</span>
                <span class="seller_profile_create_store">
                    + Create Store
                </span>
            </div>
            <div class="seller_profile_card"></div>
            <div class="seller_profile_card"></div>
        </div>
        <form action="{{url('/update_seller_info')}}" method="POST" enctype="multipart/form-data" class="seller_update_profile">
            @csrf
            @method('PUT')
            <div class="input_container">
                <div class="update_seller_input">
                <label for="">Name:</label>
                <input type="text" name="username" class="form-control" value="{{$seller->username}}">
                @error('username')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
                </div>

                <div class="update_seller_input">
                    <label for="">PhoneNo:</label>
                    <input name="phoneNo" class="form-control" value='{{$seller->phoneNo}}'>
                    @error('phoneNo')
                        <h4 class="alert">{{$message}}</h4>
                    @enderror
                </div>
            </div>
            <div class="input_container">
                <div class="update_seller_input">
                <label for="">Email:</label>
                <input name="email" class="form-control" value='{{$seller->email}}'>
                @error('email')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
                </div>

                <div class="update_seller_input">
                    <label for="">Password:</label>
                    <input name="password" class="form-control" value="{{$seller->password}}">
                    @error('password')
                        <h4 class="alert">{{$message}}</h4>
                    @enderror
                </div>
            </div>

            <div class="update_seller_input_img">
                <label for="">Upload Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>

            <div class="update_seller">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>



    <script src="{{asset('js/seller_js/mystore.js')}}"></script>
</body>
</html>
