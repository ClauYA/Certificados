<?php 

class Post extends CI_Model{
    public function getPost(){
        return $this->db->get('usuario');
    }
    public function getPostByName($name=''){
    $this->db->query("SELECT * FROM usuario WHERE usuario = '".$name."' LIMIT 1");
    return  $result->row();
    }
    
}
