<?php
$evento = $this->db->get('evento');
$tenor = $this->db->get('tenor');
$firmas =$this->db->get('firma');

?>
<! DOCTYPE html>
<html>
<head>
	<meta content = "width = device-width, initial-scale = 1.0" name = "viewport">
	<meta charset = "utf-8">
	<title>Certificado</title>
	<link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type = "text / css" rel = "stylesheet" / >
			<style type="text/css">

			.vista_certificado{
				width: 100%;
			}
			.uno{
				width: 10%;
			}
			.uno img{
				margin-top: 20px;
			}
			.dos{
				width: 80%;
			}
			.tres{
				width: 10%;
			}
			.tres img{
				margin-top: 25px;
			}
			.centrado{
				text-align: center;
			}
			.izquierda{
				text-align: left;
			}
			.cabecera {
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
<?php foreach ($evento->result() as $fila):?>
<body>
	<div class="cabecera">
		 <table class="vista_certificado" >
			<tr>
				<th class="uno">
					<img src="assets/images/Ummsa.png" width="60" class="left">
				</th>
				<th class="dos">
					<h2 class="centrado">UNIVERSIDAD MAYOR DE SAN ANDRES
						<br>FACULTAD DE CIENCIAS PURAS Y NATURALES
						<br><?php echo $fila->nombre_evento;?> </h2>

				</th>
				<th class="tres" style="margin-top: 20px;">
					<img src="../assets/images/fcpn.png" width="80" class="right">
				</th>

			</tr>
		</table>
	</div>
	<div class="cuerpo">
		<h3 class="izquierda">CONFIERE EL PRESENTE</h3>
		<h1 class="centrado">CERTIFICADO</h1>

		<h2 class="centrado">A:</h2>
		<br>
		<?php foreach ($tenor->result() as $valor)
				echo $valor->tenor;?>
		<br>
		<br>
		<?php echo $fila->mensaje_emision;?>

	</div>
	<table class="firmas">
		<tr>
			<?php foreach ($firmas->result() as $firma):?>
				<th>
					<img class="centrado" src="../assets/images/fcpn.png" width="200" height="50">
					<h5 class="centrado"><?php echo ($firma->nombreCompleto); ?> <br> <?php echo ($firma->cargo); ?></h5>
				</th>
			<?php endforeach;?>
		</tr>
	</table>
	<table class="logos">

	</table>
</body>
<?php endforeach;?>
</html>
