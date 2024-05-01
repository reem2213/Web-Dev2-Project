<html>

 <head>
 <link rel="stylesheet" href="{{asset('css/welcome.css')}}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="Content-Language" content="en_US" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   </head>
  <body>
    <div class="loading-wrapper">
       <h3 class="loading-text">
         <span>WELCOME</span><span>TO</span><span>OUR</span><span>E-COMM</span><span>PLATFORM</span>
         <img src="{{asset('storage/images/in.png')}}" class="welcome-image"/>
 </h3>
 <p class="parag">where shopping and buying become seamless experiences tailored to your preferences, with a vast array of products just waiting for you to explore and make your own.</p>
         <a href="{{route('login')}}" class="login">Login</a>
         <a href="{{route('select.role')}}" class="signup">Register</a>
      
    </div>
  </body>
</html>
