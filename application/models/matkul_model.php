<?php
DEFINED('BASEPATH') or exit('no direcct script access allowed');

class Matkul_model extends CI_Model{
    public function get_all() {
        $this->db->get('matakuliah')->result();
    }

    public function insert($data){
        $this->db->insert('matakuliah', $data);
    }
}