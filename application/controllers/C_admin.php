<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    function __construct() {
    	parent::__construct();
        $this->load->model('M_cabang');
        $this->load->model('M_program');
        $this->load->model('M_daftar');

    }

    public function index() {
    	$this->load->view('dashboard');
    }

    public function cabang() {
        $data['cabang']=$this->M_cabang->listCabang();
        $this->load->view('cabang/list', $data);
    }
    public function program(){
        $data['program']=$this->M_program->listProgram();
        $this->load->view('program/list', $data);          
    }
    public function daftar(){
        $data['daftar']=$this->M_daftar->listDaftar();
        $this->load->view('list_daftar', $data);
    }
}
?>