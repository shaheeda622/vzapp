<?php

if(!defined('BASEPATH')){
  exit('No direct script access allowed');
}

class Home extends MX_Controller{

  public function index(){
    if($this->session->userdata('user_id') == ''){
      header('Location: ' . url('login'));
    }
    else{
      $data = array();
      $data['userinfo'] = $this->master->get_userinfo();
      $data['meta']['title'] = 'Home';
      echo modules::run('_main/render', $this->load->view('home', '', TRUE));
    }
  }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */