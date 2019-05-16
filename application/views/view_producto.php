<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
</head>

<body>
    <div class="container">
        <br>
        <header>
            <h2>¿Cual es tu pedido? <span class="badge badge-secondary"><i>Mesa # <?php echo $mesa ?></i></span></h2>
        </header>
    </div>
    <div class="container">
        <section class="main">
            <div class="row">
                <div class="alert alert-warning" role="alert" style="width:100%;">
                    Comida
                </div>
                <p>
                    <form action="<?php echo base_url() ?>index.php/mesero/burger" method="post" data-ajax="false">
                        <select name="burger" id="burger">
                            <option value="false" disabled selected>Hamburguesas</option>
                            <option value="simplona">Simplona</option>
                            <option value="BBQ">BBQ</option>
                            <option value="Campesina">Campesina</option>
                            <option value="Costeña">Costeña</option>
                            <option value="Terruño">Terruño</option>
                            <option value="Chingon">Chingon</option>
                        </select>
                        <select name="perros" id="perros">
                            <option value="false" disabled selected>Perros</option>>
                            <option value="Ranchero">Ranchero</option>
                            <option value="Mexicano">Mexicano</option>
                            <option value="Hawayano">Hawayano</option>
                        </select>
                        <select name="cubano" id="cubano">
                            <option value="false" disabled selected>Cubanos</option>>
                            <option value="Pavo">Pavo</option>
                            <option value="Cerdo">Cerdo</option>
                            <option value="Pollo">Pollo</option>
                        </select>
                        <select name="otros" id="otros">
                            <option value="false" disabled selected>Otros</option>>
                            <option value="Mazorcada">Mazorcada</option>
                            <option value="Salchipapa">Salchipapa</option>
                            <option value="Nugges">Nugges</option>
                        </select>
                        <select name="pan" id="pan">
                            <option value="false" disabled selected>Tipo de pan</option>>
                            <option value="Ajo">Ajo</option>
                            <option value="Ajonjoli">Ajonjoli</option>
                            <option value="Maiz">Maiz</option>
                            <option value="Normal">Normal</option>
                        </select>
                        <select name="cantidad" id="cantidad">
                            <option value="false" disabled selected>Cantidad</option>>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <input type="submit" value="enviar">
                    </form>
            </div>
            <p>
            <div class="row">
                <div class="alert alert-info" role="alert" style="width:100%;">
                    Bebidas
                </div>
                <p>
                <form action="<?php echo base_url() ?>index.php/mesero/bebidas" method="post" data-ajax="false">
                    <select name="limonadas" id="limonadas">
                        <option value="false" disabled selected>Limonadas</option>>
                        <option value="Cerezada">Cerezada</option>
                        <option value="Coco">Coco</option>
                        <option value="Mango Biche">Mango Biche</option>
                        <option value="Yerba buena">Yerba buena</option>
                    </select>
                    <select name="malteadas" id="malteadas">
                        <option value="false" disabled selected>Malteadas</option>>
                        <option value="Nutella">Nutella</option>
                        <option value="Chocolate">Chocolate</option>
                        <option value="Arequipe">Arequipe</option>
                        <option value="Vainilla">Vainilla</option>
                    </select>
                    <select name="cantidad" id="cantidad">
                            <option value="false" disabled selected>Cantidad</option>>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                <input type="submit" value="Enviar">
                </form>
            </div>
            <p>
            <div class="row">
                <div class="alert alert-danger" role="alert" style="width:100%;">
                    Licores
                </div>
                <p>
                <form action="<?php echo base_url() ?>index.php/mesero/cervesa" method="post" data-ajax="false">
                    <select name="cervesa" id="cervesa">
                        <option value="false" disabled selected>Cervesa</option>>
                        <option value="Club negra">Club negra</option>
                        <option value="Club roja">Club roja</option>
                        <option value="Club dorada">Club dorada</option>
                        <option value="Aguila">Aguila</option>
                        <option value="Aguila lite">Aguila lite</option>
                        <option value="Corona">Corona</option>
                    </select>
                    <select name="cantidad" id="cantidad">
                            <option value="false" disabled selected>Cantidad</option>>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <p>
            <div class="row">
                <div class="alert alert-success" role="alert" style="width:100%;">
                    Adiciones
                </div>
                <p>
                <form action="<?php echo base_url() ?>index.php/mesero/adiciones" method="post" data-ajax="false">
                    <select name="adiciones" id="adiciones">
                        <option value="false" disabled selected>Adiciones</option>>
                        <option value="Papa francesa">Papa francesa</option>
                        <option value="Papa criolla">Papa criolla</option>
                        <option value="Yuca">Yuca</option>
                    </select>
                    <select name="cantidad" id="cantidad">
                            <option value="false" disabled selected>Cantidad</option>>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>