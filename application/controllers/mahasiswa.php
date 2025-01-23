<?php
defined("BASEPATH") or exit('no direct script access allowed ');

class Mahasiswa extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function show_data() {
        $this->load->view('header/header');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all();
        $this->load->view('admin/data-mhs', $data);
    }

    public function add_data() {
        $this->load->view('header/header');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all();
        $this->load->view('admin/tambah-data', $data);
    }

    public function proses_tambah_data() {
        $this->load->view('header/header');
        $data = array(
            'id_users' => $this->input->post('id_users'),
            'nama_mahasiswa' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'alamat_mahasiswa' => $this->input->post('alamat'),
            'email_mahasiswa' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'prodi' => $this->input->post('prodi'),
            'fakultas' => $this->input->post('fakultas'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
        );
        if($this->Mahasiswa_model->insert($data)) {
            redirect('mahasiswa/show_data');
        } else {
            echo "Data sudah ada";
            redirect('mahasiswa/show_data');
        }
    }

    public function delete($id_mahasiswa) {
        log_message('debug', 'ID Mahasiswa: ' . $id_mahasiswa);
        $this->Mahasiswa_model->delete($id_mahasiswa);
        redirect('mahasiswa/show_data');
    }

    public function lihat_data($id_users) {
        $this->load->model('Nilai_model');
        $this->load->view('header/header');
        $id_users = $this->session->userdata('user_id');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_by_id($id_users);
        $data['nilai'] = $this->Nilai_model->get_nilai_by_id_user($id_users);
        $this->load->view('mahasiswa/lihat-data', $data);
    }


}
