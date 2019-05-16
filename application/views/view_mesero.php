<!Idoctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url()?>css/diseno-mesero.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Elige una mesa</title>
  </head>
  <body>
  <div class="container">
    <header style="background:#B40404; width:100%;">
    <div class="row">
      <div class="col-md-12 " style="margin:3%">
        <h2 style="color:white;text-aling:center;">Por favor elige una mesa</h2>
      </div>
    </div>
    </header>
  </div>
    <div class="container">
      <div class="main">
            <table style="margin:0 auto;">
            <tr>
              <td><a href="<?php echo base_url()?>index.php/mesero/mesa?mesa=1"><img src="<?php echo base_url()?>imagenes/mesa.gif" value="mesa1"> </a><h4><b>Mesa 1</b></h4></td>
              <td><a href="<?php echo base_url()?>index.php/mesero/mesa?mesa=2"><img src="<?php echo base_url()?>imagenes/mesa.gif" value="mesa2"> </a><h4><b>Mesa 2</b></h4></td>
            </tr>
            <tr>
              <td><a href="<?php echo base_url()?>index.php/mesero/mesa?mesa=3"><img src="<?php echo base_url()?>imagenes/mesa.gif" value="mesa3"> </a><h4><b>Mesa 3</b></h4></td>
              <td><a href="<?php echo base_url()?>index.php/mesero/mesa?mesa=4"><img src="<?php echo base_url()?>imagenes/mesa.gif" value="mesa4"> </a><h4><b>Mesa 4</b></h4></td>
            </tr>
            <tr>
              <td><a href="<?php echo base_url()?>index.php/mesero/mesa?mesa=5"><img src="<?php echo base_url()?>imagenes/mesa.gif" value="mesa5"> </a><h4><b>Mesa 5</b></h4></td>
              <td><a href="<?php echo base_url()?>index.php/mesero/mesa?mesa=6"><img src="<?php echo base_url()?>imagenes/mesa.gif" value="mesa6"> </a><h4><b>Mesa 6</b></h4></td>
            </tr>
          </table>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>