<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create event</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/myevents.css')}}">
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
            <button class="button-85 button-851" id="create_new_event"><i class="fa-solid fa-eye"></i>  View Events</button>
            <div class="circle-avatar"></div>

        </div>
    </div>

    {{-----------------------------------body-----------------------------------}}
    <div class="body-form">
        <form action="{{url('create_events')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="" class="create_store_label"><i class="fa-brands fa-product-hunt"></i> Event Name:</label>
                <input type="text" name="name" class="create_store_input">
                @error('name')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>
            <div>
                <label for="" class="create_store_label"><i class="fa-solid fa-calendar"></i> Date:</label>
                <input type="date" name='date' class="create_store_input">
                @error('date')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>

            <div>
                <label for="" class="create_store_label"><i class="fa-regular fa-clock"></i> Time:</label>
                <input type="time" name="time" class="create_store_input">
                @error('time')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>

            <div>
                <label for="" class="create_store_label"><i class="fa-solid fa-warehouse"></i> Capacity:</label>
                <input type="text" name="capacity" class="create_store_input">
                @error('capacity')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>

            <select name="store_id" class="create_store_input" id="store_option" onchange="getproducts({{$products}})">

                @foreach ($stores as $store)

                    <option value="{{$store->id}}" on>{{$store->name}}</option>

                @endforeach

                @error('store_id')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </select>

            <select name="product_id" class="create_store_input" id="products_options"></select>
            @error('product_id')
                <h4 class="alert">{{$message}}</h4>
            @enderror

            <div>
                <button type="submit" class="submit-store">Save</button>
            </div>

        </form>
    </div>


    <script src="{{asset('js/seller_js/myevents.js')}}"></script>
</body>
</html>
