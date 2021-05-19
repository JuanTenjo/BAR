<!Idoctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Imagenes/FondoNegro.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Style/StylesMesero/Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Seleccionar Mesa</title>
  </head>

  <body>

  <?php

    $mesero =$this->session->userdata('USUARIO');

  ?>

    <div class="container-fluid">
      <div class="row">
        <article class="col-12">
          <nav class="navbar nav">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a class="navbar-brand" href="<?php echo base_url() ?>index.php/Inicie_sesion/Carga_mesero"><img src="<?php echo base_url() ?>Imagenes/FondoBlanco.png" alt="Logo Cielo Abierto" width="35" height="30"></a>
              </li>
              <li class="nav-item">
                <p>Seleccionar mesa</p>
              </li>
            </ul>
          </nav>
        </article>
      </div>

      <div class="row">
        <article class="col-12" id="ZonasMesas">
          <?php

          foreach ($zonas->result() as $row) {

          ?>

            <div class="alert" id="BarraZonas" role="alert">
              <p>Zona <?php echo ($row->nombre); ?></p>
            </div>
            <div id="Mesas">
              <?php
              foreach ($mesas->result() as $col) {
                if ($row->idzonas == $col->idzonas) {
                  if ($col->numpedido == 0) {
              ?>
                    <form action="<?php echo base_url() ?>index.php/Mesero/RegistrarPedido" method="post" data-ajax="false" style="display:inline">
                      <input type="text" name="zona" value="<?php echo ($row->nombre); ?>" style="display:none" />
                      <input type="text" name="idzona" value="<?php echo ($row->idzonas); ?>" style="display:none" />
                      <input type="text" name="mesa" value="<?php echo $col->nummesa ?>" style="display:none" />
                      <input type="hidden" name="mesero" value="<?php echo  $mesero ?>" style="display:none" />
                      <button type="submit" class="btn btn-outline-success" id="BotonMesa">Mesa <b><?php echo $col->nummesa ?></b>: Disponible</button>
                    </form>

                  <?php
                  } else {
                  ?>
                   <form action="<?php echo base_url() ?>index.php/Mesero/ModificarPedido" method="post" data-ajax="false" style="display:inline">
                      <input type="text" name="zona" value="<?php echo ($row->nombre); ?>" style="display:none" />
                      <input type="text" name="idzona" value="<?php echo ($row->idzonas); ?>" style="display:none" />
                      <input type="text" name="mesa" value="<?php echo $col->nummesa ?>" style="display:none" />
                      <input type="text" name="Consecutivo" value="<?php echo $col->numpedido ?>" style="display:none" />
                      <button type="submit" class="btn btn-outline-danger" id="BotonMesa">Mesa <b><?php echo $col->nummesa ?></b>: Ocupada</button>
                    </form>
              <?php
                  }
                }
              }
              ?>
            </div>
            <hr>
          <?PHP
          }
          ?>

        </article>
      </div>

      <div class="row">
        <article class="col-12">
          <a role="button" class="btn btn-danger btn-block" href="<?php echo base_url() ?>index.php/Mesero/Salir">Cerrar Sesión</a>
        </article>
      </div>

    </div>
    <script type="text/javascript">

      // function actualizar() {
      //   location.reload(true);
      // }
      // //Función para actualizar cada 10 segundos(10000 milisegundos)
      // setInterval("actualizar()", 10000);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>
