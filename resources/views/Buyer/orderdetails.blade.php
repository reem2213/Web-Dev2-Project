<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
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
                    <a href="{{ url('orders')}}" class="menu-title">Back</a>
                </li>
            </ul>
        </div>
    </nav>
{{-- {{$orderdetails}} --}}
    <div class="orders_body">
        <div class="card">
            {{-- {{$orders}} --}}
            <div class="orders_table">
                <h2>Table of Orders Made</h2>
                <ul class="responsive-table">
                    <li class="table-header">
                        <div class="col col-1">Product ID</div>
                        <div class="col col-2">Name</div>
                        <div class="col col-3">Quantity</div>
                        <div class="col col-4">Price</div>
                        <div class="col col-4">Category Id</div>
                    </li>
                    @foreach ($products as $product)
                        @if ($orderdetails->product_id == $product->id)
                            <li class="table-row">
                                <div class="col col-1" data-label="Job Id">{{$product->id}}</div>
                                <div class="col col-2" data-label="Customer Name">{{$product->name}}</div>
                                <div class="col col-3" data-label="Amount">{{$product->quantity}}</div>
                                <div class="col col-4" data-label="Payment Status">{{$product->price}}</div>
                                <div class="col col-4" data-label="Payment Status">{{$product->category_id}}</div>
                            </li>
                        @endif
                    @endforeach
                    {{-- {{$orderdetails}}
                    {{$products}} --}}

                </ul>
            </div>
        </div>
    </div>
</body>
</html>
