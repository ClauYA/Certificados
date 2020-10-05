<?php
if (!function_exists('getcrearregla'))
{
	function getcrearregla()
	{
		return array(
			array(
				'field' => 'nombre_evento',
				'label' => 'nombre de evento',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'unidad_organizadora',
				'label' => 'Unidad organizadora',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'fecha_inicio',
				'label' => 'Fecha de inicio',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'fecha_final',
				'label' => 'Fecha final',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'mensaje_emision',
				'label' => 'Mensaje de emision',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
		);

	}
}

?>
