<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Editar</title>
  </head>
  <body>
      <div class="container">
        <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12">
        <div class="alert alert-warning" role="alert" style="width:100%;">
          <h3><b>Editar o eliminar Registro</b></h3>
        </div>
        </article>
        <article class="col-xs-12 col-sm-7 col-md-7">
        <form action="<?php echo base_url() ?>index.php/inicie_sesion/modificar_registro" method="POST" data-ajax="false">
        <fieldset>
        <legend>Usuario</legend>
        <input type="text"  class="form-control" name="usuario" value="<?php echo $usuario; ?>" style="max-width:30%;">
        </fieldset>
        <fieldset>
        <legend>Correo</legend>
        <input type="email" class="form-control" name="correo" value="<?php echo $correo; ?>" style="max-width:30%;">
        </fieldset>
        <legend>Genero</legend>
        <select name="genero" id="rol" class="form-control">
            <option value="<?php echo $genero; ?>"selected>ACTUAL: <?php echo $genero; ?></option>
            <option value="Mujer">Mujer</option>
            <option value="Hombre">Hombre</option>
        </select>
        </fieldset>
        <legend>Fecha de nacimiento</legend>
        <input type="date" class="form-control" name="fecha" value="<?php echo $fecha_nacimiento; ?>" style="max-width:30%;">
        </fieldset>
        <fieldset>
        <legend>Contraseña</legend>
        <input type="password" class="form-control" name="contrasena" value="<?php echo $contrasena; ?>" style="max-width:30%;">
        </fieldset>
        <fieldset>
        <legend>Rol</legend>
        <select name="rol" id="rol" class="form-control">
            <option value="<?php echo $id_rol; ?>"selected>ACTUAL: <?php echo $nombre_rol; ?></option>
            <option value="2">Administrador</option>
            <option value="3">Mesero</option>
            <option value="4">Facturador</option>
        </select>
        </fieldset>
        <input type="number" name="id" value="<?php echo $id; ?>" style="display:none"><br>
        <input type="submit" value="Modificar"  class="btn btn-success">
        </form>
        <form action="<?php echo base_url() ?>index.php/inicie_sesion/eliminar_registro" method="POST" data-ajax="false">
        <input type="number" name="id" value="<?php echo $id; ?>" style="display:none"><br>
        <input type="submit" value="Eliminar" class="btn btn-danger">
        </form><br>
        </article>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>