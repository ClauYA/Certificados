<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Pie de firma</title>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body>
<div class="container" >
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Pie de firma</h1>
				</div>
				<form action="" method="POST" id="form_firma" enctype="multipart/form-data" >
					<div class="form-group" id="nombreCompleto">
						<input type="text" class="form-control" name="nombreCompleto" placeholder="Nombre completo">
						<p><?php echo form_error('nombreCompleto');?></p>
					</div>
					<div class="form-group" id="grado">
						<input type="text" class="form-control" name="grado" placeholder="Grado">
						<p><?php echo form_error('grado');?></p>
					</div>
					<div class="form-group" id="cargo">
						<input type="text" class="form-control" name="cargo" placeholder="Cargo">
						<p><?php echo form_error('cargo');?></p>
					</div>
					<div class="form-group" id="institucion">
						<input type="text" class="form-control" name="institucion" placeholder="Institucion">
						<p><?php echo form_error('institucion');?></p>
					</div>
					<div class="form-group">
						<label for="imagen_firma">Imagen firma</label>
						<input type="file" class="form-control-file" id="imagen_firma" accept="image/*">
					</div>
					<div class="col-auto">
						<input type="submit" class="btn btn-success btn-user btn-block" value="Guardar">
					</div>
					<hr>
				</form>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3" >
					<label>ASOCIACION A TIPO DE CERTIFICADOS</label>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class="thead-dark">
							<tr>
								<th scope="col">GRADO</th>
								<th scope="col">NOMBRE COMPLETO</th>
								<th scope="col">CARGO</th>
								<th scope="col">INSTITUCION</th>
								<th scope="col">MODIFICAR</th>
								<th scope="col">ELIMINAR</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<?php foreach ($data as $fila):?>
								<td><?php echo $fila->grado?></td>
								<td><?php echo $fila->nombreCompleto?></td>
								<td><?php echo $fila->cargo?></td>
								<td><?php echo $fila->institucion?></td>
								<td><a href="<?=base_url('firma/editar/'.$fila->id_firma)?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
									</svg></a>
								<td><a><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
									</svg></a></td>
							</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>
<!--<script src=" //base_url('assets/js/firma.js') "></script>-->
</body>
</html>
