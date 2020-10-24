<?php
class participantes_model extends CI_Model{
	function __construct()
	{
		$this->load->database();
	}
	public function guardarparticipantes($participantes)
	{
		#$this->db->insert('participante',$participante);
		$this->db->trans_start();
		$this->db->insert_batch('participante', $participantes);

		//$this->db->insert_id();
		$this->db->trans_complete();
		return !$this->db->trans_status()?false:true;
	}

	public function getparticipantes($id_evento)
	{
		$sql = $this->db->order_by('id_participante','asc')->get_where('participante', array('id_evento' => $id_evento));
		return $sql->result();

	}


}
