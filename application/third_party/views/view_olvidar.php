<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Olvidar</title>
  </head>
  <body>
    <form class="" action="<?php echo base_url()?>index.php/inicie_sesion/cambia_contra" method="post" data-ajax="false">
      <input type="text"  placeholder="ingrese usuario" name="usuario"><br>
      <input type="text" name="nueva_con" value="" placeholder="Ingrese contraseña nueva">
      <input type="text" name="con_contra" value="" placeholder="Confirme Contraseña"><br>
      <button type="submit" name="boton" >Actualizar</button>
    </form>

  </body>
</html>
