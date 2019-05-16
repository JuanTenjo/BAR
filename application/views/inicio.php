<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>CraftBurguer</title>
  <link rel="stylesheet" href="css/disenoo.css" data-ajax="false">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Jquerymobile/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Jquerymobile/jquery.mobile.icons-1.4.5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Jquerymobile/jquery.mobile.structure-1.4.5.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>Jquerymobile/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>Jquerymobile/jquery.mobile-1.4.5.js"></script>
</head>
<body>
  <!-- INICIO__________________________________________________________________________________________________-->
  <div data-role="page" id="inicio">
    <div data-role="header" style="background-color:#000">
      <a href="#inicio.php" data-icon="home">Inicio</a>
      <h1><a href="#inicio.php"><img src="imagenes/logo.jpg" height=200px></a></h1>
      <a href="<?php echo base_url() ?>index.php/inicie_sesion" data-icon="user" data-ajax=false>Inicie Sesión</a>
      <div data-role="navbar">
        <ul>
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#registro">Registro</a></li>
        </ul>
      </div>
    </div>
    <div data-role="main" style="background-image:url('imagenes/fondo.jpg');width:100%;height:400px";>
      <h1><img style="margin:10px;float:left"; src="imagenes/presentacion1.png" ></h1>
      <center>
        <br><br><br><br>
        <div class="textocentral">

          <h2 style="width:90%";>Bienvenido a Craft Burger<br>Entra y registrate<br> para ser parte de nuestra empresa</h2>

        </div>
      </center>
    </div>
    <div data-role="footer"  style="background-image:url('imagenes/fondo.jpg');width:100%;height:200px";>
      <div class="columnas">

        <h3>Informacion</h3>
        <h3>Contacto</h3>
        <h3>Ubicacion</h3>
      </div>
      <div class="columnas2">
        <p style="background-color:#000; box-shadow:1px 2px 1px orange">Craft Burguer es una empresa local de
          <br>de Guadalupe(HUILA), con gran<br>
          corazon quiere llegar a ustedes</p>
          <p style="background-color:#000; box-shadow:1px 2px 1px orange" ><i>Correo:</i> CraftBurguer@gmail.com
            <br><i>Celular:</i>3204519083<br></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1993.6618987355012!2d-75.75640011651595!3d2.0261772998153673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e251e5ea3307bc9%3A0xc5c53c533214939a!2sCra.+4+%234-111+a+4-1%2C+Guadalupe%2C+Huila!5e0!3m2!1ses!2sco!4v1552626675686" width="250" height="130" frameborder="0" style="border:2" allowfullscreen></iframe>
          </div>

        </div>
      </div>
      <!-- REGISTRO__________________________________________________________________________________________________-->
      <div data-role="page" id="registro">
        <div data-role="header" style="background-color:#000">
          <a href="#inicio.php" data-icon="home">Inicio</a>
          <h1><a href="#inicio.php"><img src="imagenes/logo.jpg" height=200px></a></h1>
          <a href="<?php echo base_url() ?>index.php/inicie_sesion" data-ajax=false data-icon="user">Inicie Sesión</a>
          <div data-role="navbar">
            <ul>
              <li><a href="#inicio">Inicio</a></li>
              <li><a href="#registro">Registro</a></li>
            </ul>
          </div>
        </div>
        <div data-role="main" style="background-image:url('imagenes/fondo.jpg');width:100%;height:400px";>
          <div class="iu-content">
            <form class="" action="<?php echo base_url() ?>index.php/registro/registro" method="post" data-ajax="false">
              <fieldset>
                <legend><h2 style="color:orange; font-size:150%; text-align: center;">REGISTRATE</h2></legend>
              <input type="text" name="user" value="" placeholder="usuario" required >
              <br>
              <input type="password" name="pass" value="" placeholder="contraseña" required >
              <small style="color:#fff">Nunca compartiremos su informacion con alguien mas </small>
              <br>
              <input type="checkbox" name="checkbox-mini-0" id="checkbox-mini-0" data-mini="true" name="terminos" required>
              <label for="checkbox-mini-0">Aceptar</label> <a href="#terminos" data-ajax=false>Terminos y condiciones</a>
              <button type="submit" class="ui-btn ui-btn-b" name="action">REGISTRARSE</button>
            </fieldset>
            </form>
          </div>
        </div>
        <div data-role="footer" style="background-image:url('imagenes/fondo.jpg');width:100%;height:200px";>
          <div class="columnas">

            <h3>Informacion</h3>
            <h3>Contacto</h3>
            <h3>Ubicacion</h3>
          </div>
          <div class="columnas2">
            <p style="background-color:#000; box-shadow:1px 2px 1px orange">Craft Burguer es una empresa local de
              <br>de Guadalupe(HUILA), con gran<br>
              corazon quiere llegar a ustedes</p>
              <p style="background-color:#000; box-shadow:1px 2px 1px orange" ><i>Correo:</i> CraftBurguer@gmail.com
                <br><i>Celular:</i>3204519083<br></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1993.6618987355012!2d-75.75640011651595!3d2.0261772998153673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e251e5ea3307bc9%3A0xc5c53c533214939a!2sCra.+4+%234-111+a+4-1%2C+Guadalupe%2C+Huila!5e0!3m2!1ses!2sco!4v1552626675686" width="250" height="130" frameborder="0" style="border:2" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div data-role="page" id="terminos">
              <div data-role="main">
                <h1>Terminos y condiciones</h1>
                <p style="tex-align:justify; margin:10px,10px,10px;"> En el presente documento se exhiben los términos y condiciones de nuestros servicios bajo los cuales CraftBurguer realizará la prestación de sus servicios. Todo contratista (descrito más abajo como “el cliente”, “usted” y “el usuario”)
                  deberá aceptarlos antes de adquirir cualquiera de nuestros servicios:
                  CraftBurguer (descrito más abajo como “la empresa”, “nuestro”, y “nosotros”) es una empresa de servicios de Web hosting, software,
                  publicidad y afines. Todas las cuentas en nuestros servidores Web así como todos los servicios presentes y futuros incluyendo solo dominio,
                  hospedajes personalizados, revendedor y cuentas revendidas, están sujetas a los términos y a las condiciones descritas en este documento.
                  Bajo los términos de este acuerdo el cliente acepta haber leído, entendido, y aceptado sin restricción alguna todos los términos y condiciones
                  que nosotros exponemos en el siguiente documento.</p>
              </div>
        </body>
        </html>
