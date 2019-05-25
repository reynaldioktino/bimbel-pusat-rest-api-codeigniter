<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    function __construct() {
    	parent::__construct();
    	$this->load->model('M_siswa');
        
    }

    public function index() {
    	$this->load->view('form_daftar');
    }

    public function add() {
    	$data = array(
    		'id' => $this->input->post(''),
    		'nama' => $this->input->post('nama'),
    		'nomor_ortu' => $this->input->post('nomor_ortu'),
    		'nomor' => $this->input->post('nomor'),
    		'kota' => $this->input->post('kota'),
    		'alamat' => $this->input->post('alamat')
    	);
    	$data=$this->M_siswa->insert($data);
    	redirect('Siswa');
    }
}
?>