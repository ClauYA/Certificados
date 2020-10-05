<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tenor extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('tenor_regla');
		$this->load->helper('file');
		$this->load->model('tenor_model');
		$this->load->model('evento_model');
	}
	public function index($id_evento)
	{
		//carga el formulario la cabecera y el nav
		$crea=$this->crear();
		$evento= $this->evento_model->getevento($id_evento);
		$tipo = $this->tenor_model->gettipo();
		$tenores= $this->tenor_model->gettenores($id_evento);
		$this->load->view('tenor', array('tipo_certificado'=>$tipo,'evento'=>$evento,'crea'=>$crea,'tenores'=>$tenores),'TRUE');

	}
	public function crear()
	{
			$id_eve =$this->input->post('id_evento');
			$tipo_certi = $this->input->post('tipo_certificado');
			$tenor = $this->input->post('tenor');
			$this->form_validation->set_rules(gettenorregla());
			if ($this->form_validation->run() == FALSE) {
				$this->output->set_status_header(400);
			} else {
				//preparacion de ddatos para el envio a la bd
				$tenor = array(
					'id_tipo_certificado' => $tipo_certi,
					'tenor' => $tenor,
					'id_evento' => $id_eve,
				);
				$this->tenor_model->guardartenor($tenor);
				redirect(base_url('evento/tenor/'.$id_eve));
			}
	}
	public function editartenor($id_tenor=0)
	{
		$obtenertenor = $this->tenor_model->gettenor($id_tenor);
		//echo '<pre>';
		//var_dump($obtenertenor);
		//echo '</pre>';
		$this->load->view('editar_tenor',array('obtenertenor'=>$obtenertenor),'TRUE');
	}
}
