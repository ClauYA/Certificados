<?php
class logo_model extends CI_Model{
	function __construct()
	{
		$this->load->database();
	}
	public function guardar($imagen)
	{
		$this->db->trans_start();
		$this->db->insert('imagen',$imagen);
		//$this->db->insert_id();
		$this->db->trans_complete();
		return !$this->db->trans_status()?false:true;
	}
	public function getlogos($id_evento)
	{
		$sql = $this->db->order_by('id_imagen','asc')->get_where('imagen', array('id_evento' => $id_evento));
		return $sql->result();
	}

	public function actualizarlogo($id_imagen,$data)
	{
		$this->db->where('id_imagen',$id_imagen);
		$this->db->update('imagen',$data);
	}
	public function eliminarlogo($id_imagen){
		$this->db->where('id_imagen',$id_imagen);
		$this->db->delete('imagen');
	}

}
