<?php
class firma_model extends CI_Model{
	function __construct()
	{
		$this->load->database();
	}
	public function guardar($firma)
	{
		$this->db->insert('firma',$firma);
	}

	public function getfirmas($id_evento)
	{
		$sql = $this->db->order_by('id_firma','asc')->get_where('firma', array('id_evento' => $id_evento));
		return $sql->result();
	}

	public function actualizarfirma($id_firma,$data)
	{
		$this->db->where('id_firma',$id_firma);
		$this->db->update('firma',$data);
	}

	public function eliminarfirma($id_firma){
		$this->db->where('id_firma',$id_firma);
		$this->db->delete('firma');
	}

	public function getfirma($id_firma){
		$sql= $this->db->get_where('firma', array('id_firma' => $id_firma), 1);
		if(!$sql->result()){
			return false;
		}
		return $sql->row();
	}
}
