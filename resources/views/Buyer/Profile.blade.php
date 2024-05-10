
@extends('layouts.app')

@section('content')
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ $user->username }}">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">
    </div>
    <div>
        <label for="phoneNo">Phone Number</label>
        <input type="text" name="phoneNo" id="phoneNo" value="{{ $user->phoneNo }}">
    </div>
    <div>
        <label for="profile_photo_path">Image:</label>
        <input type="file" id="profile_photo_path" name="profile_photo_path" value="{{$user->profile_photo_path}}">
    </div>
    
    <button type="submit">Update Profile</button>
    <p>{{ asset($user->profile_photo_path) }}</p>

</form>

<img src="{{asset($user->profile_photo_path)}}" width="100px" height="100px" />
<p>{{$user->profile_photo_path}}</p>

@endsection