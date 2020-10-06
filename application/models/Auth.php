<?php
class Auth extends CI_Model{
    function __construct(){
        $this->load->database();
    }
    public function login($correo, $pass){
      $data =   $this->db->get_where('usuario' ,array('email' => $correo, 'password' => $pass),1);
      if(!$data->result()){
      return false;
      }
      return $data->row();
    }
}