<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="{{asset('assets/buyer/logo/favicon.ico')}}" type="image/x-icon">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{asset('css/buyer/stores.css')}}">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    .alert {
  position: relative;
  top: 10;
  left: 0;
  width: auto;
  height: auto;
  padding: 10px;
  margin: 10px;
  line-height: 1.8;
  border-radius: 5px;
  cursor: hand;
  cursor: pointer;
  font-family: sans-serif;
  font-weight: 400;
}

.alertCheckbox {
  display: none;
}

:checked + .alert {
  display: none;
}

.alertText {
  display: table;
  margin: 0 auto;
  text-align: center;
  font-size: 16px;
}

.alertClose {
  float: right;
  padding-top: 5px;
  font-size: 10px;
}

.clear {
  clear: both;
}

.info {
  background-color: #EEE;
  border: 1px solid #DDD;
  color: #999;
}

.success {
  background-color: #EFE;
  border: 1px solid #DED;
  color: #9A9;
}

.notice {
  background-color: #EFF;
  border: 1px solid #DEE;
  color: #9AA;
}

.warning {
  background-color: #FDF7DF;
  border: 1px solid #FEEC6F;
  color: #C9971C;
}

.error {
  background-color: #FEE;
  border: 1px solid #EDD;
  color: #A66;
}
</style>

</head>

<body>


    <!-- <div class="overlay" data-overlay></div> -->

    <!--
    - MODAL
  -->

    <!-- <div class="modal" data-modal>

    <div class="modal-close-overlay" data-modal-overlay></div>

    <div class="modal-content">

      <button class="modal-close-btn" data-modal-close>
        <ion-icon name="close-outline"></ion-icon>
      </button>





    </div>

  </div> -->





    <!--
    - NOTIFICATION TOAST
  -->

    <!-- <div class="notification-toast" data-toast>

    <button class="toast-close-btn" data-toast-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="toast-banner">
      <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
    </div>

    <div class="toast-detail">

      <p class="toast-message">
        Someone in new just bought
      </p>

      <p class="toast-title">
        Rose Gold Earrings
      </p>

      <p class="toast-meta">
        <time datetime="PT2M">2 Minutes</time> ago
      </p>

    </div>

  </div> -->





    <!--
    - HEADER
  -->

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
                    <img src="{{asset('assets/buyer/logo.png')}}" width="100" height="80">
                </a>

                <div class="header-search-container">

                    <input type="search" name="search" class="search-field" placeholder="Search...">

                    <button class="search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>

                </div>

                <div class="header-user-actions">
                    <button class="action-btn">
                        <img src="{{asset('assets/buyer/chat.png')}}" class="icons" />
                    </button>



                    <button class="action-btn">
                        <a href="{{ route('notifications') }}">

                            <img src="{{asset('assets/buyer/iconsNotification.png')}}" class="icons" />
                            <span class="count">0</span>
                    </button></a>



                    <button class="action-btn">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span class="count">0</span>
                    </button>
                    </a>
                    <a href="{{ route('profile.edit') }}">

                        <button class="action-btn">
                            <ion-icon name="person-outline"></ion-icon>
                        </button>
                    </a>

                </div>

            </div>

        </div>

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


                    </li>


                </ul>

            </div>

        </nav>

        <div class="mobile-bottom-navigation">

            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <button class="action-btn">
                <ion-icon name="bag-handle-outline"></ion-icon>

                <span class="count">0</span>
            </button>

            <button class="action-btn">
                <ion-icon name="home-outline"></ion-icon>
            </button>

            <button class="action-btn">
                <ion-icon name="heart-outline"></ion-icon>

                <span class="count">0</span>
            </button>

            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="grid-outline"></ion-icon>
            </button>

        </div>

        <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

            <div class="menu-top">
                <h2 class="menu-title">Menu</h2>

                <button class="menu-close-btn" data-mobile-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>



            <div class="menu-bottom">



                <ul class="menu-social-container">

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

        </nav>

    </header>





    <!--
    - MAIN
  -->

    <main>

        <!--
      - BANNER
    -->
        @if (Session::has('success'))
            <div class="alert success">
                {{Session::get('success')}}
                @php
                    Session::forget('success')
                @endphp
            </div>
        @endif

        <div class="banner">
            <div class="container">
                <div class="slider-container has-scrollbar">
                    <div class="slider-item">
                        <img src="{{asset('storage/images/stores.png')}}" class="banner-img">
                        <div class="banner-content">
                            <h2 class="welcome1">Explore Our Stores
                            </h2>
                            <p class="welcome2">Discover a Variety of Products from Our Featured Stores</p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#followButton').on('click', function() {
                        var storeId = $(this).data('store-id');

                        // Send AJAX request to follow store
                        $.ajax({
                            url: '/follow/store', // Replace with your Laravel route for following a store
                            method: 'POST',
                            data: {
                                store_id: storeId
                            },
                            success: function(response) {
                                $('#followButton').text('Following');
                                $('#followButton').prop('disabled', true);
                                // Optionally, you can show a success message or perform other actions
                            },
                            error: function(xhr, status, error) {
                                // Handle error responses
                                console.error(error);
                            }
                        });
                    });
                });
            </script>
            <section>
                <h1 class="myStoresTitle">ALL STORES</h1>

                <div class="stores-grid">
                    @foreach($store as $s)
                    <div class="store-card">
                        <img src="{{$s->image}}" class="store-image" />
                        <div class="store-details">
                            <h2 class="store-name">{{ $s->name }}</h2>
                            <p class="store-description">{{ $s->description }}</p>
                            <div class="sawa">
                                <p class="store-address"><i class="material-icons" style="font-size:30px;color:#1753d3">location_on</i>
                                    {{ $s->address }}
                                </p>
                                <p class="store-phone"><i class="material-icons" style="font-size:30px;color:#1753d3">phone</i>
                                    {{ $s->phoneNo }}
                                </p>
                            </div>


                            <a href="{{ route('store.show', ['id' => $s->id]) }}" class="follow-bttn">Explore -></a>
                            @if (Auth::check() && Auth::user()->role === 'buyer')
    @if ($s->isFollowedBy(Auth::user()))
        <a href="{{ route('store.unfollow', ['storeId' => $s->id]) }}" class="follow-bttnn">Unfollow</a>
    @else
        <a href="{{ route('store.follow', ['storeId' => $s->id]) }}" class="follow-bttnn">Follow</a>
    @endif
@endif

                        </div>
                    </div>
    <script>
    @if(session('followed') !== null && session('storeId') !== null)
        var storeId = "{{ session('storeId') }}";
        var followButton = document.getElementById('follow_button_' + storeId);
        var unfollowButton = document.getElementById('unfollow_button_' + storeId);
        if (followButton && unfollowButton) {
            if ({{ session('followed') }}) {
                followButton.style.display = 'none';
                unfollowButton.style.display = 'inline-block';
            } else {
                followButton.style.display = 'inline-block';
                unfollowButton.style.display = 'none';
            }
        }
    @endif
</script>



                    @endforeach

                </div>

            </section>







            <!--
      - FOOTER
    -->



            <footer>



                <div class="footer-nav">

                    <div class="container">



                        <ul class="footer-nav-list">

                            <li class="footer-nav-item">
                                <h2 class="nav-title">Quick Links</h2>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Home</a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Stores</a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">About Us</a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Contact us</a>
                            </li>



                        </ul>

                        <ul class="footer-nav-list">

                            <li class="footer-nav-item">
                                <h2 class="nav-title">Our Company</h2>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Delivery</a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Legal Notice</a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Terms and conditions</a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">Contact us</a>
                            </li>



                        </ul>




                        </ul>

                        <ul class="footer-nav-list">

                            <li class="footer-nav-item">
                                <h2 class="nav-title">Contact</h2>
                            </li>

                            <li class="footer-nav-item flex">
                                <div class="icon-box">
                                    <ion-icon name="location-outline"></ion-icon>
                                </div>

                                <address class="content">
                                    419 State 414 Rte
                                    Beaver Dams, New York(NY), 14812, USA
                                </address>
                            </li>

                            <li class="footer-nav-item flex">
                                <div class="icon-box">
                                    <ion-icon name="call-outline"></ion-icon>
                                </div>

                                <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
                            </li>

                            <li class="footer-nav-item flex">
                                <div class="icon-box">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </div>

                                <a href="mailto:example@gmail.com" class="footer-nav-link">example@gmail.com</a>
                            </li>

                        </ul>

                        <ul class="footer-nav-list">

                            <li class="footer-nav-item">
                                <h2 class="nav-title">Follow Us</h2>
                            </li>

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

                        </ul>

                    </div>

                </div>

                <div class="footer-bottom">

                    <div class="container">

                        <img src="{{asset('assets/buyer/payment.png')}}" alt="payment method" class="payment-img">

                        <p class="copyright">
                            Copyright &copy; <a href="#">Anon</a> all rights reserved.
                        </p>

                    </div>

                </div>

            </footer>






            <!--
    - custom js link
  -->
            <script src="{{asset('js/buyer/script.js')}}"></script>

            <!--
    - ionicon link
  -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
