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
	public function crear()
	{
		$id_eve = $this->input->post('id_evento');
		$tenor = $this->input->post('tenor');
		$tipo_certi = $this->input->post('tipo_certificado');

		$tenores = $this->tenor_model->gettenores($id_eve);
		$sw = 0;
		foreach ($tenores as $ten) {
			if($ten->id_tipo_certificado == $tipo_certi){
				$sw = 1;
			}
		}
		if($sw == 0){
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
				redirect(base_url('evento/tenor/' . $id_eve));
			}
		}
		else{
			redirect(base_url('evento/tenor/' . $id_eve));
		}
	}
	public function update()
	{
		$id_e = $this->input->post('id_evento');
		$id_t = $this->input->post('id_tenor');
		$tipo_cert=$this->input->post('tipo_certificado');
		$te=$this->input->post('tenor');
		$this->form_validation->set_rules(gettenorregla());
		if ($this->form_validation->run() == FALSE) {
			$this->output->set_status_header(400);
		} else {
			//preparacion de ddatos para el envio a la bd
			$tenor = array(
				'id_tenor'=>$id_t,
				'id_tipo_certificado' => $tipo_cert,
				'tenor' => $te,
				'id_evento' => $id_e
			);
			$this->tenor_model->actualizartenor($id_t,$tenor);
			redirect(base_url('evento/tenor/'.$id_e));
		}
	}
	public function delete(){
		$id_tenor = $this->input->post('id_tenor');
		$id_evento = $this->input->post('id_evento');
		$this->tenor_model->eliminartenor($id_tenor);
		redirect(base_url('evento/tenor/'.$id_evento));
	}

}
