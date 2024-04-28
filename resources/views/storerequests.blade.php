<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Requests</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    background-color: #4169E1;
    color: #fff;
    width: 200px;
    padding: 20px;
    height: 100vh;
}

.nav-menu .nav-link {
    color: #fff;
    text-decoration: none;
    display: block;
    margin: 10px 0;
}

.nav-menu .nav-link.active {
    font-weight: bold;
}

.sidebar a {
    color: white;
    text-decoration: none;
    padding: 10px 0;
    display: block;
}

.request-container {
    margin-top: 20px;
    padding: 20px;
    display: block;
    width: 70%;
    margin-left: 20%;
    background-color: #e0f7fa;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.request {
    padding: 20px;
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.15);
}

.request img {
    width: 150px;
    height: 150px;
    margin-right: 20px;
}

.request-details {
    flex-grow: 1;
    font-size: 1.1rem;
}

.request h3, .request p {
    margin: 5px 0 15px 0;
}

.request-actions {
    display: flex;
    flex-direction: row;
}

.request button, .request a { 
    padding: 15px 30px;
    margin-top: 5px;
    margin-left: 10px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: 100px;
    font-size: 1rem;
    text-align: center;
    display: inline-block; 
    text-decoration: none;
}

.approve, .request .approve { 
    background-color: #28a745;
    color: white;
}

.reject, .request .reject { 
    background-color: #dc3545;
    color: white;
}
</style>



</head>
<body>
<div class="sidebar">
        <h2>Welcome Back<br>   Admin  <i class='bx bxs-smile'></i></h2>
        <br>
        <br>
        <nav class="nav-menu">
            <a href="{{url('admin')}}" class="nav-link active"><i class='bx bxs-dashboard' ></i>  Dashboard</a>
            <br>
            <a href="{{url('storerequests')}}" class="nav-link"><i class='bx bxs-group' ></i>  Store Requests</a>
            <br>
            <a href="{{url('deactivatedstores')}}" class="nav-link"><i class='bx bxs-doughnut-chart' ></i>  Deactivated Stores</a>
        </nav>
    </div>

<div class="request-container">
    @if($stores->isEmpty())
        <div class="request"><p>No store requests.</p></div>
    @else
        @foreach ($stores as $store)
            <div class="request">
                <img src="{{ asset($store->image) }}" alt="Store Image">
                <div class="request-details">
                    <h3>{{ $store->name }}</h3>
                    <p>{{ $store->description }}</p>
                    <p>{{ $store->phoneNo }}</p>
                    <p>{{ $store->address }}</p>
                </div>
                <div class="request-actions">
                    <!-- <a href="#" onclick="approveStore(event, {{ $store->id }})" class="approve">Approve</a> -->
                    <a href="{{url('updatestore/'.$store->id)}}" class="approve">Approve</a>
                    <a href="{{url('deletestore/'.$store->id)}}"  class="reject">Reject</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
</body>



</html>
