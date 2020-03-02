<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('bidang_crud');
        $this->load->model('aduan_model');
        $this->load->model('tanggapan_model');
        $this->load->library('form_validation');
    }

    public function index($id = null){
        $data['title'] = 'Kelola Pengaduan';
        $data['user'] = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
        $data['id_pengaduan'] = $id;
        $data['tanggapan'] = $this->tanggapan_model->getByAduan($id);        
        // var_dump($data['tanggapan']);die;
                $this->load->view('masyarakat/header',$data);
                $this->load->view('masyarakat/tanggapan',$data);
                $this->load->view('masyarakat/footer',$data);
    }

    public function tanggapi($id = null){
        $data['title'] = 'Administrasi Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $petugas = $data['user'];
        $data['id_pengaduan'] = $id;
        if(!isset($id)) redirect('aduan');
    
        $tanggapan = $this->tanggapan_model;
        $validation = $this->form_validation;
        $validation->set_rules($tanggapan->rules());

        if($validation->run()){
            $tanggapan->ditanggapi();
            $this->session->set_flashdata('success', 'Berhasil ditanggapi!');
        }
        if($petugas['level']=='admin'){
        $this->load->view('admin/header', $data);
        $this->load->view('admin/tanggapi', $data);
        $this->load->view('admin/footer', $data); 
        }else{
        $this->load->view('petugas/header', $data);
        $this->load->view('admin/tanggapi', $data);
        $this->load->view('petugas/footer', $data); 
        }       
    }

    public function hoax($id=null){
        if(!isset($id)) show_404();
        if($this->tanggapan_model->hoax($id)){
            redirect('aduan');
        }
    }
}
?>