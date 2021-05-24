<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Imagenes/FondoNegro.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Style/StylesAdmin/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
	<title>Gestion Tipo Pagos</title>
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
									<a class="nav-link " aria-current="page" href="<?php echo base_url() ?>index.php/Administrador/Productos">Productos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Categorias">Categorias</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url() ?>index.php/Administrador/Mesas" tabindex="-1" aria-disabled="true">Zonas y mesas</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " href="<?php echo base_url() ?>index.php/Administrador/Usuarios" tabindex="-1" aria-disabled="true">Usuarios</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Mas
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">										
										<a class="dropdown-item active" href="#">Tipo de pagos</a>
										<a class="dropdown-item" href="#">Reportes</a>
										<div class="dropdown-divider"></div>
									</div>
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
			<h5>Cree un tipo de pago</h5>
			<div class="table-responsive">
				<!--	<form action="<?php echo base_url() ?>index.php/Administrador/RegistrarUsuario" method="post"> -->
				<?php echo form_open(base_url() . 'index.php/Administrador/RegistrarTipoPago'); ?>

				<h6 style="color: red;"><?php echo validation_errors(); ?></h6>

				<table class="table table-hover">
					<thead class="table-dark head">
						<tr>
							<th scope="col">Tipo</th>
							<th scope="col">Numero</th>
							<th scope="col">Guardar</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="form-group">
									<input type="text" required value="" required class="form-control" name="NombreTipo" placeholder="Tipo de cuenta">
								</div>
							</td>
							<td>
								<div class="form-group">
									<input type="text" value=""  class="form-control" name="NumCuenta" placeholder="Numero de cuenta">
								</div>
							</td>
							<td>
								<div class="form-group" id="CentrarBotonEnTabla">
									<button type="submit" class="btn btn-success center-block"><img class="img-fluid" src="<?php echo base_url() ?>Imagenes/Guardar.png" alt=""></button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				</form>
			</div>
		</div>




		<div class="row">
			<?php if (isset($TiposDePago)) { ?>
				<h5>Lista de Tipos de cuentas</h5>

				<div class="table-responsive">
					<table class="table">
						<thead class="head">
							<tr>
								<th scope="col">Tipo</th>
								<th scope="col">Cuenta</th>
								<th scope="col">Habilitado</th>
								<th scope="col">Modificar</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($TiposDePago->result() as $row) {
							?>

								<!-- <form action="<?php echo base_url() ?>index.php/Administrador/ActualizarUsuario" method="post" data-ajax="false"> -->

								<?php echo form_open(base_url() . 'index.php/Administrador/ActualizarTipoPago'); ?>

								<tr>
									<td>
										<div class="form-group">
											<input type="text" required name="NombreTipo" value="<?php echo ($row->NombreTipo) ?>" class="form-control">
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" required name="NumCuenta" value="<?php echo ($row->NumCuenta) ?>" class="form-control">
										</div>
									</td>
									<td>
										<div class="form-group">
											<select required name="Habilitado" class="form-control">
												<option value="<?php echo ($row->Habilitado); ?>" selected><?php echo $Resul = $row->Habilitado == 1 ? "Si":"No" ?></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
									</td>
									<td>
										<div class="form-group" id="CentrarBotonEnTabla">
											<input type="text" name="IdTiposPago" value="<?php echo ($row->IdTiposPago) ?>" style="display: none;">
											<button type="submit" class="btn btn-warning center-block"><img class="img-fluid" src="<?php echo base_url() ?>Imagenes/Actualizar.png" alt=""></button>
										</div>
									</td>
									</form>
								
								</tr>
							<?php } ?>
						</tbody>
					</table>
					
					</form>
				</div>
			<?php } else { ?>
				<p> No existen tipos de pago </p>
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