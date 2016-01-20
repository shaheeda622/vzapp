<!DOCTYPE html>
<html<?php echo ' lang="' . $this->uri->segment(1) . '"'; ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $meta['description']?>">
	<meta name="author" content="Zulfiqar Ali">
	<title><?php echo $this->config->item('company_name') . (empty($meta['title']) ? '' : ' :: ' . $meta['title']); ?></title>
	<link href="<?=url()?>css/normalize.css" rel="stylesheet">
	<link href="<?=url()?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=url()?>css/bootstrap-select.css" rel="stylesheet">
	<link href="<?=url()?>css/bootstrap-datepicker3.min.css" rel="stylesheet">
	<link href="<?=url()?>css/dashboard.css" rel="stylesheet">
	<link href="<?=url()?>css/default/style.css" rel="stylesheet">
  <script src="<?=url()?>js/jquery.min.js"></script>
  <script src="<?=url()?>js/bootstrap.min.js"></script>
  <script src="<?=url()?>js/bootstrap-select.js"></script>
  <script src="<?=url()?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?=url()?>js/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>
  <script src="<?=url()?>js/jquery.placeholder.js"></script>
	<script src="<?=url()?>js/ie10-viewport-bug-workaround.js"></script>
	<!--[if lt IE 9]>
	<script src="<?=url()?>js/html5shiv.min.js"></script>
	<script src="<?=url()?>js/respond.min.js"></script>
	<![endif]-->
	<script src="<?=url()?>js/scripts.js"></script>
	<script>
	function refresh_page(){
		parent.location = URLDecode('<?php echo urlencode($_SERVER["REQUEST_URI"]); ?>');
	}
	</script>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo_container">
						<a href="<?=url('home')?>"><img src="<?=url()?>images/default/eip-logo.png" alt="Logo" height="35" width="170"></a>
					</div>
				</div>
				<div class="navbar-collapse collapse">
					<?php if($this->session->userdata('user_id')!=''){ ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo url('home'); ?>"><span class="glyphicon glyphicon-home nav_spacing"></span><?php echo lang('home'); ?></a></li>
						<li><a href="<?php echo url('profile'); ?>"><span class="glyphicon glyphicon-user nav_spacing"></span><?php echo lang('profile'); ?></a></li>
						<li><a href="<?php echo url('logout'); ?>"><span class="glyphicon glyphicon-lock nav_spacing"></span><?php echo lang('logout') . ' ' . $this->session->userdata('user_firstname'); ?></a></li>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
            <li<?php echo (in_array($this->uri->segment('2'), array('', 'home')) ? ' class="active"' : '')?>>
              <a href="<?php echo url('home'); ?>">
                <span class="glyphicon glyphicon-home nav_spacing"></span><?php echo lang("home"); ?>
              </a>
            </li>
            <?php if($this->session->userdata('user_id') != ''){ ?>
            <li<?php echo ($this->uri->segment('2') == 'profile' ? ' class="active"' : '')?>>
              <a href="<?php echo url('profile'); ?>">
                <span class="glyphicon glyphicon-list-alt nav_spacing"></span><?php echo lang('profile'); ?>
              </a>
            </li>
            <li<?php echo ($this->uri->segment('2') == 'licapp' ? ' class="active"' : '')?>>
              <a href="<?php echo url('licapp'); ?>">
                <span class="glyphicon glyphicon-list-alt nav_spacing"></span>License Application
              </a>
            </li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main nopad">
					<div id="main_msg_container" class="alert alert-dismissible" role="alert" style="display:none">
						<button id="main_msg_close_button" type="button" class="close" onclick="$('#main_msg_container').hide();" style="display:none">&times;</button>
						<span id="main_msg_content"></span>
					</div>
				</div>