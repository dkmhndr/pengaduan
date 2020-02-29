<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_model extends CI_Model{
    private $pengaduan = "pengaduan";
    private $tabletanggapan = "tanggapan";

    public $id_tanggapan;
    public $id_pengaduan;
    public $tgl_tanggapan;
    public $id_petugas;

    public function rules(){
        return[
            
            ['field' => 'id_pengaduan',
            'label' => 'id_pengaduan',
            'rules' => 'required'],
            
            ['field' => 'tgl_tanggapan',
            'label' => 'tgl_tanggapan',
            'rules' => 'required'],
            
            ['field' => 'tanggapan',
            'label' => 'tanggapan',
            'rules' => 'required'],
            
            ['field' => 'id_petugas',
            'label' => 'id_petugas',
            'rules' => 'required']
        ];
    }

   public function ditanggapi(){
       $post = $this->input->post();
       $this->id_pengaduan = $post["id_pengaduan"];
       $this->tgl_tanggapan = $post["tgl_tanggapan"];
       $this->tanggapan = $post["tanggapan"];
       $this->id_petugas = $post["id_petugas"];
       $this->db->update($this->pengaduan, array('status' => 'Ditanggapi'), array('id_pengaduan' => $post['id_pengaduan'])); 
       $this->db->insert($this->tabletanggapan, $this );
    }
 
    public function hoax($id){
        return $this->db->update($this->pengaduan, array('status' => 'Hoax'), array('id_pengaduan' => $id)); 
       }
}

?>