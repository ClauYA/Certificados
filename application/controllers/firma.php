<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class firma extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('firma_regla');
		$this->load->helper('file');
		$this->load->model('firma_model');
	}
	public function index()
	{
		$data = $this->firma_model->getfirmas();
		$vista=$this->load->view('firma',array('data'=>$data),'TRUE');
		$this->getTemplate($vista);
	}

	public function crear()
	{
		$nombre_c=$this->input->post('nombreCompleto');
		$grado=$this->input->post('grado');
		$cargo=$this->input->post('cargo');
		$institucion=$this->input->post('institucion');
		$imagen_firma=$this->input->post('imagen');

		$this->form_validation->set_rules(getfirmaregla());
		if ($this->form_validation->run() == FALSE)
		{
			$this->output->set_status_header(400);
		}else{
			//preparacion de ddatos para el envio a la bd
			$firma = array(
				'nombreCompleto'=>$nombre_c,
				'grado'=>$grado,
				'cargo'=>$cargo,
				'institucion'=>$institucion,
				'imagen'=>readfile($imagen_firma)
			);
			if(!$this->firma_model->guardar($firma)){
				$this->output->set_status_header(500);
			}else{
				redirect(base_url('subir_logos'));
			}
		}
		$data = $this->firma_model->getfirmas();
		$vista=$this->load->view('firma',array('data'=>$data),'TRUE');
		$this->getTemplate($vista);
	}
	public function getTemplate($vista){
		$data = array(
			'head'=>$this->load->view('includes/head','',TRUE),
			'nav'=>$this->load->view('includes/nav','',TRUE),
			'content'=>$vista,
			'footer'=>$this->load->view('includes/footer','',TRUE),
		);
		$this->load->view('inicio',$data);
	}
	public function editar($id_firma=0)
	{
		echo $id_firma;
		$view=$this->load->view('editar_firma','',true);
		$this->getTemplate($view);
	}
	function guardar_archivo() {

		$mi_imagen = 'fondo_certificado';
		$config['upload_path']="upload/";
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['max_size'] = "50000";
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($mi_imagen)) {
			//*** ocurrio un error
			$data['uploadError'] = $this->upload->display_errors();
			echo $this->upload->display_errors();
			return;
		}

		$data['uploadSuccess'] = $this->upload->data();
	}

	//public function recargar(){
	//	$x=['firma' => $this->firma_model->obtener()];
	//	$this->load->view('tabla_firma',$x);
	//}


}
