<div class="content formpages a4sizeheight">
  <div class="row">
   <!--    <div class="col-xs-12 page_part"> III. DECLARATION </div>-->
  </div>
  <?php
  $dec_fullname = get_field('dec_full_name') ?: get_field('pic_sh_title') . ' ' . get_field('pic_first_name') . ' ' . get_field('pic_last_name');
  
  $pic_block_letters = strtoupper(get_field('pic_block_letters')) ?: strtoupper(get_field('pic_sh_title')) . ' ' . strtoupper(get_field('pic_first_name')) . ' ' . strtoupper(get_field('pic_last_name')); 

  $dec_street = get_field('dec_street') ?: get_field('pic_ad_street');
  $dec_city = get_field('dec_city') ?: get_field('pic_ad_city');
  $dec_postal = get_field('dec_postal') ?: get_field('pic_ad_postal');
  $dec_state = get_field('dec_state') ?: get_field('pic_ad_state');
  
  // echo '+++'.get_field('pic_ad_telhome').'+++';
  
  $dec_country = get_field('dec_country') ?: get_field('pic_ad_country');
  $dec_mobile = get_field('dec_mobile') ?: get_field('pic_ad_mobile');
  $dec_teloffice = get_field('dec_teloffice') ?: get_field('pic_ad_teloffice');
  $dec_telhome = get_field('dec_telhome') ?: get_field('pic_ad_telhome');
  
  $dec_email = get_field('dec_email') ?: get_field('pic_ad_email');
  $dec_fax = get_field('dec_fax') ?: get_field('pic_ad_fax');
  
  ?>
  <div class="section">
    <div class="section_body">
      <fieldset class="form-horizontal">
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">I</label>
          <div class="col-xs-12 col-sm-10">
            <input type="text" name="dec_full_name" class="form-control" readonly 
            value="<?php echo trim($dec_fullname); ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">of</label>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Street</label>
          <div class="col-xs-12 col-sm-6"><input type="text" class="form-control" name="dec_street" readonly value="<?php echo $dec_street; ?>" ></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">City</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control" name="dec_city" readonly value="<?php echo $dec_city; ?>"></div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 control-label text-left">Postal Code</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control" readonly name="dec_postal" value="<?php echo $dec_postal; ?>" ></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">State</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control" readonly name="dec_state" value="<?php echo $dec_state; ?>" ></div>
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-1 control-label text-left">Country</label>
          <div class="col-xs-12 col-sm-3">
          
          <!--<input type="text" class="form-control" readonly name="dec_country" 
          value="<?php echo $dec_country; ?>" >-->
          
          <div class="bfh-selectbox bfh-countries cad" data-filter="true" data-name="dec_country" data-country="<?php echo get_field('pic_ad_country') ?: 'AE'; ?>" data-flags="true"></div>
          
          </div>
        </div>
        <div class="form-group">

           <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Mobile</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control" readonly name="dec_mobile" 
                                                 value="<?php echo $dec_mobile; ?>"></div>
            
                     <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
            
            <label class="col-xs-12 col-sm-1 control-label text-left">Email</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control" readonly name="dec_email" 
                                                 value="<?php echo $dec_email; ?>" ></div>
            
        </div>


        <div class="form-group">
          
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          <label class="col-xs-12 col-sm-2 control-label text-left">Tel. Home</label>
          <div class="col-xs-12 col-sm-2"><input type="text" class="form-control" readonly name="dec_telhome" 
          value="<?php echo $dec_telhome; ?>" ></div>
          
          <label class="col-xs-12 col-sm-1 control-label text-left">Tel.Office</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control" readonly name="dec_teloffice" 
                                                 value="<?php echo $dec_teloffice; ?>" ></div>
          
          
          <div class="col-xs-12 visible-xs-block hidden-*">&nbsp;</div>
          

          <label class="col-xs-12 col-sm-1 control-label text-left">Fax</label>
          <div class="col-xs-12 col-sm-3"><input type="text" class="form-control" readonly name="dec_fax" 
          
          value="<?php echo $dec_fax; ?>" ></div>

        </div>
      </fieldset>
        <br/>
      <div style="color:#000;">
        <p>hereby:</p>
        <ul style="list-style: upper-alpha; color:#000000; font-size:12px; line-height:1.70;">
          <li>
            request Virtuzone to proceed with the formation of the company on my behalf in accordance with the information provided above and any
subsequent changes notified to Virtuzone in writing;
          </li><li>
            confirm that the information given herein is true, accurate and complete;
          </li>
          <li>
            declare to inform Virtuzone of any changes in the provided information and understand that in case of any information is found to be false, untrue or
misleading, I may be held personally liable for it;
          </li>
          <li>
            confirm that the business activities of the Company will not be associated with any money laundering or terrorist activities and that no transactions will be
conducted with jurisdictions that are subject to UN embargoes or with jurisdictions that are listed on any other watch list for illegal activities;
          </li>
          <li>
            accept and agree to abide by the Terms and Conditions appearing on this form under TERMS & CONDITIONS and accept responsibility for the payment
of Virtuzone’s fees (both initial and recurring) in accordance with Virtuzone’s fee schedule a copy of which has been provided to me under FEE SCHEDULE (as amended from time to time);
          </li>
          <li>
            understand that I may have an obligation to report our interest in the company in personal tax returns and that income of the company may be imputed to
me; I will take advice on and comply with my own legal obligations in this respect;
          </li>
          <li>
            declare that the company will not be used for any criminal activity or other illegal purposes, whether fiscal or otherwise, in any jurisdiction and
I understand that Virtuzone may have an obligation to report any arrangement involving the proceeds of criminal conduct;
          </li> 
          <li>
            declare that i have never been convicted of any criminal offence (other than a minor offence) nor have I ever been declared bankrupt or the subject of an investigation
by a governmental, professional or other regulatory or statutory body; 
          </li>
          <li>
            declare that to the best of my knowledge and belief all funds that will be transferred to this company either have or will be properly declared for tax purposes and no
part of such funds represent the proceeds of fiscal crime or evasion; and
          </li>
          <li>
            declare that in the event that I fail to comply with the terms of this Agreement and/or Virtuzone cannot contact me through notice or otherwise, I, hereby surrender any
and all rights that I may have as shareholder(s) of the Company and hereby appoint Virtuzone as my legal representative and lawful attorney to carry out
any and all actions that may be required in order that Virtuzone and I do not incur any further Fees. Virtuzone shall be hereby legally entitled to wind up the
Company and/or to take any and all actions it deems necessary with respect of a Company in the event that I cannot be contacted, fail to communicate
with Virtuzone and/or fail to pay any and all Fees that are required for the incorporation, management and upkeep of the Company.
          </li>
        </ul>
      </div><br>

      <br/><br/>
      <fieldset>
        <div class="col-xs-12 col-sm-6">
          <div class="col-xs-12 boldtxt"><b>Signature Person in Charge</b></div>
          <div class="form-group">
             <div class="input-lg col-sm-12"><input type="text" class="form-control input-lg"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label text-left">Name in Block Letters</label>
             <div class="input-lg col-sm-7">
             <input type="text" name="pic_block_letters"  class="form-control" 
              value="<?php echo $pic_block_letters; ?>" /></div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label text-left">Date</label>
             <div class="input-lg col-sm-7"><input type="text" name="date_signed[]" class="form-control"></div>
          </div>
          <div class="col-xs-12 boldtxt"><b>Signature Virtuzone</div>
          <div class="form-group">
             <div class="input-lg col-sm-12"><input type="text" class="form-control input-lg"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label text-left">Name in Block Letters</label>
             <div class="input-lg col-sm-7"><input type="text" name="name_vz[]" class="form-control"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label text-left">Date</label>
             <div class="input-lg col-sm-7"><input type="text" name="name_vz_date[]"  class="form-control"></div>
          </div>

        </div>

         <div class="col-xs-12 col-sm-6 stamp">
            Virtuzone Company Stamp
        </div>
      </fieldset>

    </div>
  </div>

</div>