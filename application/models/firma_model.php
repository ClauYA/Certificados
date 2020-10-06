<?php
class firma_model extends CI_Model{
	function __construct()
	{
		$this->load->database();
	}
	public function guardar($firma)
	{
		$this->db->trans_start();
		$this->db->insert('firma',$firma);
		//$this->db->insert_id();
		$this->db->trans_complete();
		return !$this->db->trans_status()?false:true;
	}
	public function getfirmas()
	{
		$sql=$this->db->get('firma');
		return $sql->result();
	}

}
