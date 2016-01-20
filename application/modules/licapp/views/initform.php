<?php

$_SESSION['start_form'] = $_POST;
$la_name = $_GET['la_name'];
$response = array('status' => 'success', 'la_name' => $la_name);
include 'db.php';
include 'form/myfunctions.php';
$mysqli = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if($mysqli->connect_errno){
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  $response['status'] = 'error';
}
else{
  $licence_app = array(
      'la_name' => $la_name,
      'la_company_name' => get_field('question4', 'option1'),
      'la_company_name2' => get_field('question4', 'option2'),
      'la_company_name3' => get_field('question4', 'option3'),
      'la_business_activities' => get_field('question5'),
      'la_company_type' => get_field('Company_Type__c'),
      'la_share_capital' => get_field('share_capital'),
      'la_license_type' => get_field('question2'),
      'la_no_sh' => intval(get_field('question3', 'part1')) + intval(get_field('question3', 'part2'))
  );

  $corporarte = intval(get_field('question3', 'part1'));
  $individuals = intval(get_field('question3', 'part2'));

  $shareholders = array();

  for($i = 0; $i < $individuals; $i++){
    $shareholder = array(
        'sh_type' => 'Individual',
        'sh_pic' => get_field('ind_sh_inch', $i) == 'Yes' ? 1 : 0,
        'sh_fpoc' => get_field('ind_sh_fpo', $i) == 'Yes' ? 1 : 0,
        'sh_gender' => get_field('ind_sh_gen', $i),
        'sh_marital_status' => get_field('ind_sh_mar', $i),
        'sh_children' => get_field('ind_sh_child', $i) == 'Yes' ? 1 : 0,
        'sh_title' => get_field('ind_sh_title', $i),
        'sh_first_name' => get_field('ind_first_name', $i),
        'sh_middle_name' => get_field('ind_middle_name', $i),
        'sh_last_name' => get_field('ind_last_name', $i),
        'sh_dob' => get_field('ind_dob', $i),
        'sh_nationality' => get_field('ind_nationality', $i),
        'sh_pass_id' => get_field('ind_pass_id', $i),
        'sh_pass_issue_d' => get_field('ind_pid', $i),
        'sh_designation' => get_field('ind_designation', $i),
        'sh_uae_resident' => get_field('ind_uae_resident', $i) == 'Yes' ? 1 : 0,
        'sh_uae_stamp' => get_field('ind_uae_stamp', $i) == 'Yes' ? 1 : 0,
        'sh_per_o_sha' => get_field('ind_per_o_sha', $i),
        'sh_val_p_sha' => get_field('ind_per_o_sha', $i),
        'sh_num_o_sha' => get_field('ind_num_o_sha', $i),
        'sh_val_of_sha' => get_field('ind_num_o_sha', $i),
        'sh_ad_street' => get_field('ind_ad_street', $i),
        'sh_ad_postal' => get_field('ind_ad_postal', $i),
        'sh_ad_state' => get_field('ind_ad_state', $i),
        'sh_ad_city' => get_field('ind_ad_city', $i),
        'sh_ad_mobile' => get_field('ind_ad_mobile', $i),
        'sh_ad_email' => get_field('ind_ad_email', $i),
        'sh_ad_country' => get_field('ind_ad_country', $i),
        'sh_ad_telhome' => get_field('ind_ad_telhome', $i),
        'sh_ad_teloffice' => get_field('ind_ad_teloffice', $i),
        'sh_ad_fax' => get_field('ind_ad_fax', $i),
        'sh_p_ad_same' => get_field('ind_p_ad_same', $i) == 'Yes' ? 1 : 0,
        'sh_p_street' => get_field('ind_p_street', $i),
        'sh_p_postal' => get_field('ind_p_postal', $i),
        'sh_p_state' => get_field('ind_p_state', $i),
        'sh_p_city' => get_field('ind_p_city', $i),
        'sh_p_mobile' => get_field('ind_p_mobile', $i),
        'sh_p_email' => get_field('ind_p_email', $i),
        'sh_p_country' => get_field('ind_p_country', $i),
        'sh_p_telhome' => get_field('ind_p_telhome', $i),
        'sh_p_teloffice' => get_field('ind_p_teloffice', $i),
        'sh_cop_name' => '',
        'sh_cop_pre_name' => '',
        'sh_cop_trade_name' => '',
        'sh_d_of_inc' => '',
        'sh_j_incor' => '',
        'sh_reg_num' => '',
        'sh_license_name' => $la_name
    );
    $shareholders[] = $shareholder;
  }


  for($i = 0; $i < $corporarte; $i++){
    $shareholder = array(
        'sh_type' => 'Corporate',
        'sh_pic' => get_field('cop_sh_inch', $i) == 'Yes' ? 1 : 0,
        'sh_fpoc' => get_field('cop_sh_fpo', $i) == 'Yes' ? 1 : 0,
        'sh_gender' => '',
        'sh_marital_status' => '',
        'sh_children' => '',
        'sh_title' => '',
        'sh_first_name' => '',
        'sh_middle_name' => '',
        'sh_last_name' => '',
        'sh_dob' => '',
        'sh_nationality' => '',
        'sh_pass_id' => '',
        'sh_pass_issue_d' => '',
        'sh_designation' => '',
        'sh_uae_resident' => get_field('cop_uae_resident', $i) == 'Yes' ? 1 : 0,
        'sh_uae_stamp' => get_field('cop_uae_stamp', $i) == 'Yes' ? 1 : 0,
        'sh_per_o_sha' => get_field('cop_per_o_sha', $i),
        'sh_val_p_sha' => get_field('cop_per_o_sha', $i),
        'sh_num_o_sha' => get_field('cop_num_o_sha', $i),
        'sh_val_of_sha' => get_field('cop_num_o_sha', $i),
        'sh_ad_street' => get_field('cop_ad_street', $i),
        'sh_ad_postal' => get_field('cop_ad_postal', $i),
        'sh_ad_state' => get_field('cop_ad_state', $i),
        'sh_ad_city' => get_field('cop_ad_city', $i),
        'sh_ad_mobile' => get_field('cop_ad_mobile', $i),
        'sh_ad_email' => get_field('cop_ad_email', $i),
        'sh_ad_country' => get_field('cop_ad_country', $i),
        'sh_ad_telhome' => get_field('cop_ad_telhome', $i),
        'sh_ad_teloffice' => get_field('cop_ad_teloffice', $i),
        'sh_ad_fax' => get_field('cop_ad_fax', $i),
        'sh_p_ad_same' => get_field('cop_p_ad_same', $i) == 'Yes' ? 1 : 0,
        'sh_p_street' => get_field('cop_p_street', $i),
        'sh_p_postal' => get_field('cop_p_postal', $i),
        'sh_p_state' => get_field('cop_p_state', $i),
        'sh_p_city' => get_field('cop_p_city', $i),
        'sh_p_mobile' => get_field('cop_p_mobile', $i),
        'sh_p_email' => get_field('cop_p_email', $i),
        'sh_p_country' => get_field('cop_p_country', $i),
        'sh_p_telhome' => get_field('cop_p_telhome', $i),
        'sh_p_teloffice' => get_field('cop_p_teloffice', $i),
        'sh_cop_name' => get_field('cop_name', $i),
        'sh_cop_pre_name' => get_field('cop_previousname', $i),
        'sh_cop_trade_name' => get_field('cop_tradename', $i),
        'sh_d_of_inc' => get_field('cop_d_of_inc', $i),
        'sh_j_incor' => get_field('cop_j_incor', $i),
        'sh_reg_num' => get_field('cop_reg_num', $i),
        'sh_license_name' => $la_name
    );
    $shareholders[] = $shareholder;
  }


  $sh_pic = array(
      'sh_type' => 'pic',
      'sh_pic' => get_field('pic_sh_inch') == 'Yes' ? 1 : 0,
      'sh_fpoc' => get_field('pic_sh_fpo') == 'Yes' ? 1 : 0,
      'sh_gender' => get_field('pic_sh_gen'),
      'sh_marital_status' => get_field('pic_sh_mar'),
      'sh_children' => get_field('pic_sh_child') == 'Yes' ? 1 : 0,
      'sh_title' => get_field('pic_sh_title'),
      'sh_first_name' => get_field('pic_first_name'),
      'sh_middle_name' => get_field('pic_middle_name'),
      'sh_last_name' => get_field('pic_last_name'),
      'sh_dob' => get_field('pic_dob'),
      'sh_nationality' => get_field('pic_nationality'),
      'sh_pass_id' => get_field('pic_pass_id'),
      'sh_pass_issue_d' => get_field('pic_pid'),
      'sh_designation' => get_field('pic_dDesig'),
      'sh_uae_resident' => get_field('pic_uae_resident') == 'Yes' ? 1 : 0,
      'sh_uae_stamp' => get_field('pic_uae_stamp') == 'Yes' ? 1 : 0,
      'sh_per_o_sha' => get_field('pic_per_o_sha'),
      'sh_val_p_sha' => get_field('pic_per_o_sha'),
      'sh_num_o_sha' => get_field('pic_num_o_sha'),
      'sh_val_of_sha' => get_field('pic_num_o_sha'),
      'sh_ad_street' => get_field('pic_ad_street'),
      'sh_ad_postal' => get_field('pic_ad_postal'),
      'sh_ad_state' => get_field('pic_ad_state'),
      'sh_ad_city' => get_field('pic_ad_city'),
      'sh_ad_mobile' => get_field('pic_ad_mobile'),
      'sh_ad_email' => get_field('pic_ad_email'),
      'sh_ad_country' => get_field('pic_ad_country'),
      'sh_ad_telhome' => get_field('pic_ad_telhome'),
      'sh_ad_teloffice' => get_field('pic_ad_teloffice'),
      'sh_ad_fax' => get_field('pic_ad_fax'),
      'sh_p_ad_same' => get_field('pic_p_ad_same') == 'Yes' ? 1 : 0,
      'sh_p_street' => get_field('pic_p_street'),
      'sh_p_postal' => get_field('pic_p_postal'),
      'sh_p_state' => get_field('pic_p_state'),
      'sh_p_city' => get_field('pic_p_city'),
      'sh_p_mobile' => get_field('pic_p_mobile'),
      'sh_p_email' => get_field('pic_p_email'),
      'sh_p_country' => get_field('pic_p_country'),
      'sh_p_telhome' => get_field('pic_p_telhome'),
      'sh_p_teloffice' => get_field('pic_p_teloffice'),
      'sh_cop_name' => '',
      'sh_cop_pre_name' => '',
      'sh_cop_trade_name' => '',
      'sh_d_of_inc' => '',
      'sh_j_inc' => '',
      'sh_reg_num' => '',
      'sh_license_name' => $la_name
  );
  $shareholders[] = $sh_pic;


  $sh_fpc = array(
      'sh_type' => 'fpc',
      'sh_pic' => get_field('fpc_sh_inch') == 'Yes' ? 1 : 0,
      'sh_fpoc' => get_field('fpc_sh_fpo') == 'Yes' ? 1 : 0,
      'sh_gender' => get_field('fpc_sh_gen'),
      'sh_marital_status' => get_field('fpc_sh_mar'),
      'sh_children' => get_field('fpc_sh_child') == 'Yes' ? 1 : 0,
      'sh_title' => get_field('fpc_sh_title'),
      'sh_first_name' => get_field('fpc_first_name'),
      'sh_middle_name' => get_field('fpc_middle_name'),
      'sh_last_name' => get_field('fpc_last_name'),
      'sh_dob' => get_field('fpc_dob'),
      'sh_nationality' => get_field('fpc_nationality'),
      'sh_pass_id' => get_field('fpc_pass_id'),
      'sh_pass_issue_d' => get_field('fpc_pid'),
      'sh_designation' => get_field('fpc_dDesig'),
      'sh_uae_resident' => get_field('fpc_uae_resident') == 'Yes' ? 1 : 0,
      'sh_uae_stamp' => get_field('fpc_uae_stamp') == 'Yes' ? 1 : 0,
      'sh_per_o_sha' => get_field('fpc_per_o_sha'),
      'sh_val_p_sha' => get_field('fpc_per_o_sha'),
      'sh_num_o_sha' => get_field('fpc_num_o_sha'),
      'sh_val_of_sha' => get_field('fpc_num_o_sha'),
      'sh_ad_street' => get_field('fpc_ad_street'),
      'sh_ad_postal' => get_field('fpc_ad_postal'),
      'sh_ad_state' => get_field('fpc_ad_state'),
      'sh_ad_city' => get_field('fpc_ad_city'),
      'sh_ad_mobile' => get_field('fpc_ad_mobile'),
      'sh_ad_email' => get_field('fpc_ad_email'),
      'sh_ad_country' => get_field('fpc_ad_country'),
      'sh_ad_telhome' => get_field('fpc_ad_telhome'),
      'sh_ad_teloffice' => get_field('fpc_ad_teloffice'),
      'sh_ad_fax' => get_field('fpc_ad_fax'),
      'sh_p_ad_same' => get_field('fpc_p_ad_same') == 'Yes' ? 1 : 0,
      'sh_p_street' => get_field('fpc_p_street'),
      'sh_p_postal' => get_field('fpc_p_postal'),
      'sh_p_state' => get_field('fpc_p_state'),
      'sh_p_city' => get_field('fpc_p_city'),
      'sh_p_mobile' => get_field('fpc_p_mobile'),
      'sh_p_email' => get_field('fpc_p_email'),
      'sh_p_country' => get_field('fpc_p_country'),
      'sh_p_telhome' => get_field('fpc_p_telhome'),
      'sh_p_teloffice' => get_field('fpc_p_teloffice'),
      'sh_cop_name' => '',
      'sh_cop_pre_name' => '',
      'sh_cop_trade_name' => '',
      'sh_d_of_inc' => '',
      'sh_j_incor' => '',
      'sh_reg_num' => '',
      'sh_license_name' => $la_name
  );
  $shareholders[] = $sh_fpc;

  if(!$la_name){
    $result = $mysqli->query('SELECT MAX(la_name) as pk FROM licenseapp');
    $row = $result->fetch_array(MYSQLI_ASSOC); /* free result set */
    $result->free();
    $la_name = (($row && $row['pk']) ? $row['pk'] : 'LA-00000');

    if($la_name != 'LA-00000'){
      $parts = explode('-', $la_name);
      $la_name = $parts[0] . '-' . str_pad((intval($parts[1]) + 1), 5, '0', STR_PAD_LEFT);
    }
    $licence_app['la_name'] = $la_name;
    $response['la_name'] = $la_name;
    $keys = array_keys($licence_app);
    $values = array_values($licence_app);
    $query = 'INSERT INTO licenseapp (' . implode(',', $keys) . ') values(\'' . implode('\',\'', $values) . '\')';
    $mysqli->query($query);
    foreach($shareholders as $shareholder){
      $shareholder['sh_license_name'] = $la_name;
      $keys = array_keys($shareholder);
      $values = array_values($shareholder);
      $query = 'INSERT INTO shareholder (' . implode(',', $keys) . ') values(\'' . implode('\',\'', $values) . '\')';
      $mysqli->query($query);
    }
  }
  else{
    $set = array();
    foreach($licence_app as $key => $value){
      $set[] = "$key = '$value'";
    }
    // $set[la_modified_date] = "$key = '$value'";

    $query = 'UPDATE licenseapp SET ' . implode(',', $set) . ' WHERE la_name = \'' . $la_name . '\'';
    $mysqli->query($query);
    $mysqli->query('DELETE FROM shareholder WHERE sh_license_name= \'' . $la_name . '\'');
    foreach($shareholders as $shareholder){
      $shareholder['sh_license_name'] = $la_name;
      $keys = array_keys($shareholder);
      $values = array_values($shareholder);
      $query = 'INSERT INTO shareholder (' . implode(',', $keys) . ') values(\'' . implode('\',\'', $values) . '\')';
      $mysqli->query($query);
    }
  }
  $mysqli->close();
}
header('Content-Type: application/json');
echo json_encode($response);
