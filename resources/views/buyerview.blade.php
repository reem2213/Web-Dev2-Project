<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/admin/ali.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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

<div class="header">
    <a href="{{url('admin')}}" class="back-button">←</a>

    <h2>Buyer Info</h2>
    <br>
    <table>
      <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>

      @foreach($all as $obj)
        <tr>
          <td>{{$obj->id}}</td>
          <td>{{$obj->username}}</td>
          <td>{{$obj->email}}</td>
          <td>{{$obj->password}}</td>
          <td>{{$obj->phoneNo}}</td>
          <th><a href="{{url('changepassbuyer/'.$obj->id)}}" class="nav-link">Resest Password</a></th>
        </tr>
      @endforeach

  </table>
</div>

</body>
</html>

