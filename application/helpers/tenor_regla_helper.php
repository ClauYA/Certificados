<?php
if (!function_exists('gettenorregla'))
{
	function gettenorregla()
	{
		return array(
			array(
				'field' => 'tipo_certificado',
				'label' => 'Tipo de certificado',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
			array(
				'field' => 'tenor',
				'label' => 'Tenor',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'El campo %s es requerido',
				),
			),
		);

	}
}

?>
