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
		//$query = $this->db->query('SELECT LAST_INSERT_ID()');
		//$row = $query->row_array();
		//$this->db->trans_complete();
		//return $row['LAST_INSERT_ID()'];
		//return !$this->db->trans_status()?false:true;
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
	public function geteve($id_firma)
	{
		//SELECT *
		//FROM firma
		//JOIN evento
		//ON evento.id_evento = firma.id_evento
		//WHERE firma.id_firma = $id_firma LIMIT 1
		//1 parametro con que se relacionara
		//2 parametro pide el on del join
		//$this->db->select('*');
		//$this->db->from('firma');
		$this->db->join('evento','evento.id_evento = firma.id_evento');
		$signature=$this->db->get_where('firma',array('firma.id_firma'=>$id_firma,1));
		return $signature->row_array();
	}
}
