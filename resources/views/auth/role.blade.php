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
            <form method="POST" action="{{ route('role.select') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="radio-container">
                            <input type="radio" id="buyer" name="role" value="buyer">
                            <label for="buyer">Buyer</label>
                        </div>

                        <div class="radio-container">
                            <input type="radio" id="seller" name="role" value="seller">
                            <label for="seller">Seller</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Next') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script src="{{asset('js/login.js')}}">
    </script>

</body>

</html>