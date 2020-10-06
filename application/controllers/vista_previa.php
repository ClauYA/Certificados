<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vista_previa extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->helper(array('getmenu','url'));
		$this->load->library('pdf');
	}
	public function index()
	{
		//$data['menu'] = main_menu();
		$result = $this->db->get('evento');
		$data = array('consulta'=>$result);
		$html= $this->load->view('vista_previa',[],true);
		$this->pdf->createPDF($html, 'mypdf', false);
	}
	public function getevento()
	{
		$sql=$this->db->get('evento');
		return $sql->result();
	}

}
