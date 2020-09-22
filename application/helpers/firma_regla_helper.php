<?php
if (!function_exists('getfirmaregla'))
{
	function getfirmaregla()
	{
		return array(
			array(
				'field' => 'nombreCompleto',
				'label' => 'nombre completo',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'grado',
				'label' => 'Grado',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'cargo',
				'label' => 'Cargo',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'institucion',
				'label' => 'Institucion',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
		);

	}
}

?>
