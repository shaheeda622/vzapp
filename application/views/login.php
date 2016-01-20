<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0, user-scalable=0" />
    <title>Login</title>

    <!--link href="content/kendo/2014.1.318/kendo.dataviz.default.min.css" rel="stylesheet" /-->
    <link href="<?php echo url(); ?>/content/bootstrap.3.3.1.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>/content/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>/content/default.css" rel="stylesheet"/>
    <script src="<?php echo url(); ?>/scripts/kendo/2014.1.318/jquery.min.js"></script>
    <script src="<?php echo url(); ?>/scripts/angular.min.js"></script>
    <script src="<?php echo url(); ?>/scripts/kendo/2014.1.318/kendo.all.min.js"></script>
    <script src="<?php echo url(); ?>/scripts/jquery-2.1.0.js"></script>
    <script src="<?php echo url(); ?>/scripts/jquery.validate.js"></script>
    <script src="<?php echo url(); ?>/scripts/jquery.validate.unobtrusive.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#btnLogin1').click(function(e){
          var $form = $('#login');
          if($form.valid()){
            $('#btnLogin').attr('disabled', 'disabled');
          }
        });

        $('body').css({'height': ($(window).height()) + 'px'});
        $(window).resize(function(){
          $('body').css({'height': ($(window).height()) + 'px'});
        });
      });
      function login(){
        if(! $('#login').valid()){
          return false;
        }
        $.post("<?= url('_ajax/login') ?>",
                $("#login").serialize(),
                function(data){
                  if(data.msg === '1'){
                    parent.location = '<?= url() ?>' + data.msg_extra + '/home';
                  }else{
                    $('#main_msg_content').html(data.msg_data);
                    $('#main_msg_container').removeClass('alert-success').addClass('alert-danger').show();
                    $('#main_msg_close_button').show();
                  }
                }, 'json');
        return false;
      }
    </script>
  </head>
  <body class="loginscrbg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
          <img src="<?php echo url(); ?>/images/login-image.png" style="max-width:100%;" alt="login image" class="dispmob" />
        </div>
        <div class="col-sm-6 col-md-5 col-lg-4">
          <div class="login-block">
            <p>Welcome To The</p>
            <p><img src="<?php echo url(); ?>/images/vzlogo.png" alt="" /></p>
            <p>APPLICATIONS</p>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <div class="login-block-btm">
                <div id="main_msg_container" class="alert alert-dismissible" role="alert" style="display:none">
                  <button id="main_msg_close_button" type="button" class="close" onclick="$('#main_msg_container').hide();" style="display:none">&times;</button>
                  <span id="main_msg_content"></span>
                </div>
                <form id="login" role="form">
                  <div class="form-group col-md-12">
                    <label class="" for="AccountCode">Account Name</label>
                    <input class="form-control" data-val="true" data-val-required="Account Name is required." id="AccountCode" name="AccountCode" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="AccountCode" data-valmsg-replace="true"></span>
                  </div>

                  <div class="form-group col-md-12">
                    <label class="" for="Email">Email</label>
                    <input class="form-control" data-val="true" data-val-regex="Email is not valid" data-val-regex-pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" data-val-required="Email is required." id="Email" name="login_email" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="login_email" data-valmsg-replace="true"></span>
                  </div>

                  <div class="form-group col-md-12">
                    <label class="" for="Password">Password</label>
                    <a class="pull-right" href="#">Forgot Password?</a>
                    <input class="form-control" data-val="true" data-val-required="Password is required." id="Password" name="login_password" type="password" />
                    <span class="field-validation-valid" data-valmsg-for="login_password" data-valmsg-replace="true"></span>
                  </div>
                  <div class="form-group col-md-12 text-center">
                    <a id="btnLogin" name="btnLogin" class="btn btn-danger btn-cons" onclick="login();">Sign in</a>
                  </div>
                  <div class="commands text-center">
                    New here? <a href="#">Sign up now!</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
      </div>
    </div>



  </body>
</html>
