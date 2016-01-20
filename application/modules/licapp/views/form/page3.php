<?php
if(!isset($countsherholder)){
  $countsherholder = '';
}
$formid = 'ifrmbody' . $countsherholder; ?>
<div<?php echo $embed ? " id=\"indiv$countsherholder\" style=\"display: none;\"" : ' class="content formpages a4sizeheight"'; ?>>

  <div class="section">
    <div class="corporate_heading row section_headding collapsed" data-toggle="collapse" data-target="#<?php echo $formid; ?>" aria-expanded="false"<?php echo " aria-controls=\"{$formid}\""; ?>>

      <div class="col-xs-12 col-sm-12">

      <?php if($posAp) {
	         }else{
          echo  ' &nbsp; <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> &nbsp; ';
			 }
			 echo 'INDIVIDUAL SHAREHOLDER ' . $countsherholder;
		   ?>

      </div>
    </div>
      <div class="section_body<?php echo $embed ? ' collapse' : ''; ?>"<?php echo " id=\"{$formid}\""; ?>>
<!--      <div class="row col-xs-12 help-block">Please complete the below details for ALL Individual Shareholders.</div>-->
      <div class="row col-xs-12 help-block">&nbsp;</div>
      <div class="row">
        <div class="col-xs-8 col-sm-4"><?php echo 'Shareholder is also Person in Charge'; ?></div>
        <div class="col-xs-4 col-sm-2">
          <label>
            <input<?php echo $embed ? ' onclick="reloadFs7a(this);"' : ''; ?> type="checkbox" class="checkme check input_checkbox" value="Yes" name="ind_sh_inch[]"<?php echo get_field('ind_sh_inch', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?>
             />
            <span>Yes</span>
          </label>
          <label>
            <input<?php echo $embed ? ' onclick="reloadFs7a(this);"' : ''; ?> type="checkbox" class="checkme check input_checkbox" value="No" name="ind_sh_inch[]"<?php echo get_field('ind_sh_inch', $countsherholder - 1) == 'No' ? ' checked' : ''; ?> />
            <span>No</span>
          </label>
           <label class="error" style="display: none;">This field is required.</label>
        </div>
        <div class="col-xs-10 col-sm-4"><?php echo 'Shareholder is also First Point of Contact'; ?></div>
        <div class="col-xs-2 col-sm-2">
          <label>
            <input<?php echo $embed ? ' onclick="reloadFs7b(this);"' : ''; ?> type="checkbox" class="checkme check input_checkbox" value="Yes" name="ind_sh_fpo[]"<?php echo get_field('ind_sh_fpo', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?> />
            <span>Yes</span>
          </label>
          <label>
            <input<?php echo $embed ? ' onclick="reloadFs7b(this);"' : ''; ?> type="checkbox" class="checkme check input_checkbox" value="No" name="ind_sh_fpo[]"<?php echo get_field('ind_sh_fpo', $countsherholder - 1) == 'No' ? ' checked' : ''; ?> />
            <span>No</span>
          </label>
           <label class="error" style="display: none;">This field is required.</label>
        </div>
      </div>

      <fieldset class="form-horizontal">
        <legend class="legend_cl">Identity Details</legend>
        
        
        <div class="form-group">
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Gender</label>
          <div class="col-xs-12 col-sm-2">
            <label>
              <input type="checkbox" class="checkme check input_checkbox" name="ind_sh_gen[]" value="Male"<?php echo get_field('ind_sh_gen', $countsherholder - 1) == 'Male' ? ' checked' : ''; ?> />
              <span class="gender_cl">Male</span>
            </label>
            <label>
              <input type="checkbox" class="checkme check input_checkbox" name="ind_sh_gen[]" value="Female"<?php echo get_field('ind_sh_gen', $countsherholder - 1) == 'Female' ? ' checked' : ''; ?> /><span>Female</span>
            </label>
            <label class="error" style="display: none;">This field is required.</label>
          </div>
          
           <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2  text-left">Marital Status</label>
          <div class="col-xs-12 col-sm-3">
          	 
            <label><input type="checkbox" class="check input_checkbox" name="ind_sh_mar[]" value="Married"<?php echo get_field('ind_sh_mar', $countsherholder - 1) == 'Married' ? ' checked' : ''; ?> /><span>Married</span></label>
            <label><input type="checkbox" class="check input_checkbox" name="ind_sh_mar[]" value="Single"<?php echo get_field('ind_sh_mar', $countsherholder - 1) == 'Single' ? ' checked' : ''; ?> /><span>Single</span></label>
            <label><input type="checkbox" class="check input_checkbox" name="ind_sh_mar[]" value="Divorced"<?php echo get_field('ind_sh_mar', $countsherholder - 1) == 'Divorced' ? ' checked' : ''; ?> /><span>Divorced</span></label>
            <label class="error" style="display: none;">This field is required.</label>
          </div>
          
          <label class="col-xs-12 col-sm-1 text-left">Children</label>
          <div class="col-xs-12 col-sm-2">
            <label><input type="checkbox" class="check input_checkbox" name="ind_sh_child[]" value="Yes"<?php echo get_field('ind_sh_child', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span></label>
            <label><input type="checkbox" class="check input_checkbox" name="ind_sh_child[]" value="No"<?php echo get_field('ind_sh_child', $countsherholder - 1) == 'No' ? ' checked' : ''; ?> /><span>No</span></label>
            <label class="error" style="display: none;">This field is required.</label>
          </div>
          
        </div>
        
        
        

        <div class="form-group">
         
         <label class="col-xs-12 col-sm-2 control-label text-left">Title</label>
          <div class="col-xs-12 col-sm-1">
            <select name="ind_sh_title[]" id="ind_sh_title" class="form-control">
              <?php foreach(array('Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.') as $opt){ ?>
              <option value="<?php echo $opt; ?>"<?php echo get_field('ind_sh_title', $countsherholder - 1) == $opt ? ' selected' : ''; ?>><?php echo $opt; ?></option>
              <?php } ?>
            </select>
          </div>
          
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">First Name</label>
          <div class="col-xs-12 col-sm-2">
            <input<?php echo ' id="ind_firstname'.$countsherholder.'"' ;?> type="text" class="form-control validate required" name="ind_first_name[]" value="<?php echo get_field('ind_first_name', $countsherholder - 1); ?>" />
          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-2 control-label text-left">Middle Name</label>
          <div class="col-xs-12 col-sm-2">
            <input type="text" class="form-control" name="ind_middle_name[]" value="<?php echo get_field('ind_middle_name', $countsherholder - 1); ?>" />
          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-2 control-label text-left">Last Name</label>
          <div class="col-xs-12 col-sm-2">
            <input<?php echo ' id="ind_lastname'.$countsherholder.'"' ;?> type="text" class="form-control validate required" name="ind_last_name[]" value="<?php echo get_field('ind_last_name', $countsherholder - 1); ?>" />
          </div>
          <div class="col-xs-12 col-sm-12 help-block">
          <label class="col-xs-12 col-sm-2 control-label text-left"></label>
          &nbsp; (As appearing in supporting identification document) 
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-2 control-label text-left">Date of Birth</label>
          <div class="col-sm-2">
            <input<?php echo ' id="ind_dob'.$countsherholder.'"' ;?>  class="form-control datepicker validate required" type="text" name="ind_dob[]" value="<?php echo get_field('ind_dob', $countsherholder - 1); ?>" />
          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left" >Nationality</label>
          <div class="col-sm-2">
            <div class="bfh-selectbox bfh-countries cad" data-filter="true" data-name="ind_nationality[]" data-country="<?php echo get_field('ind_nationality', $countsherholder - 1) ?: 'AE'; ?>" data-flags="true"></div>
          </div>

          <label class="col-sm-2 control-label text-left">Passport/ID Number</label>
          <div class="col-sm-2"><input type="text" class="form-control validate required" name="ind_pass_id[]" value="<?php echo get_field('ind_pass_id', $countsherholder - 1); ?>" /></div>

        </div>

	  <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Designation</label>
          <div class="col-xs-12 col-sm-6">
            <input type="text" class="form-control validate required" name="ind_dDesig[]"
            value="<?php echo get_field('ind_dDesig', $countsherholder - 1); ?>" />
            <p class="text-left help-block">(Please indicate desired Designation in company under formation)</p>
          </div>
          <div class="col-xs-12 col-sm-4 control-label text-left help-block">
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left">Passport Issue Date</label>
          <div class="col-sm-2">

            <!--<div class="bfh-datepicker" data-name="ind_pid[]" data-date="<?php //echo get_field('ind_pid', $countsherholder - 1); ?>"></div>-->

                <input<?php echo ' id="ind_pid'.$countsherholder.'"' ;?>  class="form-control datepicker validate required" type="text" name="ind_pid[]" value="<?php echo get_field('ind_pid', $countsherholder - 1); ?>" />

          </div>

          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left">Passport Expiry Date</label>
          <div class="col-sm-2">

            <!--<div class="bfh-datepicker" data-name="ind_ped[]" data-date="<?php //echo get_field('ind_ped', $countsherholder - 1); ?>"></div>-->

            <input<?php echo ' id="ind_ped'.$countsherholder.'"' ;?>  class="form-control datepicker validate required" type="text" name="ind_ped[]" value="<?php echo get_field('ind_ped', $countsherholder - 1); ?>" />

          </div>
        </div>




        <div class="form-group">
         
          <div class="col-sm-2"> <label>UAE Resident </label></div>
          <div class="col-sm-4">
              
              <label>
              <input type="checkbox" value="Yes" class="checkme check input_checkbox" name="ind_uae_resident[]"<?php echo get_field('ind_uae_resident', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span>
            </label>
              
            <label>
              <input type="checkbox" value="No" class="checkme check input_checkbox"  name="ind_uae_resident[]"<?php echo get_field('ind_uae_resident', $countsherholder - 1) == 'No' ? ' checked' : ''; ?> />
              <span>No</span>
            </label>
            
            <label class="error" style="display: none;">This field is required.</label>
            <label>
            <span class="help-inline graycolor">(If yes, please provide copy of UAE Residence Visa)</span>
            </label>
          </div>
          	
      		<div class="col-sm-2"> <label> UAE Entry Stamp </label> </div>
            
            <div class="col-sm-4">
                
            <label>
              <input type="checkbox" value="Yes" class="checkme check input_checkbox" name="ind_uae_stamp[]"<?php echo get_field('ind_uae_stamp', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span>
            </label>
                
            <label>
              <input type="checkbox" value="No" class="checkme check input_checkbox" name="ind_uae_stamp[]"<?php echo get_field('ind_uae_stamp', $countsherholder - 1) == 'No' ? ' checked' : ''; ?> /><span>No</span>
            </label>
           
            <label class="error" style="display: none;">This field is required.</label>
           	<label> <span class="help-inline graycolor">(If yes, please provide copy of UAE Entry Stamp)</span> 
            </label>
          </div>
          
        </div>


      </fieldset>

      <br>
       <fieldset class="form-horizontal">
        <legend class="legend_cl">Shareholding Details</legend>
          <div>Please indicate desired shareholding in company under formation.</div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Percentage of Shares</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="ind_per_o_sha'.$countsherholder.'"' ;?> type="text" name="ind_per_o_sha[]" class="form-control validate required number" data-max="100" maxlength="3" data-svalue="<?php echo get_field('ind_per_o_sha', $countsherholder - 1); ?>" value="<?php echo get_field('ind_per_o_sha', $countsherholder - 1); ?>"  placeholder="%" /></div>

          <div class="col-xs-12 col-sm-1">&nbsp;</div>
          <label class="col-xs-12 col-sm-3 control-label text-left">Value per Shares</label>
          <div class="col-xs-12 col-sm-4"><input type="text" class="form-control number" name="ind_val_p_sha[]" value="1,000.00"   placeholder="AED"></div>
        </div>


        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Number of Shares</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="ind_no_shares'.$countsherholder.'"' ;?> type="text" class="form-control number_of_shares" name="ind_num_o_sha[]" value="<?php echo get_field('ind_num_o_sha', $countsherholder - 1); ?>"  /></div>

          <div class="col-xs-12 col-sm-1">&nbsp;</div>
          <label class="col-xs-12 col-sm-3 control-label text-left">Value of Shares</label>
          <div class="col-xs-12 col-sm-4"><input type="text" class="form-control number" name="ind_val_of_sha[]" value="<?php echo get_field('ind_val_of_sha', $countsherholder - 1); ?>"  placeholder="AED" /></div>
        </div>
      </fieldset>

      <br>
      <fieldset class="form-horizontal">
        <legend class="legend_cl">Address Details</legend>
        <div class="form-group">
          <div class="col-xs-12">Correspondence Address</div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Street</label>
          <div class="col-xs-12 col-sm-10">
            <input<?php echo ' id="ind_ad_street'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" name="ind_ad_street[]" value="<?php echo get_field('ind_ad_street', $countsherholder - 1); ?>"  /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2">
            <input<?php echo ' id="ind_ad_zip'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="ind_ad_postal[]" value="<?php echo get_field('ind_ad_postal', $countsherholder - 1); ?>"  />
          </div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3">
            <input<?php echo ' id="ind_ad_state'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="ind_ad_state[]" value="<?php echo get_field('ind_ad_state', $countsherholder - 1); ?>"   />
          </div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>


          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3">
            <input<?php echo ' id="ind_ad_city'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" value="<?php echo get_field('ind_ad_city', $countsherholder - 1); ?>" name="ind_ad_city[]"  />
          </div>

        </div>
        <div class="form-group">

          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="ind_ad_mobile'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required number" name="ind_ad_mobile[]" value="<?php echo get_field('ind_ad_mobile', $countsherholder - 1); ?>"  /></div>
          
            <div class="visible-xs-block hidden-*">&nbsp;</div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="ind_ad_email'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required email" name="ind_ad_email[]" value="<?php echo get_field('ind_ad_email', $countsherholder - 1); ?>"  /></div>


          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries cad required" data-filter="true" data-name="ind_ad_country[]" data-country="<?php echo get_field('ind_ad_country', $countsherholder - 1) ?: 'AE'; ?>" data-flags="true"></div>
          </div>

        </div>



        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="ind_ad_telhome'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="ind_ad_telhome[]" value="<?php echo get_field('ind_ad_telhome', $countsherholder - 1); ?>"  /></div>


         <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="ind_ad_teloffice'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="ind_ad_teloffice[]" value="<?php echo get_field('ind_ad_teloffice', $countsherholder - 1); ?>"  /></div>

          

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="ind_ad_fax'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="ind_ad_fax[]" value="<?php echo get_field('ind_ad_fax', $countsherholder - 1); ?>"  /></div>



        </div>


       <div class="form-group">
          <div class="col-xs-12">
          <legend class="legend_cl">
            Permanent Address <span class="help-inline">(Mandatory for Non-Resident Applicant)</span>&nbsp;&nbsp;

            <label><input type="checkbox" value="Yes" name="ind_p_ad_same[]" class="ind_p_ad_same"<?php echo get_field('ind_p_ad_same', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?> />
            		<span class="graycolor">Same as Correspondence Address</span></label>
            </legend>

          </div>
        </div>


        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Street</label>
          <div class="col-xs-12 col-sm-10"><input type="text" <?php echo ' id="ind_p_street'.$countsherholder.'"' ;?> class="form-control pad validate required" name="ind_p_street[]" value="<?php echo get_field('ind_p_street', $countsherholder - 1); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="ind_p_postal[]" value="<?php echo get_field('ind_p_postal', $countsherholder - 1); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="ind_p_state[]" value="<?php echo get_field('ind_p_state', $countsherholder - 1); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3"><input type="text" class="form-control pad validate required" name="ind_p_city[]" value="<?php echo get_field('ind_p_city', $countsherholder - 1); ?>" /></div>

        </div>


        <div class="form-group">

        <div class="visible-xs-block hidden-*">&nbsp;</div>
          
          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad validate required phone" name="ind_p_mobile[]" value="<?php echo get_field('ind_p_mobile', $countsherholder - 1); ?>" /></div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad validate required email" name="ind_p_email[]" value="<?php echo get_field('ind_p_email', $countsherholder - 1); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries pad" data-filter="true" data-name="ind_p_country[]" data-country="<?php echo get_field('ind_p_country', $countsherholder - 1) ?: 'AE'; ?>" data-flags="true"></div>
          </div>
            
            <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
            <div class="visible-xs-block hidden-*">&nbsp;</div>
         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="ind_p_telhome[]" value="<?php echo get_field('ind_p_telhome', $countsherholder - 1); ?>"  /></div>



          <div class="visible-xs-block hidden-*">&nbsp;</div>

         <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="ind_p_teloffice[]" value="<?php echo get_field('ind_p_teloffice', $countsherholder - 1); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="ind_p_fax[]" value="<?php echo get_field('ind_p_fax', $countsherholder - 1); ?>" /></div>

        </div>
        
      </fieldset>

        <br/>
      <?php if(!$embed){ ?>
        <legend class="legend_cl">Specimen Signature</legend>
        <div>
        <p>
      <strong>The following two signatures of the above Shareholder are provided as specimen signature:</strong></p>
        <div style="float: left;width: 48%;height: 40px;border: 1px solid #D2D2D2"></div>
        <div style="float: left;width: 4%;">&nbsp;</div>
        <div style="float: left;width: 48%;height: 40px;border: 1px solid #D2D2D2"></div>
        <div style="clear:both;"></div>
        <div class="help help-block">(Please sign in each of the boxes)</div>
        </div>
        <?php } ?>
    </div>
  </div>

</div>