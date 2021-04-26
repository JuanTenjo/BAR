<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
  <title>Administrador</title>
</head>

<body>
  <style>
    *{
      font-family: 'Coming Soon', cursive;
    }
    td {
      text-align: center;
    }

    th {
      text-align: center;
    }

    .salir {
      float: right;
    }

    .nav {
      background-color: #FFF9AD;
    }
  </style>
  <div class="container">
    <header>
      <div style="margin:auto;">
        <nav class="navbar nav">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <h2><b>Administrador</b></h2>
            </li>
          </ul>
        </nav>
      </div>
    </header><br>

    <div class="row">
      <article class="col-xs-6 col-sm-6 col-md-6">
        <form action="<?php echo base_url() ?>index.php/administrador/registrar_productos" method="post">
          <h5>Cree un nuevo producto <small>Facil y rapido</small></h5>
          <select name="tipo" id="tipo" class="form-control">
            <option value="false" disabled selected>Categoria</option>
            <?php foreach ($categorias->result() as $row) { ?>
              <option value="<?php echo ($row->nombre); ?>"><?php echo ($row->nombre); ?></option>
            <?php } ?>
          </select><br>
          <input type="text" class="form-control" maxlength="22" placeholder="Nombre Del Producto" name="nombre" class="form-control"><br>
          <input type="number" class="form-control" placeholder="Precio" name="precio" class="form-control"><br>
          <input type="submit" value="Guardar" class="btn btn-success">
          <button type="button" style="float:right;" class="btn btn-link" data-toggle="modal" data-target="#productos">
            Lista de productos
          </button>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="table table-bordered  table-hover">
                  <tr>
                    <th scope="row">Categoria</th>
                    <th scope="row">Producto</th>
                    <th scope="row">Eliminar</th>
                  </tr>
                  <?php foreach ($productos->result() as $row) { ?>
                    <form action="<?php echo base_url() ?>index.php/administrador/eliminarproducto" method="post" data-ajax="false">
                      <tr>
                        <input type="text" name="id" value="<?php echo ($row->id) ?>" style="display:none">
                        <td scope="col"><?php echo ($row->tipo); ?></td>
                        <td scope="col"><?php echo ($row->nombre); ?></td>
                        <td scope="col"><button type="submit" class="btn btn-danger">Eliminar</button></td>
                      </tr>
                    </form>
                  <?php } ?>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </article>
      <article class="col-xs-6 col-sm-6 col-md-6">
        <h5>Cree una categoria</h5>
        <form action="<?php echo base_url() ?>index.php/administrador/registrar_categoria" method="post">
          <input type="text" placeholder="Nombre de categoria" maxlength="22" name="nombreCategoria" class="form-control"><br>
          <button type="submit" class="btn btn-success">Guardar</button>
          <button type="button" style="float:right;" class="btn btn-link" data-toggle="modal" data-target="#categoria">
            Lista de categorias
          </button>
          <!-- Modal -->
          <div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Categorias</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table table-bordered  table-hover">
                    <tr>
                      <th scope="row">Categoria</th>
                      <th scope="row">Eliminar</th>
                    </tr>
                    <?php foreach ($categorias->result() as $row) { ?>
                      <form action="<?php echo base_url() ?>index.php/administrador/eliminarcategoria" method="post" data-ajax="false">
                        <tr>
                          <input type="text" name="id" value="<?php echo ($row->idcategorias) ?>" style="display:none">
                          <td scope="col"><?php echo ($row->nombre); ?></td>
                          <td scope="col"><button type="submit" class="btn btn-danger">Eliminar</button></td>
                        </tr>
                      </form>
                    <?php } ?>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </article>
    </div>
    <hr>
    <div class="row">
      <article class="col-xs-6 col-sm-6 col-md-6">
        <h5>Cree una zona</h5>
        <form action="<?php echo base_url() ?>index.php/administrador/agregarzona" method="post" data-ajax="false">
          <input type="number" name="id_zona" maxlength="10" placeholder="Digite un identificador a la zona" class="form-control" required />
          <small>Por favor, jamas repita el identificador de la zona y que sea menor a 11 digitos.</small>
          <input type="text" name="nombre" maxlength="22" placeholder="Nombre de la zona" class="form-control" required /><br>
          <input type="number" name="mesas" placeholder="Cantidad de mesas" class="form-control" required /><br>
          <input type="submit" value="Guardar" class="btn btn-success">
        </form>
      </article>
      <article class="col-xs-6 col-sm-6 col-md-6">
        <h5>Visualice, edite o elimine una zona</h5>
        <table class="table table-bordered   table-hover">
          <tr class="table-success" style="color:black;">
            <th scope="row">IdZona</th>
            <th scope="row">Nombre</th>
            <th scope="row"># Mesas</th>
            <th scope="row">Editar</th>
            <th scope="row">Eliminar</th>
          </tr>
          <?php foreach ($zonas->result() as $row) { ?>
            <tr>
              <form action="<?php echo base_url() ?>index.php/administrador/editarzonas" method="post">
                <td scope="col"><?php echo ($row->idzonas); ?></td>
                <td scope="col"><?php echo ($row->nombre); ?></td>
                <td scope="col"><input type="text" class="form-control" name="mesas" placeholder="<?php echo ($row->numerodemesas); ?>"></td>
                <td scope="col">
                  <input type="text" style="display:none;" name="id" value="<?php echo ($row->idzonas); ?>">
                  <input type="submit" value="Guardar" class="btn btn-success">
                </td>
              </form>
              <td scope="col">
                <form action="<?php echo base_url() ?>index.php/administrador/eliminarzona" method="post">
                  <input type="text" style="display:none;" name="id" value="<?php echo ($row->idzonas); ?>">
                  <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
              </td>
            </tr>
          <?php } ?>
        </table>
      </article>
    </div>
    <br>
    <div class="row">
      <article class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered table-dark table-striped  table-hover">
            <caption>Lista de usuarios</caption>
            <tr class="table-success" style="color:black;">
              <th scope="row">Correo</th>
              <th scope="row">Usuario</th>
              <th scope="row">Contraseña</th>
              <th scope="row">Genero</th>
              <th scope="row">Nacimiento</th>
              <th scope="row">Cargo</th>
              <th scope="row">Editar</th>
            </tr>
            <?php
            foreach ($usuario->result() as $row) { ?>
              <form action="<?php echo base_url() ?>index.php/inicie_sesion/modificar" method="post" data-ajax="false">
                <tr>
                  <td scope="col" style="display:none"><input type="text" value="<?php echo ($row->id); ?>" name="id" size="1" readonly="readonly"></td>
                  <td scope="col"><?php echo ($row->correo); ?></td>
                  <td scope="col"><?php echo ($row->user); ?></td>
                  <td scope="col"><?php echo ($row->pass); ?></td>
                  <td scope="col"><?php echo ($row->genero); ?></td>
                  <td scope="col"><?php echo ($row->fecha_nacimiento); ?></td>
                  <td scope="col"><?php echo ($row->nombre_rol); ?></td>
                  <td scope="col"><input type="submit" name="" value="Editar" class="btn btn-warning"></td>
                </tr>
              </form>
            <?php } ?>

          </table>
        </div>
      </article>
      <p>
    </div>
    <div class="row">
      <article class="col-xs-12 col-sm-12 col-md-12">
        <a href="<?php echo base_url() ?>index.php/administrador/salir" style="float:right;" class="btn btn-danger " role="button" aria-pressed="true">Salir</a>
      </article>
    </div><br>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
