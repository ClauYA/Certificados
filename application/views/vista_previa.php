<! DOCTYPE html>
<html>
<head>
	<meta content = "width = device-width, initial-scale = 1.0" name = "viewport">
	<meta charset = "utf-8">
	<title>Certificado</title>
	<link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type = "text / css" rel = "stylesheet" / >
			
</head>
<?=$parametro?>
<body>
	<div class="cabecera">
		 <table class="vista_certificado" >
			<tr>
				<th class="uno">
					<img src="assets/images/Ummsa.png" width="60" class="left">
				</th>
				<th class="dos">
					<h2 class="centrado"><?=$parametro->institucion?>UNIVERSIDAD MAYOR DE SAN ANDRES
						<br>FACULTAD DE CIENCIAS PURAS Y NATURALES </h2>
				</th>
				<th class="tres" style="margin-top: 20px;">
					<img width="50" src="<?//=base_url();?>upload/fondos/maxfondo<?//php echo $fila->imagen_fondo ?>">
				</th>

			</tr>
		</table>
	</div>
	<div class="cuerpo">
		<h3 class="izquierda">CONFIERE EL PRESENTE</h3>
		<h1 class="centrado">CERTIFICADO</h1>

		<h2 class="centrado">A:</h2>
		<br>
		<?php //echo $fila->tenor;?>
		<br>
		<br>
		<?php echo 'xD'//$fila->mensaje_emision;?>

	</div>
	<table class="firmas">
		<tr>
			<?php //foreach ($firmas as $firma):?>
				<th>
					<!--<img class="centrado"  src="<//=base_url();?>upload/firmas/<//php echo $fila->imagen?>" width="200" height="50">-->
					<h5 class="centrado"><?php //echo ($firma->nombre_completo); ?> <br> <?php //echo ($firma->cargo); ?></h5>
				</th>
			<?php// endforeach;?>
		</tr>
	</table>
	<table class="logos">

	</table>
</body>
</html>
