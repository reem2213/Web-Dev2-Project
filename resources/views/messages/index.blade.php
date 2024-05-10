<html>
<head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        </head>

<body>

<div class="message-wrapper">
    <ul class="messages">
        
        @if($group->product)
        <p>Product: {{ $group->product->name }}</p>
        @endif

        @if($group->status === 'open')
        <p>Event is open</p>
        <!-- Display success/error message near event status information -->
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        <!-- Button to close the event, only visible to sellers -->
        @if(auth()->user()->role === 'seller')
        <form action="{{ route('toggleEventStatus', $group->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Close Event</button>
        </form>
        @endif
        @else
        <p>Event is closed</p>
        <!-- Display success/error message near event status information -->
        @if(session('success'))
        <script>
            Swal.fire({
                title: 'doneeee!',
                text: 'Do you want to continue',
                icon: 'Do you want to continue',
                confirmButtonText: 'Cool'
            })
        </script>
        @endif
        @if(session('error'))
        <script>
            Swal.fire({
                title: 'mesh done!',
                text: 'Do you want to continue',
                icon: 'Do you want to continue',
                confirmButtonText: 'Cool'
            })
        </script>        @endif
        <!-- Button to open the event, only visible to sellers -->
        @if(auth()->user()->role === 'seller')
        <form action="{{ route('toggleEventStatus', $group->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Open Event</button>
        </form>
        @endif
        @endif

        @foreach($messages as $message)
        <li class="message clearfix">
            <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                <h4> <a href="/ShowMassage/{{$message->id}}" style="color: red;">{{$group->name}}</a></h4>
                <p>Name: {{ $message->name }}</p>
                <p>Message: {{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<!-- Input for adding new messages -->
<div class="input-text">
    <input type="text" name="message" id='message' class="submit" {{ $group->status !== 'open' ? 'disabled' : '' }}>
    <input type="hidden" name="id" id='id' class="submit" value='{{$group->id}}'>
</div>



















@if ($group->admin_id == auth()->user()->id)

<div class="row">
    <div class="col-md-4">
        <p>
            <a class="btn btn-info" href="/group/edit/{{$group->id}}" style="color:white;">Edit</a>
        </p>
    </div>
    <div class="col-md-4">
        <form action="/group/delete/{{$group->id}}" method="POST">
            @csrf
            @method('Delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete group</button>
        </form>
    </div>
    <div class="col-md-4">
        <p>
            <a class="btn btn-warning" href="/group/members_list/{{$group->id}}" style="color:white;">Remove users</a>
        </p>
    </div>
</div>
@else
<!-- this is for unFollow -->
<form action="/unFollow/{{ $group->id }}" method="POST">
    @csrf
    @method('Delete')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Leave</button>
</form>
@endif
</body>

</html>


