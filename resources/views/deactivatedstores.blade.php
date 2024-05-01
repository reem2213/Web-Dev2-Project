<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Stores</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
</head>
<style>

body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f7f7f7;
}
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    background-color: #4169E1;
    color: #fff;
    width: 200px;
    padding: 20px;
    height: 95%;
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

.container {
    padding: 20px;
    
}

.header {
    display: flex;
    align-items: center;
    justify-content: start;
    margin-bottom: 20px;
    margin-left: 45%;
}

.back-button {
    font-size: 1.5rem;
    text-decoration: none;
    color: #333;
    margin-right: 20px;
}

.header h1 {
    font-size: 2rem;
    color: #333;
}

.stores-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    margin-left: 20%;
}



.store-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
}


.store-icon {
    width: 80px;
    height: 80px; 
    border-radius: 50%;
    overflow: hidden; 
    display: flex;
    justify-content: center;
    align-items: center;
}


.store-icon img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover; 
}


.store-name {
    font-size: 1rem; 
    color: #333;
    margin-top: 10px; 

}
.deactivate-button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #57e317;
    border-radius: 25px; 


    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 10px; 
}

.deactivate-button:hover {
    background-color: #cc0000;
}

/* Responsive  */
@media (max-width: 768px) {
    .stores-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    }
}

.store-details {
    flex-grow: 1; 
    display: flex;
    flex-direction: column;
    align-items: flex-start; 
}


</style>
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
    <div class="container">
        <div class="header">
           
            <h1>Deactivated Stores</h1>
        </div>
        <div class="stores-grid">
    @foreach ($deactivated_stores as $store)
        <div class="store-card">
            <div class="store-icon">
                <img src="{{ asset($store->image) }}" alt="Store Image">
            </div>
            <div class="store-details">
                <div class="store-name">{{ $store->name }}</div>
                
                <a href="{{url('activatestore/'.$store->id)}}"  class="deactivate-button">Activate</a>
            </div>
        </div>
    @endforeach
</div>
    </div>
</body>
</html>