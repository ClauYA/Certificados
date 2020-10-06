<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');

	}


	public function index()
	{
		//$data['menu'] = main_menu1();
		$this->load->view('login');
	}
	public function validate(){
		$this->form_validation->set_error_delimiters('', '');
		//$email=$this->input->post('email');
		//$password = $this->input->post('password');
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() === FALSE){
			//$this->output->set_status_header(400);
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password'),
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{ 
			$correo = $this->input->post('email');
			$pa = $this->input->post('password');
			
			if(!$res = $this->Auth->login($correo, $pa)){
			   echo json_encode(array('msg'=>"Verifique sus credenciales"));
			   $this->output->set_status_header(401);
			   exit;
			}
			//$this->session->set_flasdata('msg','Bienvenido');
			echo json_encode(array('url'=> base_url('dashboard')));
			//$this->load->view('registro');

			

		}
	}
	public function logout(){
		$vars = array('id', 'rango', 'status', 'nombre_usuario','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('login');
	}
}
