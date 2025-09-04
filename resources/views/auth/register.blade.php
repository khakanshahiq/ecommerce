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

@if(session()->has('error'))
<div class="alert alert-danger">

<p>{{session()->get('error')}}</p>
</div>

@endif

  
  <form action="{{route('register-user')}}" method="post">
    @csrf
    <div class="form-group" >
      <label for="email">Name:</label>
      <input type="text"  class="form-control" id="name" placeholder="Enter name" name="name" value="{{old('name')}}" >
      <div>
    @error('name')
        <span class="text-danger name-error">{{ $message }}</span>
    @enderror
</div>

    </div>
    <div class="form-group" >
      <label for="email">Email:</label>
      <input type="email"  class="form-control"   id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
      <div>
    @error('email')
        <span class="text-danger email-error">{{ $message }}</span>
    @enderror
</div>


    </div>
    <div class="mb-2">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"   id="password" placeholder="Enter password" value="{{old('password')}}" name="password">
      <div>
    @error('password')
        <span class="text-danger password-error">{{ $message }}</span>
    @enderror
</div>


    </div>
    <div class="mb-2">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password" value="{{old('password_confirmation')}}" name="password_confirmation">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">register</button>Already have Account <a href="{{route('login')}}">Login</a>
  </form>
</div>
</div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
 $(document).ready(function(){


$('input[name="name"]').on('input',function(){

$('span.text-danger.name-error').hide();

})
$('input[name="email"]').on('input',function(){

$('span.text-danger.email-error').hide();

})
$('input[name="password"]').on('input',function(){

  $('span.text-danger.password-error').hide();


 }); 
}); 
</script>
</body>
</html>
