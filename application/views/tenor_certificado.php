<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>tenor</title>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<body>
<div class="container" >
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Tenor certificado</h1>
				</div>
				<form class="user" method="POST" action="includes/iniciar_login.php">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Tipos de certificado a ser emitidos</label>
						<select class="form-control" id="exampleFormControlSelect1">
							<option>EXPOSITOR</option>
							<option>ORGANIZADOR</option>
							<option>PARTICIPANTE</option>

						</select>
					</div>
					<div class="form-group">
						<label>Ingrese el tenor del certificado</label>
						<textarea id="summernote">
											Por su participación en condición de EXPOSITOR en el taller de "Google Classroom", realizado en la ciudad de La Paz, del 27 de julio al 5 de agosto de 2020. En sesiones virtuales con una duración de 20 horas académicas.
											En cuanto se certifica en honor a la verdad.
										</textarea>
					</div>
					<div class="col-auto">
						<input type="submit" class="btn btn-success btn-user btn-block" value="Guardar tenor">
					</div>
					<hr>
				</form>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3" >
					<label>LISTADO DE TIPO DE CERTIFICADO Y TENOR</label>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>TIPO</th>
								<th>TENOR</th>
								<th>MODIFICAR</th>
								<th>ELIMINAR</th>
							</tr>
							</thead>
							<tr>
								<td>EXPOSITOR</td>
								<td>Por su participación en condición de EXPOSITOR en el taller de "Google Classroom", realizado en la ciudad de La Paz, del 27 de julio al 5 de agosto de 2020. En sesiones virtuales con una duración de 20 horas académicas.
									En cuanto se certifica en honor a la verdad.</td>
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

<div id="summernote"></div>
<script>
	$('#summernote').summernote();
</script>
</body>
</html>
