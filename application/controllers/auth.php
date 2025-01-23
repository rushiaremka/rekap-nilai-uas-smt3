<?php 
defined('BASEPATH') or exit("No direct script access allowed");

class Auth extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('session'); 
    }
    // public function proses_register() {
    //     $this->load->database();
    //     $name = $this->input->post('name');
    //     $username = $this->input->post('username');
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');
    //     $confirm_password = $this->input->post('confirmPassword');

    //     if(!empty($name) && !empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {
    //         if($password !== $confirm_password){
    //             $this->session->set_flashdata('error', 'password tidak sama, coba ulangi kembali');
    //             redirect('susu/ayakaregister');
    //         }
    //         $this->load->model('User_model');
            
    //         if($this->User_model->check_user_exist($username, $email)){
    //             $this->session->set_flashdata('error', 'Username atau email sudah terdaftar');
    //             redirect('susu/ayakaregister');
    //         }
    
    //         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //         echo $hashed_password;
    
    //         $user_data = array(
    //             'nama_users' => $name,
    //             'username' => $username,
    //             'email_users' => $email,
    //             'password' => $hashed_password
    //         );
    
    //         if($this->User_model->insert_user($user_data)) {
    //             $this->session->set_flashdata('sukses', 'registrasi berhasil, silahkan login');
    //             redirect('susu/ayakalogin');
    //         }
    //         else{
    //             $this->session->set_flashdata('error', 'terjadi kesalahan saaat registrasi');
    //             redirect('susu/ayakaregister');
    //         }
    //     }

    //     else{
    //         $this->session->set_flashdata('error', 'field tidak boleh kosong');
    //         redirect('susu/ayakaregister?=app(error)="field_tidak_boleh_kosong"');
    //     }
    // }

    public function proses_login() {
        $this->load->database();
        $usem = $this->input->post('usem');
        $password = $this->input->post('password');

        $this->load->model('User_model');
        $this->load->model("Mahasiswa_model");

        $user = $this->User_model->get_user_by_username_or_email($usem);
        $role = $this->User_model->get_role($usem);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id_users);
            $this->session->set_userdata('username', $user->username);
            redirect('susu/ganyu');
        }
        else {
                $this->session->set_flashdata('error', 'username, email, atau password tidak ditemukan');
                redirect('susu/ayakalogin?app=error(tidak-ditemukan)');
            } 
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('susu/ayakalogin');
    }
}