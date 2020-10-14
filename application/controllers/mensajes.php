<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mensajes extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}
	public function index($mensaje){
		if($this->session->userdata('is_logged')){
			$vista=$this->load->view('mensaje',array('mensaje'=>$this->errores($mensaje)),TRUE);
			$this->getTemplate($vista);
		}else{
			redirect('login');
		}
	}
	public function getTemplate($view){
		$data = array(
			'head' => $this->load->view('includes/head','',TRUE),
			'nav' => $this->load->view('includes/nav','',TRUE),
			'content' => $view,
			'footer' => $this->load->view('includes/footer','',TRUE),
		);
		$this->load->view('plantilla',$data);
	}
	public function errores($mensaje){
		switch ($mensaje) {
			case 1:
				$res= "Ocurrio un error al cargar la imagenes, revise que su imagenes tenga una dimensión maxima de 5000 x 5000, un tamaño maximo de 2000kb y ser de formato jpg, png o jpeg";
				break;
			case 2:
				$res= "Ocurrio un error al cargar la imagenes, revise que su imagenes tenga una dimensión maxima de 5000 x 5000, un tamaño maximo de 10000kb y ser de formato jpg, png o jpeg";
				break;
		}
		return $res;
	}
}
