
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0, user-scalable=0" />
    <meta name="description" content="SPA Application" />
    <title>Virtuzone</title>
    <link href="<?php echo url(); ?>content/bootstrap.3.3.1.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>content/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>content/default.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>content/site.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>content/kendo/2014.1.318/kendo.common.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>content/kendo/2014.1.318/kendo.bootstrap.css" rel="stylesheet"/>
    <script src="<?php echo url(); ?>scripts/modernizr-2.7.2.js"></script>
    <script src="<?php echo url(); ?>scripts/jquery-2.1.0.js"></script>
    <script src="<?php echo url(); ?>scripts/jquery-ui.js"></script>
    <script src="<?php echo url(); ?>scripts/bootstrap.js"></script>
    <script src="<?php echo url(); ?>scripts/respond.js"></script>
    <script src="<?php echo url(); ?>scripts/jquery.scrollbar.min.js"></script>
    <?php if(! empty($header_tags)){
      echo $header_tags;
    } ?>
    <style type="text/css">
      .overlay {
        position: fixed;
        z-index: 1041;
        top: 50%;
        left: 50%;
        width: 80px;
        height: 80px;
        margin:-40px 0 0 -40px;
      }
      .last-login-blk{
        position: fixed;
        bottom: 0;
        width: 306px;
      }
    </style>
  </head>
  <body>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
      <div class="row">
        <div class="leftpanelblk">
          <div class="navbar-brand">
            <img src="<?php echo url(); ?>images/vz-logo-white.png" alt="logo" />
            <button aria-controls="navbar2" aria-expanded="false" data-target="#navbar2" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="dispmob mobile-details-blk" data-toggle="modal" data-target=".mobile-details"><i class="fa fa-user"></i></span>
          </div>
          <div class="dateblk"><?php echo date('l \- M d, Y'); ?></div>
          <div class="scrollbar-macosx">
            <div class="navbar-collapse collapse" id="navbar2">
              <ul class="cbp-vimenu" id="menu">
                <li><a href="<?php echo url('home'); ?>" class="clrbrd1">Home</a></li>
                <li><a href="<?php echo url('profile'); ?>" class="clrbrd2">Profile</a></li>
                <li><a href="<?php echo url('licapp'); ?>" class="clrbrd3">License Application</a></li>
                <li><a href="<?php echo url('visaapp'); ?>" class="clrbrd4">Visa Application</a></li>

              </ul>
            </div>
            <div class="hidden-xs">
              <div class="profdetsblk">
                <p><strong style="font-size:16px;"></strong></p>
                <p><?php echo $this->session->userdata('user_firstname'); ?></p>
                <p style="padding-top:10px;">Some info <strong></strong></p>
              </div>
              <div class="profdetsblkbtm">
                <p>Package : </p>
                <p>Active Visas : </p>
              </div>
              <div class="profdetsblkbtm profdetsblkbtmbrd">
                <p>Some Text 1</p>
                <p>Some Text 2</p>
              </div>
            </div>
          </div>
          <div class="profdetsblkbtm last-login-blk hidden-xs">
            <p>Last Logged In : </p>
            <p><a href="<?php echo url('logout'); ?>" class="btn btn-danger">Logout</a> <span><a href="<?php echo url('profile'); ?>">Change Password</a></span></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
      <div class="row">
        <div id="maincontent" class="main-content">
          <div class="body-content">
            <div><?php echo $content; ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade mobile-details" tabindex="-1" role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content">
          <div class="profdetsblk">
            <p><strong style="font-size:16px;"></strong></p>
            <p><?php echo $this->session->userdata('user_firstname'); ?></p>
            <p style="padding-top:10px;">Some info<strong></strong></p>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
          </div>

          <div class="profdetsblkbtm">
            <p>Package : </p>
            <p>Active Visas : </p>
            <p>Establishment Date : </p>
            <p>Trade License Start Date : </p>
            <p>Trade License End Date : </p>
          </div>

          <div class="profdetsblkbtm profdetsblkbtmbrd">
            <p>Relationship Manager : N/A</p>
            <p>Visa Consultant : N/A</p>
          </div>

          <div class="profdetsblkbtm">
            <p>Last Logged In : </p>
            <p><a href="<?php echo url('logout'); ?>" class="btn btn-danger">Logout</a> <span><a href="<?php echo url('profile'); ?>">Change Password</a></span></p>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('.scrollbar-macosx').scrollbar();
        $('.scrollbar-macosx').css({'height': $(window).height()});
        $(window).resize(function(){
          $('.scrollbar-macosx').css({'height': $(window).height()});
          $('.page-header').css({'height': ($('.navbar-brand').height() + 14) + 'px'});
          $('.page-header h2').css({'line-height': ($('.navbar-brand').height() + 14) + 'px'});
        });
      });
    </script>
  </body>
</html>
