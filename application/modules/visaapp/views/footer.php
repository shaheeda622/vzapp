<?php
$VERSION = empty($footer_meta['version']) ? '1.2' : $footer_meta['version'];
$ISSUE_DATE = empty($footer_meta['issue_date']) ? '25 MAY 2015' : $footer_meta['issue_date'];
$ISSUED_BY = empty($footer_meta['issued_by']) ? 'OPERATIONS' : $footer_meta['issued_by'];
$REF = empty($footer_meta['ref']) ? 'NEW_VISA_APP' : $footer_meta['ref'];
$app_page = empty($footer_meta['page']) ? 0 : $footer_meta['page'];
$total_pages = empty($footer_meta['total_pages']) ? 0 : $footer_meta['total_pages'];
?>
<div class="row app_footer">
  <div class="col-xs-12 col-sm-4">
    <div class="col-xs-12 strip-dark-grey">&nbsp;</div>
    <div class="col-xs-12 trd_license no_padding">
      <div>NEW VISA</div>
      <div class="app">APPLICATION</div>
    </div>
    <div class="col-xs-12">
      <table class="gray-out tbl1">
        <tr>
          <td>PAGE</td>
          <td><?php echo str_pad($app_page, 2, '0', STR_PAD_LEFT) . ' / ' . str_pad($total_pages, 2, '0', STR_PAD_LEFT); ?></td>
        </tr>
        <tr>
          <td>VERSION</td>
          <td><?php echo $VERSION; ?></td>
        </tr>
        <tr>
          <td>ISSUE DATE</td>
          <td><?php echo $ISSUE_DATE; ?></td>
        </tr>
        <tr>
          <td>ISSUE BY</td>
          <td><?php echo $ISSUED_BY; ?></td>
        </tr>
        <tr>
          <td>REF</td>
          <td><?php echo $REF; ?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="visible-xs-block hidden-*">&nbsp;</div>
  <div class="col-xs-12 col-sm-8">
    <div class="col-xs-11 col-sm-11" style="padding-left: 0px;"><div class="strip-light-grey">&nbsp;</div></div>
    <div class="col-xs-1 col-sm-1"><div class="strip-red" style=" height:16px;background: #f01130; margin-left: 15%;  width:21px; " ></div></div>
    <div class="col-xs-12 col-sm-5 huge">
      <span>YOUR<br />COMPANY<br />STARTS <br />HERE</span>
    </div>
    <div class="col-xs-12 col-sm-7 address">
      <p class="gray-out" style=" line-height:2.0">
        Office 430, Building B, Al Saha Offices<br />
        Souk Al Bahar, Old Town Island, Burj Khalifa District <br />
        Dubai, UAE, P.O.Box 487177
      </p>
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