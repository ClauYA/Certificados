<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class firma extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library( array('image_lib') );
		$this->load->helper('firma_regla');
		$this->load->helper('file');
		$this->load->model('firma_model');
	}
	public function index()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/nav');
		$crearfirma=$this->crear();
		//$obtener_firmas= $this->firma_model->getfirmas($id_evento);
		$this->load->view('firma',array('crearfirma'=>$crearfirma) ,'','TRUE');
	}

	public function crear()
	{
		$config['upload_path']='upload/firmas';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '50000';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';

		$this->upload->initialize($config);
		if (!$this->upload->do_upload("imagen_firma"))
		{
			//echo $this->upload->display_errors();
			//$data['error'] = $this->upload->display_errors();
		}else {
			$file_info = $this->upload->data();
			//llama al metodo miniatura de la firma
			$this->minfirma($file_info['file_name']);

			$id_evento = $this->input->post('id_evento');
			$nombre_c = $this->input->post('nombre_completo');
			$grado = $this->input->post('grado');
			$cargo = $this->input->post('cargo');
			$institucion = $this->input->post('institucion');
			$imagen_firma=$file_info['file_name'];

			$this->form_validation->set_rules(getfirmaregla());
			if ($this->form_validation->run() == FALSE) {
				$this->output->set_status_header(400);
			} else {
				//preparacion de ddatos para el envio a la bd
				$firma = array(
					'nombre_completo' => $nombre_c,
					'grado' => $grado,
					'cargo' => $cargo,
					'institucion' => $institucion,
					'imagen'=>$imagen_firma,
					'id_evento' =>$id_evento
				);
				$this->firma_model->guardar($firma);
				redirect(base_url('evento/tenor/'.$id_evento));
			}
		}
	}
	function minfirma($filename)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'upload/firmas'.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio']=TRUE;
		$config['new_image']='upload/firmas/minfirmas/';
		$config['thumb_marker']='';
		$config['width']=200;
		$config['height']=150;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
	public function editar($id_firma=0)
	{
		$obtenerfirma = $this->firma_model->getfirm($id_firma);
		echo '<pre>';
		var_dump($obtenerfirma);
		echo '</pre>';
		$view=$this->load->view('editar_firma','',true);
		$this->getTemplate($view);
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

}
