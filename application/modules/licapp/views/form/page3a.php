<?php
if(!isset($countsherholder)){
  $countsherholder = '';
}
?>
<div<?php echo $embed ? '' : ' class="content formpages a4sizeheight"'; ?>>
  <div class="section">
    <?php $formid = 'picfrmbody' . $countsherholder; ?>
    <div class="corporate_heading row section_headding collapsed" data-toggle="collapse" data-target="#<?php echo $formid; ?>" aria-expanded="false"<?php echo " aria-controls=\"{$formid}\""; ?>>
      <div class="col-xs-12 col-sm-12"> &nbsp;

        <?php if( $posAp ) {
	         }else{
          echo  ' &nbsp; <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> &nbsp; ';

			 }
			 echo 'PERSON IN CHARGE';
			  ?>
      </div>
    </div>
    <div class="section_body<?php echo $embed ? ' collapse' : ''; ?>"<?php echo " id=\"{$formid}\""; ?>>
      <div class="row col-xs-12 help-block"></div>
      <div class="row">
        <div class="col-xs-6 col-sm-2"><?php echo 'Person in Charge'; ?></div>
        <div class="col-xs-4 col-sm-4">
          <label><input type="checkbox" value="Yes"  name="pic_incharge" disabled="disabled" checked="checked" />           <span>Yes</span></label>
          <label><input type="checkbox" value="No"  name="pic_incharge" disabled="disabled"  />
          <span>No</span></label>
        </div>
        <div class="col-xs-8 col-sm-4"><?php echo 'Person in Charge is also First Point of Contact'; ?></div>
        <div class="col-xs-4 col-sm-2">
          <label><input<?php echo $embed ? ' onclick="reloadFs7b(this);"' : ''; ?> type="checkbox" class="checkme" value="Yes" name="pic_sh_fpo" /><span>Yes</span></label>
          <label><input<?php echo $embed ? ' onclick="reloadFs7b(this);"' : ''; ?> type="checkbox" class="checkme" value="No" name="pic_sh_fpo" /><span>No</span></label>

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
              <input type="checkbox" name="pic_sh_gen" class="checkme" 
              value="Male"<?php echo get_field('pic_sh_gen') == 'Male' ? ' checked' : ''; ?> /><span>Male</span>
            </label>
            <label>
              <input type="checkbox" name="pic_sh_gen" class="checkme" 
            value="Female"<?php echo get_field('pic_sh_gen') == 'Female' ? ' checked' : ''; ?> /><span>Female</span>
            </label>
               <label class="error" style="display: none;">This field is required.</label>
          </div>

          <label class="col-xs-12 col-sm-2">Marital Status</label>
          <div class="col-xs-12 col-sm-3">
            <label><input type="checkbox" name="pic_sh_mar"  value="Married"<?php echo get_field('pic_sh_mar') == 'Married' ? ' checked' : ''; ?> /><span>Married</span></label>
            <label><input type="checkbox"  name="pic_sh_mar"  value="Single"<?php echo get_field('pic_sh_mar') == 'Single' ? ' checked' : ''; ?> /><span>Single</span></label>
            <label><input type="checkbox" name="pic_sh_mar"  value="Divorced"<?php echo get_field('pic_sh_mar') == 'Divorced' ? ' checked' : ''; ?> /><span>Divorced</span></label>
            		<label class="error" style="display: none;">This field is required.</label>
          </div>
          
          <label class="col-xs-12 col-sm-1">Children</label>
          <div class="col-xs-12 col-sm-2">
            <label><input type="checkbox" name="pic_sh_child" value="Yes"<?php echo get_field('pic_sh_child') == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span></label>
            <label><input type="checkbox" name="pic_sh_child"  value="No"<?php echo get_field('pic_sh_child') == 'No' ? ' checked' : ''; ?> /><span>No</span></label>
            		<label class="error" style="display: none;">This field is required.</label>
          </div>
          
        </div>

        <div class="form-group">
     
          <label class="col-xs-12 col-sm-2 control-label text-left" for="pic_sh_title">Title</label>
          <div class="col-xs-12 col-sm-1">
            <select name="pic_sh_title" id="pic_sh_title" class="form-control">
              <?php foreach(array('Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.') as $opt){ ?>
              <option value="<?php echo $opt; ?>"
			  <?php echo get_field('pic_sh_title') == $opt ? ' selected' : ''; ?>><?php echo $opt; ?></option>
              <?php } ?>
            </select>
          </div>
          
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">First Name</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control validate required" name="pic_first_name" value="<?php echo get_field('pic_first_name'); ?>" /></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Middle Name</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control" name="pic_middle_name" 
          value="<?php echo get_field('pic_middle_name'); ?>" /></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Last Name</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control validate required" name="pic_last_name" value="<?php echo get_field('pic_last_name'); ?>" /></div>
          <div class="col-xs-12 col-sm-12 help-block">
         
          <label class="col-xs-12 col-sm-2 control-label text-left"></label>
          &nbsp; (As appearing in supporting identification document) 
          
          </div>
        </div>

       

        <div class="form-group">
          <label class="col-sm-2 control-label text-left">Date of Birth</label>
          <div class="col-sm-2">
            <input<?php echo ' id="pic_dob"' ;?> class="form-control datepicker validate required" type="text" name="pic_dob" value="<?php echo get_field('pic_dob'); ?>" />
          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left" >Nationality</label>
          <div class="col-sm-2">
            <div class="bfh-selectbox bfh-countries cad" data-filter="true" data-name="pic_nationality" data-country="<?php echo get_field('pic_nationality') ?: 'AE'; ?>" data-flags="true"></div>

          </div>

          <label class="col-sm-2 control-label text-left">Passport/ID Number</label>
          <div class="col-sm-2"><input type="text" class="form-control validate required" name="pic_pass_id" value="<?php echo get_field('pic_pass_id'); ?>" /></div>

          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          
        </div>

	<div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Designation</label>
          <div class="col-xs-12 col-sm-6">
            <input type="text" class="form-control validate required" name="pic_dDesig" value="<?php echo get_field('pic_dDesig'); ?>" />
            
            <p class="text-left help-block">(Please indicate desired Designation in company under formation)</p>
          </div>
          <div class="col-xs-12 col-sm-4 control-label text-left help-inline graycolor">
            </div>
        </div>


        <div class="form-group">
        
          <label class="col-sm-2 control-label text-left">Passport Issue Date</label>
          <div class="col-sm-2">
            <!--
         <div class="bfh-datepicker" data-name="pic_pid" data-date="<?php // echo get_field('pic_pid'); ?>"></div>
            -->
            <input<?php echo ' id="pic_pid"' ;?> class="form-control datepicker validate required" type="text" name="pic_pid" value="<?php echo get_field('pic_pid'); ?>" />

          </div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-sm-2 control-label text-left">Passport Expiry Date</label>
          <div class="col-sm-2">

          	<input<?php echo ' id="pic_ped"' ;?> class="form-control datepicker validate required" type="text" name="pic_ped" value="<?php echo get_field('pic_ped'); ?>" />
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-2"> <label>UAE Resident </label></div>
          <div class="col-sm-4">
              
              <label>
              <input type="checkbox" value="Yes" class="checkme" name="pic_uae_resident"
			 <?php echo get_field('pic_uae_resident') == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span>
            </label>
              
            <label>
              <input type="checkbox" value="No" class="checkme"  name="pic_uae_resident"
			  <?php echo get_field('pic_uae_resident') == 'No' ? ' checked' : ''; ?> />
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
              <input type="checkbox" value="Yes" class="checkme" name="pic_uae_stamp"
			  <?php echo get_field('pic_uae_stamp') == 'Yes' ? ' checked' : ''; ?> /><span>Yes</span>
            </label>
              
            <label>
              <input type="checkbox" value="No" class="checkme" name="pic_uae_stamp"
			  <?php echo get_field('pic_uae_stamp') == 'No' ? ' checked' : ''; ?> /><span>No</span>
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
            <input<?php echo ' id="pic_ad_street'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" name="pic_ad_street" value="<?php echo get_field('pic_ad_street'); ?>"  /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2">
            <input<?php echo ' id="pic_ad_zip'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="pic_ad_postal" value="<?php echo get_field('pic_ad_postal'); ?>"  />
          </div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3">
            <input<?php echo ' id="pic_ad_state'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="pic_ad_state" value="<?php echo get_field('pic_ad_state'); ?>"   />
          </div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>


          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3">
            <input<?php echo ' id="pic_ad_city'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" value="<?php echo get_field('pic_ad_city'); ?>" name="pic_ad_city"  />
          </div>

            
        </div>
          
          
        <div class="form-group">

          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="pic_ad_mobile'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required number" name="pic_ad_mobile" value="<?php echo get_field('pic_ad_mobile'); ?>"  /></div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="pic_ad_email'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required email" name="pic_ad_email" value="<?php echo get_field('pic_ad_email'); ?>"  /></div>

          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries cad required" data-filter="true" data-name="pic_ad_country" data-country="<?php echo get_field('pic_ad_country') ?: 'AE'; ?>" data-flags="true"></div>
          </div>

        </div>



        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="pic_ad_telhome'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="pic_ad_telhome" value="<?php echo get_field('pic_ad_telhome'); ?>"  /></div>



          <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="pic_ad_teloffice'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="pic_ad_teloffice" value="<?php echo get_field('pic_ad_teloffice'); ?>"  /></div>

          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="pic_ad_fax'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="pic_ad_fax" value="<?php echo get_field('pic_ad_fax'); ?>"  /></div>



        </div>

            <br/>

       <div class="form-group">
          <div class="col-xs-12">
          <legend class="legend_cl">
            Permanent Address <span class="help-inline">(Mandatory for Non-Resident Applicant)</span>&nbsp;&nbsp;

            <label><input type="checkbox" value="Yes" name="pic_p_ad_same" class="pic_p_ad_same"<?php echo get_field('pic_p_ad_same') == 'Yes' ? ' checked' : ''; ?> /><span>Same as Correspondence Address</span></label>
            </legend>

          </div>
        </div>


        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Street</label>
          <div class="col-xs-12 col-sm-10"><input type="text" <?php echo ' id="pic_p_street'.$countsherholder.'"' ;?> class="form-control pad validate required" name="pic_p_street" value="<?php echo get_field('pic_p_street'); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="pic_p_postal" value="<?php echo get_field('pic_p_postal'); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="pic_p_state" value="<?php echo get_field('pic_p_state'); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3"><input type="text" class="form-control pad validate required" name="pic_p_city" value="<?php echo get_field('pic_p_city'); ?>" /></div>

        </div>


        <div class="form-group">

          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad validate required phone" name="pic_p_mobile" value="<?php echo get_field('pic_p_mobile'); ?>" /></div>
            
            <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad validate required email" name="pic_p_email" value="<?php echo get_field('pic_p_email'); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries pad" data-filter="true" data-name="pic_p_country" data-country="<?php echo get_field('pic_p_country') ?: 'AE'; ?>" data-flags="true"></div>
          </div>




        </div>

        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="pic_p_telhome" value="<?php echo get_field('pic_p_telhome'); ?>"  /></div>



          <div class="visible-xs-block hidden-*">&nbsp;</div>

         <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="pic_p_teloffice" value="<?php echo get_field('pic_p_teloffice'); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="pic_p_fax" value="<?php echo get_field('pic_p_fax'); ?>" /></div>

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