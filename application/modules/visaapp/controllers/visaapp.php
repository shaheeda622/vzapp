<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class visaapp extends MX_Controller{

  public function __construct(){
    parent::__construct();
    $this->lang->load('message');
    if(filter_input(INPUT_GET, 'clear') == 'y'){
      unset($_SESSION['start_form']);
      header('Location: ' . url('visaapp'));
    }
  }

   public function index(){
        $url = url();
        $content['header_tags'] = '<link rel="stylesheet" href="' . $url . 'visaappres/css/font-awesome.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/main.css">';
        $content['content'] = $this->load->view('visaform', '', TRUE);
        echo modules::run('_main/render', $content);
   }

  
   public function requirement(){
        $url = url();
        $content['header_tags'] = '<link rel="stylesheet" href="' . $url . 'visaappres/css/font-awesome.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/main.css">';
        $content['content'] = $this->load->view('requirement', '', TRUE);
        echo modules::run('_main/render', $content);
   }
  
  
    public function passrequirement(){
        $url = url();
        $content['header_tags'] = '<link rel="stylesheet" href="' . $url . 'visaappres/css/font-awesome.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/main.css">';
        $content['content'] = $this->load->view('passrequirement', '', TRUE);
        echo modules::run('_main/render', $content);
   }
  
    public function locationmap(){
        $url = url();
        $content['header_tags'] = '<link rel="stylesheet" href="' . $url . 'visaappres/css/font-awesome.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/main.css">';
        $content['content'] = $this->load->view('locationmap', '', TRUE);
        echo modules::run('_main/render', $content);
   }
  
    public function locationmapbiometrics(){
        $url = url();
        $content['header_tags'] = '<link rel="stylesheet" href="' . $url . 'visaappres/css/font-awesome.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/main.css">';
        $content['content'] = $this->load->view('locationmapbiometrics', '', TRUE);
        echo modules::run('_main/render', $content);
   }
  
    public function empcontract(){
        $url = url();
        $content['header_tags'] = '<link rel="stylesheet" href="' . $url . 'visaappres/css/font-awesome.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . $url . 'visaappres/css/main.css">';
        $content['content'] = $this->load->view('empcontract', '', TRUE);
        echo modules::run('_main/render', $content);
   }
  
  
}

/* End of file _main.php */
/* Location: ./application/modules/_main/controllers/_main.php */