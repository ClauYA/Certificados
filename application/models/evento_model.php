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
		//echo $id;
		//if($_FILES['imagen_fondo']['error']>0)
		//{
		//	echo "error al cargar";
		//}else{
		//	$permitidos = array('image/png','image/jpg');
		//	$limite_kb = 500;
		//	if (in_array($_FILES['imagen_fondo']['type'],$permitidos)&&$_FILES['imagen_fondo']['size']<=$limite_kb*1024){
		//		$ruta = 'files/'.$id.'/';
		//		$archivo = $ruta.$_FILES['imagen_fondo']['name'];
		//		if (!file_exists($ruta)){
		//			mkdir($ruta);
		//		}
		//		if (!file_exists($archivo)){
		//			$resultado = @move_uploaded_file($_FILES['imagen_fondo']['tmp_name'],$archivo);
		//			if ($resultado){
		//				echo "Archivo guardado";
		//			}else{
		//				echo "Error al guardar";
		//			}
		//		}
		//	}else{
		//		echo "no permitido";
		//	}
		//}
		$this->db->trans_complete();
		return $id;
		//$query = $this->db->query('SELECT LAST_INSERT_ID()');
		//$row = $query->row_array();
		//$this->db->trans_complete();
		//return $row['LAST_INSERT_ID()'];
		//return !$this->db->trans_status()?false:true;
	}
	public function getevento($id)
	{
		//$id = $this->db->insert_id();
		$this->db->select('*');
		$this->db->where('id_evento',$id);
		$resultado=$this->db->get('evento');
		return $resultado->result();
	}
}
