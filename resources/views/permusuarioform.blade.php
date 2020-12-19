<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Permisos de Usuario</title>
</head>
<body>
  @include('navbar')
  <div class="container themed-container">
  <div class="row mb-3">
    <div class="col-md-3 themed-grid-col"></div>
    <div class="col-md-6 themed-grid-col">
      <div class="container">
        <h1>Permisos de Usuario</h1>



          {{ Form::open(array('route' => ['refreshperm', $usuario->id_user]))  }}

          {{ Form::text('usuario_id', $usuario->id,['class' => 'form-control', 'hidden'])  }}

          <div class="form-group col-sm-12">
            {{ Form::label('nombre', 'Nombre:') }}
            {{ Form::text('nombre', $usuario->nombre,['class' => 'form-control', 'readonly'])  }}
          </div>
          <div class="form-group col-sm-12">
            {{ Form::label('apellido', 'Apellido:') }}
            {{ Form::text('apellido', $usuario->apellido,['class' => 'form-control', 'readonly'])  }}
          </div>

          <div class="form-group col-sm-12">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $usuario->email,['class' => 'form-control', 'readonly'])  }}
          </div>

          {{ Form::label('perms', 'Permisos asignados:') }}</br>
          {{ Form::label('perms', '(Marque los Permisos asignados si desea desvincularlos del Usuario)') }}

          @foreach($user_perms as $user_perms)

          <div class="form-group col-sm-12">

            {{ Form::checkbox('borrarPerms[]', $user_perms->name)  }}
            {{ Form::label('perms', $user_perms->display_name) }}
          </div>

          @endforeach

        </br>

          {{ Form::label('perms', ' Agregar Permisos:') }}

          @foreach($permisos as $permisos)

                    <div class="form-group col-sm-12">

                        {{ Form::checkbox('addPerms[]', $permisos->name)  }}
                        {{ Form::label('perms', $permisos->display_name) }}
                    </div>


          @endforeach

          <!-- Submit Field -->
          <div class="form-group col-sm-12">
            {{ Form::submit('Actualizar Permisos', ['class' => 'btn btn-primary']) }}
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
          </div>
          {{Form::close() }}

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
