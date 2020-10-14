<div class="row justify-content-center">
	<div class="col-xl-10 col-lg-12 col-md-9">
		<div class="text-center">
			<h4 class="h4 text-gray-900 mb-4">Crear evento</h4>
		</div>
		<form action="" method="POST" id="form_crea_evento" enctype="multipart/form-data" >
			<div class="form-group" id="nombre_evento">
				<input type="text" class="form-control" name="nombre_evento" placeholder="Nombre de evento" value="<?=set_value('nombre_evento')?>">
				<?=form_error('nombre_evento','<p class="text-danger"></p>')?>

			</div>
			<div class="form-group izquierda" id="unidad_organizadora">
				<input type="text" class="form-control" name="unidad_organizadora" placeholder="Unidad organizadora" value="<?=set_value('unidad_organizadora')?>">
				<p><?php echo form_error('unidad_organizadora');?></p>
			</div>
			<div class="form-group izquierda" id="fecha_inicio">
				<input type="date" class="form-control" name="fecha_inicio" placeholder="Fecha de inicio" value="<?=set_value('fecha_inicio')?>">
				<p><?php echo form_error('fecha_inicio');?></p>
			</div>
			<div class="form-group izquierda" id="fecha_final">
				<input type="date" class="form-control" name="fecha_final" placeholder="Fecha final" value="<?=set_value('fecha_final')?>">
				<p"><?php echo form_error('fecha_final');?></p>
			</div>
			<div class="form-group izquierda" id="mensaje_emision">
				<input type="text" class="form-control" name="mensaje_emision" placeholder="Mensaje de Emision" value="<?=set_value('mensaje_emision')?>">
				<p><?php echo form_error('mensaje_emision');?></p>
			</div>
			<div class="form-group izquierda" id="fondo_certificado">
				<label for="fondo_certificado">Imagen fondo de certificado</label>
				<input type="file" class="form-control-file" name="fondo_certificado" accept="image/*">
				<p><?php echo form_error('fondo_certificado');?></p>
			</div>
			<!--option="?=set_value('nombre_evento')=='admin'?'selected':'';?> value="admin">-->
			<div class="col-auto">
				<input type="submit" class="btn btn-success btn-user btn-block" value="Guardar">
			</div>
			<hr>
		</form>

		<!--lista de eventos-->
		<div class="card shadow mb-4">
			<div class="card-header py-3" >
				<label>LISTA DE MIS EVENTOS</label>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead class="thead-dark">
						<tr><th scope="col" class="talign-center">NRO</th>
							<th scope="col">NOMBRE EVENTO</th>
							<th scope="col">UNIDAD ORGANIZADORA</th>
							<th scope="col">FECHA INICIO</th>
							<th scope="col">FECHA FINAL</th>
							<th scope="col">MENSAJE DE EMISION</th>
							<th scope="col">IMAGEN FONDO</th>
							<th scope="col">OPCIONES</th>
							<th scope="col">ELIMINAR</th>
						</tr>
					</thead>
					<?php $contador=1; foreach ($data as $fila):?>
					<tbody>
						<tr><td><?php echo($contador); $contador++?></td>
							<td><?php echo $fila->nombre_evento?></td>
							<td><?php echo $fila->unidad_organizadora?></td>
							<td><?php echo $fila->fecha_inicio?></td>
							<td><?php echo $fila->fecha_final?></td>
							<td><?php echo $fila->mensaje_emision?></td>
							<td class="talign-center">
								<a href="<?=base_url('upload/fondos/'.$fila->imagen_fondo);?>" data-fancybox data-caption="<?php echo $fila->nombre_evento?>">
									<img class="img-responsive img-fluid" alt="Image" width="50" src="<?=base_url('upload/fondos/'.$fila->imagen_fondo);?>">
								</a>
							</td>
							<td><a href="<?=base_url('evento/tenor/'.$fila->id_evento)?>" class="btn btn-primary">
									<i class="fa fa-folder-open"></i>
								</a>
							</td>
							<td><button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#modal_eliminar_evento<?=$fila->id_evento?>">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>
						<!--modal eliminar firma-->
						<div class="modal" id="modal_eliminar_evento<?=$fila->id_evento?>">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Eliminar evento </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
											¿Esta seguro que desea eliminar el evento: <?=$fila->nombre_evento?>?.
										</p>
									</div>
									<div class="modal-footer">
										<div class="carousel-inner">
											<div class="float-right">
												<form action="<?= base_url('crear_evento/delete')?>" method="post">
													<input type="hidden" value="<?=$fila->id_evento?>" name="id_evento">
													<button type="submit" class="btn btn-danger">Eliminar</button>
													<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</tbody>
					<?php endforeach;?>
				</table>
			</div>
			<hr>
		</div>
	</div>
</div>


