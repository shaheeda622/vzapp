<?php
session_start();
include 'form/myfunctions.php';
if(filter_input(INPUT_GET, 'clear') == 'y'){
  unset($_SESSION['start_form']);
}
crashbug(isset($_SESSION['start_form']) ? $_SESSION['start_form'] : array());