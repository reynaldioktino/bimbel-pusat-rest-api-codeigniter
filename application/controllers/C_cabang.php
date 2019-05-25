<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cabang extends CI_Controller {

    function __construct() {
    	parent::__construct();
    	$this->load->model('M_cabang');
    }

    public function index() {
    	$this->load->view('dashboard');
    }

    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'kode'       =>  $this->input->post('kode'),
                'kota'      =>  $this->input->post('kota'),
                'nama'      =>  $this->input->post('nama'),
                'alamat'      =>  $this->input->post('alamat')
                );
            $insert =  $this->M_cabang->insert($data);  
            redirect('C_admin/cabang');
        }else{
            $this->load->view('cabang/create');
        }
    }

    function edit(){
        if(isset($_POST['submit'])){
        	$kode = $this->input->post('kode');
            $data = array(
                'kode'       =>  $this->input->post('kode'),
                'kota'      =>  $this->input->post('kota'),
                'nama'      =>  $this->input->post('nama'),
                'alamat'      =>  $this->input->post('alamat')
            );
            $update =  $this->M_cabang->update($data, $kode);  
            redirect('C_admin/cabang');
        }else{
            $kode = $this->uri->segment(3);
            $data['cabang'] = $this->M_cabang->getCabangWhereKode($kode)->result();
            $this->load->view('cabang/edit',$data);
        }
    }

    function delete($id) {
    	$delete = $this->M_cabang->delete($id);
    	redirect('C_admin/cabang');
    }
}
?>