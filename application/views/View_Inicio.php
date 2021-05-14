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
</head>

<body>

  <div id="ImagenFondo">

    <div class="container-fluid">

      <div class="row">
        <nav class="navbar navbar-expand-lg " id="nav">
          <a class="navbar-brand" href="<?php echo base_url() ?>index.php/Inicio"><img src="<?php echo base_url() ?>Imagenes/FondoBlanco.png" alt="Logo Cielo Abierto" width="35" height="30"></a>
          <button class="navbar-toggler" style="color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span style="color: white;" class="navbar-toggler-icon">|||</span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item" id="ItemMenu">
                <a class="nav-link active" aria-current="page" role="button" data-bs-toggle="modal" data-bs-target="#RegistrateModal">REGISTRATE</a>
              </li>
              <li class="nav-item" id="ItemMenu">
                <a class="nav-link" href="#CONTACTO">CONTACTO</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <div class="row justify-content-center align-items-center">
        <!-- <div class="d-none d-sm-none d-md-block">Este texto solo visible para escritorio</div>
      <div class="d-block d-sm-block d-md-none">Este texto solo visible para smartphone</div> -->
        <div class="col-sm-12 col-md-8 col-lg-3" id="Formulario">

          <div class="text-center">
            <img src="<?php echo base_url() ?>Imagenes/LogoSinFondo2.png" width="80%" class="rounded img-fluid" alt="...">
          </div>


          <?php echo form_open(base_url().'index.php/Inicie_sesion/Inicio'); ?>

            <!--<form action="<?php echo base_url() ?>index.php/Inicie_sesion/inicio" method="post" data-ajax="false"> -->

            <div class="mb-3">
              <label for="exampleInputEmail1"  class="form-label">Usuario</label>
              <input type="text" required minlength="4" maxlength="10" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('usuario'); ?>" name="usuario" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" required minlength="8" maxlength="10" class="form-control" name="contrasena" value="<?php echo set_value('contrasena'); ?>" id="exampleInputPassword1">
            </div>
            <h6 style="color: white;"><?php echo validation_errors(); ?></h6>
            <?php
            if ($sms <> null) { ?>
              <small><?php echo $sms; ?></small>
            <?php } ?>

            <button type="submit" id="Ingresar" class="btn btn-danger btn-lg btn-block">Ingresar</button>

          </form>

   


          <!-- Button trigger modal -->
          <p id="Registrate">¿No tienes usuario? <a style="color: red;" role="button" data-bs-toggle="modal" data-bs-target="#RegistrateModal"> Registrate </a> </p>

          <div id="Olvidaste">
            <a role="button">¿Olvidaste tu contraseña? </a>
          </div>


          <!-- Modal -->
          <div class="modal fade" id="RegistrateModal" tabindex="-1" aria-labelledby="Registrate" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="Registrate">Registro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- <form action="<?php echo base_url() ?>index.php/Registro/Registro" method="post" data-ajax="false"> -->
                  <?php echo form_open(base_url().'index.php/Registro/Registro'); ?>
                  <h6 style="color: white;"><?php echo validation_errors(); ?></h6>
                    <div class="form-group">
                      <label>Correo electrónico</label>
                      <input type="email" minlength="11" maxlength="50" name="correo" required class="form-control" placeholder="Ejemplo: juantenjo@gmail.com">
                    </div>
                    <div class="form-group">
                      <label>Usuario</label>
                      <input type="Text"  minlength="5" maxlength="15" name="user" required class="form-control" placeholder="Ejemplo: JuanTenjo">
                    </div>
                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" minlength="8" maxlength="15" name="pass" required id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Ejemplo: juan423534 ">
                      <p></p>
                      <label>Confirmar Contraseña</label>
                      <input type="password" minlength="8" maxlength="15" name="passconfirm" required id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Confirmar Contraseña">
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Su contraseña debe tener entre 8 y 15 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales o emoji.
                        
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Genero</label>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="genero" id="customRadioInline1" value="Hombre" class="custom-control-input">
                        <label class="custom-control-label radio" for="customRadioInline1">Hombre</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="genero" id="customRadioInline2" value="Mujer" class="custom-control-input">
                        <label class="custom-control-label radio" for="customRadioInline2">Mujer</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Fecha de nacimiento</label>
                      <input type="date" name="fecha_nacimiento" name="fecha_nacimiento" max="3000-12-31" min="1900-01-01" class="form-control" required />
                    </div>

             

                    <button type="submit" class="btn btn-danger btn-lg btn-block shadow-none p-3 mb-5rounded">Registrate</button>
                  </form>

                </div>
              </div>
            </div>
          </div>

          <ul class="RedesSociales">
            <li><a href=""><img src="<?php echo base_url() ?>Imagenes/IconFace.png" class="rounded" alt="..."></a></li>
            <li><a href=""><img src="<?php echo base_url() ?>Imagenes/IconInst.png" class="rounded" alt="..."></a></li>
            <li><a href=""><img src="<?php echo base_url() ?>Imagenes/IconWha.png" class="rounded" alt="..."></a></li>
          </ul>
          <!-- Copyright -->

        </div>
      </div>

      <div class="row" id="Footer">
        <div id="Column" class="col-sm-6 col-md-6 col-lg-3">
          <h6 id="CONTACTO">CONTACTO</h6>
          <hr>
          <li><b>Lugar:</b> Guadalupe Huila</li>
          <li><b>Direccion:</b> Cra 31 # 51-60</li>
          <li><b>Telefono:</b> (+57) 3204519083</li>
          <li><b>Correo:</b> cieloabierto@gmail.com</li>
        </div>
        <div id="Column" class="col-sm-6 col-md-6 col-lg-3">
          <h6>¿QUE ENCONTRARAS?</h6>
          <hr>
          <li>Mira y descarga nuestra carta en el siguienet link:</li>
          <li><a target="_blank" style="color: black;background:orange;padding:4px" href="https://drive.google.com/file/d/10fjpOPStxIAc1WrNETfb1dUE4S6Oe1BQ/view?usp=sharing">Descargar Carga</a></li>
        </div>
        <div id="Column" class="d-none d-sm-none d-md-none d-lg-block col-lg-3 ">
          <h6>DISFRUTA</h6>
          <hr>
          <iframe width="300" height="200" src="https://www.youtube.com/embed/mFpvG80q1d8" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
        </div>
        <div id="Column" class="d-none d-sm-none d-md-none d-lg-block col-lg-3">
          <h6>ENCUENTRANOS</h6>
          <hr>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15949.300692271314!2d-75.7560455!3d2.0256185!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x79f0b1b78ff5a774!2sCIELO%20ABIERTO!5e0!3m2!1ses-419!2sco!4v1620225049603!5m2!1ses-419!2sco" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>


      <div class="row" id="Copyright">
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
          <a href="https://www.instagram.com/tenjo13/?hl=es-la"><i> JuanTenjo</i></a>
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
