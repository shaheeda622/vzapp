<?php if(! $embed){ ?>
<div class="row app_footer" style="width:102.3%;   height:180px !important;  margin-bottom:0px !important;   ">
  <div class="col-xs-12 col-sm-4">
    <div class="col-xs-12 strip-dark-grey" style="width: 102%;">&nbsp;</div>
    <div class="col-xs-12 trd_license no_padding">
    <div style="margin-top:4px !important;">TRADE LICENSE</div>
    <div class="app">APPLICATION</div>
    </div>
    <div class="col-xs-12">
      <table class="gray-out" style="margin:0px !important; color:#979893 !important; margin-top:4px !important; width:400px; padding: 0 !important;
             font-size:12px !important; line-height:1.96; font-weight:normal !important;">
        <?php echo '
        <tr>
          <td style="width: 110px; font-size:12px !important; font-weight:normal !important;">PAGE</td>
          <td> ' . str_pad($app_page++, 2, '0', STR_PAD_LEFT) . ' / ' . str_pad($total_pages, 2, '0', STR_PAD_LEFT) . ' </td>
        </tr>
        <tr>
          <td style="width: 110px; font-size:12px !important; font-weight:normal !important;">VERSION</td>
          <td>' . $VERSION . '</td>
        </tr>
        <tr>
          <td style="width: 110px; font-size:12px !important; font-weight:normal !important;">ISSUE DATE</td>
          <td>' . $ISSUE_DATE . '</td>
        </tr>

        ';
        /*
        <tr>
          <td style="width: 110px; font-size:12px !important; font-weight:normal !important;">REF</td>
          <td> TRADE_LICENSE</td>
        </tr>
        <tr>
          <td style="width: 110px; font-size:12px !important; font-weight:normal !important;">ISSUED BY</td>
          <td>' . $ISSUED_BY . '</td>
        </tr>
         */
        ?>
      </table>
    </div>
  </div>
  <div class="visible-xs-block hidden-*">&nbsp;</div>
  <div class="col-xs-12 col-sm-8" style="padding-right:0px; ">
    <div class="col-xs-11 col-sm-11" style="padding-left: 0px;"><div class="strip-light-grey" style="width:102% !important;">&nbsp;</div></div>
    <div class="col-xs-1 col-sm-1"><div class="strip-red" style=" height:16px; <?php echo $back_color; ?> margin-left: 15%;  width:21px; " ></div></div>
    <div class="col-xs-12 col-sm-5 huge">
    	<span>YOUR<br />COMPANY<br />STARTS <br />HERE</span></div>
    <div class="col-xs-12 col-sm-7 address">
      <p class="gray-out" style=" line-height:2.0">Office 430, Building B, Al Saha Offices <br /> Souk Al Bahar, Old Town Island, Burj Khalifa District <br /> Dubai, UAE, P.O.Box 487177</p>

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

<div style="page-break-after:always"></div>
<?php if($embed && ! $pic){ ?>
  <script src="js/jquery.js"></script>
<?php } ?>

</body>
</html>