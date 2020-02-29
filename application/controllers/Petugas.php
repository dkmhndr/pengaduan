<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('bidang_crud');
        $this->load->model('aduan_model');
        $this->load->model('tanggapan_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['title'] = 'Halaman Petugas';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $petugas= $data['user'];
        $id_bidang = $petugas['id_bidang'];
        $data['dashboard'] = $this->aduan_model->getDashboardPetugas($id_bidang);
        $this->load->view('petugas/header', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('petugas/footer', $data);
    }
}
?>