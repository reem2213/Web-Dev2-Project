<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Stores</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/seller_orders.css')}}">
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
    <div class="orders_body">
        <div class="orders_filter">

        </div>
        <div class="orders_table">
            <h2>Table of Orders Made</h2>
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">Order ID</div>
                    <div class="col col-2">Total Amount</div>
                    <div class="col col-3">User_ID</div>
                    <div class="col col-4">Payment Status</div>
                    <div class="col col-4">Action</div>
                </li>
                @foreach ($orders as $order)
                    <li class="table-row">
                        <div class="col col-1" data-label="Job Id">{{$order->id}}</div>
                        <div class="col col-2" data-label="Customer Name">{{$order->total_amount}}</div>
                        <div class="col col-3" data-label="Amount">{{$order->user_id}}</div>
                        <div class="col col-4" data-label="Payment Status">{{$order->status}}</div>
                        <div class="col col-5" data-label="Amount">
                            @if ($order->status=='started')
                                <button class="action_btn start disabled" disabled>Start</button>
                                <button class="action_btn reject"><a href="{{url('stop_order/'.$order->id)}}">Stop</a></button>
                            @elseif ($order->status=='rejected')
                                <button class="action_btn start disabled" disabled>Start</button>
                                <button class="action_btn reject disabled" disabled>Reject</button>
                            @elseif ($order->status=='waiting')
                                <button class="action_btn start"><a href="{{url('start_order/'.$order->id)}}">Start</a></button>
                                <button class="action_btn reject"><a href="{{url('reject_order/'.$order->id)}}">Reject</a></button>
                            @elseif ($order->status=='stoped')
                                <button class="action_btn start"><a href="{{url('start_order/'.$order->id)}}">Restart</a></button>
                                <button class="action_btn reject"><a href="{{url('reject_order/'.$order->id)}}">Reject</a></button>
                            @endif
                        </div>
                    </li>
                @endforeach
                </ul>


        </div>



    </div>



    <script src="{{asset('js/seller_js/seller_orders.js')}}"></script>
</body>
</html>
