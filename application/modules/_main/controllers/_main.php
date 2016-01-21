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
class _main extends MX_Controller{

  public function __construct(){
    parent::__construct();
    $this->lang->load('message');
  }

  public function _remap(){
    echo 'No direct access allowed';
  }

  public function render($content){
    $data['header_tags'] = empty($content['header_tags']) ? '' : $content['header_tags'];
    $data['content'] = empty($content['content']) ? '' : $content['content'];
    $this->load->view('template', $data);
  }

  public function top($meta = ''){
    $data = array();
    $data['meta']['title'] = (!empty($meta['title']) ? $meta['title'] : 'Home');
    $data['meta']['description'] = (!empty($meta['description']) ? $meta['description'] : '');
    $data['userinfo'] = $this->master->get_userinfo();
    $this->load->view('_top', $data);
  }

  public function bottom(){
    $this->load->view('_bottom');
  }

  public function basictop($meta = ''){
    $data = array();
    $data['meta']['title'] = (!empty($meta['title']) ? $meta['title'] : 'Home');
    $data['meta']['description'] = (!empty($meta['description']) ? $meta['description'] : 'CI MCS Extension from Exoiz Development.');
    $data['userinfo'] = $this->master->get_userinfo();
    $this->load->view('basic_top', $data);
  }

  public function basicbottom(){
    $this->load->view('basic_bottom');
  }

}

/* End of file _main.php */
/* Location: ./application/modules/_main/controllers/_main.php */