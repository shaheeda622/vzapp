<?php

if(!defined('BASEPATH')){
  exit('No direct script access allowed');
}

class Login extends MX_Controller{

  public function index(){
    $data = array();
    $data['meta']['title'] = 'Login';
    $this->load->view('login', $data);
  }

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */