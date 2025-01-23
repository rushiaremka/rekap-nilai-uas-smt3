<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Susu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Dosen_model');
		$this->load->model('Mahasiswa_model');
		$this->load->model('Nilai_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function ganyu() {
		$this->load->view('header/header');
		$this->load->view('index/index');
	}

    public function ayakalogin() {
        $this->load->view('login-register/login');
    }

    // public function ayakaregister() {
    //     $this->load->view('login-register/register');
    // }

	public function unlogged() {
		$this->load->view('login-register/unlogged');
	}
}
