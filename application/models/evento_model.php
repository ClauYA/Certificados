<?php
class evento_model extends CI_Model{
	function __construct()
	{
		$this->load->database();
	}
	public function guardar($evento)
	{
		$this->db->trans_start();
		$this->db->insert('evento',$evento);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		return $id;
	}
	public function getparametro()
	{
		$sql= $this->db->get('parametros');
		return $sql->result();
	}
	public function geteventos()
	{
		$sql=$this->db->get('evento');
		return $sql->result();
	}
	public function getevento($id_evento)
	{
		$sql= $this->db->get_where('evento', array('id_evento' => $id_evento), 1);
		if(!$sql->result()){
			return false;
		}
		return $sql->row();
	}

	public function deleteevento($id_evento){
		$this->db->where('id_evento',$id_evento);
		$this->db->delete('evento');
	}
}
