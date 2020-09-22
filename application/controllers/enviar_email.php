<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enviar_email extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('email');
		//$this->load->helper(array('getmenu','url'));
	}
	public function index()
	{
		//$data['menu'] = main_menu();
		$this->load->view('enviar_email');
	}
	public function create()
	{
		$vista=$this->load->view('enviar_email','','TRUE');
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
	public function mandarEmail()
	{

		$this->email->from('eventos@fcpn.com', 'Certificados');
		$this->email->to('someone@example.com');
		$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		$this->email->send();
	}
}
