<?php
if (!function_exists('getlogoregla'))
{
	function getlogoregla()
	{
		return array(
			array(
				'field' => 'nombre_logo',
				'label' => 'Nombre',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			//array(
			//	'field' => 'imagen',
			//	'label' => 'Imagen',
			//	'rules' => 'required|trim',
			//	'errors' => array(
			//		'required' => 'El campo %s es requerido',
			//	),
			//),
		);

	}
}

?>
