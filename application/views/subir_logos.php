	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Logos para el certificado</h1>
				</div>
				<form action="<?php echo base_url('logos/crear') ?>" method="POST" id="form_firma" enctype="multipart/form-data">
					<input type="hidden" value="<?= $evento->id_evento ?>" name="id_evento">
					<div class="form-group" id="nombre_logo">
						<input type="text" class="form-control" name="nombre_logo" placeholder="Nombre logo">
						<p><?php echo form_error('nombre_logo');?></p>
					</div>
					<div class="form-group">
						<label for="imagen_logo">Imagen logo</label>
						<input type="file" class="form-control-file" id="imagen_logo" name="imagen_logo" accept="image/*">
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

