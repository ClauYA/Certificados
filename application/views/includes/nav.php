<style type="text/css">
	.centrado{
		text-align: center;
	}
	.izquierda{
		text-align: left;
	}
	.cabecera {
		margin-top: 20px;
		font-family: Calibri, sans-serif;
		margin-right: 20px;
		margin-left: 20px;
	}
	.cuerpo {
		margin-left: 70px;
		margin-right: 70px;
	}
	body{
		margin-top: 10px;
		margin-left: 10px;
		margin-right: 10px;
		margin-bottom: 0px;
		border: #1e2b37 0px groove;
	}

</style>
<nav id="navbar-gray" class="centrado">
	<ul class="pagination cabecera" >

		<li class="page-item <?=$this->uri->segment(1)=='inicio' ? 'active':'';?>">
			<a class="page-link" href="<?=base_url('evento/crear')?>">Crear evento</a>
		</li>
		<li class="page-item <?=$this->uri->segment(2)=='create' ||$this->uri->segment(2)=='' ? 'active':'';?>">
			<a class="page-link" href="<?=base_url('tenor_certificado/crear')?>">Tenor certificado</a>
		</li>
		<li class="page-item" <?=$this->uri->segment(3)=='' ||$this->uri->segment(3)=='' ? 'active':'';?>">
			<a class="page-link" href="<?=base_url('firma/crear')?>"">Pie de firma</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="<?=base_url('subir_logos')?>">Subir logos</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="<?=base_url('vista_previa')?>">Vista previa</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="<?=base_url('vista_previa')?>">Enviar certificados</a>
		</li>
		<li class="page-item able">
			<a class="page-link" href="#">Siguiente</a>
		</li>
	</ul>
</nav>
