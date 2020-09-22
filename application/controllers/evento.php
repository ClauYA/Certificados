<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class evento extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('crear_evento_regla');
		$this->load->helper('file');
		$this->load->model('evento_model');
	}
	public function index()
	{
		$this->load->view('crear_evento','','TRUE');
		//$this->getTemplate($vista);
	}

	public function crear()
	{
		$nombre_e=$this->input->post('nombre_evento');
		$unidad_o=$this->input->post('unidad_organizadora');
		$fecha_i=$this->input->post('fecha_inicio');
		$fecha_f=$this->input->post('fecha_final');
		$mensaje_e=$this->input->post('mensaje_emision');
		$imagen_f=$this->input->post('imagen_fondo');
		$this->form_validation->set_rules(getcrearregla());
		if ($this->form_validation->run() == FALSE)
		{
			$this->output->set_status_header(400);
		}else{
			//preparacion de ddatos para el envio a la bd
			$evento = array(
				'nombre_evento'=>$nombre_e,
				'unidad_organizadora'=>$unidad_o,
				'fecha_inicio'=>$fecha_i,
				'fecha_final'=>$fecha_f,
				'mensaje_emision'=>$mensaje_e,
				'imagen_fondo'=>readfile($imagen_f)
			);
			if(!$this->evento_model->guardar($evento)){
				$this->output->set_status_header(500);
			}else{
				//$data=$this->evento_model->guardar($evento);
				redirect(base_url('tenor_certificado/crear'));
			}
		}
		$ev=$this->load->view('crear_evento','','TRUE');
		$this->getTemplate($ev);
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
	//public function validate()
	//{
	//	$nombre=$this->input->post('nombre_evento');
	//	if(!$res = $this->evento_model->crear($nombre))
	//	{

	//	}
	//	$data=array(
	//		'id'=>$res->id_evento,
	//		'nombre_evento'=>$res->nombre_evento,
	//		'unidad_organizadora'=>$res->unidad_organizadora,
	//		'fecha_inicio'=>$res->fecha_inicio,
	//		'fecha_final'=>$res->fecha_final,
	//		'mensaje_emision'=>$res->mensaje_emision,
	//	);
			//$this->session->set_userdata($data);
			//echo json_encode(array("url"=>base_url('tenor_certificado')));
	//	echo $res->nombre_evento;
	//	var_dump($res->nombre_evento);

	//}











	//public function validacion(){
	//	$this->form_validation->set_error_delimiters('','');
	//	$valida=getcreaeventovalidacion();
	//	$this->form_validation->set_rules($valida);
	//	if ($this->form_validation->run() == FALSE) {
	//			$data['menu'] = main_menu();
	//			$this->load->view('crear_evento',$data);
	//			$errores=array(
	//				'nombre_evento'=>form_error('nombre_evento'),
	//				'unidad_organizadora'=>form_error('unidad_organizadora'),
	//				'fecha_inicio'=>form_error('fecha_inicio'),
	//				'fecha_final'=>form_error('fecha_final'),
	//				'mensaje_emision'=>form_error('mensaje_emision')
	//			);
	//			//echo json_encode($errores);
	//			$this->output->set_status_header(400);
	//	}else{
	//		$nombre_evento=$this->input->post('nombre_evento');
	//		$unidad_organizadora=$this->input->post('unidad_organizadora');
	//		$fecha_inicio=$this->input->post('fecha_inicio');
	//		$fecha_final=$this->input->post('fecha_final');
	//		$mensaje_emision=$this->input->post('mensaje_emision');
	//		if(!$res = $this->evento_model->crear($nombre_evento,$unidad_organizadora,$fecha_inicio,$fecha_final,$mensaje_emision)){
	//			echo json_encode(array('mensaje'=>'Verificar credenciales'));
	//			$this->output->set_status_header(401);
	//			exit();
	//		}
	//		echo json_encode(array('mensaje'=>'Bienvenido'));
	//	}
	//}

	//public function informacion()
	//{
	//	$nombre_evento = $this->input->post('nombre_evento');
	//	$unidad_organizadora = $this->input->post('unidad_organizadora');
	//	$fecha_inicio = $this->input->post('fecha_inicio');
	//	$fecha_final = $this->input->post('fecha_final');
	//	$mensaje_emision = $this->input->post('mensaje_emision');
		//validacion del formulario crear evento
		//$config = array(
		//	array(
		//		'field' => 'nombre_evento',
		//		'label' => 'nombre de evento',
		//		'rules' => 'required',
		//		'errors' => array(
		//			'required' => 'Debes ingresar %s',
		//		),
		//	),
		//);
		//$this->form_validation->set_rules($config);
		//if ($this->form_validation->run() == FALSE) {
		//	$data['menu'] = main_menu();
		//	$this->load->view('crear_evento',$data);
		//} else {

			//var_dump($nombre_evento.$unidad_organizadora.$fecha_inicio.$fecha_final.$mensaje_emision);
	//		$datos = array(
	//			'nombre_evento' => $nombre_evento,
	//			'unidad_organizadora' => $unidad_organizadora,
	//			'fecha_inicio' => $fecha_inicio,
	//			'fecha_final' => $fecha_final,
	//			'mensaje_emision' => $mensaje_emision,
	//		);
	//		$data['menu'] = main_menu();
	//		if (!$this->evento_model->crear($datos)) {
	//			$data['mensaje'] = 'Ocurrio un error';
	//			$this->load->view('crear_evento', $data);
	//		}
	//		$data['mensaje'] = 'registrado correctamente';
	//		$this->load->view('crear_evento', $data);
	//	}
	//}

}
