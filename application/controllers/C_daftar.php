<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_daftar extends CI_Controller {

    function __construct() {
    	parent::__construct();
    	$this->load->model('M_daftar');
        $this->load->model('M_program');
        $this->load->model('M_cabang');
    }

    public function index() {
        $data['program']=$this->M_program->listProgram();
        $data['cabang']=$this->M_cabang->listCabang();
    	$this->load->view('form_daftar', $data);
    }

    public function add() {
    	$data = array(
    		'kode'           => $this->input->post('kode'),
            'nama'      =>  $this->input->post('nama'),
            'alamat'      =>  $this->input->post('alamat'),
            'email'      =>  $this->input->post('email'),
            'no_hp'      =>  $this->input->post('no_hp'),
            'sekolah'      =>  $this->input->post('sekolah'),
            'nama_ortu'=>  $this->input->post('nama_ortu'),
            'no_hp_ortu'      =>  $this->input->post('no_hp_ortu'),
            'id_program'      =>  $this->input->post('id_program'),
            'id_cabang'      =>  $this->input->post('id_cabang')
    	);
    	$data=$this->M_daftar->insert($data);
    	redirect('C_daftar');
    }
}
?>