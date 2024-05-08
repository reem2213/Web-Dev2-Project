<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Stores</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/mystore.css')}}">
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
            <button class="button-85 button-851" id="create_new_event"><a href="{{url('create_events/'.$id)}}"> + Create New Event</a></button>
            <button class="button-85" id="create_new_store"><a href="{{url('mystore/create/'.$id)}}"> + Create New Store</a></button>
            <div class="circle-avatar"></div>
        </div>
        @extends('layouts.app')

    </div>
    {{-----------------------------------body-----------------------------------}}
    <a href="{{url('chatify')}}">
        <img src="{{asset('assets/buyer/chat1.png')}}" alt="" class="chat_img">
    </a>
    {{-----------------------------------store cards-----------------------------------}}
    <div class="store-cards">
    @if (empty($stores))

 @else

     @foreach ($stores as $store)

     <div class="card">
         <img class="card__img" src="{{asset($store->image)}}">
         <div class="card__content">
             <div class="card__text-wrapper">
                 <h1 class="card__header">{{$store->name}}</h1>
                 <p class="card__text">{{$store->description}}</p>
             </div>
             {{-- <button class="card__btn" ><a href="{{url('enter_store/'.$store->id.'/'.$id)}}">Edit</a><span>&rarr;</span></button> --}}
             <button class="card__btn" ><a href="{{url('enter_store',['id' =>$store->id])}}">Edit</a><span>&rarr;</span></button>
         </div>
     </div>
     @endforeach
 @endif

    </div>
    <script src="{{asset('js/seller_js/mystore.js')}}"></script>
</body>
</html>
