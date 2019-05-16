<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Inicie Sesion</title>
</head>
<body>

  <div class="row">


  <div class="col-12 col-sm-4 col-lg-4">

  </div>
  <div class="col-12 col-sm-4 col-lg-4">
  <center>
      <div class="col-12">
        <iframe src="https://giphy.com/embed/dGyzYOvRPn21y" width="350" height="326" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
    </div>
  <form action="<?php echo base_url() ?>index.php/inicie_sesion/inicio" method="post" data-ajax="false">
    <div class="form-group">
      <label for="exampleInputEmail1">Usuario</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ingrese usuario" name="usuario">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="contrasena">
    </div>
    <button type="submit" class="btn btn-success">Iniciar Sesion</button>
  </form>
  <br> <a href="<?php echo base_url() ?>index.php/inicie_sesion/olvidar_contra">Olvido su contraseña</a>
  </div>
  <div class="col-12 col-sm-4 col-lg-4">

  </div>
</center>
    </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
