<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vista_previa extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('evento_model');
		$this->load->model('tenor_model');
	}
	public function index()
	{
		$tipo_certificado=$this->tenor_model->gettipo();
		$parametro=$this->evento_model->getparametro();
		$html= $this->load->view('vista_previa',array('tp'=>$tipo_certificado),true);
		$this->pdf->createPDF($html, 'pdf', false);
	}

}
