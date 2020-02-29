<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('bidang_crud');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $data['bidang'] = $this->bidang_crud->getAll();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/bidang',$data);
        $this->load->view('admin/footer',$data);
    }

    public function add(){
        $data['title'] = 'Administrasi Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $bidang = $this->bidang_crud;
        $validation = $this->form_validation;
        $validation->set_rules($bidang->rules());
        
        if($validation->run()){
                $bidang->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            
            $this->load->view('admin/header', $data);
            $this->load->view('admin/bidangadd', $data);
            $this->load->view('admin/footer', $data);        
    }

    public function edit($id = null){
        $data['title'] = 'Administrasi Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        if(!isset($id)) redirect('bidang');
    
        $bidang = $this->bidang_crud;
        $validation = $this->form_validation;
        $validation->set_rules($bidang->rules());

        if($validation->run()){
            $bidang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["bidang"] = $bidang->getById($id);
        if(!$data["bidang"]) show_404();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/bidangedit', $data);
        $this->load->view('admin/footer', $data);        
    }

    public function delete($id=null){
        if(!isset($id)) show_404();
        if($this->bidang_crud->delete($id)){
            redirect(site_url('bidang'));
        }
        
    }
}
?>