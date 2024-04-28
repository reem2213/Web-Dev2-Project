<!DOCTYPE html>
<html>
<head>
<style>
  .back-button {

font-size: 1.5rem;
text-decoration: none;
color: #333;
margin-right: 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<a href="{{url('admin')}}" class="back-button">←</a>
<h2>Buyer Info</h2>


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

</body>
</html>