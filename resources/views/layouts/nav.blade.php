
<div class="navba">
    <a href="{{ url('/events') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

  @guest
    @if (Route::has('login'))
      <a href="{{ route('login') }}">{{ __('Login') }}</a>
    @endif
    @if (Route::has('register'))
      <a href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif

  @else
  @if(Auth::user()->role !== 'buyer')
            <a class="btn btn-light" href="/group/create">Make group</a>
        @endif
        @if(Auth::user()->role !== 'seller')
        <a class="btn btn-light" href="/subscribe">Join group</a>
        @endif

    @if($users)
     <a href="" style='padding: 11px 24px;'>
       <i class='fas fa-bell' style='font-size:28px;color:red'></i>
       </a>  
       <div class="dropdown">
         <div id="myDropdown" class="dropdown-content">
            @foreach($message as $messagee)
              <h4><a>{{ $messagee->message }}</a></h4>
            @endforeach  
         </div>
       </div>
    @else
       <i class='fas fa-bell-slash' style='font-size:28px;color:blue;padding: 11px 24px;'></i>
    @endif
    <div class="dropdow">
      <button class="dropbt">
        {{ Auth::user()->username }} 
        <i class="fa fa-caret-down"></i>
      </button>
    
      <div class="dropdown-content">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="header">
          @endguest
        </div>   
      </div>
    </div> 
</div>