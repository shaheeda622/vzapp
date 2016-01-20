<?php
$la_name = isset($_GET['la_name']) ? $_GET['la_name'] : '';
$myPageNameAp = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
$findmeAp = 'cation';
$posAp = strpos($myPageNameAp, $findmeAp);
include 'db.php';
include(__DIR__ . '/form/myfunctions.php');
if($la_name){
  load_data_from_db($db, $la_name);
}
?>
<div class="col-md-12">

  <div class="page-header" style="max-height:53px; ">
    <h3 class="h3" style="line-height:53px;">LICENSE APPLICATION FORM </h3>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-blk">

          <!--
          <header class="headerdiv startPage">
          <div style="padding: 5px 0px;">
            <div class="row app_header">
              <div class="col-xs-12 col-sm-4 logo"><img src="<?php echo url(); ?>licappres/assets/images/logo.jpg" alt="logo"></div>
              <div class="visible-xs hidden-sm hidden-md hidden-lg">&nbsp;</div>
              <div class="col-xs-12 col-sm-8 app_name">
                <div class="col-xs-11 col-sm-11 trd_license"> APPLICATION FORM </div>
                <div class="col-xs-1 col-sm-1 orng"><div style="display: inline-block;
                                                         background: #fdcf08; margin-left: 10%; width:50%;  width:20px;  height: 100%;" class="ycldiv">&nbsp;</div></div>
                <div class="col-xs-1 col-sm-1">&nbsp;</div>
              </div>
            </div>
          </div>
        </header>
         -->


        <div class="clearfix"></div>

        <div class="sectiondiv">
          <div style="background:#EEF2F5 !important; padding: 5px 0px;">
            <div class="content" style="width:102%;">
              <!-- multistep form -->
              <form id="msform" method="post">
                <div class="row form_header">Tell us about your new company</div>
                <!-- progressbar -->
                <div class="row">
                  <ul id="progressbar">
                    <li class="active" style="margin-left:-2%;"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                </div>
                <span class="merror">Field is required</span>
                <!-- fieldsets -->

                <?php
                $embed = TRUE;
                include __DIR__ . '/fieldset1.php';
                include __DIR__ . '/fieldset3.php';
                include __DIR__ . '/fieldset5.php';
                include __DIR__ . '/fieldset6.php';
                ?>

                <fieldset class="steps" id="fs7">
                  <?php include __DIR__ . '/form/page3a.php'; ?>
                  <input type="button" name="next" class="next action-button" value="Next" />
                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                </fieldset>

                <fieldset class="steps" id="fs7a">
                  <?php include __DIR__ . '/form/page3b.php'; ?>
                  <input type="button" name="next" class="next action-button" value="Next" />
                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                </fieldset>

                <fieldset class="steps" id="fs7b">
                  <p><input type="checkbox" id="must_agree" /> I have read and agree to the
                    <a target="_blank" href="form/vz-terms-and-conditions.php">Terms & Conditions</a> and
                    <a target="_blank" href="form/vz-price-list.php">Price List</a>.
                  </p>
                  <input type="submit" name="submit" class="submit action-button" data-link="<?php echo url('licapp/submit');?>" value="Submit" />
                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>