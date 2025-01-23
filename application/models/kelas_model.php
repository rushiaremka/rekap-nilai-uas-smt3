<?php
class Kelas_model extends CI_Model {

    public function get_all_kelas() {
        return $this->db->get('kelas')->result_array();
    }

    public function get_mahasiswa_by_kelas($id_kelas) {
        $this->db->select('mahasiswa.id_mahasiswa, mahasiswa.nama, nilai.nilai, kelas.nama_kelas');
        $this->db->from('mahasiswa');
        $this->db->join('nilai', 'nilai.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = mahasiswa.id_kelas', 'left');
        $this->db->where('mahasiswa.id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function update_nilai($id_mahasiswa, $nilai) {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('nilai', ['nilai' => $nilai]);
    }
}
