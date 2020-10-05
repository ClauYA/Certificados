<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vista_previa extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('evento_model');
	}
	public function index()
	{
		$parametro=$this->evento_model->getparametro();
		$html= $this->load->view('vista_previa',array('parametro'=>$parametro),true);
		$this->pdf->createPDF($html, 'pdf', false);
	}

}
