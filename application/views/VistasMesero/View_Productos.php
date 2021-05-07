<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Imagenes/FondoNegro.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Style/StylesMesero/Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Productos</title>
</head>

<body>
    <div class="container-fluid">
        <?php

        $idzona = $Idzona;
        $zona = $NombreZona;
        $mesa = $Mesa;
        $Consecutivo = $Consecutivo;
        $mesero = $Mesero;
        $fecha_actual =  $Fecha;

        ?>

        <div class="row">
            <article class="col-12">
                <nav class="navbar nav2">
                    <ul class="nav justify-content-end" style="background-color: rgb(75, 75, 75);">
                        <li class="nav-item">
                            <a class="navbar-brand" href="<?php echo base_url() ?>index.php/Mesero/CargarPedido"><img src="<?php echo base_url() ?>Imagenes/FondoBlanco.png" alt="Logo Cielo Abierto" width="35" height="30"></a>
                        </li>
                        <li class="nav-item">
                            <p>Seleccionar Pedido</p>
                        </li>
                    </ul>
                </nav>
            </article>
        </div>

        <div class="row" id="bodyProductos">

            <article class="col-sm-12 col-md-12 col-lg-6">

                <?php if (isset($Productos)) { ?>

                    <h5>Despliega los productos por categoria.</h5>
                    <p></p>


                    <?php foreach ($Categorias->result() as $raw) { ?>

                        <a class="btn btn-primary btn-block " id="BotonCategoriaProductos" data-toggle="collapse" href="#Categoria<?php echo $raw->ID_Categoria ?>" role="button" aria-expanded="false" aria-controls="Categoria<?php echo $raw->ID_Categoria ?>">
                            <label id="NombreCate2"><?php echo ($raw->NombreCate); ?> ↓</label>
                        </a>

                        <div class="collapse" id="Categoria<?php echo $raw->ID_Categoria ?>">
                            <div class="card card-body">
                                <div class="table-responsive">
                                    <table class="table" id="TableCate" style="text-align: center;">

                                        <thead>
                                            <tr id="CabecerasCateProductos">
                                                <th scope="col">Producto</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Agregar</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($Productos->result() as $row) {
                                                if ($row->ID_Categoria == $raw->ID_Categoria) { ?>
                                                    <tr>
                                                        <form action="<?php echo base_url() ?>index.php/Mesero/RegistrarDetallePedido" method="post" data-ajax="false">
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" required name="NombreProduc" readonly="readonly" value="<?php echo ($row->NombreProducto) ?>" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" required name="Precio" readonly="readonly" value="<?php echo ($row->Precio) ?>" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" name="Cantidad" minlength="1" maxlength="2" min="1" max="2" value="1" pattern=[1-20]+ title="Un valor entre 1 y 20" required pattern="" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group" id="CentrarBotonEnTabla">
                                                                    <input type="hidden" name="Categoria" value="<?php echo ($raw->NombreCate); ?>">
                                                                    <input type="hidden" name="Consecutivo" value="<?php echo ($Consecutivo) ?>">
                                                                    <button type="submit" class="btn btn-success center-block"><img class="img-fluid" src="<?php echo base_url() ?>Imagenes/Agregar2.png" alt=""></button>
                                                                </div>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                <?php } //Fin del if 
                                                ?>
                                            <?php } //Fin del ciclo productos 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php } //Fin del ciclo categorias  
                    ?>

                <?php } else { ?>
                    <h5>No existen productos registrados</h5>
                    <p></p>
                <?php } ?>

            </article>

            <article class="col-sm-12 col-md-12 col-lg-6">
                <div id="pedido">
                    <hr>
                    <div id="tabla">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="row">Mesero: <?php echo $mesero; ?></th>
                                        <th scope="row">Mesa: <?php echo $mesa; ?></th>
                                        <th scope="row">Zona: <?php echo $zona; ?></th>
                                        <th scope="row">Pedido: <?php echo $Consecutivo; ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-hover  table-bordered">
                                <tr class="table-secondary">
                                    <th scope="row">Producto</th>
                                    <th scope="row">Precio</th>
                                    <th scope="row">Cantidad</th>
                                    <th scope="row">Total</th>
                                    <th scope="row">Eliminar</th>
                                </tr>
                                <?php
                                $total = 0;
                                if (empty($DetallePedido)) { ?>
                                    <p id="NoProduct">Este pedido aun no tiene productos registrados</p>
                                    <?php } else {
                                    foreach ($DetallePedido->result() as $row) {
                                    ?>
                                        <tr>
                                            <td scope="col"><?php echo ($row->producto); ?></td>
                                            <td scope="col"><?php echo ($row->precio); ?></td>
                                            <td scope="col"><?php echo ($row->cantidad); ?></td>
                                            <td scope="col"><?php echo ($row->total); ?></td>
                                            <?php $total = $total + ($row->total); ?>
                                            <form action="<?php echo base_url() ?>index.php/mesero/eliminarPedido" method="post" data-ajax="false">
                                                <input type="text" value="<?php echo ($row->iddetalle_pedidos); ?>" name="id" style="display: none;">
                                                <td scope="col"><button type="submit" class="btn btn-danger">Quitar</button></td>
                                            </form>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="opciones">
                    <h5> Total: <?php echo $total ?></h5>       
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-block" role="button" aria-pressed="true">Confirmar</a>

                </div>


            </article>

        </div>

        <div class="row" id="BotonSalir">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                    <a href="<?php echo base_url() ?>index.php/mesero/salir" class="btn btn-danger btn-block" role="button" aria-pressed="true">Salir</a>
                </div>
            </article>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Control de confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6> Confirmara este pedido, ¿Esta seguro? </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    <form action="<?php echo base_url() ?>index.php/mesero/confirmarPedido" method="POST" data-ajax="false">
                        <input type="text" value="<?php echo $Consecutivo ?>" name="num_pedido" style="display: none;">
                        <input type="text" value="<?php echo $mesa ?>" name="mesa" style="display: none;">
                        <input type="text" value="<?php echo $idzona ?>" name="idzona" style="display: none;">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function imprimir() {
            const elemento = document.getElementById('pedido');
            imprimirElemento(elemento);
        }

        /*  document.querySelector("#btnImprimir").addEventListener("click", function () {
          var div = document.querySelector("#imprimible");
          imprimirElemento(div);
          });*/

        function imprimirElemento(elemento) {
            var ventana = window.open('', 'PRINT', 'height=400,width=600');
            ventana.document.write('<html><head><title>' + document.title + '</title>');
            ventana.document.write('<LINK REL=StyleSheet HREF="<?php echo base_url() ?>Style/view_productos.css" '); //Aquí agregué la hoja de estilos
            ventana.document.write('</head><body >');
            ventana.document.write(elemento.innerHTML);
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.onload = function() {
                ventana.print();
                ventana.close();
            };
            return true;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>