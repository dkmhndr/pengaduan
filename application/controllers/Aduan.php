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

    public function index(){
        $data['title'] = 'Kelola Pengaduan';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
        $petugas = $data['user'];
        $masyarakat = $data['masyarakat'];
        $id_bidang = $petugas['id_bidang'];
        $nik = $masyarakat['nik'];
        $data['nik'] = $nik;
        
        if($petugas['level']=='admin'){
                $data['aduan'] = $this->aduan_model->getAll();        
                $data['user'] = $petugas;
                $this->load->view('admin/header',$data);
                $this->load->view('admin/pengaduan',$data);
                $this->load->view('admin/footer',$data);
            }elseif($petugas['level']=='petugas'){
                $data['aduan'] = $this->aduan_model->getByBidang($id_bidang);
                $data['user'] = $petugas;
                $this->load->view('petugas/header',$data);
                $this->load->view('admin/pengaduan',$data);
                $this->load->view('admin/footer',$data);
        }else{
            $data['aduan'] = $this->aduan_model->getByNik($nik);
            $data['user'] = $masyarakat;
                $this->load->view('masyarakat/header',$data);
                $this->load->view('admin/pengaduan',$data);
                $this->load->view('admin/footer',$data);
        }
    }

        public function add(){
        $data['title'] = 'Buat Aduan';
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['bidang'] = $this->bidang_crud->getAll();
        $aduan = $this->aduan_model;
        $validation = $this->form_validation;
        $validation->set_rules($aduan->rules());
        
        if($validation->run()){
                $aduan->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            
            $this->load->view('masyarakat/header', $data);
            $this->load->view('masyarakat/aduanadd', $data);
            $this->load->view('masyarakat/footer', $data);        
    }
}
?>