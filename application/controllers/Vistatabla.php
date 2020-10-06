<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vistatabla extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('getmenu');
        $this->load->model('User');
    }
 
    public function index(){
        $data = $this->User->getUsers();

        $this->getTemplate($this->load->view('vistatabla', array('data' => $data), true));
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