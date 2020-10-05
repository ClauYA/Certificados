<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contenido_evento extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('evento_model');
		$this->load->model('tenor_model');
		$this->load->model('firma_model');
		$this->load->model('logo_model');
	}
	public function index($id_evento)
	{
		$tipo_certificado=$this->tenor_model->gettipo();
		$obtener_evento = $this->evento_model->getevento($id_evento);
		$tenores= $this->tenor_model->gettenores($id_evento);
		$firmas=$this->firma_model->getfirmas($id_evento);
		$logos=$this->logo_model->getlogos($id_evento);
		$contenido=$this->load->view('contenido_evento',array('evento'=>$obtener_evento,'tipo_certificado'=>$tipo_certificado,'tenores'=>$tenores,'firmas'=>$firmas,'logos'=>$logos),TRUE);
		$this->getTemplate($contenido, $obtener_evento);
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
