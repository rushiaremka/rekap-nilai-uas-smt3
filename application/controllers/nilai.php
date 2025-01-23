<?php

defined("BASEPATH") or exit('no direct script access allowed');

class Nilai extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Matkul_model');
    }

	public function nilai_mhs() {
		$this->load->view('header/header');
		$data['nilai'] = $this->Nilai_model->get_all(); 
		$this->load->view('dosen/data-nilai-mhs', $data);
	}

    public function edit_nilai() {
        $id_nilai = $this->input->post('id_nilai');  
        $nilai = $this->input->post('nilai'); 
        
        $data = array(
            'id_nilai' => $id_nilai,
            'nilai' => $nilai
        );
        
        $this->Nilai_model->update($data);  
        redirect('nilai/nilai_mhs');
    }
    

}