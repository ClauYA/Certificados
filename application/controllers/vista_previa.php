<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vista_previa extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('evento_model');
		$this->load->model('tenor_model');
		$this->load->model('firma_model');
		$this->load->model('vista_previa_model');

	}
	public function index($id_evento)
	{
		$tipo_certificado=$this->tenor_model->gettipo();
		$parametro=$this->evento_model->getparametro();
		$obtener_evento = $this->evento_model->getevento($id_evento);
		$firmas=$this->firma_model->getfirmas($id_evento);
		$html= $this->load->view('vista_previa',array('tp'=>$tipo_certificado,'obtener_evento'=>$obtener_evento,'firmas'=>$firmas),true);
		$this->pdf->createPDF($html, 'pdf', false);
	}

}
