<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Imagenes/FondoNegro.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Style/StyleInicio.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
	<title>Inicio</title>
  <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
  <title>Inicio</title>
</head>
<style>

  body{
    background-color:#E5E7E9;
  }
  .formulario{
    background-color: #FFFFFF;
  }
  nav{
    background-color: black;
  }
  .boton{
    background-color: #576aff;
    color:blanchedalmond;
  }
  label{
    font-weight: bold;
  }
  .radio{
    font-weight: lighter;
  }
  .imagen{
    margin:auto;
    margin-top: 20%;
  }
  img{
    border-radius: 3%;
  }
</style>
<body>
<div id="ImagenFondo" class="div">


  
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<div class="container-fluid">
						<a class="navbar-brand" href="<?php echo base_url() ?>index.php/Inicio"><img src="<?php echo base_url() ?>Imagenes/FondoNegro.png" alt="Logo Cielo Abierto" width="40" height="34"></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>index.php/Administrador/Productos">Productos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Categorias">Categorias</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Mesas" tabindex="-1" aria-disabled="true">Zonas y mesas</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Usuarios" tabindex="-1" aria-disabled="true">Usuarios</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Salir" tabindex="-1" aria-disabled="true">Salir</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>

  <!-- <div class="container">
  <header>
    <div style="margin:auto;">
      <nav class="navbar nav">
        <a class="btn btn-outline-primary" href="<?php echo base_url() ?>index.php/inicie_sesion/recarga_inicio" role="button" style="float:left"><b>Inicio</b></a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
          <a href="<?php echo base_url() ?>index.php/inicie_sesion" class="btn btn-outline-primary" role="button" aria-pressed="true">Administrar Tienda</a>

          </li>
        </ul>
      </nav>
    </div>
  </header><br>
  <div class="row"> -->

  <div class="main">
    <div class="container">
      <div class="row">
      <article class="col-xs-6 col-sm-6 col-md-6" style="align-content: center; display: flex; align-items: center">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;" >
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo base_url() ?>imagenes/logo.png	" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="<?php echo base_url() ?>imagenes/logo.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="<?php echo base_url() ?>imagenes/logo.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      </article>
      <article class="col-xs-6 col-sm-6 col-md-6 formulario">
        <br>
          <form action="<?php echo base_url() ?>index.php/registro/registro" method="post" data-ajax="false">
            <div style="max-width:80%;margin:auto">
            <div class="form-group"> 
              <label >Correo electrónico</label>
              <input type="email" minlength="11" maxlength="50" name="correo" required class="form-control" placeholder="Ejemplo: juantenjo@gmail.com">
            </div>
            <div class="form-group">
              <label >Usuario</label>
              <input type="Text" minlength="5" maxlength="50" name="user" required class="form-control" placeholder="Ejemplo: JuanTenjo">
            </div>
            <div class="form-group">
              <label >Contraseña</label>
              <input type="password" minlength="8" maxlength="20" name="pass" required  id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Ejemplo: juan423534 ">
              <small id="passwordHelpBlock" class="form-text text-muted">
              Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales o emoji.
              </small>
            </div>
            <div class="form-group">
            <label>Genero</label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="genero" id="customRadioInline1" value="Hombre" class="custom-control-input">
              <label class="custom-control-label radio" for="customRadioInline1">Hombre</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="genero" id="customRadioInline2" value="Mujer"  class="custom-control-input">
              <label class="custom-control-label radio" for="customRadioInline2">Mujer</label>
            </div>
            </div>
            <div class="form-group">
            <label>Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" name="fecha_nacimiento" max="3000-12-31" 
             min="1900-01-01" class="form-control" required />
          </div>
             <button type="submit" class="btn boton btn-lg btn-block shadow-none p-3 mb-5rounded">Registrate</button>
            </div>
          </form><br>
      </article>
      </div>
      <div class="row">
          <footer>
            <p><i>©JuanPimentel</i></p>
          </footer>
      </div>
    </div>
  </div>   
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
