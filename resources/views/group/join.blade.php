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

                
                    @foreach($groupALL as $user)
                    <form method="POST" action="/group/join">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ $user->name }}</label>

                            <div class="col-md-6">
                                <input id="code" type="hidden" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $user->code }}" required autocomplete="name" autofocus>
                            </div>
                        </div> <br>


                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    yala Join {{ $user->name }}

                                </button>
                                <a href="https://outlook.live.com/calendar/0/action/compose?allday=false&body={{ urlencode($user->name) }}&enddt={{ urlencode(date('Y-m-d\TH:i:s', strtotime($user->end_at))) }}&path=%2Fcalendar%2Faction%2Fcompose&rru=addevent&startdt={{ urlencode(date('Y-m-d\TH:i:s', strtotime($user->start_at))) }}&subject={{ urlencode($user->name) }}" title="Save Event in my Calendar" target="_blank" rel="nofollow">+outlook Calendar</a>

                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection