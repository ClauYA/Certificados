<div class="row">
	<div class="col-xl-10 col-lg-12 col-md-9">
		<div class="p-5">
			<div class="text-center">
			<h1 class="h4 text-gray-900 mb-4">Tenor certificado</h1>
			</div>
			<form action="<?php echo base_url('tenor/crear') ?>" class="user" method="POST" id="form_tenor">
				<input type="hidden" value="<?= $evento->id_evento ?>" name="id_evento">
				<div class="form-group" id="tipo_certificado">
					<label for="selectipocertificado">Tipos de certificado a ser emitidos</label>
					<select class="form-control" id="selectipocertificado" name="tipo_certificado">
					<?php foreach ($tipo_certificado as $tipo_certi): ?>
					<option value="<?php echo $tipo_certi->id_tipo_certificado ?>"><?php echo $tipo_certi->descripcion ?></option>
					<?php endforeach; ?>
					</select>
					<p><?php echo form_error('tipo_certificado'); ?></p>
				</div>
				<div class="form-group" id="tenor">
					<label>Ingrese el tenor del certificado</label>
					<textarea id="contenido" name="tenor">Por su participación en condición de EXPOSITOR en el taller de "Google Classroom", realizado en la ciudad de La Paz, del 27 de julio al 5 de agosto de 2020. En sesiones virtuales con una duración de 20 horas académicas.
						En cuanto se certifica en honor a la verdad.</textarea>
					<p><?php echo form_error('tenor'); ?></p>
				</div>
				<div class="col-auto">
					<input type="submit" class="btn btn-success btn-user btn-block" value="Guardar">
				</div>
				<hr>
			</form>
		</div>
		<!--lista de eventos-->
		<div class="card shadow">
			<div class="card-header py-3">
				<label>TENORES</label>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead class="thead-dark">
						<tr>
						<th scope="col" class="talign-center">NRO</th>
						<th scope="col">TIPO CERTIFICADO</th>
						<th scope="col" class="talign-center">TENOR</th>
						<th scope="col">EDITAR</th>
						<th scope="col">ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
					<?php $contador = 1;
					foreach ($tenores as $tenor): ?>
						<tr>
						<td><?php echo($contador);$contador++ ?></td>
						<td><?php echo $tenor->descripcion ?></td>
						<td><?php echo $tenor->tenor ?></td>
						<td><a href="<?=base_url('tenor/editartenor/'.$tenor->id_tenor)?>" class="btn btn-primary">
							<i class="fa fa-edit"></i></a>
						<td><a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
				<hr>
		</div>
	</div>
</div>


