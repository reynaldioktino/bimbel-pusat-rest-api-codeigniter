<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_program extends CI_Controller {

    function __construct() {
    	parent::__construct();
    	$this->load->model('M_program');
    }

    public function index() {
    	$this->load->view('dashboard');
    }

    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'kode'       =>  $this->input->post('kode'),
                'nama'      =>  $this->input->post('nama'),
                'tingkat'      =>  $this->input->post('tingkat'),
                'keterangan'      =>  $this->input->post('keterangan'),
                'harga'=>$this->input->post('harga')
                );
            $insert =  $this->M_program->insert($data);  
            redirect('C_admin/program');
        }else{
            $this->load->view('program/create');
        }
    }

    function edit(){
        if(isset($_POST['submit'])){
        	$kode = $this->input->post('kode');
            $data = array(
                'kode'       =>  $this->input->post('kode'),
                'nama'      =>  $this->input->post('nama'),
                'tingkat'      =>  $this->input->post('tingkat'),
                'keterangan'      =>  $this->input->post('keterangan'),
                'harga'=>$this->input->post('harga')
                );
            $update =  $this->M_program->update($data, $kode);  
            redirect('C_admin/program');
        }else{
            $kode = $this->uri->segment(3);
            $data['program'] = $this->M_program->getProgramWhereKode($kode)->result();
            $this->load->view('program/edit',$data);
        }
    }

    function delete($id) {
    	$delete = $this->M_program->delete($id);
    	redirect('C_admin/program');
    }
}
?>