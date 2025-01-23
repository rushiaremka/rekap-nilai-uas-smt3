<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {
    
    // public function __construct() {
    //     // Panggil konstruktor CI_Model secara otomatis
    //     parent::__construct();
    // }

    public function check_user_exist($username, $email) {
        $this->db->or_where('username', $username);
        $this->db->or_where('email_users', $email);
        $query = $this->db->get('ci_users');
        
        if ($query->num_rows() > 0) {
            return true; 
        }
        return false;  
    }


    public function insert_user($user_data) {
        return $this->db->insert('ci_users', $user_data);  
    }

    public function get_user_by_username_or_email($usem) {
        $this->db->group_start(); 
        $this->db->where('username', $usem);
        $this->db->or_where('email_users', $usem);
        $this->db->group_end(); 
        $query = $this->db->get('ci_users');
        
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
        return null; 
    }

    public function get_role($usem) {
        $this->db->select('role');
        $this->db->where('email_users', $usem);
        $query = $this->db->get('ci_users');
        
        if ($query->num_rows() > 0) {
            return $query->row()->role;
        }
        return null;
    }




    public function update_profile_picture($user_id, $file_name) {
        $data = array(
            'profile_picture' => $file_name
        );

        $this->db->where('id_users', $user_id);
        return $this->db->update('ci_users', $data);
    }
}
