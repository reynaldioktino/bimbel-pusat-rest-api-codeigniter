<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model{

	public function listDaftar()
	{
		$query=$this->db->query("SELECT * FROM pendaftaran");
		return $query->result();
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('pendaftaran', $data);
	}
	
}
?>