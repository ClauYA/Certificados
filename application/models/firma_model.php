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
	public function getfirmas($id_evento)
	{
		$sql = $this->db->order_by('id_firma','asc')->get_where('firma', array('id_evento' => $id_evento));
		return $sql->result();
	}
	public function getfirm($id_firma)
	{
		//$id = $this->db->insert_id();
		$this->db->select('*');
		$this->db->where('id_firma',$id_firma);
		$resultado=$this->db->get('firma');
		return $resultado->row_array();
	}

}
