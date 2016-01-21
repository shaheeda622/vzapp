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
      $content['content'] = $this->load->view('home', '', TRUE);
      echo modules::run('_main/render', $content);
    }
  }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */