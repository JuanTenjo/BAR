<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
  <title>Inicie Sesión</title>
</head>
<body>
  <style>
      *{
          font-family: 'Coming Soon', cursive;
        }
    .nav{
      background-color:black; 
    }
    .menu{
      text-align: center;
      
    }
    .imagen{
      margin: auto;
    }
    .imagen img{
      border-radius: 4%;
    }
  </style>
  <div class="container">
  <div class="menu">
    <header>
    <div style="margin:auto;">
      <nav class="navbar nav">
        <a class="btn btn-outline-warning" href="<?php echo base_url() ?>index.php/inicie_sesion/recarga_inicio" role="button" style="float:left"><b>Atras</b></a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
          <form action="<?php echo base_url() ?>index.php/inicie_sesion" data-ajax="false">
            <h5><span class="badge badge-success">Inicia Sesión!</span></h5>
          </form>
          </li>
        </ul>
      </nav>
    </div>
  </header><br>

  <div class="row">
  <div class="col-7 imagen" >
    <img src="<?php echo base_url() ?>imagenes/logo.png" alt="" class="img-fluid"  width="75%">
    <div class="formulario">
  <form action="<?php echo base_url() ?>index.php/inicie_sesion/inicio" method="post" data-ajax="false">
  <div class="form-group">
    <br><label for="exampleInputEmail1">Usuario</label>
    <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario" name="usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="contrasena">
  </div>
    <button type="submit" class="btn btn-success">Iniciar Sesion</button>
  </form>
  </div><br>
  <a href="<?php echo base_url() ?>index.php/inicie_sesion/olvidar_contra">Olvido su contraseña</a>
  </div>
  </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
