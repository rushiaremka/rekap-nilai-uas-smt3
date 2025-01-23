<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function uploadImage() {
        if ($_FILES['cropped_image']) {
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/profile_photos/';
            $config['allowed_types'] = '*';
            $config['detect_mime'] = TRUE; 
            $config['max_size'] = 10000;
            $config['encrypt_name'] = true;
            $config['file_name'] = time() . "_" . $_FILES['cropped_image']['name'];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('cropped_image')) {
                $data = $this->upload->data();
                echo json_encode(['status' => 'success', 'file_path' => $data['file_name']]);
                $user_id = $this->session->userdata('user_id'); 
                $this->User_model->update_profile_picture($user_id, 'uploads/profile_photos/' . $data["file_name"]);
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
            }

            
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No image uploaded.']);
        }
    }
}
