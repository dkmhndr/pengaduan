<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('bidang_crud');
        $this->load->model('aduan_model');
        $this->load->model('tanggapan_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['title'] = 'Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
        $masyarakat= $data['user'];
        $nik = $masyarakat['nik'];
        $data['dashboard'] = $this->aduan_model->getDashMasyarakat($nik);
        $this->load->view('masyarakat/header', $data);
        $this->load->view('masyarakat/index', $data);
        $this->load->view('masyarakat/footer', $data);
    }
}
?>