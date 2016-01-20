<?php
$myPageNameAp = curPageName();
$findmeAp   = 'cation';
$posAp = strpos($myPageNameAp, $findmeAp);
?>
<div<?php echo $embed ? ' id="main_content"' : ' class="container"'; ?>
style="  height:1450px !important;   ">
<?php if(! $embed){ ?>
	<div class="row" style="height:15px;"></div>
<div class="row app_header"
  style="width:102% !important;   height:70px !important; ">
  <div class="col-xs-12 col-sm-4 logo"><img src="images/logo.jpg" width="405" alt="logo" /></div>
  <div class="visible-xs hidden-sm hidden-md hidden-lg">&nbsp;</div>
  
  <div class="col-xs-12 col-sm-8 app_name" >
      <div class="col-xs-11 col-sm-11 trd_license"
      style="font-size:24px; font-weight:bold; background:#dcd7d2 !important;"> 
      
      <?php 
	  
	  $back_color = 'background: #fdcf08;';
	  
	  if($page == 4) { echo 'DECLARATION'; $back_color = 'background: #2E3192;'; } 
	  elseif($page == 5 || $page == 6 ) { echo 'FEE SCHEDULE'; $back_color = 'background: #ED1E79;';   } 
	  elseif($page == 7 || $page == 8 ) { echo 'TERMS & CONDITIONS'; $back_color = 'background: #8CC63F;';  } 
	  else{ echo 'APPLICATION FORM'; } ?> </div>
    
    <div class="col-xs-1 col-sm-1 orng">
    <div style="display: inline-block; <?php echo $back_color; ?> margin-left: 15%;  width:22px;
                 height: 100%;" class="ycldiv">&nbsp;</div></div>
                 
    <!--<div class="col-xs-11 col-sm-11" style="font-size:24px;   font-weight:normal;text-align:right;"> 
    LICENSE APPLICATION </div>-->
    
    <div class="col-xs-1 col-sm-1">&nbsp;</div>
  </div>
</div>
<?php }

