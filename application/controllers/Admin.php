<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
     public function __construct(){
        parent::__construct();
        $this->load->model('bidang_crud');
        $this->load->model('aduan_model');
        $this->load->model('tanggapan_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['dashboard'] = $this->aduan_model->getDashboardAdmin();
        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('admin/footer',$data);
    }
}
?>