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

            ['field' => 'status',
            'label' => 'status',
            'rules' => 'required']
        ];
    }

   public function getByBidang($id_bidang){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('bidang','bidang.id_bidang = pengaduan.id_bidang');
        $this->db->join('masyarakat','masyarakat.nik = pengaduan.nik');
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
        $this->db->join('masyarakat','masyarakat.nik = pengaduan.nik');
        return $this->db->get()->result();
   }

   public function getDashboardAdmin(){
       $jmllaporan = $this->db->count_all('pengaduan');
       $ditanggapi = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Ditanggapi'))->count_all_results();
       $menunggu = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Menunggu Tanggapan'))->count_all_results();
       $hoax = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Hoax'))->count_all_results();
       return array('jmllaporan'=>$jmllaporan,'ditanggapi'=>$ditanggapi,'menunggu'=>$menunggu,'hoax'=>$hoax);
   }

   public function getDashboardPetugas($id_bidang){
       $jmllaporan = $this->db->select('*')->from('pengaduan')->where(array('id_bidang'=>$id_bidang))->count_all_results();
       $ditanggapi = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Ditanggapi'))->where(array('id_bidang'=>$id_bidang))->count_all_results();
       $menunggu = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Menunggu Tanggapan'))->where(array('id_bidang'=>$id_bidang))->count_all_results();
       $hoax = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Hoax'))->where(array('id_bidang'=>$id_bidang))->count_all_results();
       return array('jmllaporan'=>$jmllaporan,'ditanggapi'=>$ditanggapi,'menunggu'=>$menunggu,'hoax'=>$hoax);
   }

   public function getDashMasyarakat($nik){
       $jmllaporan = $this->db->select('*')->from('pengaduan')->where(array('nik'=>$nik))->count_all_results();
       $ditanggapi = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Ditanggapi'))->where(array('nik'=>$nik))->count_all_results();
       $menunggu = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Menunggu Tanggapan'))->where(array('nik'=>$nik))->count_all_results();
       $hoax = $this->db->select('*')->from('pengaduan')->where(array('status'=>'Hoax'))->where(array('nik'=>$nik))->count_all_results();
       return array('jmllaporan'=>$jmllaporan,'ditanggapi'=>$ditanggapi,'menunggu'=>$menunggu,'hoax'=>$hoax);
   }
   
   public function save(){
       $post = $this->input->post();
       $this->id_bidang = $post["id_bidang"];
       $this->tgl_pengaduan = $post["tgl_pengaduan"];
       $this->nik = $post["nik"];
       $this->isi_laporan = $post["isi_laporan"];
       $this->foto = $this->_uploadImage();
       $this->status = "Menunggu Tanggapan";
       $this->db->insert($this->pengaduan, $this);   
   }

    private function _uploadImage(){
    $config['upload_path'] = './upload/pengaduan/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['file_name'] = uniqid();
    $config['overwrite'] = true;
    // $config['max_size'] = 4096; // 1MB
    // $config['max_width'] = 1024;
    // $config['max_height'] = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
    return $this->upload->data("file_name");
    }

    return "default.jpg";
    }
}

?>