<?php

function curPageName(){
  return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

function get_field($name, $index = FALSE){
  $return_value = '';
  if($index === FALSE){
    $return_value = isset($_SESSION['start_form'][$name]) ? $_SESSION['start_form'][$name] : '';
  }
  else{
    $return_value = isset($_SESSION['start_form'][$name][$index]) ? $_SESSION['start_form'][$name][$index] : '';
  }
  return $return_value;
}

function set_field($name, $value, $index = FALSE){
  if($index === FALSE){
    $_SESSION['start_form'][$name] = $value;
  }
  else{
    $_SESSION['start_form'][$name][$index] = $value;
  }
}

function load_data_from_db($db_credentials, $la_name){
  $mysqli = mysqli_connect($db_credentials['host'], $db_credentials['username'], $db_credentials['password'], $db_credentials['database']);
  if($mysqli->connect_errno){
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    return FALSE;
  }
  else{
    error_reporting(0);

    $result = $mysqli->query('SELECT * FROM licenseapp WHERE la_name = \'' . trim($la_name) . '\'');
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $result->free(); /* free result set */

    $_SESSION['start_form']['question4']['option1'] = $row['la_company_name'];
    $_SESSION['start_form']['question4']['option2'] = $row['la_company_name2'];
    $_SESSION['start_form']['question4']['option3'] = $row['la_company_name3'];
    $_SESSION['start_form']['question5'] = $row['la_business_activities'];
    $_SESSION['start_form']['Company_Type__c'] = $row['la_company_type'];
    $_SESSION['start_form']['share_capital'] = $row['la_share_capital'];
    $_SESSION['start_form']['question2'] = $row['la_license_type'];
    $_SESSION['start_form']['question3']['part1'] = $row['la_license_type'] == 'Corporate' ? $row['la_no_sh'] : '';
    $_SESSION['start_form']['question3']['part2'] = $row['la_license_type'] == 'Individual' ? $row['la_no_sh'] : '';

    $result_sh = $mysqli->query('SELECT * FROM shareholder WHERE sh_license_name = \'' . $la_name . '\' ORDER BY sh_type');
    $shareholders = array();
    while($row = $result_sh->fetch_array(MYSQLI_ASSOC)){
      $shareholders[] = $row;
    }
    /* free result set */
    $result_sh->free();

    foreach($shareholders as $i => $shareholder){
      $sh_type = $shareholder['sh_type'];

      if($sh_type == 'Individual'){
        set_field('ind_sh_inch', $shareholder['sh_pic'] ? 'Yes' : '', $i);
        set_field('ind_sh_fpo', $shareholder['sh_fpoc'] ? 'Yes' : '', $i);
        set_field('ind_sh_gen', $shareholder['sh_gender'], $i);
        set_field('ind_sh_mar', $shareholder['sh_marital_status'], $i);
        set_field('ind_sh_child', $shareholder['sh_children'], $i);
        set_field('ind_sh_title', $shareholder['sh_title'], $i);
        set_field('ind_sh_first_name', $shareholder['sh_first_name'], $i);
        set_field('ind_sh_middle_name', $shareholder['sh_middle_name'], $i);
        set_field('ind_sh_last_name', $shareholder['sh_last_name'], $i);
        set_field('ind_dob', $shareholder['sh_dob'], $i);
        set_field('ind_nationality', $shareholder['sh_nationality'], $i);
        set_field('ind_designation', $shareholder['sh_designation'], $i);
        set_field('ind_pass_id', $shareholder['sh_pass_id'], $i);
        set_field('ind_pid', $shareholder['sh_pass_issue_d'], $i);
        set_field('ind_ped', $shareholder['sh_ped'], $i);

        set_field('ind_uae_resident', $shareholder['sh_uae_resident'] ? 'Yes' : '', $i);
        set_field('ind_uae_stamp', $shareholder['sh_uae_stamp'] ? 'Yes' : '', $i);

        set_field('ind_per_o_sha', $shareholder['sh_per_o_sha'], $i);
        set_field('ind_val_p_sha', $shareholder['sh_val_p_sha'], $i);
        set_field('ind_no_shares', $shareholder['sh_no_shares'], $i);
        set_field('ind_val_of_sha', $shareholder['sh_val_of_sha'], $i);

        set_field('ind_ad_street', $shareholder['sh_ad_street'], $i);
        set_field('ind_ad_postal', $shareholder['sh_ad_postal'], $i);
        set_field('ind_ad_state', $shareholder['sh_ad_state'], $i);
        set_field('ind_ad_city', $shareholder['sh_ad_city'], $i);
        set_field('ind_ad_mobile', $shareholder['sh_ad_mobile'], $i);
        set_field('ind_ad_email', $shareholder['sh_ad_email'], $i);
        set_field('ind_ad_country', $shareholder['sh_ad_country'], $i);
        set_field('ind_ad_telhome', $shareholder['sh_ad_telhome'], $i);
        set_field('ind_ad_teloffice', $shareholder['sh_ad_teloffice'], $i);
        set_field('sh_ad_fax', $shareholder['sh_ad_fax'], $i);

        set_field('ind_p_ad_same', $shareholder['sh_p_ad_same'] ? 'Yes' : '', $i);

        set_field('ind_p_street', $shareholder['sh_p_street'], $i);
        set_field('ind_p_postal', $shareholder['sh_p_postal'], $i);
        set_field('ind_p_state', $shareholder['sh_p_state'], $i);
        set_field('ind_p_city', $shareholder['sh_p_city'], $i);
        set_field('ind_p_mobile', $shareholder['sh_p_mobile'], $i);
        set_field('ind_p_email', $shareholder['sh_p_email'], $i);
        set_field('ind_p_country', $shareholder['sh_p_country'], $i);
        set_field('ind_p_telhome', $shareholder['sh_p_telhome'], $i);
        set_field('ind_p_teloffice', $shareholder['sh_p_teloffice'], $i);
        set_field('ind_p_fax', $shareholder['sh_p_fax'], $i);

      }

      if($sh_type == 'Corporate'){
        set_field('cop_sh_inch', $shareholder['sh_pic'] ? 'Yes' : '', $i);
        set_field('cop_sh_fpo', $shareholder['sh_fpoc'] ? 'Yes' : '', $i);

        set_field('cop_name', $shareholder['sh_cop_name'], $i);
        set_field('cop_pre_name', $shareholder['sh_cop_pre_name'], $i);
        set_field('cop_trade_name', $shareholder['sh_cop_trade_name'], $i);
        set_field('cop_sh_title', $shareholder['sh_title'], $i);
        set_field('cop_d_of_inc', $shareholder['sh_d_of_inc'], $i);
        set_field('cop_j_incor', $shareholder['sh_j_incor'], $i);
        set_field('cop_reg_num', $shareholder['sh_reg_num'], $i);


        set_field('cop_uae_resident', $shareholder['sh_uae_resident'] ? 'Yes' : '', $i);
        set_field('cop_uae_stamp', $shareholder['sh_uae_stamp'] ? 'Yes' : '', $i);

        set_field('cop_per_o_sha', $shareholder['sh_per_o_sha'], $i);
        set_field('cop_val_p_sha', $shareholder['sh_val_p_sha'], $i);
        set_field('cop_no_shares', $shareholder['sh_no_shares'], $i);
        set_field('cop_val_of_sha', $shareholder['sh_val_of_sha'], $i);

        set_field('cop_ad_street', $shareholder['sh_ad_street'], $i);
        set_field('cop_ad_postal', $shareholder['sh_ad_postal'], $i);
        set_field('cop_ad_state', $shareholder['sh_ad_state'], $i);
        set_field('cop_ad_city', $shareholder['sh_ad_city'], $i);
        set_field('cop_ad_mobile', $shareholder['sh_ad_mobile'], $i);
        set_field('cop_ad_email', $shareholder['sh_ad_email'], $i);
        set_field('cop_ad_country', $shareholder['sh_ad_country'], $i);
        set_field('cop_ad_telhome', $shareholder['sh_ad_telhome'], $i);
        set_field('cop_ad_teloffice', $shareholder['sh_ad_teloffice'], $i);
        set_field('sh_ad_fax', $shareholder['sh_ad_fax'], $i);

        set_field('cop_p_ad_same', $shareholder['sh_p_ad_same'] ? 'Yes' : '', $i);

        set_field('cop_p_street', $shareholder['sh_p_street'], $i);
        set_field('cop_p_postal', $shareholder['sh_p_postal'], $i);
        set_field('cop_p_state', $shareholder['sh_p_state'], $i);
        set_field('cop_p_city', $shareholder['sh_p_city'], $i);
        set_field('cop_p_mobile', $shareholder['sh_p_mobile'], $i);
        set_field('cop_p_email', $shareholder['sh_p_email'], $i);
        set_field('cop_p_country', $shareholder['sh_p_country'], $i);
        set_field('cop_p_telhome', $shareholder['sh_p_telhome'], $i);
        set_field('cop_p_teloffice', $shareholder['sh_p_teloffice'], $i);
        set_field('cop_p_fax', $shareholder['sh_p_fax'], $i);
      } // if sh_type == 'Corporate'

      if($sh_type == 'pic'){

        set_field('pic_sh_inch', $shareholder['sh_pic'] ? 'Yes' : '');
        set_field('pic_sh_fpo', $shareholder['sh_fpoc'] ? 'Yes' : '');
        set_field('pic_sh_gen', $shareholder['sh_gender']);
        set_field('pic_sh_mar', $shareholder['sh_sh_mar']);
        set_field('pic_sh_child', $shareholder['sh_marital_status']);
        set_field('pic_sh_title', $shareholder['sh_title']);
        set_field('pic_sh_first_name', $shareholder['sh_first_name']);
        set_field('pic_sh_middle_name', $shareholder['sh_middle_name']);
        set_field('pic_sh_last_name', $shareholder['sh_last_name']);
        set_field('pic_dob', $shareholder['sh_dob']);
        set_field('pic_nationality', $shareholder['sh_nationality']);
        set_field('pic_designation', $shareholder['sh_designation']);
        set_field('pic_pass_id', $shareholder['sh_pass_id']);
        set_field('pic_pid', $shareholder['sh_pid']);
        set_field('pic_ped', $shareholder['sh_ped']);

        set_field('pic_uae_resident', $shareholder['sh_uae_resident'] ? 'Yes' : '');
        set_field('pic_uae_stamp', $shareholder['sh_uae_stamp'] ? 'Yes' : '');

        set_field('pic_per_o_sha', $shareholder['sh_per_o_sha']);
        set_field('pic_val_p_sha', $shareholder['sh_val_p_sha']);
        set_field('pic_no_shares', $shareholder['sh_no_shares']);
        set_field('pic_val_of_sha', $shareholder['sh_val_of_sha']);

        set_field('pic_ad_street', $shareholder['sh_ad_street']);
        set_field('pic_ad_postal', $shareholder['sh_ad_postal']);
        set_field('pic_ad_state', $shareholder['sh_ad_state']);
        set_field('pic_ad_city', $shareholder['sh_ad_city']);
        set_field('pic_ad_mobile', $shareholder['sh_ad_mobile']);
        set_field('pic_ad_email', $shareholder['sh_ad_email']);
        set_field('pic_ad_country', $shareholder['sh_ad_country']);
        set_field('pic_ad_telhome', $shareholder['sh_ad_telhome']);
        set_field('pic_ad_teloffice', $shareholder['sh_ad_teloffice']);
        set_field('sh_ad_fax', $shareholder['sh_ad_fax']);

        set_field('pic_p_ad_same', $shareholder['sh_p_ad_same'] ? 'Yes' : '');

        set_field('pic_p_street', $shareholder['sh_p_street']);
        set_field('pic_p_postal', $shareholder['sh_p_postal']);
        set_field('pic_p_state', $shareholder['sh_p_state']);
        set_field('pic_p_city', $shareholder['sh_p_city']);
        set_field('pic_p_mobile', $shareholder['sh_p_mobile']);
        set_field('pic_p_email', $shareholder['sh_p_email']);
        set_field('pic_p_country', $shareholder['sh_p_country']);
        set_field('pic_p_telhome', $shareholder['sh_p_telhome']);
        set_field('pic_p_teloffice', $shareholder['sh_p_teloffice']);
        set_field('pic_p_fax', $shareholder['sh_p_fax']);
      } // if sh_type == 'pic'

      if($sh_type == 'fpc'){
        set_field('fpc_sh_inch', $shareholder['sh_pic'] ? 'Yes' : '');
        set_field('fpc_sh_fpo', $shareholder['sh_fpoc'] ? 'Yes' : '');
        set_field('fpc_sh_gen', $shareholder['sh_gender']);
        set_field('fpc_sh_mar', $shareholder['sh_sh_mar']);
        set_field('fpc_sh_child', $shareholder['sh_marital_status']);
        set_field('fpc_sh_title', $shareholder['sh_title']);
        set_field('fpc_sh_first_name', $shareholder['sh_first_name']);
        set_field('fpc_sh_middle_name', $shareholder['sh_middle_name']);
        set_field('fpc_sh_last_name', $shareholder['sh_last_name']);
        set_field('fpc_dob', $shareholder['sh_dob']);
        set_field('fpc_nationality', $shareholder['sh_nationality']);
        set_field('fpc_designation', $shareholder['sh_designation']);
        set_field('fpc_pass_id', $shareholder['sh_pass_id']);
        set_field('fpc_pid', $shareholder['sh_pid']);
        set_field('fpc_ped', $shareholder['sh_ped']);

        set_field('fpc_uae_resident', $shareholder['sh_uae_resident'] ? 'Yes' : '');
        set_field('fpc_uae_stamp', $shareholder['sh_uae_stamp'] ? 'Yes' : '');

        set_field('fpc_per_o_sha', $shareholder['sh_per_o_sha']);
        set_field('fpc_val_p_sha', $shareholder['sh_val_p_sha']);
        set_field('fpc_no_shares', $shareholder['sh_no_shares']);
        set_field('fpc_val_of_sha', $shareholder['sh_val_of_sha']);

        set_field('fpc_ad_street', $shareholder['sh_ad_street']);
        set_field('fpc_ad_postal', $shareholder['sh_ad_postal']);
        set_field('fpc_ad_state', $shareholder['sh_ad_state']);
        set_field('fpc_ad_city', $shareholder['sh_ad_city']);
        set_field('fpc_ad_mobile', $shareholder['sh_ad_mobile']);
        set_field('fpc_ad_email', $shareholder['sh_ad_email']);
        set_field('fpc_ad_country', $shareholder['sh_ad_country']);
        set_field('fpc_ad_telhome', $shareholder['sh_ad_telhome']);
        set_field('fpc_ad_teloffice', $shareholder['sh_ad_teloffice']);
        set_field('sh_ad_fax', $shareholder['sh_ad_fax']);

        set_field('fpc_p_ad_same', $shareholder['sh_p_ad_same'] ? 'Yes' : '');

        set_field('fpc_p_street', $shareholder['sh_p_street']);
        set_field('fpc_p_postal', $shareholder['sh_p_postal']);
        set_field('fpc_p_state', $shareholder['sh_p_state']);
        set_field('fpc_p_city', $shareholder['sh_p_city']);
        set_field('fpc_p_mobile', $shareholder['sh_p_mobile']);
        set_field('fpc_p_email', $shareholder['sh_p_email']);
        set_field('fpc_p_country', $shareholder['sh_p_country']);
        set_field('fpc_p_telhome', $shareholder['sh_p_telhome']);
        set_field('fpc_p_teloffice', $shareholder['sh_p_teloffice']);
        set_field('fpc_p_fax', $shareholder['sh_p_fax']);
      } // if sh_type == 'fpc'
    }
  }
}