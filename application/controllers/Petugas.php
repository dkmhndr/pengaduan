<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
    public function index(){
        $this->load->view('petugas/index');
    }
}
?>