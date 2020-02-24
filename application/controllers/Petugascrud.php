<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugascrud extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('bidang_crud');
    }
    
    public function index(){
        
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('bidang','bidang.id_bidang = petugas.id_bidang');
        $query = $this->db->get()->result();
        
        $data['title'] = 'Administrasi Pengaduan Masyarakat';
        $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();;
            $data['petugas'] = $query;
            $this->load->view('admin/header',$data);
            $this->load->view('admin/petugas');
            $this->load->view('admin/footer');
    }

    public function add(){
        $this->form_validation->set_rules('id_bidang', 'Bidang', 'trim|required'); 
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required'); 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[petugas.username]|is_unique[masyarakat.username]',['is_unique' => 'Username telah terdaftar!']);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',[
            'matches' => 'Password doesnt match',
            'min_length' => 'Password too short!'
            ]);   
            $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
            $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
            $this->form_validation->set_rules('level', 'Level', 'trim|required');
            
        if($this->form_validation->run() == false){
            $data['title'] = 'Pendaftaran Akun';   
            $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
            $data['bidang'] = $this->bidang_crud->getAll();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/petugasadd');
            $this->load->view('admin/footer');
        }else{
            $data = [
                'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp'), true),
                'level' => htmlspecialchars($this->input->post('level'), true)
            ];
            $this->db->insert('petugas',$data);
            $this->session->set_flashdata('message','Registration Success');
            redirect('petugascrud');
        }
    }
    public function update($id=null){
        $this->form_validation->set_rules('id_bidang', 'Bidang', 'trim|required'); 
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required'); 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[petugas.username]',['is_unique' => 'This username has already registered']);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',[
            'matches' => 'Password doesnt match',
            'min_length' => 'Password too short!'
            ]);   
            $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
            $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
            $this->form_validation->set_rules('level', 'Level', 'trim|required');
            
            if($this->form_validation->run() == false){
                $data['user'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
                $query = $this->db->get_where('petugas',["id_petugas" => $id])->row();
                $data['title'] = 'Perubahan Akun';   
                $data['value'] = $query;   
            $data['bidang'] = $this->bidang_crud->getAll();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/petugasedit');
            $this->load->view('admin/footer');
        }else{
            $data = [
                'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp'), true),
                'level' => htmlspecialchars($this->input->post('level'), true)
            ];
            $this->db->update('petugas',$data, array('id_petugas'=> $post['id']));
            $this->session->set_flashdata('message','Update Success');
            redirect('petugascrud');
        }
    }
    public function delete($id=null){
        if(!isset($id)) show_404();
        if($this->db->delete('petugas',array('id_petugas'=>$id))){
            redirect(site_url('petugascrud'));
        }
    }
}
?>