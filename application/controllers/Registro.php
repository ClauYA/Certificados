<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct(){
		parent:: __construct();
        $this->load->helper(array('getmenu'));
        $this->load->model('User');
        //llamamos a la libreria validation
        $this->load->library(array('form_validation'));
	}


	public function index()
	{
		
		$vista=$this->load->view('registro','',TRUE);
            $this->getTemplate($vista);
		
    }
    //extraer datos del formulario registro
    public function create(){
        $username = $this->input->post('nombres');
        $ap = $this->input->post('ap');
        $am = $this->input->post('am');
        $ci = $this->input->post('ci');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
       // $tipo = $this->input->post('tipousuario');

        //validacion de campos
        $config = array(
            array(
                'field' => 'nombres',
                'label' => 'nombres',
                'rule'  => 'required',
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules'  => 'required',
                'errors' =>array(
                    'required' => 'error $s.',
                ),
            ),
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==FALSE){
            $vista=$this->load->view('registro','',TRUE);
            $this->getTemplate($vista);
        }else{



        $datos = array(
            //'id_rol' => 5,
            'nombres' => $username,
            'apellido_paterno' => $ap,
            'apellido_materno' => $am,
            'ci' => $ci,
            'email' => $email,
            'password' => $pass,
            'usuario_creacion'=> "usario creacion",
            //'fecha_creacion' => "12/12/12",
            //'estado' => 1,
        );
        
        if(!$this->User->create($datos)){
            $data['smg'] = "ocurrio un error";
            
            $vista=$this->load->view('registro','',TRUE);
            $this->getTemplate($vista);
        }
        else{
            $data['smg'] = "registrado correctamente";        
            $vista=$this->load->view('registro','',TRUE);
            $this->getTemplate($vista);
        }
    }

    }
    public function getTemplate($view){
        $data = array(
          'head' => $this->load->view('layaut/head','',TRUE),
          'nav' => $this->load->view('layaut/nav','',TRUE),
          'form_user' => $view,
          'footer' => $this->load->view('layaut/footer','',TRUE),
        );
        $this->load->view('dashboard',$data);
      }
    
}
?>