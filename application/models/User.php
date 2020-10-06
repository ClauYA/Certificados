<?php

     class User extends CI_Model{
         public function __construct()
         {
             $this->load->database();
         }
         public function create($datos){
             if(!$this->db->insert('usuario', $datos)){
                 return false;
             }
             return true;
         }
     
     public function getUsers(){
         $sql = $this->db->get('usuario');
         return $sql->result();
     }
    }