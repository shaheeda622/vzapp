<?php

require 'htm2pdfapi.php';
include __DIR__ . '/myfunctions.php';

$total_pages = 7;
$start_form = isset($_SESSION['start_form']) ? $_SESSION['start_form'] : array();
$app_type = isset($start_form['question2']) ? $start_form['question2'] : 'Individual';
$total_pages += isset($start_form['question3']['part1']) ? intval($start_form['question3']['part1']) : 0;
$total_pages += isset($start_form['question3']['part2']) ? intval($start_form['question3']['part2']) : 0;

$is_download = !empty($_GET['download']);
if($is_download){
  $_SESSION['start_form'] = $_POST;
  $_SESSION['start_form']['question2'] = $app_type;
  $_SESSION['start_form']['question3'] = array(
      'part1' => isset($start_form['question3']['part1']) ? intval($start_form['question3']['part1']) : '',
      'part2' => isset($start_form['question3']['part2']) ? intval($start_form['question3']['part2']) : ''
  );
}

if($app_type == 'Both' || $app_type == 'Individual'){
  $show_pic = TRUE;
  $ind_sh_inch = isset($start_form['ind_sh_inch']) ? $start_form['ind_sh_inch'] : array();
// UNCOMMENT BELOW IF YOU WANT TO REVERT PIC PAGE
//  foreach($ind_sh_inch as $isc){
//    if($isc == 'Yes'){
//      $show_pic = FALSE;
//      break;
//    }
//  }
  $show_fpoc = TRUE;
  $ind_fpoc = isset($start_form['ind_sh_fpo']) ? $start_form['ind_sh_fpo'] : array();
// UNCOMMENT BELOW IF YOU WANT TO REVERT FPOC PAGE
//  foreach($ind_fpoc as $isc){
//    if($isc == 'Yes'){
//      $show_fpoc = FALSE;
//      break;
//    }
//  }
//  if(isset($start_form['pic_sh_fpo'])){
//    $show_fpoc = FALSE;
//  }
  $total_pages += $show_pic ? 1 : 0;
  $total_pages += $show_fpoc ? 1 : 0;
}
ob_start();
$for_pdf = TRUE;
if(!$is_download){
  echo '<form id="final_form" method="post" action="' . url('licapp/submit?download=true') . '">';
}
$app_page = 1;

for($i = 0; $i < 9; $i++){
  $_GET['page'] = $i;
  include __DIR__ . "/template.php";
}
if(!$is_download){
  echo '</form>';
}
echo '<script type="text/javascript"></script>';
$buffer = ob_get_contents();
@ob_end_clean();
file_put_contents(FCPATH . '/forpdf.html', $buffer);
if(!$is_download){
  $link = url('licapp/submit?download=true');
}
else{
  require 'pdfcrowd.php';

  try{
    // create an API client instance
    $client = new Pdfcrowd("adminpdf", "74cc49e3c15d17571469238a24ae4739");

   // convert a web page and store the generated PDF into a $pdf variable
       //setPageMargins(5, 0, 0, 0);

    $pdf = $client->convertURI('http://www.vzonlineapplications.com/form/forpdf.html');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"License_Application_Form.pdf\"");

    // send the generated PDF
    echo $pdf;
    exit;
  }
  catch(PdfcrowdException $why){
    echo "Pdfcrowd Error: " . $why;
  }
}
echo '<div id="download_pdf_link" class="pdf_link" onClick="' . "$('#final_form').submit();" . '"><i class="fa fa-download"></i> Download as PDF</div>';
echo $buffer;



