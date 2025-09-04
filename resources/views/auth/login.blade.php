<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>input form</h2> 
  <div class="row">

  <div class="col-sm-4 col-sm-offset-4">
  @if(session()->has('success'))
<div class="alert alert-success">

<p>{{session()->get('success')}}</p>
</div>

@endif



  
  <form action="{{route('login-user')}}" method="post">
@if(session()->has('error'))
<div class="alert alert-danger">

<p>{{session()->get('error')}}</p>
</div>

@endif

    @csrf
    <div class="form-group" >
      <label for="email">Email:</label>
      <input type="email"  class="form-control" id="email" placeholder="Enter email" name="email">
      @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
      
    </div>
    <div class="mb-2">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">login</button> or <a href="{{route('register')}}">Register</a>
  </form>
</div>
</div>
  </div>
</body>
</html>
