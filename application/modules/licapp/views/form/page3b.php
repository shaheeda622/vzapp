<?php
if(!isset($countsherholder)){
  $countsherholder = '';
}
?>
<div<?php echo $embed ? '' : ' class="content formpages a4sizeheight"'; ?>>
  <div class="section">
    <?php $formid = 'fpcfrmbody' . $countsherholder; ?>
    <div class="corporate_heading row section_headding collapsed" data-toggle="collapse" data-target="#<?php echo $formid; ?>" aria-expanded="false"<?php echo " aria-controls=\"{$formid}\""; ?>>
      <div class="col-xs-12 col-sm-12"> &nbsp;

        <?php if( $posAp ) {
	         }else{
          echo  ' &nbsp; <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> &nbsp; ';

			 }
			 echo 'FIRST POINT OF CONTACT';
		  ?>

      </div>
    </div>
    <div class="section_body<?php echo $embed ? ' collapse' : ''; ?>"<?php echo " id=\"{$formid}\""; ?>
    style="height:1030px !important;">
      <div class="row col-xs-12 help-block"></div>
      <div class="row"></div>

      <fieldset class="form-horizontal">
        <legend class="legend_cl">Identity Details</legend>
        <div class="form-group">
          
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Gender</label>
          <div class="col-xs-12 col-sm-2">
            <label>
              <input type="checkbox" name="fpc_sh_gen" class="checkme" 
              value="Male"<?php echo get_field('fpc_sh_gen') == 'Male' ? ' checked' : ''; ?> /><span>Male</span>
            </label>
            <label>
              <input type="checkbox" name="fpc_sh_gen" class="checkme" 
            value="Female"<?php echo get_field('fpc_sh_gen') == 'Female' ? ' checked' : ''; ?> /><span>Female</span>
            </label>
               <label class="error" style="display: none;">This field is required.</label>
          </div>

          <label class="col-xs-12 col-sm-2 text-left">Marital Status</label>
          <div class="col-xs-12 col-sm-3">
            <label><input type="checkbox" name="fpc_sh_mar"  value="Married"<?php echo get_field('fpc_sh_mar') == 'Married' ? ' checked' : ''; ?> /><span>Married</span></label>
            <label><input type="checkbox"  name="fpc_sh_mar"  value="Single"<?php echo get_field('fpc_sh_mar') == 'Single' ? ' checked' : ''; ?> /><span>Single</span></label>
            <label><input type="checkbox" name="fpc_sh_mar"   value="Divorced"<?php echo get_field('fpc_sh_mar') == 'Divorced' ? ' checked' : ''; ?> /><span>Divorced</span></label>
            		<label class="error" style="display: none;">This field is required.</label>
          </div>
          
          <label class="col-xs-12 col-sm-1">Children</label>
          <div class="col-xs-12 col-sm-2">
            <label><input type="checkbox" name="fpc_sh_child"  value="Yes"<?php echo get_field('fpc_sh_child') == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span></label>
            <label><input type="checkbox" name="fpc_sh_child"  value="No"<?php echo get_field('fpc_sh_child') == 'No' ? ' checked' : ''; ?> /><span>No</span></label>
            		<label class="error" style="display: none;">This field is required.</label>
          </div>
          
        </div>

        <div class="form-group">
     
          <label class="col-xs-12 col-sm-2 control-label text-left" for="fpc_sh_title">Title</label>
          <div class="col-xs-12 col-sm-1">
            <select name="fpc_sh_title" id="fpc_sh_title" class="form-control">
              <?php foreach(array('Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.') as $opt){ ?>
              <option value="<?php echo $opt; ?>"
			  <?php echo get_field('fpc_sh_title') == $opt ? ' selected' : ''; ?>><?php echo $opt; ?></option>
              <?php } ?>
            </select>
          </div>
          
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">First Name</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control validate required" name="fpc_first_name" value="<?php echo get_field('fpc_first_name'); ?>" /></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Middle Name</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control" name="fpc_middle_name" 
          value="<?php echo get_field('fpc_middle_name'); ?>" /></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Last Name</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control validate required" name="fpc_last_name" value="<?php echo get_field('fpc_last_name'); ?>" /></div>
          <div class="col-xs-12 col-sm-12 help-block">
         
          <label class="col-xs-12 col-sm-2 control-label text-left"></label>
          &nbsp; (As appearing in supporting identification document) 
          
          </div>
        </div>

       

        <div class="form-group">
          <label class="col-sm-2 control-label text-left">Date of Birth</label>
          <div class="col-sm-2">
            <input<?php echo ' id="fpc_dob"' ;?> class="form-control datepicker validate required" type="text" name="fpc_dob" value="<?php echo get_field('fpc_dob'); ?>" />
          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left" >Nationality</label>
          <div class="col-sm-2">
            <div class="bfh-selectbox bfh-countries cad" data-filter="true" data-name="fpc_nationality" data-country="<?php echo get_field('fpc_nationality') ?: 'AE'; ?>" data-flags="true"></div>

          </div>

          <label class="col-sm-2 control-label text-left">Passport/ID Number</label>
          <div class="col-sm-2"><input type="text" class="form-control validate required" name="fpc_pass_id" value="<?php echo get_field('fpc_pass_id'); ?>" /></div>

          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          
        </div>

	<div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Designation</label>
          <div class="col-xs-12 col-sm-6">
            <input type="text" class="form-control validate required" name="fpc_dDesig" value="<?php echo get_field('fpc_dDesig'); ?>" />
            
            <p class="text-left help-block">(Please indicate desired Designation in company under formation) </p>
          </div>
          <div class="col-xs-12 col-sm-4 control-label text-left help-inline graycolor">
            </div>
        </div>


        <div class="form-group">
        
          <label class="col-sm-2 control-label text-left">Passport Issue Date</label>
          <div class="col-sm-2">
            <!--
         <div class="bfh-datepicker" data-name="fpc_pid" data-date="<?php // echo get_field('fpc_pid'); ?>"></div>
            -->
            <input<?php echo ' id="fpc_pid"' ;?> class="form-control datepicker validate required" type="text" name="fpc_pid" value="<?php echo get_field('fpc_pid'); ?>" />

          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left">Passport Expiry Date</label>
          <div class="col-sm-2">

          	<input<?php echo ' id="fpc_ped"' ;?> class="form-control datepicker validate required" type="text" name="fpc_ped" value="<?php echo get_field('fpc_ped'); ?>" />
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-2"> <label>UAE Resident </label></div>
          <div class="col-sm-4">
              
            <label>
              <input type="checkbox" value="Yes" class="checkme" name="fpc_uae_resident"
			 <?php echo get_field('fpc_uae_resident') == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span>
            </label>
              
            <label>
              <input type="checkbox" value="No" class="checkme"  name="fpc_uae_resident"
			  <?php echo get_field('fpc_uae_resident') == 'No' ? ' checked' : ''; ?> />
              <span>No</span>
            </label>
            
            <label class="error" style="display: none;">This field is required.</label>
            <label>
            <span class="help-inline graycolor">(If yes, please provide copy of UAE Residence Visa)</span>
            </label>
          </div>

          <div class="col-sm-2 text-left">UAE Entry Stamp</div>
          <div class="col-sm-4">
              
            <label>
              <input type="checkbox" value="Yes" class="checkme" name="fpc_uae_stamp"
			  <?php echo get_field('fpc_uae_stamp') == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span>
            </label>
              
            <label>
              <input type="checkbox" value="No" class="checkme" name="fpc_uae_stamp"
			  <?php echo get_field('fpc_uae_stamp') == 'No' ? ' checked' : ''; ?> /><span>No</span>
            </label>
            
            <label class="error" style="display: none;">This field is required.</label>
            <label>
            <span class="help-inline graycolor">(If yes, please provide copy of UAE Entry Stamp)</span>
            </label>
          </div>
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
            <input<?php echo ' id="fpc_ad_street'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" name="fpc_ad_street" value="<?php echo get_field('fpc_ad_street'); ?>"  /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2">
            <input<?php echo ' id="fpc_ad_zip'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="fpc_ad_postal" value="<?php echo get_field('fpc_ad_postal'); ?>"  />
          </div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3">
            <input<?php echo ' id="fpc_ad_state'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="fpc_ad_state" value="<?php echo get_field('fpc_ad_state'); ?>"   />
          </div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>


          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3">
            <input<?php echo ' id="fpc_ad_city'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" value="<?php echo get_field('fpc_ad_city'); ?>" name="fpc_ad_city"  />
          </div>

        </div>
        <div class="form-group">
          	

          

          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="fpc_ad_mobile'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required number" name="fpc_ad_mobile" value="<?php echo get_field('fpc_ad_mobile'); ?>"  /></div>
          
            <div class="visible-xs-block hidden-*">&nbsp;</div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="fpc_ad_email'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required email" name="fpc_ad_email" value="<?php echo get_field('fpc_ad_email'); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries cad required" data-filter="true" data-name="fpc_ad_country" data-country="<?php echo get_field('fpc_ad_country') ?: 'AE'; ?>" data-flags="true"></div>
          </div>

        </div>



        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="fpc_ad_telhome'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="fpc_ad_telhome" value="<?php echo get_field('fpc_ad_telhome'); ?>"  /></div>



          <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="fpc_ad_teloffice'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="fpc_ad_teloffice" value="<?php echo get_field('fpc_ad_teloffice'); ?>"  /></div>

          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="fpc_ad_fax'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="fpc_ad_fax" value="<?php echo get_field('fpc_ad_fax'); ?>"  /></div>



        </div>

                                <br/>
          
       <div class="form-group">
          <div class="col-xs-12">
          <legend class="legend_cl">
            Permanent Address <span class="help-inline">(Mandatory for Non-Resident Applicant)</span>&nbsp;&nbsp;

            <label><input type="checkbox" value="Yes" name="fpc_p_ad_same" class="fpc_p_ad_same"<?php echo get_field('fpc_p_ad_same') == 'Yes' ? ' checked' : ''; ?> /><span>Same as Correspondence Address</span></label>
            </legend>

          </div>
        </div>


        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Street</label>
          <div class="col-xs-12 col-sm-10"><input type="text" <?php echo ' id="fpc_p_street'.$countsherholder.'"' ;?> class="form-control pad validate required" name="fpc_p_street" value="<?php echo get_field('fpc_p_street'); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="fpc_p_postal" value="<?php echo get_field('fpc_p_postal'); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="fpc_p_state" value="<?php echo get_field('fpc_p_state'); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3"><input type="text" class="form-control pad validate required" name="fpc_p_city" value="<?php echo get_field('fpc_p_city'); ?>" /></div>

        </div>


        <div class="form-group">

        
          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad validate required phone" name="fpc_p_mobile" value="<?php echo get_field('fpc_p_mobile'); ?>" /></div>
            
        <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad validate required email" name="fpc_p_email" value="<?php echo get_field('fpc_p_email'); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries pad" data-filter="true" data-name="fpc_p_country" data-country="<?php echo get_field('fpc_p_country') ?: 'AE'; ?>" data-flags="true"></div>
          </div>




        </div>

        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="fpc_p_telhome" value="<?php echo get_field('fpc_p_telhome'); ?>"  /></div>



          <div class="visible-xs-block hidden-*">&nbsp;</div>

         <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="fpc_p_teloffice" value="<?php echo get_field('fpc_p_teloffice'); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="fpc_p_fax" value="<?php echo get_field('fpc_p_fax'); ?>" /></div>

        </div>
      </fieldset>

        <br/> <br/>
      <?php if(!$embed){ ?>
        <legend class="legend_cl">Specimen Signature</legend>
        <div>
        <p>
      <strong>The following two signatures of the above Shareholder are provided as specimen signature:</strong></p>
        <div style="float: left;width: 48%;height: 40px;border: 1px solid #D2D2D2"></div>
        <div style="float: left;width: 4%;">&nbsp;</div>
        <div style="float: left;width: 48%;height: 40px;border: 1px solid #D2D2D2"></div>
        <div style="clear:both;"></div>
        <div class="help graycolor">(Please sign in each of the boxes)</div>
        </div>
        <?php } ?>
    </div>
  </div>

</div>