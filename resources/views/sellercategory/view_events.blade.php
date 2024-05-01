<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Events</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/view_events.css')}}">
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
            {{-- <button class="button-85" id="create_new_store"><a href="{{url('mystore/create/'.$id)}}"> + Create New Store</a></button> --}}
            <div class="circle-avatar"></div>

        </div>
    </div>
    {{-----------------------------------body-----------------------------------}}
    <div class="events_body">
        {{-- {{$id}}
        {{$events}} --}}
        <div class="event_card_filter_container">

        </div>

        <div class="event_cards">
            {{-- <div class="event_card">

            </div> --}}
            <div id="container">

                <div class="product-details">

                <h1>CHRISTMAS TREE</h1>
                <span class="hint-star star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </span>

                        <p class="information">" Let's spread the joy , here is Christmas , the most awaited day of the year.Christmas Tree is what one need the most. Here is the correct tree which will enhance your Christmas.</p>



            <div class="control">

                <button class="btn">
                 <span class="price">$250</span>
               <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
               <span class="buy">Get now</span>
             </button>

            </div>

            </div>

            <div class="product-image">

                <img src="https://images.unsplash.com/photo-1606830733744-0ad778449672?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzl8fGNocmlzdG1hcyUyMHRyZWV8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">


            <div class="info">
                <h2> Description</h2>
                <ul>
                    <li><strong>Height : </strong>5 Ft </li>
                    <li><strong>Shade : </strong>Olive green</li>
                    <li><strong>Decoration: </strong>balls and bells</li>
                    <li><strong>Material: </strong>Eco-Friendly</li>

                </ul>
            </div>
            </div>

            </div>
        </div>

    </div>



    <script src="{{asset('js/seller_js/mystore.js')}}"></script>
</body>
</html>
