<link rel="stylesheet" href="{{asset('css/signup.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="p1">
                    <div class="card-header">{{ __('Create') }}</div>
                    <div class="welcome-message">
                        <img src="{{asset('storage/images/login.png')}}" alt="Welcome Image" class="welcome-image">
                    </div>
                </div>

                <div class="card-header2">{{ __('an account') }}</div>




                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="form">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="username">{{ __('Username') }}</label>
                            <input placeholder="enter a username" id="username" type="numeric" class="form-control custom-input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input placeholder="enter an email" id="email" class="form-control custom-input @error('email') is-invalid @enderror" name="email" type="numeric" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input placeholder="enter a password" id="password" type="password" class="form-control custom-input @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input placeholder="confirm your password" id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation" autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phoneNo">{{ __('Phone Number') }}</label>
                            <input placeholder="enter a phone no." id="phoneNo" type="numeric" class="form-control custom-input @error('phoneNo') is-invalid @enderror" name="phoneNo" value="{{ old('phoneNo') }}" autocomplete="phoneNo" autofocus>
                            @error('phoneNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input id="role" type="hidden" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role', $role) }}" autocomplete="role">

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}

                        </button>
                    </form>
                    <p class="or">Or Sign In With</p>

                    <div class="w-full flex flex-container flex-row absolute">
                        <a href="/auth/facebook/redirect" type="button" class="social-media">
                            <button type="button" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                        <a href="/auth/github/redirect" type="button" class="social-media">
                            <button type="button" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                        <a href="/auth/google/redirect" type="button" class="social-media">
                            <button type="button" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                                    <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                    </div>
                    <p class="btn btn-signup">Already have an account?

                        <a class="signup" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>