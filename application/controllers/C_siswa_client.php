<?php
Class C_siswa_client extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://192.168.43.39:8080/bimbel_cabang1/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('M_siswa');
    }
    
    // menampilkan data kontak
    function index(){
        $data['siswa'] = json_decode($this->curl->simple_get($this->API.'/C_siswa_server'));
        $this->load->view('siswa_client/list', $data);
    }
    
    // edit data kontak
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'kode'       =>  $this->input->post('kode'),
                'nama'      =>  $this->input->post('nama'),
                'email'      =>  $this->input->post('email'),
                'no_hp'=>  $this->input->post('no_hp'),
                'alamat'      =>  $this->input->post('alamat'),
                'id_cabang'      =>  $this->input->post('id_cabang')
            );
            $update =  $this->curl->simple_put($this->API.'/C_siswa_server', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('C_siswa_client');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['siswa'] = json_decode($this->curl->simple_get($this->API.'/C_siswa_server',$params));
            $this->load->view('siswa_client/edit',$data);
        }
    }
    
    // delete data kontak
    function delete($id){
        if(empty($id)){
            redirect('C_siswa_client');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/C_siswa_server', array('kode'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('C_siswa_client');
        }
    }

    function daftar() {
        if(isset($_POST['submit'])){
            $data = array(
                'kode'       =>  $this->input->post(''),
                'nama'      =>  $this->input->post('nama'),
                'email'      =>  $this->input->post('email'),
                'no_hp'=>  $this->input->post('no_hp'),
                'alamat'      =>  $this->input->post('alamat'),
                'id_cabang'      =>  $this->input->post('id_cabang')
            );
            $insert = $this->M_siswa->insert($data); 
            // if($insert == true)
            // {
            //     $this->session->set_flashdata('hasil','Data Berhasil Ditambahkan Ke Database');
            // }else
            // {
            //    $this->session->set_flashdata('hasil','Data Gagal Ditambahkan Ke Database');
            // }
            redirect('C_siswa_client');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['siswa'] = json_decode($this->curl->simple_get($this->API.'/C_siswa_server',$params));
            $this->load->view('siswa_client/daftar',$data);
        }
    }
}