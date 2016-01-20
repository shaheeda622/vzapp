<?php

if(!defined('BASEPATH')){
  exit('No direct script access allowed');
}

class Master extends CI_Model{

  const TABLE_USERS = 'users';

  function get_userinfo($user_id_force = ''){
    $data = array();
    $user_id = $user_id_force ? $user_id_force : $this->session->userdata('user_id');
    $this->db->where('user_id', (string) $user_id);
    $query = $this->db->get(self::TABLE_USERS);
    if($query->num_rows() > 0){
      $data['user'] = $query->row_array();
    }
    else{
      $users = $this->db->list_fields('users');
      for($i = 0; $i < count($users); $i++){
        $data['user'][$users[$i]] = '';
      }
    }
    return $data;
  }

  public function check_duplicate($email_id){
    return $this->db->where('user_email', $email_id)->count_all_results('users');
  }

  public function delete_user($user_id){
    $this->db->where('user_id', $user_id)->delete('users');
  }
}

/* End of file master.php */
/* Location: ./application/models/master.php */