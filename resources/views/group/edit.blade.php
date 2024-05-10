@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/group/update/{{$group->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Group name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$group->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <br>

                        <div class="form-group row">
                            <label for="start_at" class="col-md-4 col-form-label text-md-right">start on</label>

                            <div class="col-md-6">
                                <input id="start_at" type="date" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{$group->start_at}}" required autocomplete="start_at" autofocus>

                                @error('start_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <br>

                        <div class="form-group row">
                            <label for="end_at" class="col-md-4 col-form-label text-md-right">end on</label>

                            <div class="col-md-6">
                                <input id="end_at" type="date" class="form-control @error('end_at') is-invalid @enderror" name="end_at" value="{{$group->end_at}}" required autocomplete="end_at" autofocus>

                                @error('end_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <br>

                        <div class="form-group row">
                            <label for="at" class="col-md-4 col-form-label text-md-right">At</label>

                            <div class="col-md-6">
                                <input id="at" type="time" class="form-control @error('at') is-invalid @enderror" name="at" value="{{$group->at}}" required autocomplete="at" autofocus>

                                @error('at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <br>






                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Product') }}</label>

                            <div class="col-md-6">
                                <select id="product_id" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{$group->product_id}}" required>
                                    <option value="">Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="store_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Store') }}</label>

                            <div class="col-md-6">
                                <select id="store_id" class="form-control @error('store_id') is-invalid @enderror" name="store_id" value="{{$group->store_id}}" required>
                                    <option value="">Select Store</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>

                                @error('store_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit a group
                                </button>
                            </div>
                        </div>
                    </form>
                  <a href="https://outlook.live.com/calendar/0/action/compose?allday=false&body={{ urlencode($group->name) }}&enddt={{ urlencode(date('Y-m-d\TH:i:s', strtotime($group->end_at))) }}&path=%2Fcalendar%2Faction%2Fcompose&rru=addevent&startdt={{ urlencode(date('Y-m-d\TH:i:s', strtotime($group->start_at))) }}&subject={{ urlencode($group->name) }}" title="Save Event in my Calendar" target="_blank" rel="nofollow">+outlook Calendar</a>
                


                </div>
            </div>
        </div>
    </div>
</div>
@endsection