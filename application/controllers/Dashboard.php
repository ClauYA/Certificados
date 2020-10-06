<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  public function __construct(){
      parent::__construct();
      $this->load->library(array('session'));
  }
  public function index(){

      //if($this->session->userdata('is_logged')){
        $vista=$this->load->view('registro','',TRUE);
        $this->getTemplate($vista);
     
  }
  public function getTemplate($view){
    $data = array(
      'head' => $this->load->view('layaut/head','',TRUE),
      'nav' => $this->load->view('layaut/nav','',TRUE),
      'form_user' => $this->load->view('registro','',TRUE),
      'footer' => $this->load->view('layaut/footer','',TRUE),
    );
    $this->load->view('dashboard',$data);
  }


}