<?php

if(!defined('BASEPATH')){
  exit('No direct script access allowed');
}

/**
 * CI MCS Extension
 *
 * Controller _ajax.php to be used with CI MCS Extension
 *
 * @package		CI MCS Extension
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.exoiz.com/mcs_license
 * @Version		3.0.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
class _ajax extends MX_Controller{

  public function __construct(){
    parent::__construct();
    $this->lang->load('message');
  }

  function login(){
    $data_array = array();
    $data_array['msg'] = '0';
    $data_array['msg_data'] = 'An error occurred!';
    $this->form_validation->set_rules('login_email', '<strong>Email</strong>', 'clean|required|valid_email|max_length[255]');
    $this->form_validation->set_rules('login_password', '<strong>Password</strong>', 'clean|required|max_length[255]');
    if($this->form_validation->run() == FALSE){
      $this->form_validation->set_error_delimiters('&bull;&nbsp;', '<br>');
      $data_array['msg_data'] = validation_errors();
      $data_array['error_array'] = $this->form_validation->error_array();
      $data_array['field_data'] = $this->form_validation->field_data();
    }
    else{
      $login_email = $this->input->post('login_email');
      $login_password = $this->input->post('login_password');
      $query = $this->db
        ->from('users')
        ->where('user_email', (string) $login_email)
        ->where('user_password', (string) md5('salty' . $login_password))
        ->limit(1)
        ->get();
      if($query->num_rows() > 0){
        $row = $query->row_array();
        $this->session->set_userdata('user_id', $row['user_id']);
        $this->session->set_userdata('user_firstname', $row['user_firstname']);
        $this->session->set_userdata('user_admin', $row['user_admin']);
        $data_array['name'] = $row['user_firstname'];
        $data_array['msg'] = '1';
        $data_array['msg_data'] = '<strong>Login successful!</strong>';
        $data_array['msg_extra'] = $row['user_language'];
      }
      else{
        $data_array['msg'] = '0';
        $data_array['msg_data'] = 'Invalid login details!';
      }
    }
    $data['msg'] = json_encode($data_array);
    $this->load->view('_ajax/_blank', $data);
  }

  function save_profile(){
    $data_array = array();
    $data_array['msg'] = '0';
    $data_array['msg_data'] = 'An error occurred!';
    if($this->session->userdata('user_id') != ''){
      $is_admin = is_admin($this);
      $this->form_validation->set_rules('user_firstname', '<strong>Firstname</strong>', 'clean|required|max_length[255]');
      $this->form_validation->set_rules('user_lastname', '<strong>Lastname</strong>', 'clean|required|max_length[255]');
      if($is_admin){
        $this->form_validation->set_rules('user_email', '<strong>Email</strong>', 'clean|required|valid_email|max_length[255]');
        $this->form_validation->set_rules('user_password', '<strong>Password</strong>', 'clean|max_length[255]');
        $required = ($this->input->post('user_password') != '' ? 'required|' : '');
        $this->form_validation->set_rules('confirm_password', '<strong>Confirm Password</strong>', 'clean|' . $required . 'matches[user_password]|max_length[255]');
      }
      if($this->form_validation->run() == FALSE){
        $this->form_validation->set_error_delimiters('&bull;&nbsp;', '<br>');
        $data_array['msg_data'] = validation_errors();
        $data_array['error_array'] = $this->form_validation->error_array();
        $data_array['field_data'] = $this->form_validation->field_data();
      }
      else{
        $data_array['field_data'] = $this->form_validation->field_data();
        $this->db->set('user_firstname', $this->input->post('user_firstname'));
        $this->db->set('user_lastname', $this->input->post('user_lastname'));
        if($is_admin){
          $user_password = $this->input->post('user_password');
          $this->db->set('user_email', $this->input->post('user_email'));
          if($user_password){
            $this->db->set('user_password', md5('salty' . $user_password));
          }
        }
        $this->db->set('user_modified', date('Y-m-d H:i:s'));
        $this->db->where('user_id', (string) $this->session->userdata('user_id'));
        $this->db->update('users');
        $data_array['affected_rows'] = $this->db->affected_rows();
        /* DB END */
        $data_array['msg'] = '1';
        $data_array['msg_data'] = '<strong>Saved successfully!</strong>';
      }
    }
    $data['msg'] = json_encode($data_array);
    $this->load->view('_ajax/_blank', $data);
  }

  function add_user(){
    $data_array = array();
    $data_array['msg'] = '0';
    $data_array['msg_data'] = 'An error occurred!';
    if($this->session->userdata('user_id') != ''){
      $userinfo = $this->master->get_userinfo();
      if($userinfo['user']['user_admin'] == '1'){
        $user_email = $this->input->post('user_email');
        $email_exists =  $this->master->check_duplicate($user_email) > 0;
        $this->form_validation->set_rules('user_firstname', '<strong>First Name</strong>', 'clean|required|max_length[255]');
        $this->form_validation->set_rules('user_lastname', '<strong>Last Name</strong>', 'clean|required|max_length[255]');
        $this->form_validation->set_rules('user_email', '<strong>Email</strong>', 'clean|required|valid_email|max_length[255]');
        $this->form_validation->set_rules('user_password', '<strong>Password</strong>', 'clean|required|max_length[255]');
        $validate = $this->form_validation->run();
        if(! $validate && $email_exists){
          $this->form_validation->set_error_delimiters('&bull;&nbsp;', '<br>');
          $data_array['msg_data'] = '<strong>User exists with email ' . $user_email . '!</strong><br />' . validation_errors();
          $data_array['error_array'] = $this->form_validation->error_array();
          $data_array['field_data'] = $this->form_validation->field_data();
        }
        elseif(! $validate){
          $this->form_validation->set_error_delimiters('&bull;&nbsp;', '<br>');
          $data_array['msg_data'] = validation_errors();
          $data_array['error_array'] = $this->form_validation->error_array();
          $data_array['field_data'] = $this->form_validation->field_data();
        }
        elseif($email_exists){
          $data_array['msg_data'] = '<strong>User exists with email ' . $user_email . '!</strong>';
          $data_array['error_array'] = array();
          $data_array['field_data'] = $this->form_validation->field_data();
        }
        else{
          $user_firstname = $this->input->post('user_firstname');
          $user_lastname = $this->input->post('user_lastname');
          $user_email = $this->input->post('user_email');
          $user_password = $this->input->post('user_password');
          /* DB START */
          $this->db->set('user_firstname', $user_firstname);
          $this->db->set('user_lastname', $user_lastname);
          $this->db->set('user_email', $user_email);
          $this->db->set('user_password', md5('salty' . $user_password));
          $this->db->set('user_created', date('Y-m-d H:i:s'));
          $this->db->set('user_modified', date('Y-m-d H:i:s'));
          $this->db->insert('users');
          $data_array['insert_id'] = $this->db->insert_id();
          /* DB END */
          $data_array['msg'] = '1';
          $data_array['msg_data'] = '<strong>Saved successfully!</strong>';
          $this->session->set_flashdata('msg', $data_array['msg']);
          $this->session->set_flashdata('msg_data', $data_array['msg_data']);
        }
      }
    }
    $data['msg'] = json_encode($data_array);
    $this->load->view('_ajax/_blank', $data);
  }

  function save_user_details(){
    $data_array = array();
    $data_array['msg'] = '0';
    $data_array['msg_data'] = 'An error occurred!';
    if($this->session->userdata('user_id') != ''){
      $userinfo = $this->master->get_userinfo();
      if($userinfo['account']['account_admin'] == '1'){
        $this->form_validation->set_rules('user_id', '<strong>User ID</strong>', 'clean|required');
        $this->form_validation->set_rules('user_firstname', '<strong>First Name</strong>', 'clean|required|max_length[255]');
        $this->form_validation->set_rules('user_lastname', '<strong>Last Name</strong>', 'clean|required|max_length[255]');
        $this->form_validation->set_rules('user_email', '<strong>Email</strong>', 'clean|required|valid_email|max_length[255]');
        if($this->form_validation->run() == FALSE){
          $this->form_validation->set_error_delimiters('&bull;&nbsp;', '<br>');
          $data_array['msg_data'] = validation_errors();
          $data_array['error_array'] = $this->form_validation->error_array();
          $data_array['field_data'] = $this->form_validation->field_data();
        }
        else{
          $data_array['field_data'] = $this->form_validation->field_data();
          $user_id = $this->input->post('user_id');
          $user_firstname = $this->input->post('user_firstname');
          $user_lastname = $this->input->post('user_lastname');
          $user_email = $this->input->post('user_email');
          $user_password = $this->input->post('user_password');
          /* DB START */
          $this->db->set('user_firstname', $user_firstname);
          $this->db->set('user_lastname', $user_lastname);
          $this->db->set('user_email', $user_email);
          if($user_password != ''){
            $this->db->set('user_password', md5('salty' . $user_password));
          }
          $this->db->where('user_id', (string) $user_id);
          $this->db->update('users');
          $data_array['affected_rows'] = $this->db->affected_rows();
          /* DB END */
          $data_array['msg'] = '1';
          $data_array['msg_data'] = '<strong>Saved successfully!</strong>';
        }
      }
    }
    $data['msg'] = json_encode($data_array);
    $this->load->view('_ajax/_blank', $data);
  }

}

/* End of file _ajax.php */
/* Location: ./application/controllers/_ajax.php */