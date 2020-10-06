<?php
function main_menu(){
	return array(
		array(
			'titulo'=>'informacion',
			'url'=>base_url('/evento'),
		),
		array(
			'titulo'=>'tenor_certificado',
			'url'=>base_url('/tenor_certificado'),
		),
		array(
			'titulo'=>'pie_de_firma',
			'url'=>base_url('/firma'),
		),
		array(
			'titulo'=>'logos',
			'url'=>base_url('/subir_logos'),
		),
		array(
			'titulo'=>'lista',
			'url'=>base_url('/subir_logos'),
		),
		array(
			'titulo'=>'vista previa',
			'url'=>base_url('/vista_previa'),
		),
	);
    }
	//function main_menu1(){
		//return array(
		//	array(
			//	'title' => 'Listar Usuario',
			//	'url' => base_url('/registro'),
			//),
			//array(
			//	'title' => 'Mostrat usuario',
			//	'url' => base_url('/vistatabla'),
			///),
	//	);
  // }



?>
