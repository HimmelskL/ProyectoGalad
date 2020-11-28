<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Galad</title>
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-lg " id="barra">
  <a class="navbar-brand" href="#" id="a">Galad</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}" id="a">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('mapa')}}" id="a">Mapa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}" id="a">Iniciar sesión</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}" id="a">Registrarse</a>
      </li>
    </ul>
  </div> 
</nav>
<div class="container">
        @yield('seccion')
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<style>
#barra{
  background-color:#a2231d;
}
#a{
  color:#f3f3ea;
}
</style>