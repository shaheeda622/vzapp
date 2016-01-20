<?php
if(!isset($countsherholder)){
  $countsherholder = '';
}
?>
<div<?php echo $embed ? " id=\"corp$countsherholder\" style=\"display: none;\"" : ' class="content formpages a4sizeheight"'; ?>>
  <?php $formid = 'frmbody' . $countsherholder; ?>
  <div class="section">
    <div class="corporate_heading row section_headding collapsed" data-toggle="collapse" data-target="#<?php echo $formid; ?>" aria-expanded="false"<?php echo " aria-controls=\"{$formid}\""; ?>>
      <div class="col-xs-12 col-sm-12">

        <?php if( $posAp ) {
	         }else{
          echo  ' &nbsp; <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> &nbsp; ';
			 }
			           echo 'CORPORATE SHAREHOLDER ' . $countsherholder;
		  ?>
      </div>
    </div>
    <div class="section_body<?php echo $embed ? ' collapse' : ''; ?>"<?php echo " id=\"{$formid}\""; ?>>
      <div class="row col-xs-12 help-block">&nbsp;</div>
      <div class="row">
        <div class="col-xs-8 col-sm-4">Shareholder is also Person in Charge</div>
        <div class="col-xs-4 col-sm-2"><label>
            <input id="csd_sh_incharge" type="checkbox" value="No" name="cop_sh_incharge" disabled="disabled" checked="checked" /><span>No</span></label>
        </div>
        <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
        <div class="col-xs-8 col-sm-4">Shareholder is also First Point of Contact</div>
        <div class="col-xs-4 col-sm-2">
          <label>
            <input type="checkbox" value="No" name="cop_sh_fpc" disabled="disabled" checked="checked" />
              <span>No</span>
          </label>
        </div>
      </div>
      <div class="visible-*-block">&nbsp;</div>
      <fieldset>
        <legend class="legend_cl">Identity Details</legend>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control validate required" id="name" name="cop_name[]" value="<?php echo get_field('cop_name', $countsherholder - 1); ?>" />
        </div>
        <div class="form-group">
          <label for="previousname">Previous Name (if there has been a change of name in the last 5 years)</label>
          <input type="text" class="form-control validate required" id="previousname" name="cop_previousname[]" value="<?php echo get_field('cop_previousname', $countsherholder - 1); ?>" />
        </div>
        <div class="form-group">
          <label for="tradename">Trade Name (name under which the Corporate Entity is conducting business)</label>
          <input type="text" class="form-control validate required" id="tradename" name="cop_tradename[]" value="<?php echo get_field('cop_tradename', $countsherholder - 1); ?>">
          <span class="help-block">(As appearing in supporting documents)</span>
        </div>
      </fieldset>

      <fieldset class="form-horizontal">
        <div class="form-group">
          <label for="dateofinc" class="col-sm-2 control-label text-left">Date of Incorporation</label>

          <div class="col-sm-3 bfh-datepicker"><input type="hidden" class="validate required" name="cop_d_of_inc[]" value="<?php echo get_field('cop_d_of_inc', $countsherholder - 1); ?>" /></div>

          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label for="jdofinc" class="col-sm-3 control-label">Jurisdiction of Incorporation</label>
          <div class="col-sm-4"><input type="text" class="form-control validate required" id="jdofinc" name="cop_j_date_incor[]" value="<?php echo get_field('cop_j_date_incor', $countsherholder - 1); ?>" /></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label text-left">Registration Number</label>
          <div class="col-sm-3">
            <input type="text" class="form-control validate required" name="cop_reg_num[]" id="cop_reg_num[]" value="<?php echo get_field('cop_reg_num', $countsherholder - 1); ?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label text-left">UAE Resident</label>
          <div class="col-sm-10">
            <label>
              <input type="checkbox" value="No" name="cop_uae_res[]" disabled="disabled" checked="checked"><span>No</span>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label text-left">UAE Entry Stamp</label>
          <div class="col-sm-10">
            <label>
              <input type="checkbox" value="No" name="cop_uae_ent_sta[]" disabled="disabled" checked="checked"><span>No</span>
            </label>
            <span class="help-inline"></span>
          </div>
        </div>
      </fieldset>

     <fieldset class="form-horizontal">
        <legend class="legend_cl">Shareholding Details</legend>
        <div class="form-group">
          <div class="col-xs-12">Please indicate desired shareholding in company under formation.</div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Percentage of Shares</label>
          <div class="col-xs-12 col-sm-2"><input type="text" name="cop_per_o_sha[]"  class="form-control" data-svalue="<?php echo get_field('cop_per_o_sha', $countsherholder - 1); ?>" value="<?php echo get_field('cop_per_o_sha', $countsherholder - 1); ?>" placeholder="%" /></div>

          <div class="col-xs-12 col-sm-1">&nbsp;</div>
          <label class="col-xs-12 col-sm-3 control-label text-left">Value per Shares</label>
          <div class="col-xs-12 col-sm-4"><input type="text" class="form-control number_of_shares" name="cop_val_p_sha[]" value="<?php echo get_field('cop_val_p_sha', $countsherholder - 1); ?>" disabled  placeholder="AED"></div>
        </div>
        <div class="form-group">

          <label class="col-xs-12 col-sm-2 control-label text-left">Number of Shares</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control" name="cop_num_o_sha[]" value="<?php echo get_field('cop_num_o_sha', $countsherholder - 1); ?>"  /></div>
          <div class="col-xs-12 col-sm-1">&nbsp;</div>
          <label class="col-xs-12 col-sm-3 control-label text-left">Value of Shares</label>
          <div class="col-xs-12 col-sm-4"><input type="text" class="form-control" name="cop_val_of_sha[]" value="<?php echo get_field('cop_val_of_sha', $countsherholder - 1); ?>"  placeholder="AED" /></div>
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
            <input<?php echo ' id="cop_ad_street'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" name="cop_ad_street[]" value="<?php echo get_field('cop_ad_street', $countsherholder - 1); ?>"  /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2">
            <input<?php echo ' id="cop_ad_zip'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="cop_ad_postal[]" value="<?php echo get_field('cop_ad_postal', $countsherholder - 1); ?>"  />
          </div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3">
            <input<?php echo ' id="cop_ad_state'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="cop_ad_state[]" value="<?php echo get_field('cop_ad_state', $countsherholder - 1); ?>"   />
          </div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>


          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3">
            <input<?php echo ' id="cop_ad_city'.$countsherholder.'"' ;?> type="text" class="form-control cad validate required" value="<?php echo get_field('cop_ad_city', $countsherholder - 1); ?>" name="cop_ad_city[]"  />
          </div>

        </div>
        <div class="form-group">

          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="cop_ad_mobile'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required number" name="cop_ad_mobile[]" value="<?php echo get_field('cop_ad_mobile', $countsherholder - 1); ?>"  /></div>
        
            <div class="visible-xs-block hidden-*">&nbsp;</div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="cop_ad_email'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate required email" name="cop_ad_email[]" value="<?php echo get_field('cop_ad_email', $countsherholder - 1); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries cad required" data-filter="true" data-name="cop_ad_country[]" data-country="<?php echo get_field('cop_ad_country', $countsherholder - 1) ?: 'AE'; ?>" data-flags="true"></div>
          </div>

        </div>



        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input<?php echo ' id="cop_ad_telhome'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="cop_ad_telhome[]" value="<?php echo get_field('cop_ad_telhome', $countsherholder - 1); ?>"  /></div>



          <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="cop_ad_teloffice'.$countsherholder.'"' ;?>  type="text" class="form-control cad validate" name="cop_ad_teloffice[]" value="<?php echo get_field('cop_ad_teloffice', $countsherholder - 1); ?>"  /></div>

          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input<?php echo ' id="cop_ad_fax'.$countsherholder.'"' ;?>  type="text" class="form-control cad" name="cop_ad_fax[]" value="<?php echo get_field('cop_ad_fax', $countsherholder - 1); ?>"  /></div>



        </div>


        <div class="form-group">
          <div class="col-xs-12">
          <legend class="legend_cl">
            Permanent Address <span class="help-inline">(Mandatory for Non-Resident Applicant)</span>&nbsp;&nbsp;

            <label><input type="checkbox" value="Yes" name="cop_p_ad_same[]" class="cop_p_ad_same"<?php echo get_field('cop_p_ad_same', $countsherholder - 1) == 'Yes' ? ' checked' : ''; ?> /><span>Same as Correspondence Address</span></label>
            </legend>

          </div>
        </div>


        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Street</label>
          <div class="col-xs-12 col-sm-10"><input type="text" class="form-control pad validate required" name="cop_p_street[]" value="<?php echo get_field('cop_p_street', $countsherholder - 1); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="cop_p_postal[]" value="<?php echo get_field('cop_p_postal', $countsherholder - 1); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="cop_p_state[]" value="<?php echo get_field('cop_p_state', $countsherholder - 1); ?>" /></div>
          <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-sm-3"><input type="text" class="form-control pad validate required" name="cop_p_city[]" value="<?php echo get_field('cop_p_city', $countsherholder - 1); ?>" /></div>

        </div>


        <div class="form-group">
          
            <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad cad validate required phone" name="cop_p_mobile[]" value="<?php echo get_field('cop_p_mobile', $countsherholder - 1); ?>" /></div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad validate required email" name="cop_p_email[]" value="<?php echo get_field('cop_p_email', $countsherholder - 1); ?>"  /></div>
          
            <div class="visible-xs-block hidden-*">&nbsp;</div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
            <div class="bfh-selectbox bfh-countries pad" data-filter="true" data-name="cop_p_country[]" data-country="<?php echo get_field('cop_p_country', $countsherholder - 1) ?: 'AE'; ?>" data-flags="true"></div>
          </div>




        </div>

        <div class="form-group">

         <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control pad" name="cop_p_telhome[]" value="<?php echo get_field('cop_p_telhome', $countsherholder - 1); ?>"  /></div>



          <div class="visible-xs-block hidden-*">&nbsp;</div>

         <label class="col-xs-12 col-sm-1 control-label text-left">Tel. Office</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="cop_p_teloffice[]" value="<?php echo get_field('cop_p_teloffice', $countsherholder - 1); ?>"  /></div>

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control pad" name="cop_p_fax[]" value="<?php echo get_field('cop_p_fax', $countsherholder - 1); ?>" /></div>

        </div>
      </fieldset>
		
         <br/>
     <?php if(!$embed){ ?>
      	<br/>
        <legend class="legend_cl">Specimen Signature</legend>
        <div>
        <p>
      <strong>The following two signatures of the above Shareholder are provided as specimen signature:</strong></p>
        <div style="float: left;width: 48%;height: 40px;border: 1px solid #D2D2D2"></div>
        <div style="float: left;width: 4%;">&nbsp;</div>
        <div style="float: left;width: 48%;height: 40px;border: 1px solid #D2D2D2"></div>
        <div style="clear:both;"></div>
        <div class="help">(Please sign in each of the boxes)</div>
        </div>
        <?php } ?>
    </div>
  </div>

</div>