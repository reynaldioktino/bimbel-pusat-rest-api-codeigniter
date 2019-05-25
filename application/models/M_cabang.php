<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cabang extends CI_Model{

	public function listCabang()
	{
		$query=$this->db->query("SELECT * FROM cabang");
		return $query->result();
	}

	public function getCabangWhereKode($kode) {
		return $this->db->get_where('cabang',array('kode'=>$kode));
	}

	public function insert($data)
	{
		$this->db->insert('cabang', $data);
	}

	public function update($data, $kode){
		$this->db->set($data);
		$this->db->where("kode", $kode);
		$this->db->update('cabang', $data);
	}

	public function delete($kode){
		$this->db->query("DELETE FROM cabang where kode='$kode'");
	}
	
}
?>