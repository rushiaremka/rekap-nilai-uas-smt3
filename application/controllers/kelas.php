<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model');
    }

    public function index() {
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        $this->load->view('dosen/data-nilai-mhs', $data);
    }

    public function mahasiswa($id_kelas) {
        $data['mahasiswa'] = $this->Kelas_model->get_mahasiswa_by_kelas($id_kelas);
        $this->load->view('dosen/data-nilai-mhs', $data);
    }

    public function update_nilai() {
        $id_mahasiswa = $this->input->post('id_mahasiswa');
        $nilai = $this->input->post('nilai');
        $this->Kelas_model->update_nilai($id_mahasiswa, $nilai);
        echo "Nilai berhasil diperbarui!";
    }
}
