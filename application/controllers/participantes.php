<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class participantes extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		#$this->load->library( array('image_lib') );
		#$this->load->helper('logo_regla');
		$this->load->helper('file');
		$this->load->library('excel');
		$this->load->model('participantes_model');
		$this->load->model('evento_model');

	}


	function crear()
	{
		$id_eve =$this->input->post('id_evento');
		#$tipo_certi = $this->input->post('tipo_certificado');
		#$tenor = $this->input->post('participante');

		//preparacion de ddatos para el envio a la bd
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nombre = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$apellido_p = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$apellido_m = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$ci = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$celular = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$grado = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$nota = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$descripcion = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

					$data[] = array(
						'nombres'			=>	$nombre,
						'apellido_paterno'	=>	$apellido_p,
						'apellido_materno'	=>	$apellido_m,
						'ci'				=>	$ci,
						'email'				=>	$email,
						'nro_celular'			=>	$celular,
						'grado'				=>	$grado,
						'nota'				=>	$nota,
						'descripcion'		=>	$descripcion,
						'id_evento' 		=>  $id_eve
					);
				}
			}
			$this->participantes_model->guardarparticipantes($data);
			redirect(base_url('evento/tenor/'.$id_eve));
			#echo 'Datos importados correctamente';
		}
	}
}
