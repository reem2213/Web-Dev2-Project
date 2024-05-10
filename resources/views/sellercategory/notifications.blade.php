<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Stores</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/notifications.css')}}">
    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
</head>
<style>
 
 .request-container {
    margin-top: 20px;
    padding: 20px;
    width: 50%; /* Adjusted width for better screen usage */
    margin-left: 30%; /* Center align the container */
    background-color: #f9f9f9; /* Lighter background for better readability */
    border: 1px solid #ccc; /* Subtle border */
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
 
.request {
    padding: 20px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.15);
    transition: all 0.3s ease; /* Smooth transition for hover effect */
}
 
 
.request:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Enhanced shadow on hover */
}
 
.request-details {
    flex-grow: 1;
    font-size: 1rem;
    color: #333; /* Darker font color for better readability */
}
 
.request-actions a {
    padding: 10px 25px;
    background-color: #007BFF; /* Bootstrap primary color for consistency */
    color: white;
    border-radius: 25px;
    text-decoration: none;
    transition: background-color 0.3s; /* Smooth background color transition on hover */
}
 
.request-actions a:hover {
    background-color: #0056b3; /* Darker shade on hover */
}
 
/* .request h3, .request p {
    margin: 5px 0 15px 0;
}
 
.request-actions {
    display: flex;
    flex-direction: row;
} */
 
/* .request button, .request a {
    padding: 15px 30px;
    margin-top: 5px;
    margin-left: 10px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: 100px;
    font-size: 1rem;
    text-align: center;
    display: inline-block;
    text-decoration: none;
} */
 
/* .approve, .request .approve {
    background-color: #28a745;
    color: white;
} */
 
</style>
<body>
    {{-----------------------------------Sidebar-----------------------------------}}
    <div id="nav-bar">
        <input id="nav-toggle" type="checkbox"/>
        <div id="nav-header"><a id="nav-title" href="https://codepen.io" target="_blank"><i class="fab fa-codepen"></i><span>Menu</span></a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
 
        </div>
        <div id="nav-content">
        <div class="nav-button"><i class="fa-solid fa-store"></i><span><a >My Stores</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-plus"></i><span><a  >Create New Store</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-calendar-days"></i><span><a  >My Events</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-plus"></i><span><a  >Create new Event</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-cart-shopping"></i><span><a  >Orders</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-bell"></i><span><a  >Notifications</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-user"></i><span><a   >My Profile</a></span></div>
            <div class="nav-button"><i class="fa-solid fa-right-from-bracket log-out"></i><span class="log-out">Log Out</span></div>
            <div id="nav-content-highlight"></div>
        </div>
        <input id="nav-footer-toggle" type="checkbox"/>
        <div id="nav-footer">
            <div id="nav-footer-heading">
            <div id="nav-footer-avatar"></div>
            <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">Seller  </a><span id="nav-footer-subtitle">Seller</span></div>
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
            <button class="button-85 button-851" id="create_new_event"><a  > + Create New Event</a></button>
            {{-- <button class="button-85" id="create_new_store"><a > + Create New Store</a></button> --}}
            <div class="circle-avatar"></div>
 
        </div>
    </div>
    {{-----------------------------------body-----------------------------------}}
    <!-- <div class="events_body">
        {{-- {{$id}}
        {{$events}} --}}
        <div class="event_card_filter">
 
        </div>
 
        <div class="event_cards">
            <div class="event_card">
 
            </div>
        </div>
 
    </div> -->
    <div class="request-container">
    @if($all->isEmpty())
        <div class="request"><p>No orders.</p></div>
    @else
        @foreach ($all as $all)
            <div class="request">
             
                <div class="request-details">
                   
                     
                    <h3>Order Id : {{ $all->id }}</h3>
                    <br>
                    <p>User Id : {{ $all->user_id }}</p>
                    <p>Total Amount : {{ $all->total_amount }}</p>
                   
                </div>
                <div class="request-actions">
                    <a href="{{url('updatestatus/'.$all->id)}}" class="status" style="text-align: center;">MARK AS READ</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
 
 
 
    <script src="{{asset('js/seller_js/mystore.js')}}"></script>
</body>
</html>