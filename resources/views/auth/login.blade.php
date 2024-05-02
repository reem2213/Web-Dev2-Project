<link rel="stylesheet" href="{{asset('css/login.css')}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="row-md-8">
            <div class="card">
                <div class="row">
                    <div class="row-md-6 card-left">
                        <div class="card-header bg-primary text-white">{{ __('LOGIN IN NOW!') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" placeholder="enter your email" type="email" class="form-control custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" placeholder="enter your password" type="password" class="form-control custom-input @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary custom-button">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                    <p class="btn btn-signup"> Dont have an account?

                                        <a class="signup" href="{{ route('select.role') }}">
                                            {{ __('Signup') }}
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="welcome-message">
                        <img src="{{asset('storage/images/signup.png')}}" alt="Welcome Image" class="welcome-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>