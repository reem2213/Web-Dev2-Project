<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/signupForm.css')}}">
</head>

<body>

    <div class="container" id="container">
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <a href="{{route('loginnn')}}">
                        <button class="hidden" id="register">Sign In</button>

                    </a>
                </div>
            </div>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Sign Up</h1>
                <div class="social-icons">
                    <div class="social-icons">
                        <a href="/auth/google/redirect" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="/auth/facebook/redirect" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="/auth/github/redirect" class="icon"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <span>or use your email password</span>
                <form method="POST" action="{{ route('signupp') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phoneNo" class="col-md-4 col-form-label text-md-end">{{ __('phoneNo') }}</label>

                        <div class="col-md-6">
                            <input id="phoneNo" type="numeric" class="form-control @error('phoneNo') is-invalid @enderror" name="phoneNo" value="{{ old('phoneNo') }}" autocomplete="phoneNo" autofocus>

                            @error('phoneNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input id="role" type="hidden" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role', $role) }}" autocomplete="role">


                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </form>
        </div>

    </div>
    <script src="{{asset('js/login.js')}}">
    </script>

</body>

</html>