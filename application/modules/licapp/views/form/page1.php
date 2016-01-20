


<div class="content formpages a4sizeheight">
    <br/> 
  <div class="row">
     <!-- <div class="col-xs-12 page_part"> 1. Company Formation </div>-->
  </div>

  <div class="section">
    <div class="row section_headding">
     <!--   <div class="col-xs-2 col-sm-1"> A </div>-->
      <div class="col-xs-10 col-sm-11">JURISDICTION</div>
    </div>
    <div class="row section_body">
      <div class="col-xs-12 ptxt">Fujairah Media Free Zone – Creative City </div>
    </div>
  </div>
    
    
                <br/>  <?php $Company_Type__c = get_field('Company_Type__c'); ?>
  <div class="section">
    <div class="row section_headding">
      <!--  <div class="col-xs-2 col-sm-1"> B </div>-->
      <div class="col-xs-10 col-sm-12">COMPANY TYPE</div>
    </div>
    <div class="row section_body">
      <div class="col-xs-12 ptxt">Please tick one of the below boxes to indicate the type of corporate entity.</div>
      <div class="visible-*-block">&nbsp;</div>
      <div class="hidden-xs col-sm-1"></div>
      <div class="col-xs-12 col-sm-11">
        <label>
          <input type="checkbox" value="FZE" name="company_type" 
          <?php if($Company_Type__c == 'FZE') { echo 'checked disabled'; }else { echo 'disabled';  } ?>  />
          <span>Free Zone Establishment (One Shareholder only)</span>
        </label>
      </div>
      <div class="hidden-xs col-sm-1"></div>
      
      <div class="col-xs-12 col-sm-11">
        <label>
          <input type="checkbox"  value="FZC" name="company_type" 
          <?php if($Company_Type__c == 'FZC') { echo 'checked disabled'; }else { echo 'disabled';  } ?> />
          <span>Free Zone Company (Two or more Shareholders)</span>
        </label>
      </div>
      
      <div class="hidden-xs col-sm-1"></div>
      <div class="col-xs-12 col-sm-11">
        <label>
          <input type="checkbox"  value="Branch" name="company_type" 
          <?php if($Company_Type__c == 'Branch') { echo 'checked disabled'; }else { echo 'disabled';  } ?> />
          <span>Branch (Branch of a local or foreign company)</span>
          <input type="hidden" value="<?php echo get_field('Company_Type__c'); ?>" name="Company_Type__c">
        </label>
      </div>
      
    </div>
  </div>
                    
                
                <br/>
  <div class="section">
    <div class="row section_headding">
      <!--  <div class="col-xs-2 col-sm-1"> C </div>-->
      <div class="col-xs-10 col-sm-12">COMPANY NAME</div>
    </div>
    <div class="row section_body form-horizontal">
      <div class="col-xs-12 ptxt">Please indicate the desired company name in English. If you desire a specific spelling in Arabic please indicate to the right.</div>
      <div class="visible-*-block">&nbsp;</div>
      
      <div class="col-xs-12 col-sm-2">
      <label class="control-label" style="margin-left:15px;">OPTION 1</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      
      <div class="col-xs-12 col-sm-4"><input  class="form-control" type="text" name="question4[option1]" value="<?php echo get_field('question4', 'option1'); ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-sm-2">&nbsp;</div>
      
      <div class="col-xs-12 col-sm-4"><input dir="rtl" lang="ar" class="form-control" type="text" name="question4[option12]" value="<?php echo get_field('question4', 'option12'); ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>

      <?php if(get_field('question4', 'option2')){ ?>
        <div class="visible-*-block">&nbsp;</div>
        <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:15px;">OPTION 2</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
        
        
        
        <div class="col-xs-12 col-sm-4"><input  class="form-control" type="text" name="question4[option2]" value="<?php echo get_field('question4', 'option2'); ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
        <div class="col-sm-2"></div>
        
        <div class="col-xs-12 col-sm-4"><input dir="rtl" lang="ar" class="form-control" type="text" name="question4[option22]" value="<?php echo get_field('question4', 'option22'); ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
        
      <?php } ?>
      <?php if(get_field('question4', 'option3')){ ?>
        <div class="visible-*-block">&nbsp;</div>
        <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:15px;">OPTION 3</label>
        </div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
        
        <div class="col-xs-12 col-sm-4"><input dir="rtl" lang="ar" class="form-control" type="text" name="question4[option3]" value="<?php echo get_field('question4', 'option3'); ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
        
        <div class="col-sm-2
        "></div>
        
        <div class="col-xs-12 col-sm-4"><input class="form-control" type="text" name="question4[option32]" value="<?php echo get_field('question4', 'option32'); ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
        
      <?php } ?>
    </div>
  </div>
                
                
                
                    <br/>
  <div class="section">
    <div class="row section_headding">
       <!-- <div class="col-xs-2 col-sm-1"> D </div>-->
      <div class="col-xs-10 col-sm-12">COMPANY ACTIVITY</div>
    </div>
    <div class="row section_body form-horizontal">
      <?php $acts_array = (get_field('question5') ? explode(',', get_field('question5')) : (get_field('activity') ?: array())); $acts_array = array_pad($acts_array, 6, ''); ?>
      <div class="col-xs-12 ptxt">Please indicate the desired company activity.</div><div class="visible-*-block">&nbsp;</div>
      <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:10px;">Activity 1</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-4"><input class="form-control" name="activity[1]" type="text" value="<?php echo $acts_array[0]; ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:10px;">Activity 2</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-4"><input class="form-control" name="activity[2]" type="text" value="<?php echo $acts_array[1]; ?>" /></div><div class="visible-*-block hidden-lg">&nbsp;</div>
      <?php if($acts_array[2]){ ?>
      <div class="hidden-xs hidden-sm hidden-md visible-lg-block">&nbsp;</div>
      <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:10px;">Activity 3</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-4"><input class="form-control" name="activity[3]" type="text" value="<?php echo $acts_array[2]; ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:10px;">Activity 4</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-4"><input class="form-control" name="activity[4]" type="text" value="<?php echo $acts_array[3]; ?>" /></div><div class="visible-*-block hidden-lg">&nbsp;</div>
      <?php } ?>
      <?php if($acts_array[4]){ ?>
      <div class="hidden-xs hidden-sm hidden-md visible-lg-block">&nbsp;</div>
      <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:10px;">Activity 5</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-4"><input class="form-control" name="activity[5]" type="text" value="<?php echo $acts_array[4]; ?>" /></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-2"><label class="control-label" style="margin-left:10px;">Activity 6</label></div><div class="visible-xs-block hidden-sm hidden-md hidden-lg">&nbsp;</div>
      <div class="col-xs-12 col-sm-4"><input class="form-control" name="activity[6]" type="text" value="<?php echo $acts_array[5]; ?>" /></div>
      <?php } ?>
    </div>
  </div>

                    
                    <br/>
  <div class="section">
    <div class="row section_headding">
      <!--  <div class="col-xs-2 col-sm-1"> E </div>-->
      <div class="col-xs-10 col-sm-11">SHARE CAPITAL</div>
    </div>
    <?php $share_capital = get_field('share_capital'); ?>
    <div class="row section_body">
      <div class="hidden-xs col-sm-1"></div>
      <div class="col-xs-12 col-sm-11">
        <label>
          <input type="checkbox" value="100,000" name="share_capital_chk" id="share_capital_chk"
          <?php if($share_capital == '100,000') { echo 'checked disabled'; }else { echo 'disabled';  } ?>  />
          <span>Standard share capital of AED 100, 000.</span>
        </label>
        	<br/>
        <label>
          <input type="checkbox" value="150,000" name="share_capital_llc" id="share_capital_llc" 
          <?php if($share_capital == '100,000') { echo 'disabled'; }else { echo 'checked disabled'; } ?>   /> 
          <span>Standard share capital of AED 150, 000.</span>
        </label>
			<input type="hidden" value="<?php echo get_field('share_capital'); ?>" name="share_capital">
      </div>
    </div>
  </div>

</div>