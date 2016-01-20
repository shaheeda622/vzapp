<!doctype html>
<html>
  <head>
    <title>Online Application Portal</title>
    <meta charset="utf-8" />
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo url(); ?>licappres/assets/css/bootstrap.min.css">
    <style>
      body{
        position: absolute;
        width: 100%;
        background: url('<?php echo url(); ?>licappres/assets/images/home.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      .wrapper{position: absolute; width: 100%; height: 100%;}
      .access_link{position: relative; top:190px;}
      .access_now_cl{width: 236px; height: 63px; background-position: center top; background-repeat: no-repeat;}
      #access_now_bg{background-image: url('<?php echo url(); ?>licappres/assets/images/access_now_white.png');}
      #access_now_bg:hover {background-image: url('<?php echo url(); ?>licappres/assets/images/access_now_hover.png');}

      /* Adjust the width and height according to image. */
      .app_title{
        width: 231px;
        height: 214px;
        background: url('<?php echo url(); ?>licappres/assets/images/landing-page-text.png');
        background-size: 231px 214px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-2 col-sm-4 col-sm-offset-8 access_link" style="margin-left:63.5%;">
          <div class="app_title"></div><br>
          <a href="<?php echo url('licapp/start'); ?>" title="Trade License">
            <div id="access_now_bg" class="access_now_cl"></div>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>