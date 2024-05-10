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
    <link rel="stylesheet" href="{{asset('css/buyer/storeDetails.css')}}">


    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    .msg_seller{
        width: 50px;
        height: 50px;
        position: fixed;
        left: 0;
        bottom: 0;
        margin: 30px;
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

        <div class="banner">

            <div class="container">

                <div class="slider-container has-scrollbar">

                    <div class="slider-item">

                        <img src="{{asset('assets/buyer/bg3.2.png')}}" alt="women's latest fashion sale" class="banner-img">

                        <div class="banner-content">
                            <h2 class="welcome1">Explore Our Stores
                            </h2>

                            <p class="welcome2">Discover a Variety of Products from Our Featured Stores</p>



                            <a href="#" class="banner-btn">Shop now</a>

                        </div>

                    </div>



                </div>

            </div>
            <a href="{{ route('stores') }}">Back</a>

            <a href="{{url('chatify/'.$store->user_id)}}">
                <img src="{{asset('assets\buyer\chat1.png')}}" alt="" class="msg_seller">
            </a>

            <section>
                <h1 class="myStoresTitle">MY STORE Details</h1>
                <div class="grid-left">
                    <a href="{{ route('store.show', ['id' => $store->id]) }}" class="btn btn-primary">All Products</a>
                    <button class="btn btn-primary" onclick="toggleCategories()">Categories</button>
                    <div id="categoryDropdown" style="display: none;">
                        <select id="categorySelect" onchange="filterByCategory(this.value)">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid-container">
                    <div class="stores-grid">
                        @foreach($products->take(6) as $product) <div class="store-card">
                            <img src="{{asset( $product->image )}}" width="100px" height="100px" />
                            <div class="store-}}details">
                                <h4>{{ $product->name }}</h4>
                                <p>{{ $product->quantity }} available - ${{ $product->price }}</p>


                                <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="add-to-cart-form"> @csrf
                                    <button class="add-to-cart">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <script>
                    function toggleVisibility() {
    const cards = document.querySelectorAll('.store-card');
    cards.forEach((card, index) => {
        if (index >= 6) {
            card.style.display = card.style.display === 'none' ? 'block' : 'none';
        }
    });
    // Update button text based on visibility
    const button = document.querySelector('.show-more');
    button.textContent = button.textContent === 'Show More' ? 'Show Less' : 'Show More';
}

                    function toggleCategories() {
                        var dropdown = document.getElementById("categoryDropdown");
                        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
                    }

                    function filterByCategory(categoryId) {
                        window.location.href = "{{ route('store.show', ['id' => $store->id]) }}?category=" + categoryId;
                    }
                </script>
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
