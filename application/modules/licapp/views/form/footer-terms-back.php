<?php
$myPageName = curPageName();
$findme   = 'price';
$pos = strpos($myPageName, $findme);
?>
<?php if(! $embed){ ?>
<div class="row app_footer" style="width:102%; height:180px !important; margin-bottom:0px !important;  ">
  <div class="col-xs-12 col-sm-4">
    <div class="col-xs-12 strip-dark-grey" style="width: 102%;">&nbsp;</div>
    <div class="col-xs-12 trd_license no_padding" style=" font-weight:600;">
		<?php if($pos) { echo '<div>PRICE LIST</div> 
								 <div style="font-size:lighter; margin-top:0px; font-size:15px;">&nbsp;&nbsp;EXTERNAL</div>
							'; } else 
					   {  echo ' <div>TERMS & CONDITIONS</div>  
                          <div style="font-size:lighter; font-size:18px;">&nbsp;&nbsp;</div>';
                       } ?>
		
   </div>
    <div class="col-xs-12">
      <table class="gray-out" style="margin:0px !important;  width:400px; padding: 0 !important;">
        <tr>
          <td style="width: 110px;">PAGE</td>
          <td>0<?php echo $pageNo; ?> / 02</td>
        </tr>
        <?php echo '
        <tr>
          <td>VERSION</td>
          <td>'.$VERSION.'</td>
        </tr>
        <tr>
          <td>ISSUE DATE</td>
          <td>'.$ISSUE_DATE.'</td>
        </tr>
        <tr>
          <td>ISSUED BY</td>
          <td>'.$ISSUED_BY.'</td>
        </tr> '; 
		if($pos) { 
		    echo '
            <tr>
            <td>REF</td>
            <td>PRICE_LIST</td>
            </tr>
            '; } else 
            {  echo '
            <tr>
            <td>REF</td>
            <td> TERMS_CONDITIONS</td>
            </tr>
            ';   
			} ?>
      </table>
    </div>
  </div>
  <div class="visible-xs-block hidden-*">&nbsp;</div>
  <div class="col-xs-12 col-sm-8" style="padding-right:0px; ">
    <div class="col-xs-11 col-sm-11" style="padding-left: 0px;"><div class="strip-light-grey" style="width:102% !important;">&nbsp;</div></div>
    <div class="col-xs-1 col-sm-1"><div class="strip-red" style=" height:16px; margin-left: 15%;  width:21px; " ></div></div>
    <div class="col-xs-12 col-sm-5 huge">YOUR<br />COMPANY<br />STARTS <br />HERE</div>
    <div class="col-xs-12 col-sm-7 address">
      <p class="gray-out" style=" line-height:1.7">Office 430, Building B, Al Saha Offices <br /> Souk Al Bahar, Old Town Island, Burj Khalifa District <br /> Dubai, UAE, P.O.Box 487177</p>
        <br>
      <p>
        <strong>T.&nbsp;</strong>
        <a href="callto:0097144578200">
        <span class="gray-out">+9714 457 8200</span></a>&nbsp;&nbsp;<strong>E.&nbsp;</strong>
        	<a href="mailto:info@vz.ae"><span class="gray-out">info@vz.ae</span></a>
      </p>
      <a href="http://www.vz.ae" class="link">www.vz.ae</a>
    </div>
  </div>
</div>
<?php } ?>
</div>
<?php if($embed && ! $pic){ ?>
  <script src="js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function (){
	  parent.AdjustIframeHeight("<?php echo $page == 3 ? 'shareholderforms' : 'centitiesforms'; ?>", document.getElementById("main_content").scrollHeight);
      $('.section_headding').click(function (){
        var trigger = $(this);
        var target = trigger.next();
        target.slideToggle(function (){
          trigger.find('img').attr('src', target.is(':visible') ? 'images/ArrownUp.png' : 'images/ArrownDown.png');
          parent.AdjustIframeHeight("<?php echo $page == 3 ? 'shareholderforms' : 'centitiesforms'; ?>", document.getElementById("main_content").scrollHeight);
        });
      });
    });
  </script>
<?php } ?>
</body>
</html>