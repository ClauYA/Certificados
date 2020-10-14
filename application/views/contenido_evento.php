<div class="row">
	<div class="col-lg-12 col-md-9">
		<div class="text-left">
			<h4 class="h4 text-gray-900 mb-4"><strong>Evento: </strong><?=$evento->nombre_evento?></h4>
			<h4 class="h4 text-gray-900 mb-4"><strong>Unidad Organizadora: </strong><?=$evento->unidad_organizadora?></h4>
		</div>
		<hr>
		<div class="col-lg-12 align-self-right">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal_crear_tenor">
				<span class="icon icon-plus align-middle"> </span>  Agregar tenor
			</button>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal_crear_firma">
				<span class="icon icon-plus align-middle"> </span>  Agregar firma
			</button>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal_crear_logo">
				<span class="icon icon-plus align-middle"> </span>  Agregar logos
			</button>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal_crear_participantes">
				<span class="icon icon-plus align-middle"> </span>  Agregar participantes
			</button>
			<a class="btn btn-info" href="<?=base_url('vista_previa')?>" role="button">Vista previa</a>
		</div>
		<hr><hr><hr>
		<!--Lista de tenores-->
		<div class="text-left">
			<h3><strong>Tenores certificado</strong></h3>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
					<tr><th scope="col" style="text-align: center">NRO</th>
						<th scope="col" style="text-align: center">TIPO CERTIFICADO</th>
						<th scope="col" style="text-align: center" class="talign-center">TENOR</th>
						<th scope="col" style="text-align: center">EDITAR</th>
						<th scope="col" style="text-align: center">ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
				<?php $contador = 1;
					foreach ($tenores as $tenor): ?>
						<tr>
							<td><?php echo($contador);$contador++ ?></td>
							<td><?php echo $tenor->descripcion ?></td>
							<td><?php echo $tenor->tenor ?></td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal"
										data-target="#modal_editar_tenor<?=$tenor->id_tenor?>"><i class="fa fa-edit"></i>
								</button>
							</td>
							<td>
								<button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#modal_eliminar_firma<?=$tenor->id_tenor?>">
									<i class="fa fa-trash"></i>
								</button>
							</td>

						</tr>
						<!--modal para editar el tenor-->
						<div class="modal" id="modal_editar_tenor<?=$tenor->id_tenor?>">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Editar tenor</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="<?php echo base_url('tenor/update') ?>" class="user" method="POST">
										<input type="hidden" value="<?=$evento->id_evento ?>" name="id_evento">
										<input type="hidden" value="<?= $tenor->id_tenor ?>" name="id_tenor">
										<div class="modal-body">
											<div class="form-group" id="tipo_certificado">
												<label >Tipos de certificado a ser emitidos</label>
												<select class="form-control"  name="tipo_certificado">
													<?php foreach ($tipo_certificado as $tipo_certi): ?>
														<option value="<?php echo $tipo_certi->id_tipo_certificado ?>"><?php echo $tenor->descripcion ?></option>
													<?php endforeach; ?>
												</select>
												<p><?php echo form_error('tipo_certificado'); ?></p>
											</div>
											<div class="form-group" id="tenor" >
												<label>Ingrese el tenor del certificado</label>
												<textarea id="summernoteeditar" name="tenor"><?php echo $tenor->tenor ?></textarea>
												<?=form_error('tenor','<p class="text-danger"></p>')?>
											</div>
										</div>
										<div class="modal-footer">
											<div class="carousel-inner">
												<div class="float-right">
													<button type="submit" class="btn btn-primary">Guardar</button>
													<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--modal eliminar tenor-->
						<div class="modal" id="modal_eliminar_firma<?=$tenor->id_tenor?>">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Eliminar imagen <?=$tenor->descripcion?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
											¿Esta seguro que desea eliminar la imagen <?=$tenor->descripcion?>?.
										</p>
									</div>
									<div class="modal-footer">
										<div class="carousel-inner">
											<div class="float-right">
												<form action="<?= base_url('tenor/delete')?>" method="post">
													<input type="hidden" value="<?=$tenor->id_tenor?>" name="id_tenor">
													<input type="hidden" value="<?=$evento->id_evento?>" name="id_evento">
													<button type="submit" class="btn btn-danger">Eliminar</button>
													<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</tbody>
			</table>
		</div>

		<hr>
		<!--Lista de firmas-->
		<div class="text-left">
			<h3><strong>Pie de firma certificado</strong></h3>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
				<tr>
					<th scope="col" style="text-align: center">GRADO</th>
					<th scope="col" style="text-align: center">NOMBRE COMPLETO</th>
					<th scope="col" style="text-align: center">CARGO</th>
					<th scope="col" style="text-align: center">INSTITUCION</th>
					<th scope="col" style="text-align: center">FIRMA</th>
					<th scope="col" style="text-align: center">MODIFICAR</th>
					<th scope="col" style="text-align: center">ELIMINAR</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($firmas as $firma):?>
					<tr>
					<td><?php echo $firma->grado?></td>
					<td><?php echo $firma->nombre_completo?></td>
					<td><?php echo $firma->cargo?></td>
					<td><?php echo $firma->institucion?></td>
					<td class="talign-center">
						<a href="<?= base_url($firma->imagen) ?>" data-fancybox data-caption="<?php echo $firma->nombre_completo?>">
						<img class="img-responsive img-fluid" alt="Image" width="50"  src="<?= base_url($firma->imagen) ?>">
					</td>
					<td>
						<button type="button" class="btn btn-warning" data-toggle="modal"
								data-target="#modal_editar_firma<?=$firma->id_firma?>"><i class="fa fa-edit"></i>
						</button>
					</td>
					<td>
						<button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#modal_eliminar_firma<?=$firma->id_firma?>">
							<i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!--modal editar firma-->
				<div class="modal" id="modal_editar_firma<?=$firma->id_firma?>">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Editar Firma</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="post" action="<?= base_url('firma/update')?>" enctype="multipart/form-data">
								<input type="hidden" value="<?=$evento->id_evento?>"name="id_evento">
								<input type="hidden" value="<?=$firma->id_firma?>"name="id_firma">
								<div class="modal-body">
									<div class="form-group" id="nombre_completo">
										<input type="text" class="form-control" name="nombre_completo" placeholder="Nombre completo" required value="<?=$firma->nombre_completo?>">
										<p><?php echo form_error('nombre_completo');?></p>
									</div>
									<div class="form-group" id="grado">
										<input type="text" class="form-control" name="grado" placeholder="Grado" required value="<?=$firma->grado?>">
										<p><?php echo form_error('grado');?></p>
									</div>
									<div class="form-group" id="cargo">
										<input type="text" class="form-control" name="cargo" placeholder="Cargo" required value="<?=$firma->cargo?>">
										<p><?php echo form_error('cargo');?></p>
									</div>
									<div class="form-group" id="institucion">
										<input type="text" class="form-control" name="institucion" placeholder="Institucion" required value="<?=$firma->institucion?>">
										<p><?php echo form_error('institucion');?></p>
									</div>
									<div class="form-group">
										<label for="imagen_firma">Imagen firma</label>
										<input type="file" class="form-control-file" name="imagen_firma" accept="image/png, image/jpeg, image/jpg">
									</div>
								</div>
								<div class="modal-footer">
									<div class="carousel-inner">
										<div class="float-right">
											<button type="submit" class="btn btn-primary">Guardar</button>
											<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--modal eliminar firma-->
				<div class="modal" id="modal_eliminar_firma<?=$firma->id_firma?>">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Eliminar imagen <?=$firma->nombre_completo?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>
									¿Esta seguro que desea eliminar la imagen <?=$firma->nombre_completo?>?.
								</p>
							</div>
							<div class="modal-footer">
								<div class="carousel-inner">
									<div class="float-right">
										<form action="<?= base_url('firma/delete')?>" method="post">
											<input type="hidden" value="<?=$firma->id_firma?>" name="id_firma">
											<input type="hidden" value="<?=$evento->id_evento?>" name="id_evento">
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
		<!--Lista de logos-->
		<div class="text-left">
			<h3><strong>Logos certificado</strong></h3>
		</div>
		<div class="table-responsive col-lg-12" style="align-content: center">
			<table class="table" style="text-align: center">
				<thead class="thead-dark">
				<tr>
					<th scope="col" style="text-align: center">NRO</th>
					<th scope="col" style="text-align: center">NOMBRE</th>
					<th scope="col" style="text-align: center">IMAGEN</th>
					<th scope="col" style="text-align: center">MODIFICAR</th>
					<th scope="col" style="text-align: center">ELIMINAR</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<?php $contador=1; foreach ($logos as $logo):?>
					<td><?php echo($contador);$contador++ ?></td>
					<td><?php echo $logo->nombre?></td>
					<td class="talign-center">
						<a href="<?= base_url($logo->imagen) ?>" data-fancybox data-caption="<?php echo $logo->nombre?>">
						<img class="img-responsive img-fluid" alt="Image" width="50" src="<?= base_url($logo->imagen) ?>">
					</td>
					<td>
						<button type="button" class="btn btn-warning" data-toggle="modal"
								data-target="#modal_editar_logo<?=$logo->id_imagen?>"><i class="fa fa-edit"></i>
						</button>
					</td>
					<td>
						<button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#modal_eliminar_logo<?=$logo->id_imagen?>">
							<i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!--modal editar logos-->
				<div class="modal" id="modal_editar_logo<?=$logo->id_imagen?>">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Editar logo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?php echo base_url('logos/update') ?>" method="POST"  enctype="multipart/form-data">
								<input type="hidden" value="<?=$evento->id_evento?>"name="id_evento">
								<input type="hidden" value="<?=$logo->id_imagen?>"name="id_imagen">
								<div class="modal-body">
									<div class="form-group" id="nombre_logo">
										<input type="text" class="form-control" name="nombre_logo" placeholder="Nombre logo" required value="<?=$logo->nombre?>">
										<p><?php echo form_error('nombre_logo');?></p>
									</div>
									<div class="form-group">
										<label for="imagen_logo">Imagen logo</label>
										<input type="file" class="form-control-file" name="imagen_logo" accept="image/*">
									</div>
								</div>
								<div class="modal-footer">
									<div class="carousel-inner">
										<div class="float-right">
											<button type="submit" class="btn btn-primary">Guardar</button>
											<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--modal eliminar logos-->
				<div class="modal" id="modal_eliminar_logo<?=$logo->id_imagen?>">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Eliminar imagen <?=$logo->nombre?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>
									¿Esta seguro que desea eliminar la imagen <?=$logo->nombre?>?.
								</p>
							</div>
							<div class="modal-footer">
								<div class="carousel-inner">
									<div class="float-right">
										<form action="<?= base_url('logos/delete')?>" method="post">
											<input type="hidden" value="<?=$logo->id_imagen?>" name="id_imagen">
											<input type="hidden" value="<?=$evento->id_evento?>" name="id_evento">
											<button type="submit" class="btn btn-danger">Eliminar</button>
											<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--modal para crear el tenor-->
<div class="modal" id="modal_crear_tenor">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Crear tenor</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('tenor/crear') ?>" class="user" method="POST" id="form_tenor">
				<input type="hidden" value="<?= $evento->id_evento ?>" name="id_evento">
				<div class="modal-body">
					<div class="form-group" id="tipo_certificado">
						<label for="selectipocertificado">Tipos de certificado a ser emitidos</label>
						<select class="form-control" id="selectipocertificado" name="tipo_certificado">
							<?php foreach ($tipo_certificado as $tipo_certi): ?>
								<option value="<?php echo $tipo_certi->id_tipo_certificado ?>"><?php echo $tipo_certi->descripcion ?></option>
							<?php endforeach; ?>
						</select>
						<p><?php echo form_error('tipo_certificado'); ?></p>
					</div>
					<div class="form-group" id="tenor" >
						<label>Ingrese el tenor del certificado</label>
						<textarea id="summernote" name="tenor" required></textarea>
						<?=form_error('tenor','<p class="text-danger"></p>')?>
					</div>
				</div>
				<div class="modal-footer">
					<div class="carousel-inner">
						<div class="float-right">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--modal para crear una firma-->
<div class="modal" id="modal_crear_firma">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Crear firma</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('firma/crear') ?>" method="POST" id="form_firma" enctype="multipart/form-data">
				<input type="hidden" value="<?= $evento->id_evento ?>" name="id_evento">
				<div class="modal-body">
					<div class="form-group" id="nombre_completo">
						<input type="text" class="form-control" name="nombre_completo" placeholder="Nombre completo">
						<p><?php echo form_error('nombre_completo');?></p>
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
						<input type="file" class="form-control-file" id="imagen_firma" name="imagen_firma" accept="image/*">
					</div>
				</div>
				<div class="modal-footer">
					<div class="carousel-inner">
						<div class="float-right">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--modal para crear un logo-->
<div class="modal" id="modal_crear_logo">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Crear logo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('logos/crear') ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" value="<?= $evento->id_evento ?>" name="id_evento">
				<div class="modal-body">
					<div class="form-group" id="nombre_logo">
						<input type="text" class="form-control" name="nombre_logo" placeholder="Nombre logo">
						<p><?php echo form_error('nombre_logo');?></p>
					</div>
					<div class="form-group">
						<label for="imagen_logo">Imagen logo</label>
						<input type="file" class="form-control-file" name="imagen_logo" accept="image/*">
					</div>
				</div>
				<div class="modal-footer">
					<div class="carousel-inner">
						<div class="float-right">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

