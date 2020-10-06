<main class="centrado">
	<div class="container" >
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="p-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Crear evento</h1>
					</div>
					<!--<form action="//base_url('evento/validate')" method="POST" id="form_crea_evento" >-->
					<form action="<?php base_url('evento/store')?>" method="POST" id="form_crea_evento" enctype="multipart/form-data" >
						<div class="form-group izquierda" id="nombre_evento">
							<input type="text" class="form-control" name="nombre_evento" placeholder="Nombre de evento" value="<?=set_value('nombre_evento')?>">
							<p><?php echo form_error('nombre_evento');?></p>
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
						<div class="form-group izquierda">
							<label for="fondo_certificado">Imagen fondo de certificado</label>
							<p><?php echo form_error('fondo_certificado');?></p>
							<input type="file" class="form-control-file" name="fondo_certificado" accept="image/*">
						</div>
						<!--option="?=set_value('nombre_evento')=='admin'?'selected':'';?> value="admin">-->
						<div class="col-auto">
							<input type="submit" class="btn btn-success btn-user btn-block" value="Guardar">
						</div>
						<hr>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
