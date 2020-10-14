<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class firma extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library( array('image_lib') );
		$this->load->helper('firma_regla');
		$this->load->helper('file');
		$this->load->model('firma_model');
	}
	public function crear(){
		$id_evento = $this->input->post('id_evento');
		$nombre_c = $this->input->post('nombre_completo');
		$grado = $this->input->post('grado');
		$cargo = $this->input->post('cargo');
		$institucion = $this->input->post('institucion');
		$imagen = $_FILES['imagen_firma']['name'];

		if($imagen) {
			$imagen = $this->sub($id_evento);
			if(isset($imagen['uploadError'])){
				//var_dump($imagen);
				redirect(base_url('evento/tenor/mensaje/'.'2'));
			}else{
				$imagen = 'upload/firmas/' . $id_evento . '/' . $imagen['raw_name'].$imagen['file_ext'];
			}
		}

		$this->form_validation->set_rules(getfirmaregla());
		if($this->form_validation->run()==FALSE){
			$this->output->set_status_header(400);
		}else{
			$firma = array(
				'nombre_completo' => $nombre_c,
				'grado' => $grado,
				'cargo' => $cargo,
				'institucion' => $institucion,
				'imagen'=>$imagen,
				'id_evento' =>$id_evento
			);
			$this->firma_model->guardar($firma);
			redirect(base_url('evento/tenor/'.$id_evento));
		}
	}

	public function sub($id_evento){
		if (!file_exists('upload')) {
			mkdir('upload', 0777, true);
		}
		if(!file_exists('upload/firmas')){
			mkdir('upload/firmas', 0777, true);
		}
		if(!file_exists('upload/firmas/'.$id_evento)){
			mkdir('upload/firmas/'.$id_evento, 0777, true);
		}

		$config['upload_path'] = 'upload/firmas/'.strval($id_evento);
		$config['file_name'] = 'imagen';
		$config['allowed_types'] = "png";
		$config['max_size'] = "10000";
		$config['max_width'] = "5000";
		$config['max_height'] = "5000";

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload("imagen_firma"))
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
		$id_firma= $this->input->post('id_firma');
		$nombre_completo = $this->input->post('nombre_completo');
		$grado = $this->input->post('grado');
		$cargo = $this->input->post('cargo');
		$institucion = $this->input->post('institucion');
		$imagen = $_FILES['imagen_firma']['name'];

		$this->form_validation->set_rules(getfirmaregla());
		if($this->form_validation->run()==FALSE){
			$this->output->set_status_header(400);
		}else{
			$firma = array(
				'nombre_completo' => $nombre_completo,
				'grado' => $grado,
				'cargo' => $cargo,
				'institucion' => $institucion,
				'id_evento'=>$id_evento
			);
			if($imagen) {
				$imagen = $this->sub($id_evento);
				if(isset($imagen['uploadError'])){
					redirect(base_url('evento/tenor/mensaje/'.'2'));
				}else{
					$imagen = 'upload/firmas/' . $id_evento . '/' . $imagen['raw_name'].$imagen['file_ext'];
					$img['imagen']=$imagen;
				}
			}
			$this->firma_model->actualizarfirma($id_firma,$firma);
			redirect(base_url('evento/tenor/'.$id_evento));
		}
	}

	public function delete(){
		$id_firma = $this->input->post('id_firma');
		$id_evento = $this->input->post('id_evento');
		$this->firma_model->eliminarfirma($id_firma);
		redirect(base_url('evento/tenor/'.$id_evento));
	}
}
