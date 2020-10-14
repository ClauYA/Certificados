<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crear_evento extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('crear_evento_regla');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->helper('file');
		$this->load->model('evento_model');
	}
	public function index()
	{
		//carga el formulario la cabecera y el nav
		$this->load->view('includes/head');
		$this->load->view('includes/nav');
		$crear=$this->crear();
		$data = $this->evento_model->geteventos();
		$this->load->view('crear_evento',array('crear'=>$crear,'data'=>$data),'TRUE');
		$this->load->view('includes/footer');
	}
	public function getTemplate($vista){
		$data = array(
			'head'=>$this->load->view('includes/head','',TRUE),
			'nav'=>$this->load->view('includes/nav','',TRUE),
			'content'=>$vista,
			'footer'=>$this->load->view('includes/footer','',TRUE),
		);
		$this->load->view('plantilla',$data);
	}
	public function crear()
	{
		//Configuracion para subir la imagen
		$config['upload_path']="upload/fondos";
		$config['allowed_types'] = "jpg|jpeg|png";
		$config['max_size'] = "50000";
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";

		$this->upload->initialize($config);
		if (!$this->upload->do_upload("fondo_certificado"))
		{
			//*** ocurrio un error
			$data['uploadError'] = $this->upload->display_errors();
			return $data;
		}else {
			$file_info = $this->upload->data();

			$this->fondomax($file_info['file_name']);

			$nombre_e = $this->input->post('nombre_evento');
			$unidad_o = $this->input->post('unidad_organizadora');
			$fecha_i = $this->input->post('fecha_inicio');
			$fecha_f = $this->input->post('fecha_final');
			$mensaje_e = $this->input->post('mensaje_emision');
			$imagen_f = $file_info['file_name'];

			$this->form_validation->set_rules(getcrearregla());
			if ($this->form_validation->run() == FALSE) {
				$this->output->set_status_header(400);
			} else {
				//preparacion de ddatos para el envio a la bd
				$evento = array(
					'nombre_evento' => $nombre_e,
					'unidad_organizadora' => $unidad_o,
					'fecha_inicio' => $fecha_i,
					'fecha_final' => $fecha_f,
					'mensaje_emision' => $mensaje_e,
					'imagen_fondo' => $imagen_f
				);
				if (!$this->evento_model->guardar($evento)) {
					$this->output->set_status_header(500);
				} else {

					redirect(base_url('crear_evento'));
				}
			}
		}
	}
	function fondomax($filename)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'upload/fondos/'.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio']=TRUE;
		$config['new_image']='upload/fondos/maxfondo/';
		$config['thumb_marker']='';
		$config['width']=3000;
		$config['height']=2000;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

	public function delete(){
		$id_evento = $this->input->post('id_evento');
		$this->evento_model->deleteevento($id_evento);
		redirect(base_url('crear_evento'));
	}
}
