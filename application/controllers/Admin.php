<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('admin/footer',$data);
    }
}
?>