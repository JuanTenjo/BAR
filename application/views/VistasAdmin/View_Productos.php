<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>Style/StylesAdmin/style.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
	<title>Administracion</title>
</head>

<body>
	<!-- ADMINISTRACION -->
	<?php $Administrador = $this->session->userdata('USUARIO'); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<div class="container-fluid">
						<a class="navbar-brand" href="<?php echo base_url() ?>index.php/Administrador"><img src="<?php echo base_url() ?>Imagenes/FondoBlanco.png" alt="Logo Cielo Abierto" width="40" height="34"></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>index.php/Administrador/Productos">Productos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Categorias">Categorias</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Mesas" tabindex="-1" aria-disabled="true">Zonas y mesas</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Salir" tabindex="-1" aria-disabled="true">Salir</a>
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
		<div class="row">
			<h5>Crear un producto</h5>
			<div class="table-responsive">
				<form action="<?php echo base_url() ?>index.php/Administrador/RegistraProducto" method="post">
					<table class="table ">
						<thead class="table-dark head">
							<tr>
								<th scope="col">Categoria</th>
								<th scope="col">Nombre Producto</th>
								<th scope="col">Ingredientes</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Precio</th>
								<th scope="col">Agregar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">
									<select name="categoriaProducto" class="form-control" id="exampleFormControlSelect1">
										<option value="1" disabled selected>Categoria</option>
										<?php foreach ($categorias->result() as $row) { ?>
											<option value="<?php echo ($row->ID_Categoria); ?>"><?php echo ($row->NombreCate); ?></option>
										<?php } ?>
									</select>
								</th>
								<td>
									<div class="form-group">
										<input type="text" class="form-control" name="nombreProducto" placeholder="Nombre del producto">
									</div>
								</td>
								<td>
									<div class="form-group">
										<input type="text" class="form-control" name="ingredientesProducto" placeholder="Ingredientes">
									</div>
								</td>
								<td>
									<div class="form-group">
										<input type="number" class="form-control" name="cantidadProducto" placeholder="Cantidad">
									</div>
								</td>
								<td>
									<div class="form-group">
										<input type="number" class="form-control" name="precioProducto" placeholder="Precio">
									</div>
								</td>
								<td>
									<div class="form-group">
										<center>
											<button type="submit" class="btn btn-success center-block">Agregar</button>
										</center>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>



		<div class="row">
			<?php if (isset($productos)) { ?>
				<h5>Lista de productos </h5>
				<div class="table-responsive">
					<table class="table">
						<thead class="head">
							<tr>
								<th scope="col">Categoria</th>
								<th scope="col">Nombre Producto</th>
								<th scope="col">Ingredientes</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Precio</th>
								<th scope="col">Modificar</th>
								<th scope="col">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($productos->result() as $row) {
							?>

									<tr>
									<form action="<?php echo base_url() ?>index.php/Administrador/ModificarProducto" method="post" data-ajax="false">
										<th scope="row">
											<div class="form-group">
												
												<!-- <input type="text" value="<?php echo ($row->NombreCate) ?>" class="form-control" placeholder="Categoria"> -->
												<select name="IDCategoria" class="form-control" id="ad" required>
												<option value="<?php echo ($row->ID_Categoria); ?>"><?php echo ($row->NombreCate); ?></option>
												<?php foreach ($categorias->result() as $raw) { ?>
													<option value="<?php echo ($raw->ID_Categoria); ?>"><?php echo ($raw->NombreCate); ?></option>
												<?php } ?>
												</select>
											</div>
										</th>
										<td>
											<div class="form-group">
												<input type="text" required name="NombreProduc" value="<?php echo ($row->NombreProducto) ?>" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<input type="text" required name="Ingredientes" value="<?php echo ($row->Ingredientes) ?>" class="form-control">
											</div>
										</td>
										<td>
											<div class="form-group">
												<input type="number" required name="Cantidad" value="<?php echo ($row->Cantidad) ?>" class="form-control" ">
											</div>
										</td>
										<td>
											<div class="form-group">
												<input type="number" required name="Precio" value="<?php echo ($row->Precio) ?>" class="form-control" ">
											</div>
										</td>
										<td>							
											<div class="form-group">
												<center>
													<input type="text" name="ID_Producto" value="<?php echo ($row->ID_Producto) ?>" style="display: none;">
													<button type="submit" class="btn btn-warning center-block">Modificar</button>
												</center>
											</div>				
										</td>
									</form> <!--Se hace un form hasta el boton de Modificar para tener  -->
									<form action="<?php echo base_url() ?>index.php/Administrador/EliminarProducto" method="post" data-ajax="false">
										<td>							
											<div class="form-group">
												<center>
													<input type="text" name="ID_Producto" value="<?php echo ($row->ID_Producto) ?>" style="display: none;">
													<button type="submit" class="btn btn-danger center-block">Eliminar</button>
												</center>
											</div>	
										</td>	
									</form>							
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } else { ?>
				<p> No existe nigun producto</p>
			<?php } ?>



		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
