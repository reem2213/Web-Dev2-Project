<!DOCTYPE html>
<html>
<body>

<h1>Edit Password</h1>

  <form action="{{url('updated/'.$all->id)}}"  method="PUT">
        @csrf
        @method('PUT')
       
      <label for="password">New Password:</label>
      <input type="text" id="pass" value="{{$all->password}}" name="thepass" required>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif    
    
      <div class="card-footer">
        <button type="submit" >Save </button>
      </div>
  </form>

</body>
</html>