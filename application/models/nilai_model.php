<?php
defined("BASEPATH") or exit('no direct script access allowed');

class Nilai_model extends CI_Model{
    public function get_all() {
        $this->db->select('ci_nilai.*, ci_mahasiswa.nama_mahasiswa as nama_mhs, ci_matkul.nama_matkul as nama_matkul');
        $this->db->from('ci_nilai');
        $this->db->join('ci_mahasiswa', 'ci_nilai.id_mahasiswa = ci_mahasiswa.id_mahasiswa');
        $this->db->join('ci_matkul', 'ci_nilai.id_matkul = ci_matkul.id_matkul');
        return $this->db->get()->result();
    }

    

    public function get_by_id($id_nilai) {
        $this->db->select('ci_nilai.*, ci_mahasiswa.nama_mahasiswa as nama_mhs, ci_matkul.nama_matkul as nama_matkul');
        $this->db->from('ci_nilai');
        $this->db->join('ci_mahasiswa', 'ci_nilai.id_mahasiswa = ci_mahasiswa.id_mahasiswa');
        $this->db->join('ci_matkul', 'ci_nilai.id_matkul = ci_matkul.id_matkul');
        $this->db->where('ci_nilai.id_nilai', $id_nilai);
        return $this->db->get()->row();
    }

    public function get_nilai_by_id_user($id_users) {
        $this->db->select('ci_nilai.nilai, ci_matkul.nama_matkul');
        $this->db->from('ci_nilai');
        $this->db->join('ci_mahasiswa', 'ci_nilai.id_mahasiswa = ci_mahasiswa.id_mahasiswa');
        $this->db->join('ci_matkul', 'ci_nilai.id_matkul = ci_matkul.id_matkul');
        $this->db->where('ci_mahasiswa.id_users', $id_users);
        return $this->db->get()->result();
    }
    

    public function insert($data){
        $this->db->insert('ci_nilai', $data);
    }

    public function delete($id_users){
        $this->db->where('id_mahasiswa', $id_users);
        $this->db->delete('ci_nilai');
    }

    public function update($data) {
        $this->db->where('id_nilai', $data['id_nilai']);
        $this->db->update('ci_nilai', $data);
    }

}