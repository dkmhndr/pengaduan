<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pengaduan Masyarakat';
            $this->load->view('auth/header',$data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }else {
            $this->_login();
        }
    }

    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $masyarakat = $this->db->get_where('masyarakat',['username'=>$username])->row_array();
        $petugas = $this->db->get_where('petugas',['username'=>$username])->row_array();

        if($masyarakat){
            if(password_verify($password, $masyarakat['password'])){
                $data = [
                    'username' => $masyarakat['username']
                ];
                $this->session->set_userdata($data);
                redirect('masyarakat');
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('auth');
            }
        }elseif($petugas) {
            if(password_verify($password, $petugas['password'])){
                    if($petugas['level'] == 'admin'){
                        $data = [
                            'username' => $petugas['username']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                    }else{
                        $data = [
                            'username' => $petugas['username']
                        ];
                        $this->session->set_userdata($data);
                        redirect('petugas');
                    }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('auth');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration(){
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required'); 
        $this->form_validation->set_rules('nama', 'Nama', 'required'); 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[masyarakat.username]',['is_unique' => 'This username has already registered']);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',[
            'matches' => 'Password doesnt match',
            'min_length' => 'Password too short!'
        ]);   
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        
        if($this->form_validation->run() == false){
            $data['title'] = 'Pendaftaran Akun';   
            $this->load->view('auth/header',$data);
            $this->load->view('auth/registration');
            $this->load->view('auth/footer');
        }else{
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp'), true)
            ];
            $this->db->insert('masyarakat',$data);
            $this->session->set_flashdata('message','Registration Success');
            redirect('auth');
        }
    }

    public function registrationpetugas(){
        $this->form_validation->set_rules('id_bidang', 'Bidang', 'trim|required'); 
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'trim|required'); 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[masyarakat.username]',['is_unique' => 'This username has already registered']);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',[
            'matches' => 'Password doesnt match',
            'min_length' => 'Password too short!'
        ]);   
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        
        if($this->form_validationn->run() == false){
            $data['title'] = 'Register';   
            $this->load->view('auth/registrationpetugas');
        }else{
            $data = [
                'id_petugas' => '',
                'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => password_hash($this->input->post('telp'), PASSWORD_DEFAULT),
                'level' => password_hash($this->input->post('level'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('petugas',$data);
            $this->session->set_flashdata('message','Registration Success');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('akses');
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">You has been logged out.</div>');
        redirect('auth');
    }
}

?>