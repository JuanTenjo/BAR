<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Se esta cargar la vista nav</title>
</head>
<body>   
<style>
  body{
    background-color:#E5E7E9;
  }
  .formulario{
    background-color: #FFFFFF;
  }
  nav{
    background-color: #000;
  }
</style>

<div class="container-fluid">
  <header>
    <div style="margin:auto;">
      <nav class="navbar nav">
        <a class="btn btn-outline-warning" href="<?php echo base_url() ?>index.php/inicie_sesion/recarga_inicio" role="button" style="float:left"><b>Inicio</b></a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
          <a href="<?php echo base_url() ?>index.php/inicie_sesion" class="btn btn-outline-primary" role="button" aria-pressed="true">Iniciar Sesion</a>
          <a href="<?php echo base_url() ?>index.php/nueva_tienda/crear_nueva_tienda" class="btn btn-outline-primary" role="button" aria-pressed="true">Crear Adminitracion de tienda</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>




