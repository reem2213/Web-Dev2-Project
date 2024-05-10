
<link rel="stylesheet" href="{{asset('css/buyer/profile.css')}}">
<link rel="stylesheet" href="{{asset('css/buyer/stores.css')}}">


<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
    @csrf
    @method('PUT')
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ $user->username }}">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">
    </div>
    <div>
        <label for="phoneNo">Phone Number</label>
        <input type="text" name="phoneNo" id="phoneNo" value="{{ $user->phoneNo }}">
    </div>
    <div>
        <label for="profile_photo_path">Image:</label>
        <input type="file" id="profile_photo_path" name="profile_photo_path" value="{{$user->profile_photo_path}}">
    </div>
    
    <button type="submit">Update Profile</button>
  

</form>

@if($user->profile_photo_path)

    <img src="{{ asset($user->profile_photo_path) }}" alt="Profile Image" width="100px" height="100px" style="border-radius: 50px;" />
    <h2>{{ $user->email }}</h2>
    <p>{{ $user->email }}</p>
@else
    <div class="no-profile-image">No Image</div>
@endif


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