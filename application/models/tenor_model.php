<?php
class tenor_model extends CI_Model{
	function __construct()
	{
		$this->load->database();
	}
	public function guardartenor($tenor)
	{
		$this->db->insert('tenor',$tenor);
	}
	public function gettipo()
	{
		$sql= $this->db->get('tipo_certificado');
		return $sql->result();
	}
	public function gettenores($id_evento)
	{
		$this->db->select('*');
		$this->db->from('tenor');
		$this->db->join('tipo_certificado', 'tenor.id_tipo_certificado=tipo_certificado.id_tipo_certificado', 'INNER');
		$this->db->where('id_evento', $id_evento);
		$result = $this->db->get();
		return $result->result();
		//$sql = $this->db->order_by('id_tenor','desc')->get_where('tenor', array('id_evento' => $id_evento));
		//return $sql->result();
	}
	public function gettenor($id_tenor)
	{
		//$id = $this->db->insert_id();
		$this->db->select('*');
		$this->db->where('id_tenor',$id_tenor);
		$resultado=$this->db->get('tenor');
		return $resultado->row_array();
	}


}
