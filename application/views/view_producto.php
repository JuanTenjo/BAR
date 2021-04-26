<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Oleo+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <LINK REL=StyleSheet HREF="<?php echo base_url() ?>Style/view_productos.css" TYPE="text/css" MEDIA=screen>  
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>

</head>

<body>
    <div class="container">
        <?php
        $mesa = $this->session->userdata('mesa');
        $zona =   $this->session->userdata('zona');
        $idzona =   $this->session->userdata('idzona');
        $num_pedido = $this->session->userdata('pedido');
        $mesero = $this->session->userdata('USUARIO');
        date_default_timezone_set('America/Bogota');
        $fecha_actual = date("Y/m/d");
        ?>
        <header>
            <div style="margin:auto;">
                <nav class="navbar nav">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <h2><b>Realiza tu pedido</b></h2>
                        </li>
                    </ul>
                </nav>
            </div>
        </header><br>
    </div>
    <div class="container">
        <div class="row">
            <article class="col-sm-12 col-md-12 col-lg-5">
                <?php foreach ($categorias->result() as $row) { ?>
                    <h6><?php echo ($row->nombre) ?></h6>
                    <table class="table  table-hover " class="productos">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Añadir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos->result() as $col) {
                                if ($col->tipo == $row->nombre) {
                            ?>
                                    <form action="<?php echo base_url() ?>index.php/mesero/pedido" method="post" data-ajax="false">

                                        <tr>
                                            <td><input type="text" name="producto" style="width:135px; text-align: center;" value="<?php echo ($col->nombre); ?>" readonly="readonly"></td>
                                            <td><input type="text" style="width:65px;  text-align: center;" name="precio" value="<?php echo ($col->precio); ?>" readonly="readonly"></td>
                                            <td><input type="number" style="width:60px;  text-align: center;" name="cantidad" placeholder="1" /></td>
                                            <input type="text" name="num_factura" value="<?php echo $num_pedido; ?>" style="display:none" />
                                            <input type="text" name="mesa" value="<?php echo $mesa; ?>" style="display:none" />
                                            <input type="text" name="mesero" value="<?php echo $mesero; ?>" style="display:none" />
                                            <input type="text" name="categoria" value="<?php echo $row->nombre; ?>" style="display:none" />
                                            <input type="text" name="zona" value="<?php echo $zona; ?>" style="display:none" />
                                            <input type="text" name="fecha" value="<?php echo $fecha_actual; ?>" style="display:none" />
                                            <td><button style="padding:2px;width:60px" type="submit" class="btn btn-success">Añadir</button></td>
                                        </tr>

                                    </form>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                <?php
                } /*cierra el if */
                echo "<hr>";
                ?>
            </article>
            <article class="col-sm-12 col-md-12 col-lg-7">

                <div id="pedido">

                    <div class="encabezado">
                        <h4>Craft Burguer</h4>
                    </div>
                    <hr>
                    <div id="tabla">
                        <table class="table  table-hover  table-bordered">
                            <tr>
                                <th colspan="2">Mesero: <?php echo $mesero; ?></th>
                                <th colspan="1">Mesa: <?php echo $mesa; ?></th>
                                <th colspan="1">Zona: <?php echo $zona; ?></th>
                                <th colspan="1">Pedido: <?php echo $num_pedido; ?></th>

                            </tr>
                            <tr>
                                <th scope="row">Producto</th>
                                <th scope="row">Precio</th>
                                <th scope="row">Cantidad</th>
                                <th scope="row">Total</th>
                                <th scope="row">Eliminar</th>
                            </tr>
                            <?php
                            $total = 0;
                            if (empty($pedido)) {
                                echo "Aun no tienes ningun pedido";
                            } else {
                                foreach ($pedido->result() as $row) {
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
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
                <div class="opciones">
                    <a href="<?php echo base_url() ?>index.php/inicie_sesion/carga_mesero" class="btn btn-primary" role="button" aria-pressed="true">Nuevo</a>
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" role="button" aria-pressed="true">Confirmar Pedido</a>
                    <label><b>Total:</b></label>
                    <input type="text" style="width:17%" value="<?php echo $total ?>" readonly="readonly">

                </div>
            </article>
        </div>
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <a href="<?php echo base_url() ?>index.php/mesero/salir" class="btn btn-secondary " role="button" aria-pressed="true">Salir</a>

                </div>
            </article>
        </div>
    </div>

    <!-- Modal -->
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
                    <input type="text" value="<?php echo $num_pedido ?>" name="num_pedido" style="display: none;">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>