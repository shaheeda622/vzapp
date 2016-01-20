<?php
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$myPageName = curPageName();
$findme   = 'price';
$pos = strpos($myPageName, $findme);
?>
<div<?php echo $embed ? ' id="main_content"' : ' class="container"'; ?>
style="  height:1426px !important; margin-top:0px !important;">
<?php if(! $embed){ ?>
<div class="row app_header"
  style="width:102% !important;   height:70px !important; ">
  <div class="col-xs-12 col-sm-4 logo"><img src="images/logo.jpg" width="405" alt="logo" /></div>
  <div class="visible-xs hidden-sm hidden-md hidden-lg">&nbsp;</div>
  <div class="col-xs-12 col-sm-8 app_name" >
      <div class="col-xs-11 col-sm-11 trd_license"
      style="font-size:32px; background:#dcd7d2 !important;">
      <?php if($pos) { echo 'PRICE LIST'; } else { echo 'TERMS & CONDITIONS '; } ?>
       </div>
    <div class="col-xs-1 col-sm-1 orng"><div style="display: inline-block;
                                             background: #fdcf08; margin-left: 15%;  width:22px;
                                             height: 100%;" class="ycldiv">&nbsp;</div></div>
    <div class="col-xs-11 col-sm-11" style="font-size:24px;  font-weight:normal;text-align:right;">  </div>
    <div class="col-xs-1 col-sm-1">&nbsp;</div>
  </div>
</div>
<?php }

