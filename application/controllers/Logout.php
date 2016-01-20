<?php

if(!defined('BASEPATH')){
  exit('No direct script access allowed');
}

class Logout extends MX_Controller{

  public function index(){
    if($this->session->userdata('user_id') != ''){
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('user_admin');
      $this->session->unset_userdata('user_access');
      $this->session->sess_destroy();
    }
    header('Location: ' . url('login'));
  }

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */