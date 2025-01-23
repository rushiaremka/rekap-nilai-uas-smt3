<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model{
    public function get_all() {
        return $this->db->get('ci_mahasiswa')->result();
    }

    public function insert($data) {
        return $this->db->insert('ci_mahasiswa', $data);
    }


    public function get_by_id($id_users) {
        $query = ("select * from ci_mahasiswa where id_users = $id_users");
        return $this->db->query($query)->row();
    }    

    public function get_by_email($usem) {
        $this->db->where('email_mahasiswa', $usem);
        $query = $this->db->get('ci_mahasiswa');
        
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
        return null; 
    }

    public function update($id_users, $data) {
        $this->db->where('id_mahasiswa', $id_users);
        return $this->db->update('ci_mahasiswa', $data);
    }

    public function delete($id_mahasiswa){
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        return $this->db->delete('ci_mahasiswa');
        $this->db->query("set @i := 0; update ci_mahasiswa set id_mahasiswa = @i := @i + 1; alter table ci_mahasiswa auto_increment = max(id_mahasiswa) + 1;");
    }
}