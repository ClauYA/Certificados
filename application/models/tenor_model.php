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
	}
	public function actualizartenor($id_tenor,$data)
	{
		$this->db->where('id_tenor',$id_tenor);
		$this->db->update('tenor',$data);
	}
	public function eliminartenor($id_tenor){
		$this->db->where('id_tenor',$id_tenor);
		$this->db->delete('tenor');
	}

	public function gettenor($id_tenor){
		$this->db->select('*');
		$this->db->from('tenor');
		$this->db->join('tipo_certificado', 'tenor.id_tipo_certificado=tipo_certificado.id_tipo_certificado', 'INNER');
		$this->db->where('id_tenor', $id_tenor);
		$result = $this->db->get();
		return $result->result();
	}
}
