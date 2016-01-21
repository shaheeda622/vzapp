<?php

if(!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * CI MCS Extension
 *
 * Controller _main.php to be used with CI MCS Extension
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
    $content['content'] = $this->load->view('index', '', TRUE);
    echo modules::run('_main/render', $content);
  }

}

/* End of file _main.php */
/* Location: ./application/modules/_main/controllers/_main.php */