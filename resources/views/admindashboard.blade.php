<!DOCTYPE html>

<html lang="en">

<head>
    <!-- hi-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!--  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!--  -->
    <link rel="stylesheet" href="{{asset('css/admin/cssadmin.css')}}">
</head>

<body>



@extends('layouts.app')





















    <div class="sidebar">
        <h2>Welcome Back<br> Admin <i class='bx bxs-smile'></i></h2>
        <br>
        <br>
        <nav class="nav-menu">
            <a href="{{url('admin')}}" class="nav-link active"><i class='bx bxs-dashboard'></i> Dashboard</a>
            <br>
            <a href="{{url('storerequests')}}" class="nav-link"><i class='bx bxs-group'></i> Store Requests</a>
            <br>

            <a href="{{url('deactivatedstores')}}" class="nav-link"><i class='bx bxs-doughnut-chart'></i> Deactivated Stores</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="card"> <span class='count'><a href="{{url('listsellers')}}">{{$sellerscount}}</a></span> <br>Registered Sellers </div>
        <div class="card"> <span class='count'><a href="{{url('list')}}">{{$storesscount}}</a></span> <br> Stores Available </div>
        <div class="card"> <span class='count'><a href="{{url('listbuyers')}}">{{$buyerscount}}</a></span> <br>Buyers Enjoying Shopping </div>
    </div>

</body>

</html>