<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model{

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('siswa', $data);
	}
	
}
?>