<?php

require_once('header-common.php');

$start_form = isset($_SESSION['start_form']) ? $_SESSION['start_form'] : array();

$page = isset($_GET['page']) ? $_GET['page'] : 0;

$app_type = isset($start_form['question2']) ? $start_form['question2'] : 'Individual';
if($page > 10){
  $page = 10;
}

if($page == 2){
  if($embed){
    $count = $shareholders;
  }
  else{
    $count = isset($start_form['question3']['part1']) ? intval($start_form['question3']['part1']) : 1;
  }
  if($app_type == 'Both' || $app_type == 'Corporate'){
    for($countsherholder = 1; $countsherholder <= $count; $countsherholder++){
      require __DIR__ . '/header.php';
      require __DIR__ . "/page$page.php";
      require __DIR__ . '/footer.php';
    }
  }
}
elseif($page == 3){
  if($embed){
    $count = $shareholders;
  }
  else{
    $count = isset($start_form['question3']['part2']) ? intval($start_form['question3']['part2']) : 1;
  }
  if($app_type == 'Both' || $app_type == 'Individual'){
    for($countsherholder = 1; $countsherholder <= $count; $countsherholder++){
      require __DIR__ . '/header.php';
      require __DIR__ . "/page$page.php";
      require __DIR__ . '/footer.php';
    }
    $show_pic = TRUE;
// UNCOMMENT BELOW IF YOU WANT TO REVERT PIC PAGE
//    if(isset($start_form['ind_sh_inch'])){
//      $ind_sh_inch = $start_form['ind_sh_inch'];
//    }
//    else{
//      $ind_sh_inch = array();
//    }
//
//    foreach($ind_sh_inch as $isc){
//      if($isc == 'Yes'){
//        $show_pic = FALSE;
//        break;
//      }
//    }
    if($show_pic){
      require __DIR__ . '/header.php';
      require __DIR__ . "/page3a.php";
      require __DIR__ . '/footer.php';
    }
    $show_fpoc = TRUE;
// UNCOMMENT BELOW IF YOU WANT TO REVERT FPOC PAGE
//    if(isset($start_form['ind_sh_fpo'])){
//      $ind_fpoc = $start_form['ind_sh_fpo'];
//    }
//    else{
//      $ind_fpoc = array();
//    }
//    foreach($ind_fpoc as $isc){
//      if($isc == 'Yes'){
//        $show_fpoc = FALSE;
//        break;
//      }
//    }
//    if(isset($start_form['pic_sh_fpo'])){
//      $show_fpoc = FALSE;
//    }
    if($show_fpoc){
      require __DIR__ . '/header.php';
      require __DIR__ . "/page3b.php";
      require __DIR__ . '/footer.php';
    }
  }
}
else{
  require __DIR__ . '/header.php';
  require __DIR__ . "/page$page.php";
  require __DIR__ . '/footer.php';
}