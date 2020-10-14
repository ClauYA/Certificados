<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logos extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library( array('image_lib') );
		$this->load->helper('logo_regla');
		$this->load->helper('file');
		$this->load->model('logo_model');
	}
	public function crear(){
		$id_evento=$this->input->post('id_evento');
		$nombre = $this->input->post('nombre_logo');
		$imagen = $_FILES['imagen_logo']['name'];

		if($imagen) {
			$imagen = $this->sub($id_evento);
			if(isset($imagen['uploadError'])){
				redirect(base_url('evento/tenor/mensaje/'.'2'));
			}else{
				$imagen = 'upload/logos/' . $id_evento . '/' . $imagen['raw_name'].$imagen['file_ext'];
			}
		}

		$this->form_validation->set_rules(getlogoregla());
		if($this->form_validation->run()==FALSE){
			$this->output->set_status_header(400);
		}else{
			$logo = array(
				'nombre' => $nombre,
				'imagen'=>$imagen,
				'id_evento' =>$id_evento
			);
			$this->logo_model->guardar($logo);
			redirect(base_url('evento/tenor/'.$id_evento));
		}
	}

	public function sub($id_evento){
		if (!file_exists('upload')) {
			mkdir('upload', 0777, true);
		}
		if(!file_exists('upload/logos')){
			mkdir('upload/logos', 0777, true);
		}
		if(!file_exists('upload/logos/'.$id_evento)){
			mkdir('upload/logos/'.$id_evento, 0777, true);
		}
		$config['upload_path'] = 'upload/logos/'.strval($id_evento);
		$config['file_name'] = 'imagen';
		$config['allowed_types'] = "png";
		$config['max_size'] = "10000";
		$config['max_width'] = "5000";
		$config['max_height'] = "5000";

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload("imagen_logo"))
		{
			//*** ocurrio un error
			$data['uploadError'] = $this->upload->display_errors();
			return $data;
		}
		$data['uploadSuccess'] = $this->upload->data();
		return $data['uploadSuccess'];
	}
	public function update(){
		$id_evento= $this->input->post('id_evento');
		$id_imagen= $this->input->post('id_imagen');
		$nombre = $this->input->post('nombre_logo');
		$imagen = $_FILES['imagen_logo']['name'];

		$this->form_validation->set_rules(getlogoregla());
		if($this->form_validation->run()==FALSE){
			$this->output->set_status_header(400);
		}else{
			$logo = array(
				'nombre' => $nombre,
				'id_evento'=>$id_evento
			);
			if($imagen) {
				$imagen = $this->sub($id_evento);
				if(isset($imagen['uploadError'])){
					redirect(base_url('evento/tenor/mensaje/'.'2'));
				}else{
					$imagen = 'upload/logos/' . $id_evento . '/' . $imagen['raw_name'].$imagen['file_ext'];
					$img['imagen']=$imagen;
				}
			}
			$this->logo_model->actualizarlogo($id_imagen,$logo);
			redirect(base_url('evento/tenor/'.$id_evento));
		}
	}
	public function delete(){
		$id_imagen = $this->input->post('id_imagen');
		$id_evento = $this->input->post('id_evento');
		$this->logo_model->eliminarlogo($id_imagen);
		redirect(base_url('evento/tenor/'.$id_evento));
	}
}
