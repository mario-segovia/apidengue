<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Panel Principal</title>
</head>
<body>
  @include('navbar')
  <div class="container themed-container">

    <div class="jumbotron">
      <h1>Panel Principal</h1>
    </div>


<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Entidades</h4>
      </div>
      <div class="card-body">
        <h2 class="card-title pricing-card-title">Gestionar Entidades</h2>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Crear Entidades</li>
          <li>Editar Entidades</li>
          <li>Eliminar Entidades</li>

        </ul>
        <a type="button" class="btn btn-lg btn-block btn-primary" href="{{ route('entidades.index') }}">Ir a Entidades</a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Usuarios</h4>
      </div>
      <div class="card-body">
        <h2 class="card-title pricing-card-title">Gestionar Usuarios</h2>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Crear Usuarios</li>
          <li>Editar Usuarios</li>
          <li>Eliminar Usuarios</li>
        </ul>
        <a type="button" class="btn btn-lg btn-block btn-primary" href="{{ route('usuarios.index') }}">Ir a Usuarios</a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Roles</h4>
      </div>
      <div class="card-body">
        <h2 class="card-title pricing-card-title">Gestionar Roles</h2>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Crear Roles</li>
          <li>Editar Roles</li>
          <li>Eliminar Roles</li>
        </ul>
        <a type="button" class="btn btn-lg btn-block btn-primary" href="{{ route('roles.index') }}">Ir a Roles</a>
      </div>
    </div>
  </div>
  </div>


  <div class="container">
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Permisos</h4>
        </div>
        <div class="card-body">
          <h2 class="card-title pricing-card-title">Gestionar Permisos</h2>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Crear Permisos</li>
            <li>Editar Permisos</li>
            <li>Eliminar Permisos</li>

          </ul>
          <a type="button" class="btn btn-lg btn-block btn-primary" href="{{ route('permisos.index') }}">Ir a Permisos</a>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Denunciantes</h4>
        </div>
        <div class="card-body">
          <h4 class="card-title pricing-card-title">Gestionar Denunciantes</h4>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Crear Denunciantes</li>
            <li>Editar Denunciantes</li>
            <li>Eliminar Denunciantes</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-primary">Ir a Denunciantes</button>
        </div>
      </div>
        <div class="card mb-4 shadow-sm">

      </div>
    </div>
    </div>


</div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>
