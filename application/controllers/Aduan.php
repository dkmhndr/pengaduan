<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('bidang_crud');
        $this->load->model('aduan_model');
        $this->load->model('tanggapan_model');
        $this->load->library('form_validation');
    }

    public function index($id_bidang = null){
        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $petugas = $data['user'];
        $id_bidang = $petugas['id_bidang'];
        
        if($petugas['level']=='admin'){
        $data['aduan'] = $this->aduan_model->getAll();        
                $this->load->view('admin/header',$data);
                $this->load->view('admin/pengaduan',$data);
                $this->load->view('admin/footer',$data);
            }else{
                $data['aduan'] = $this->aduan_model->getByBidang($id_bidang);
                $this->load->view('petugas/header',$data);
                $this->load->view('admin/pengaduan',$data);
                $this->load->view('petugas/footer',$data);
        }
    }

    public function add(){
        $data['title'] = 'Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $aduan = $this->aduan_model;
        $validation = $this->form_validation;
        $validation->set_rules($aduan->rules());
        
        if($validation->run()){
                $aduan->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            
            $this->load->view('masyarakat/header', $data);
            $this->load->view('masyarakat/aduan', $data);
            $this->load->view('masyarakat/footer', $data);        
    }

    public function tanggapi($id = null){
        $data['title'] = 'Administrasi Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['id_pengaduan'] = $id;
        if(!isset($id)) redirect('aduan');
    
        $aduan = $this->tanggapan_model;
        $validation = $this->form_validation;
        $validation->set_rules($aduan->rules());

        if($validation->run()){
            $aduan->ditanggapi();
            $this->session->set_flashdata('success', 'Berhasil ditanggapi!');
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/tanggapi', $data);
        $this->load->view('admin/footer', $data);        
    }

    public function hoax($id=null){
        if(!isset($id)) show_404();
        if($this->tanggapan_model->hoax($id)){
            redirect('aduan');
        }
    }
}
?>