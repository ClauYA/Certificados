<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>logos</title>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body>
<h1>Logos</h1>
<div class="container" >
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Logos para el certificado</h1>
				</div>
				<form action="<?php base_url('evento/validacion') ?>" method="POST" >
					<div class="form-group">
						<input type="text" class="form-control" name="nombre_logo" placeholder="Nombre logo">
					</div>
					<div class="form-group">
						<label for="imagen_logo">Imagen logo</label>
						<input type="file" class="form-control-file" id="imagen_logo" accept="image/*">
					</div>
					<div class="col-auto">
						<input type="submit" class="btn btn-success btn-user btn-block" value="Guardar">
					</div>
					<hr>
				</form>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3" >
					<label>LISTADO LOGOS A CARGAR AL CERTIFICADO</label>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>NRO</th>
								<th>NOMBRE</th>
								<th>IMAGEN</th>
								<th>MODIFICAR</th>
								<th>ELIMINAR</th>
							</tr>
							</thead>
							<tr>
								<td>1</td>
								<td>UGICA</td>
								<td>IMAGEN</td>
								<td><a href="" class="float-right">
										Modificar
									</a></td>
								<td><a href="" class="float-right">Eliminar
										<i class="fas fa-trash-alt"></i>
									</a></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>

</body>
</html>
