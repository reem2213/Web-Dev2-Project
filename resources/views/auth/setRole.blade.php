<link rel="stylesheet" href="{{asset('css/role.css')}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{asset('storage/images/role2.png')}}" class="image"/>
                <div class="card-header">{{ __('Please select your Role') }}</div>
                <div class="card-body">
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
                                <!-- Add other roles as necessary -->
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
        </div>
    </div>
</div>
