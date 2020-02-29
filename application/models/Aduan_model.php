<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan_model extends CI_Model{
    private $pengaduan = "pengaduan";
    private $tabletanggapan = "tanggapan";

    public $id_bidang;
    public $tgl_pengaduan;
    public $nik;
    public $isi_laporan;
    public $foto;
    public $status;

        public function rules(){
        return[
            
            ['field' => 'id_bidang',
            'label' => 'id_bidang',
            'rules' => 'required'],
            
            ['field' => 'tgl_pengaduan',
            'label' => 'tgl_pengaduan',
            'rules' => 'required'],
            
            ['field' => 'nik',
            'label' => 'nik',
            'rules' => 'required'],
            
            ['field' => 'isi_laporan',
            'label' => 'isi_laporan',
            'rules' => 'required'],
            
            ['field' => 'foto',
            'label' => 'foto',
            'rules' => 'required'],
            
            ['field' => 'status',
            'label' => 'status',
            'rules' => 'required']
        ];
    }

   public function getByBidang($id_bidang){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('bidang','bidang.id_bidang = pengaduan.id_bidang');
        $this->db->join('masyarakat','masyarakat.nik = masyarakat.nik');
        $this->db->where(array('pengaduan.id_bidang'=>$id_bidang));
        return $this->db->get()->result();
   }

   public function getByNik($nik){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('bidang','bidang.id_bidang = pengaduan.id_bidang');
        $this->db->join('masyarakat','masyarakat.nik = pengaduan.nik');
        $this->db->where(array('masyarakat.nik'=>$nik));
        return $this->db->get()->result();
   }
   
   public function getAll(){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('bidang','bidang.id_bidang = pengaduan.id_bidang');
        $this->db->join('masyarakat','masyarakat.nik = masyarakat.nik');
        return $this->db->get()->result();
   }
   
   public function save(){
       $post = $this->input->post();
       $this->id_bidang = $post["id_bidang"];
       $this->tgl_pengaduan = $post["tgl_pengaduan"];
       $this->nik = $post["nik"];
       $this->isi_laporan = $post["isi_laporan"];
       $this->foto = $post["foto"];
       $this->status = "Menunggu Tanggapan";
       $this->db->insert($this->pengaduan, $this);   
   }

}

?>