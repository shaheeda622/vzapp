<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CI MCS Extension
*
* Controller profile.php to be used with CI MCS Extension
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

class Profile extends MX_Controller
{

	public function index()
	{
		if ($this->session->userdata('user_id')==''){
			header('Location: '.url('home'));
		}else{
			$data = array();
			$data['userinfo'] = $this->master->get_userinfo();
			$data['meta']['title'] = 'Profile';
      echo modules::run('_main/render', $this->load->view('profile', $data, TRUE));
		}
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */