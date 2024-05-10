<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders Page</title>
    <link rel="shortcut icon" href="{{asset('assets/buyer/logo/favicon.ico')}}" type="image/x-icon">

    <!--
    - custom css link
    -->
    <link rel="stylesheet" href="{{asset('css/buyer/style-prefix.css')}}">
</head>
<body>
    <header>
        <div class="header-top">
            <div class="container">
                <ul class="header-social-container">
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header-main">
            <div class="container">
                <a href="#" class="header-logo">
                    <img src="{{asset('assets/buyer/logo.png')}}"  width="100" height="80">
                </a>

                <div class="header-search-container">
                    <input type="search" name="search" class="search-field" placeholder="Search...">
                    <button class="search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>

                <div class="header-user-actions">
                    <button class="action-btn">
                        <img src="{{asset('assets/buyer/chat.png')}}" class="icons"/>
                    </button>
                    <button class="action-btn">
                        <a href="{{ route('notifications') }}">
                            <img src="{{asset('assets/buyer/iconsNotification.png')}}" class="icons"/>
                            <span class="count">0</span>
                        </a>
                    </button>
                    <button class="action-btn">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span class="count">0</span>
                    </button>
                    <button class="action-btn">
                        <a href="{{ route('profile.edit') }}">
                            <ion-icon name="person-outline"></ion-icon>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <nav class="desktop-navigation-menu">
        <div class="container">
            <ul class="desktop-menu-category-list">
                <li class="menu-category">
                    <a href="{{ route('home') }}" class="menu-title">Home</a>
                </li>
                <li class="menu-category">
                    <a href="{{ route('stores') }}" class="menu-title">Stores</a>
                </li>
                <li class="menu-category">
                    <a href="{{ route('orders') }}" class="menu-title">My Orders</a>
                </li>

                <li class="menu-category">
                    <a href="{{ route('events') }}" class="menu-title">Events</a>
                </li>

                <li class="menu-category">
                    <a href="{{ route('contactUs') }}" class="menu-title">Contact Us</a>
                    @extends('layouts.app')
                </li>
            </ul>
        </div>
    </nav>
    <div class="orders_body">

    <div class="card">
        {{-- {{$orders}} --}}
        <div class="orders_table">
            <h2>Table of Orders Made</h2>
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">Order ID</div>
                    <div class="col col-2">Total Amount</div>
                    <div class="col col-3">User_ID</div>
                    <div class="col col-4">Payment Status</div>
                </li>
                @foreach ($orders as $order)
                <a href="{{url('order_details/'.$order->id)}}">
                    <li class="table-row">
                        <div class="col col-1" data-label="Job Id">{{$order->id}}</div>
                        <div class="col col-2" data-label="Customer Name">{{$order->total_amount}}</div>
                        <div class="col col-3" data-label="Amount">{{$order->user_id}}</div>
                        <div class="col col-4" data-label="Payment Status">{{$order->status}}</div>
                    </li>
                </a>

                @endforeach

            </ul>
        </div>
    </div>
</body>
</html>
