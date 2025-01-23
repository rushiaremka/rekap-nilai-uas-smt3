<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Dosen_model');
    }

    public function editNilai() {
        $mahasiswa= $this->Dosen_model->daftarmahasiswa();
        $this->load->view('dosen/edit-nilai', $mahasiswa);
    }

    public function hitungMahasiswa() {
        $total_mhs = $this->Dosen_model->hitungMahasiswa();
        $this->load->view('dosen/edit-nilai', $total_mhs);
    }
    
}
