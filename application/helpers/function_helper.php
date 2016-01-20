<?php

if(!defined('BASEPATH')){
  exit('No direct script access allowed');
}

function url($uri = ''){
  $url_array = explode('/', site_url($uri));
  $x = count($url_array);
  $url = '';
  for($i = 3; $i < $x; $i++){
    $url.= '/' . $url_array[$i];
  }
  return $url;
}

function go_home(){
  header('Location: '. url('home'));
}

function pr($array){
  echo '<pre>' . print_r($array, true) . '</pre>';
}

function smartQuotesUE($str, $utf8 = '1'){
  if($utf8 == '1'){
    $smart = array("\xE2\x80\x93", "\xE2\x80\x94", "\xE2\x80\x98", "\xE2\x80\x99", "\xE2\x80\x9C", "\xE2\x80\x9D", "\xE2\x80\xA2", "\xE2\x80\xA6");
    $replace = array('-', '-', '\'', '\'', '"', '"', '*', '...');
  }
  else{
    $smart = array(chr(19), chr(24), chr(25), chr(28), chr(29));
    $replace = array('-', '\'', '\'', '"', '"');
  }
  return str_replace($smart, $replace, $str);
}

function nl2br2($text){
  return preg_replace("/\r\n|\n|\r/", "<br>", $text);
}

function clean_utf8($str){
  return nl2br2(trim(utf8_encode(htmlentities(smartQuotesUE($str)))));
}

function is_num($num){
  return preg_match('/^[0-9]+$/', $num);
}

function is_admin($obj){
  return $obj->session->userdata('user_admin') == '1';
}

function can_access($obj, $module){
  if(is_admin($obj)){
    return TRUE;
  }
  return $obj->session->userdata('user_access') == $module;
}

function crashbug($val){
  if(is_array($val) OR is_object($val)){
    echo '<pre>';
    print_r($val);
    echo '</pre>';
  }
  else{
    echo $val;
  }
  die();
}

/* End of file lang_url_helper.php */
/* Location: ./application/helper/lang_url_helper.php */