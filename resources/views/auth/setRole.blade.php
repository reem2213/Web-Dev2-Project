@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Role') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('role.select') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">


                                <input type="radio" id="buyer" name="role" value="buyer">
                                <label for="buyer">Buyer</label><br>

                                <input type="radio" id="seller" name="role" value="seller">
                                <label for="seller">Seller</label><br>

                                <!-- Add other roles as necessary -->
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue to Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection