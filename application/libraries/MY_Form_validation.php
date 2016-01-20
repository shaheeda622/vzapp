<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CI MCS Extension
* 
* Library MY_Form_validation.php to be used with CI MCS Extension
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

class MY_Form_validation extends CI_Form_validation {

	function __construct(){
        parent::__construct();
    }

    function error_array(){
        return $this->_error_array;
    }

    function field_data(){
		$field_data = array();
		foreach ($this->_field_data as $f_key => $f_value) {
			$field_data[$f_value['field']] = html_entity_decode($f_value['postdata']);
		}
		return $field_data;
    }

	function clean($str)
	{
		return clean_utf8($str);
	}
	
	function clean_num($str)
	{
		return trim(preg_replace('/[^0-9 \.\-]/', '', $str));
	}

	function date($date) {
		$format = 'YYYY-MM-DD';
		if ($date=='0000-00-00' || $date=='0-0-0'){
			return TRUE;
		}
		if (strlen($date) >= 8 && strlen($date) <= 10){
			$separator_only = str_replace(array('M','D','Y'),'', $format);
			$separator = $separator_only[0];
			if ($separator){
				$regexp = str_replace($separator, "\\" . $separator, $format);
				$regexp = str_replace('MM', '(0[1-9]|1[0-2])', $regexp);
				$regexp = str_replace('M', '(0?[1-9]|1[0-2])', $regexp);
				$regexp = str_replace('DD', '(0[1-9]|[1-2][0-9]|3[0-1])', $regexp);
				$regexp = str_replace('D', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
				$regexp = str_replace('YYYY', '\d{4}', $regexp);
				$regexp = str_replace('YY', '\d{2}', $regexp);
				if ($regexp != $date && preg_match('/'.$regexp.'$/', $date)){
					foreach (array_combine(explode($separator,$format), explode($separator,$date)) as $key=>$value) {
						if ($key == 'YY') $year = '20'.$value;
						if ($key == 'YYYY') $year = $value;
						if ($key[0] == 'M') $month = $value;
						if ($key[0] == 'D') $day = $value;
					}
					if (checkdate($month,$day,$year)) return TRUE;
				}
			}
		}
		return FALSE;
	}
	
	function date_no_zero($date) {
		$format = 'YYYY-MM-DD';
		if (strlen($date) >= 8 && strlen($date) <= 10){
			$separator_only = str_replace(array('M','D','Y'),'', $format);
			$separator = $separator_only[0];
			if ($separator){
				$regexp = str_replace($separator, "\\" . $separator, $format);
				$regexp = str_replace('MM', '(0[1-9]|1[0-2])', $regexp);
				$regexp = str_replace('M', '(0?[1-9]|1[0-2])', $regexp);
				$regexp = str_replace('DD', '(0[1-9]|[1-2][0-9]|3[0-1])', $regexp);
				$regexp = str_replace('D', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
				$regexp = str_replace('YYYY', '\d{4}', $regexp);
				$regexp = str_replace('YY', '\d{2}', $regexp);
				if ($regexp != $date && preg_match('/'.$regexp.'$/', $date)){
					foreach (array_combine(explode($separator,$format), explode($separator,$date)) as $key=>$value) {
						if ($key == 'YY') $year = '20'.$value;
						if ($key == 'YYYY') $year = $value;
						if ($key[0] == 'M') $month = $value;
						if ($key[0] == 'D') $day = $value;
					}
					if (checkdate($month,$day,$year)) return TRUE;
				}
			}
		}
		return FALSE;
	}
	
	function select($str)
	{
		if (!preg_match('/^[0-9]+$/',$str)){
			return FALSE;
		}
		return TRUE;
	}
	
	function select_no_zero($str)
	{
		if (!preg_match('/^[0-9]+$/',$str)){
			return FALSE;
		}
		if ($str==0){
			return FALSE;
		}
		return TRUE;
	}
	
	function positive_numeric($str)
	{
		return (bool)preg_match( '/^[0-9]*\.?[0-9]+$/', $str);
	}
	
	/* Removed + and replaced CI built-in function */
	function numeric($str)
	{
		return (bool)preg_match( '/^[\-]?[0-9]*\.?[0-9]+$/', $str);
	}
	
	function greater_than_e($str, $min)
	{
		if ( ! is_numeric($str))
		{
			return FALSE;
		}
		return $str >= $min;
	}

	function less_than_e($str, $max)
	{
		if ( ! is_numeric($str))
		{
			return FALSE;
		}
		return $str <= $max;
	}
	
}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/Form_validation.php */