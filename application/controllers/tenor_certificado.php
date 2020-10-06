<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tenor_certificado extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->model('evento_model');
		//$this->load->helper(array('getmenu','url'));
	}
	public function index()
	{
		//$data['menu'] = main_menu();
		$this->load->view('tenor_certificado');
	}
	public function crear()
	{

		$vista=$this->load->view('tenor_certificado','','TRUE');
		$this->getTemplate($vista);
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

}
