<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
    public function index(){
        $data['title'] = 'Halaman Petugas';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('petugas/header', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('petugas/footer', $data);
    }
}
?>