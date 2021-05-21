<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Imagenes/FondoNegro.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Style/StylesFacturador/Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
    <title>Facturacion</title>
</head>
<style>

</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="<?php echo base_url() ?>index.php/facturacion/Facturador"><img src="<?php echo base_url() ?>Imagenes/FondoBlanco.png" alt="Logo Cielo Abierto" width="40" height="34"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="<?php echo base_url() ?>index.php/facturacion/Facturador">Pagar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>index.php/facturacion/historial" tabindex="-1" aria-disabled="true">Ventas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>index.php/facturacion/historial" tabindex="-1" aria-disabled="true">Cierre de caja</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>index.php/facturacion/Salir" tabindex="-1" aria-disabled="true">Salir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="row pedidos">

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

                <h4>Pedidos Actuales</h4>


                <?php
                if (empty($pedidos)) {
                    echo "No hay ninguna mesa con pedido aun";
                }else{                
                foreach ($zonas->result() as $row) {
                ?>
                    <div class="alert" id="BarraZonas" role="alert">
                        <p>Zona <?php echo ($row->nombre); ?></p>
                    </div>


                    <div id="MesasFere">

                        <?php

                        foreach ($mesas->result() as $col) {
                            if ($row->idzonas == $col->idzonas) {
                                if ($col->numpedido <> 0) {
                        ?>

                                    <form action="<?php echo base_url() ?>index.php/Facturacion/MostrarDetalle" method="post" data-ajax="false">
                                        <input type="hidden" name="zona" value="<?php echo ($row->nombre); ?>" />
                                        <input type="hidden" name="idzona" value="<?php echo ($row->idzonas); ?>" />
                                        <input type="hidden" name="mesa" value="<?php echo $col->nummesa ?>" />
                                        <input type="hidden" name="Consecutivo" value="<?php echo $col->numpedido ?>" />
                                        <div class="card" id="Card">
                                            <button type="submit" id="BotonMesa"> <img src="<?php echo base_url() ?>Imagenes/MesaActiva.png" class="card-img-top" alt="..."></button>
                                            <div class="card-body" id="NumeroDeMesaCardBody">
                                                <h5 class="card-title">MESA <?php echo $col->nummesa ?></h5>
                                            </div>
                                            <div class="card-body" id="InformacionMesaOcupada">
                                                <h5 class="card-title"><?php echo $col->mesero ?></h5>
                                            </div>
                                            <div class="card-body" id="InformacionMesaOcupada">
                                                <button type="button" style="font-size: 10px;" ><img src="<?php echo base_url() ?>Imagenes/Factura.png" alt="">Comanda</button>
                                            </div>
                                        </div>
                                    </form>

                                <?php
                                }
                                ?>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>

                <?PHP
                }}
                ?>
                <!-- <div class="table-responsive">
                    <table id="tableFacturacion" class="table table-hover">

                        <caption>Lista de pedidos sin pagar con la fecha actual y los modificados en la fecha actual.</caption>
                        <thead>
                            <tr>
                                <th scope="col">Pedido</th>
                                <th scope="col">Mesero</th>
                                <th scope="col">Mesa</th>
                                <th scope="col">Zona</th>
                                <th scope="col">Hoy</th>
                                <th scope="col">Modificado</th>
                                <th scope="col">Por</th>
                                <th scope="col">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (empty($pedidos)) {
                                echo "No se ha  registrado pedidos hoy";
                            } else {


                                foreach ($pedidos->result() as $col) {

                            ?>
                                    <form action="<?php echo base_url() ?>index.php/Facturacion/MostrarDetalle" method="POST" data-ajax="false">
                                        <tr>
                                            <input type="text" name="num_pedido" value="<?php echo ($col->num_pedido); ?>" style="display:none">
                                            <td>
                                                <?php echo ($col->num_pedido); ?>
                                            </td>
                                            <td>
                                                <?php echo ($col->mesero); ?>
                                            </td>
                                            <td id="ColumMesa">
                                                <?php echo ($col->mesa); ?>
                                            </td>
                                            <td>
                                                <?php echo ($col->nombreZona); ?>
                                            </td>
                                            <td id="ColumDate">
                                                <div id="ColumDate"> <?php echo ($col->fecha); ?></div>
                                            </td>
                                            <td id="ColumDate">
                                                <div id="ColumDate"><?php echo ($col->FechaModi); ?></div>
                                            </td>
                                            <td>
                                                <?php echo ($col->ModiPor); ?>
                                            </td>
                                            <td>
                                                <button type="submit" style="padding: 2px;" class="btn btn-outline-primary">
                                                    <img class="img-fluid" src="<?php echo base_url() ?>Imagenes/Detalle.png" alt="">
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                            <?php    }
                            } ?>

                        </tbody>
                    </table>

                </div>
                <p> -->

            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h4>Detalle Pedido</h4>
                <div class="table-responsive">
                    <table id="tableFacturacion" class="table table-bordered  table-hover tablaDetalle">
                        <thead>
                            <tr>
                                <th scope="col">Pedido</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">#</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($detallePedidos)) {
                                echo "No tiene detalle";
                                $total = 0;
                            } else {
                                $total = 0;

                                foreach ($detallePedidos->result() as $row) {
                                    $num_factura = ($row->num_pedido);
                                    $Mesa = ($row->mesa);
                                    $Zona = ($row->zona);
                                    $total = $total +  ($row->total)
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo ($row->num_pedido); ?>
                                        </td>

                                        <td>
                                            <?php echo ($row->producto); ?>
                                        </td>
                                        <td>
                                            <?php echo ($row->categoria); ?>
                                        </td>
                                        <td>
                                            <?php echo ($row->cantidad) ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row->precio, 0); ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row->total, 0); ?>
                                        </td>
                                    </tr>
                        </tbody>
                <?php }
                            } ?>
                    </table>
                </div>

                <div class="operaciones">

                    <div class="form-row">
                        <div class="col">

                            <?php echo form_open(base_url() . 'index.php/Facturacion/PagarPedido'); ?>

                            <input type="hidden" required name="num_pedido" value=" <?php if (empty($num_factura) == false) {
                                                                                        echo $num_factura;
                                                                                    } ?>">
                            <input type="hidden" required name="IDZona" value=" <?php if (empty($Zona) == false) {
                                                                                    echo $Zona;
                                                                                } ?>">
                            <input type="hidden" required name="Mesa" value=" <?php if (empty($Mesa) == false) {
                                                                                    echo $Mesa;
                                                                                } ?>">


                            <h3>Total: <?php echo number_format($total, 0) ?></h3>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>

                                </div>
                                <input type="number" min="100" id="Efectivo" name="Efectivo" class="form-control" required>
                            </div>

                            <input type="hidden" id="total" value="<?php echo ($total) ?>" class="form-control" readonly="readonly" require>

                            <input type="hidden" id="CambioDePago" name="CambioDePago" value="" class="form-control" require>



                            <h4 style="margin:12px">Cambio</h4>
                            <h6 id="cambio"><b>$ </b></h6>

                            <h6 style="color: red;margin-top:10px"><?php echo validation_errors(); ?></h6>

                            <button type="submit" class="btn btn-block btn-success">Pagar</button>

                            </form>
                        </div>

                    </div>
                    <!-- 
                    <div class="form-row">
                        <div class="col">   

                     
       
                         
                        </div>
                        </form>
                        <div class="col">
                            <form action="<?php echo base_url() ?>index.php/Facturacion/BorrarPedido" method="POST" data-ajax="false">
                            <input type="hidden" required name="num_pedido" value=" <?php if (empty($num_factura) == false) {
                                                                                        echo $num_factura;
                                                                                    } ?>">
                                <button type="submit" class="btn btn-block btn-danger">Borrar pedido</button>
                            </form>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="col" >
                        <h6 style="color: red;margin-top:10px"><?php echo validation_errors(); ?></h6>
                    </div>                   
                    </div> -->

                </div>


            </div>
        </div>
    </div>





    <script>
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }


        const CampoEfectivo = document.getElementById('Efectivo');
        CampoEfectivo.addEventListener('keyup', calculos)
        //CampoEfectivo.addEventListener('keydown', calculos)

        const total = document.getElementById("total").value;
        const efectivo = document.getElementById("Efectivo").value;


        function calculos(event) {



            var key = event.keyCode || event.which;
            const efectivo = document.getElementById("Efectivo").value;
            const total2 = parseInt(total);
            console.log(total2);
            const cambio = (efectivo - total);

            if (cambio > 0) {

                document.getElementById('cambio').innerHTML = "$" + (cambio);
                document.getElementById('CambioDePago').value = cambio;
            } else {
                if (cambio < 0) {
                    document.getElementById('cambio').innerHTML = "Digite un valor mayor o igual al total";
                    document.getElementById('CambioDePago').value = cambio;
                } else {
                    document.getElementById('cambio').innerHTML = "Completo";
                    document.getElementById('CambioDePago').value = cambio;
                }
            }


        }
        // document.getElementById('efectivo').onkeypress = alert("asdas");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>