<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$vista=$this->load->view('mostrar','',TRUE);
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
