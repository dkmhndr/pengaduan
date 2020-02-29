<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller{
    public function index(){
        $data['title'] = 'Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('masyarakat/header', $data);
        $this->load->view('masyarakat/index', $data);
        $this->load->view('masyarakat/footer', $data);
    }
}
?>