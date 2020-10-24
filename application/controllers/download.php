<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class download extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','download'));

	}
	public function index($id_evento)
	{
		#$evento= $this->evento_model->getevento($id_evento);
		$this->load->view('subir_logos');
	}
	public function downloads(){
		#$id_eve =$this->input->post('id_evento');
		$id_evento = $this->input->post('id_evento');
		#$data = file_get_contents('./upload/plantilla/plantilla_participantes.xlsx');
		force_download('upload/plantilla/plantilla_participantes.xlsx', NULL);
		#redirect(base_url('evento/tenor/'.$id_eve));
		redirect(base_url('evento/tenor/'.$id_evento));
	}

}
