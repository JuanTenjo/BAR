<!Idoctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
    <title>Elige una mesa</title>
  </head>

  <body>
    <style>
      * {
        font-family: 'Coming Soon', cursive;
      }
    </style>
    <div class="container-fluid">
      <div class="row">
        <article class="col">

        </article>
      </div><br>
    </div>
    <div class="container-fluid">
      <div class="row">



      <article class="col-sm-12 col-md-12 col-lg-12">
      <div style="margin:auto;">
            <nav class="navbar nav" style="background-color: #2B4E8C; color:white">
              <ul class="nav justify-content-end">
                <li class="nav-item">
                  <h2><b>Selecciona la mesa</b></h2>
                </li>
              </ul>
            </nav>
          </div><br>
      </article> 
  
        <article class="col-sm-12 col-md-12 col-lg-12">

          <?php
          $pedido = rand(1, 9999);
          foreach ($zonas->result() as $row) {

            //$row->idzonas;
          ?>


            <div class="alert alert-primary" role="alert">
              <h3>Zona: <?php echo ($row->nombre); ?></h3>
            </div>

            <?php
            foreach ($mesas->result() as $col) {
              if ($row->idzonas == $col->idzonas) {
                if ($col->numpedido == 0) {
                  $pedido = rand(1, 9999);
            ?>

                  <form action="<?php echo base_url() ?>index.php/mesero/mesa" method="post" data-ajax="false" style="display:inline">
                    <input type="text" name="zona" value="<?php echo ($row->nombre); ?>" style="display:none" />
                    <input type="text" name="idzona" value="<?php echo ($row->idzonas); ?>" style="display:none" />
                    <input type="text" name="mesa" value="<?php echo $col->nummesa ?>" style="display:none" />
                    <input type="number" name="pedido" value="<?php echo $pedido ?>" style="display:none" />
                    <input type="text" name="estado" value="0" style="display:none" />
                    <!--<img src="<?php echo base_url() ?>imagenes/Disponible.png" width="5%">-->
                    <button type="submit" class="btn btn-outline-success" style="margin:0.5%;">Mesa: <?php echo $col->nummesa ?> Disponible</button>
                  </form>
                    
                <?php
                } else {
                ?>

                  <form action="<?php echo base_url() ?>index.php/mesero/mesa" method="post" data-ajax="false" style="display:inline">
                    <input type="text" name="zona" value="<?php echo ($row->nombre); ?>" style="display:none" />
                    <input type="text" name="idzona" value="<?php echo ($row->idzonas); ?>" style="display:none" />
                    <input type="text" name="mesa" value="<?php echo $col->nummesa ?>" style="display:none" />
                    <input type="number" name="pedido" value="<?php echo $col->numpedido ?>" style="display:none" />
                    <input type="text" name="estado" value="1" style="display:none" />
                    <!--<img src="<?php echo base_url() ?>imagenes/Ocupada.png" width="5%">-->
                    <button type="submit" class="btn btn-outline-danger" style="margin:0.5%; ">Mesa: <?php echo $col->nummesa ?> Ocupada</button>
                  </form>

            <?php
                }
              }
            }
            ?>
          <hr>

          <?PHP

          }
          ?>

        </article>
      </div>

      <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12">
          <a role="button" class="btn btn-block btn-danger" href="<?php echo base_url() ?>index.php/mesero/salir">Salir</a>
        </article>
      </div>
    </div><br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>