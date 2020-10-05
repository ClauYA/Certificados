<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logos extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library( array('image_lib') );
		$this->load->helper('logo_regla');
		$this->load->helper('file');
		$this->load->model('logo_model');
	}
	public function index()
	{
		//$data['menu'] = main_menu();
		$this->load->view('subir_logos');
	}
	public function crear()
	{
		$config['upload_path']='upload/logos';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '50000';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';

		$this->upload->initialize($config);
		if (!$this->upload->do_upload("imagen_logo"))
		{
			echo $this->upload->display_errors();
			//$data['error'] = $this->upload->display_errors();
		}else {
			$file_info = $this->upload->data();
			//llama al metodo miniatura de la firma
			$this->minlogos($file_info['file_name']);

			$id_evento=$this->input->post('id_evento');
			$nombre = $this->input->post('nombre_logo');
			$imagen_logo=$file_info['file_name'];

			$this->form_validation->set_rules(getlogoregla());
			if ($this->form_validation->run() == FALSE) {
				$this->output->set_status_header(400);
			} else {
				//preparacion de ddatos para el envio a la bd
				$logos = array(
					'nombre' => $nombre,
					'imagen'=>$imagen_logo,
					'id_evento'=>$id_evento
				);
				$this->logo_model->guardar($logos);
				redirect(base_url('evento/tenor/'.$id_evento));
			}
		}
	}
	function minlogos($filename)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'upload/logos'.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio']=TRUE;
		$config['new_image']='upload/logos/minlogos/';
		$config['thumb_marker']='';
		$config['width']=200;
		$config['height']=150;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
}
