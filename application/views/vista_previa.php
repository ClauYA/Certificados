<?php

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Certificado</title>
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>"/>
	<style type="text/css">
		.right{
			float: right;
		}
		.left{
			float: left;
		}
		.completo{
			width: 100%;
		}

		.uno{
			width: 10%;
		}
		.uno img{
			margin-top: 40px;
			margin-left: 35px;
		}
		.dos{
			width: 80%;
		}
		.tres{
			width: 10%;
		}
		.tres img{
			margin-top: 40px;
			margin-right: 35px;
		}
		.centradoinstitucion{
			text-align: center;
			margin-top: 50px;
		}
		.centrado{
			text-align: center;
		}
		.justificado{
			text-align: justify;
		}
		.cabecera {
			font-family: Calibri, sans-serif;

		}
		.cuerpo {
			margin-left: 70px;
			margin-right: 70px;
		}
		body{
			margin-top: 0px;
			margin-left: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			border: #1e2b37 0px ;
			background-image:url(<?=base_url('upload/fondos/fondo.png');?>);
			background-size: 100% 100%;
			background-repeat: no-repeat;
		}
		.firmas{
			margin: auto;
			margin-top: 50px;
			margin-bottom: 0px;
			font-family: Calibri, sans-serif;
		}
		.firmas th{
			padding-left: 10px;
			padding-right: 10px;
		}
		.logos{
			float: left;
			margin-left: 5px;
			position: absolute;
			bottom: <?//php echo ($altura['altura']+20); ?>0px;
		}
		.qr{
			float: right;
			margin-right: 5px;
			position: absolute;
			bottom: 5px;
		}
		.url{
			float: right;
			margin-right: 5px;
			position: absolute;
			bottom: -10px;
		}
		.logos th{
			padding-right: 10px;
		}
		html { margin: 0px;}
	</style>
</head>
<body>
<div class="cabecera">
	<table class="completo" >
		<tr>
			<th class="uno">
				<img src="<?=base_url('upload/logos/1/imagen1.png');?>" width="65" class="left">
			</th>
			<th>
				<h2 class="centradoinstitucion">UNIVERSIDAD MAYOR DE SAN ANDRÉS
					<br>FACULTAD DE CIENCIAS PURAS Y NATURALES</h2>
				<h4 class="centrado"><?=$obtener_evento->unidad_organizadora?></h4>

			</th>
			<th class="tres">
				<img src="<?=base_url('upload/logos/4/imagen2.png');?>" width="80" class="right">
			</th>
		</tr>
	</table>
</div>

<div class="cuerpo">
		<br>
		<br>
		<h5 class="left">CONFIERE EL PRESENTE:</h5>
		<h3 class="centrado"><br>CERTIFICADO</h3>
		<h2 class="centrado"><br>A:		JUANITO PEREZ</h2>
		<p class="justificado"><br>Por su participación en condición de EXPOSITOR en el taller de "Google Classroom", realizado en la ciudad de La Paz, del 27 de julio al 5 de agosto de 2020. En sesiones virtuales con una duración de 20 horas académicas.
			En cuanto se certifica en honor a la verdad. </p>

		<p class="justificado"><br>La Paz, agosto de 2020 </p>
	<p><?=$obtener_evento->nombre_evento?></p>
</div>
<table class="firmas">
	<tr>
		<?php foreach ($firmas as $firma):?>
			<th>
				<img class="centrado" src="<?= base_url($firma->imagen) ?>" width="200" height="50">
				<h5 class="centrado">
					<?php echo $firma->grado; echo " "; echo $firma->nombre_completo;?>
					<br><?php echo $firma->cargo; ?>
				</h5>
			</th>
		<?php endforeach;?>
	</tr>

</table>
<table class="logos">

</table>
<!--<table class="qr">
	<h5 class="url">QR</h5>
</table>-->
</body>
</html>>
