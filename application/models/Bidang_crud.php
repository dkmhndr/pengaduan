<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_crud extends CI_Model{
    private $_table = "bidang";

    public $id_bidang;
    public $nama_bidang;

    public function rules(){
        return[
            
            ['field' => 'nama_bidang',
            'label' => 'nama_bidang',
            'rules' => 'required']
        ];
    }

   public function getAll(){
       return $this->db->get($this->_table)->result();
   }
   
   public function getById($id){
       return $this->db->get_where($this->_table,["id_bidang" => $id])->row();
   }

   public function save(){
       $post = $this->input->post();
       $this->nama_bidang = $post["nama_bidang"];
       $this->db->insert($this->_table, $this);   
   }

   public function update(){
       $post = $this->input->post();
       $this->id_bidang = $post["id"];
       $this->nama_bidang = $post["nama_bidang"];
        $this->db->update($this->_table, $this, array('id_bidang' => $post['id']));
        
   }

   public function delete($id){
       return $this->db->delete($this->_table,array("id_bidang" => $id));
       
   }
}

?>