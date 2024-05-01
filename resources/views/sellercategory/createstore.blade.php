<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Stores</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/createstore.css')}}">
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
            <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">Seller Name</a><span id="nav-footer-subtitle">Seller</span></div>
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
            <button class="button-85" id="create_new_store"><i class="fa-regular fa-eye" style="color: black"></i><a href="{{url('mystore/'.$id)}}"> See My Stores</a></button>
            <div class="circle-avatar"></div>

        </div>
    </div>

    {{-----------------------------------body form-----------------------------------}}
    <div class="body-form">
        <form action="{{url('mystore/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="" class="create_store_label"><i class="fa-solid fa-store"></i> Store Name:</label>
                <input type="text" name="name" class="create_store_input">
                @error('name')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>
            <div>
                <label for="" class="create_store_label"><i class="fa-solid fa-location-dot"></i> Address(If Found):</label>
                <input type="text" name='address' class="create_store_input">
                @error('address')
                    <h4 class="alert">{{$message}}</h4>
                @enderror
            </div>

            <div>
                <label for="" class="create_store_label"><i class="fa-solid fa-phone"></i> Phone-No:</label>
                <input type="text" name="phoneNo" class="create_store_input">
                @error('phoneNo')
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
                <label for="" class="create_store_label"><i class="fa-solid fa-list"></i> Accepted:</label>
                <input type="text" name='Accepted' class="create_store_input" disabled value="False">
            </div>

            <div>
                <label for="" class="create_store_label"><i class="fa-solid fa-id-card"></i> Seller ID:</label>
                <input type="text" name="user_id" class="create_store_input_image" id="" readonly value="{{$id}}">
            </div>

            <div>
                <button type="submit" class="submit-store">Save</button>
            </div>

        </form>
    </div>


    <script src="{{asset('js/seller_js/createstore.js')}}"></script>
</body>
</html>
