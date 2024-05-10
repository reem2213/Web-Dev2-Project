@extends('layouts.app')

@section('content')

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- in baraye chat -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users" style='text-align: center;'>
                        @foreach($users as $user)
                        <li class="user" id="{{ $user->id }}">

                            <div class="media-body">
                                <p class="name">{{ $user->name }}</p>


                            </div>

                        </li>
                        @endforeach
                        @if(session('success'))
                        <script>
                            Swal.fire({
                                title: 'doneeee!',
                                text: "{{ session('success') }}",
                                icon: 'Do you want to continue',
                                confirmButtonText: 'Cool'
                            })
                        </script>
                        @endif


                    </ul>

                </div>
            </div>

            <div class="col-md-8" id="messages">

            </div>
        </div>
    </div>
</body>

@endsection