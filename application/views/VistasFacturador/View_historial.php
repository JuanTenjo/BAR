<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
    <title>Facturacion</title>
</head>
<style>
    * {
        font-family: 'Coming Soon', cursive;
    }

    .nav {
        background-color: 'red';
    }

    .pedidos tr {
        text-align: center;
    }

    .pedidos input {
        width: 40%;
    }

    .operaciones {
        background-color: #A2ADB8;
        padding: 12px;
        text-align: center;
    }

    .operaciones input {
        width: 100%;
    }

    .correcto {
        background-color: #79B849;
        color: white;
    }

    .incorrecto {
        background-color: #D82B2B;
        color: white;
    }

    .tablaDetalle td {
        height: 20px;
    }

    .nav {
        padding: 10px;
    }

    .menu a {
        background-color: transparent;
        text-align: center;
        padding: 10px;
        color: black;
        text-decoration: none;
        border-radius: 8px;
    }

    .menu a:hover {
        background-color: royalblue;
        color: white;
        text-decoration: none;
    }

    .menu .salir:hover {
        background-color: #D82B2B;
        color: white;
        text-decoration: none;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="toast correcto" style="position: absolute; top: 0; right: 0;" data-delay="20000">
                    <div class="toast-header">
                        <img src="<?php echo base_url() ?>index.php/../imagenes/logo.png" width="12%" height="15%" class="rounded mr-2" alt="...">
                        <strong class="mr-auto">Craft Burger</strong>

                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Pedido facturado correctamente!
                    </div>
                </div>
                <div class="toast incorrecto" style="position: absolute; top: 0; right: 0;" data-delay="20000">
                    <div class="toast-header">
                        <img src="<?php echo base_url() ?>index.php/../imagenes/logo.png" width="12%" height="15%" class="rounded mr-2" alt="...">
                        <strong class="mr-auto">Craft Burger</strong>

                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Pedido facturado incorrectamente!
                    </div>
                </div>

                <nav class="navbar navbar-light ">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url() ?>index.php/../imagenes/logo.png" width="10%" height="10%" class="d-inline-block align-top" alt="" loading="lazy">
                        Craft Burger
                    </a>
                    <div class="menu">
                        <a href="<?php echo base_url() ?>index.php/facturacion/MostrarVistaFacturador" role="button"><b>Facturar</b></a>
                        <a href="<?php echo base_url() ?>index.php/facturacion/pendientes" role="button"><b>Pendientes</b></a>
                        <a href="<?php echo base_url() ?>index.php/facturacion/historial" role="button"><b>Historial</b></a>
                        <a href="<?php echo base_url() ?>index.php/facturacion/Salir" class="salir" role="button"><b>Salir</b></a>
                    </div>
                </nav>


            </div>
        </div><br>
    </div>

    <div class="container-fluid">
        <div class="row pedidos">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">


                <h4>Historial de Pedidos</h4><br>
                <a  href="<?php echo base_url() ?>index.php/facturacion/historial">Borrar Filtros</a>
                <table class="table  table-hover table-bordered">
              
                    <caption>Pedidos encontrados: </caption>
                    <thead>
                    <form action="<?php echo base_url() ?>index.php/facturacion/Filtros" method="POST" data-ajax="false">
                        <tr>
                            <th colspan="4" scope="col">Filtrar Por Numero de Pedido</th>
                            </th>
                            <th scope="col"><input type="number" placeholder="#" name="numpedido"></th>
                            <input type="text" value="1" name="tipodefiltro" style="display: none;">
                            <th scope="col"><button type="submit" class="btn btn-success">Filtrar</button> </th>
                        </tr>
                    </form> 
                    <form action="<?php echo base_url() ?>index.php/facturacion/Filtros" method="POST" data-ajax="false">
                        <tr>
                            <th colspan="1" scope="col">Filtrar</th>
                            </th>
                            <th scope="col">Desde</th>
                            <th scope="col"><input style="width: 100%;" type="date"  name="fechainicial"></th>
                            <th scope="col">Hasta</th>
                            <th scope="col"><input style="width: 100%;" type="date"  name="fechafinal"></th>
                            <input type="text" value="2" name="tipodefiltro" style="display: none;">
                            <th scope="col"><button type="submit" class="btn btn-success">Filtrar</button> </th>
                        </tr>
                    </form>

                        <tr>
                            <th scope="col">Pedido</th>
                            <th scope="col">Mesero</th>
                            <th scope="col">Mesa</th>
                            <th scope="col">Zona</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if (empty($pedidos)) {
                            echo "No tiene pedidos";
                        } else {


                            foreach ($pedidos->result() as $col) {
                        ?>
                                <form action="<?php echo base_url() ?>index.php/facturacion/MostrarDetalleHistorial" method="POST" data-ajax="false">
                                    <tr>
                                        <input type="text" name="num_pedido" value="<?php echo ($col->num_pedido); ?>" style="display:none">
                                        <td>
                                            <p><?php echo ($col->num_pedido); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($col->mesero); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($col->mesa); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($col->zona); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($col->fecha); ?></p>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">
                                                Detalle
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                        <?php    }
                        } ?>

                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h4>Detalle Pedido</h4><br>
                <table class="table table-bordered  table-hover tablaDetalle">
                    <thead>
                        <tr>
                            <th scope="col">Pedido</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="<?php echo base_url() ?>index.php/facturacion/facturarFacturasPendientes" method="POST" data-ajax="false">
                            <?php
                            $num_factura = 0;
                            if (empty($detallePedidos)) {
                                echo "Selecciona un pedido para mostrar su detalle";
                                $total = 0;
                            } else {
                                $total = 0;
                                foreach ($detallePedidos->result() as $row) {
                                    $total = $total +  ($row->total)
                            ?>
                                    <tr>
                                        <td>
                                            <p><?php echo ($row->num_pedido); ?></p>
                                        </td>

                                        <td>
                                            <p><?php echo ($row->producto); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($row->tipo); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($row->cantidad); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($row->precio); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo ($row->total); ?></p>
                                        </td>
                                    </tr>
                                    <input type="text" name="num_pedido" value="<?php echo ($row->num_pedido); ?>" style="display:none;">
                    </tbody>
            <?php }
                            } ?>
                </table>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>