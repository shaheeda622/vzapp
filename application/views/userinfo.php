<?php if (!isset($meta)) $meta=''; echo modules::run('_main/top',$meta); ?>
<script>
function save_user_details(){
	$.post("<?=url('_ajax/save_user_details')?>",
		$("#user_details_form").serialize()
	,
	function(data){
		if (data.msg === '1'){
			$.each(data.field_data, function(f_key, f_value) {
				$("#div_"+f_key).removeClass('has-error');
				$("#"+f_key).val(f_value);
			});
			$('#msg_content').html(data.msg_data);
			$('#msg_container').removeClass('alert-danger').addClass('alert-success').show();
			$('#msg_close_button').show();
		}else{
			$.each(data.field_data, function(f_key, f_value) {
				$("#div_"+f_key).removeClass('has-error');
				$("#"+f_key).val(f_value);
			});
			$.each(data.error_array, function(e_key, e_value) {
				$("#div_"+e_key).addClass('has-error');
			});
			$('#msg_content').html(data.msg_data);
			$('#msg_container').removeClass('alert-success').addClass('alert-danger').show();
			$('#msg_close_button').show();
		}
	}, 'json');
	return false;
}
</script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<ol class="breadcrumb">
		<li><a href="<?php echo url('home'); ?>">Home</a></li>
		<li><a href="<?php echo url('admin/users/s'); ?>">Users</a></li>
		<li class="active"><?=$user_data['user']['user_firstname']?></li>
	</ol>
	<h4 class="page-header">User</h4>
	<div id="msg_container" class="alert alert-dismissible" role="alert" style="display:none">
	  <button id="msg_close_button" type="button" class="close" onclick="$('#msg_container').hide();" style="display:none">&times;</button>
	  <span id="msg_content"></span>
	</div>
	<div class="container-fluid well">
		<form id="user_details_form" class="form-horizontal" role="form">
			<div id="div_user_firstname" class="form-group">
				<label for="user_firstname" class="col-sm-3 control-label">First Name</label>
				<div class="col-sm-9">
					<input type="text" id="user_firstname" name="user_firstname" class="form-control input_lg" placeholder="Enter first name" value="<?=$user_data['user']['user_firstname']?>">
				</div>
			</div>
			<div id="div_user_lastname" class="form-group">
				<label for="user_lastname" class="col-sm-3 control-label">Last Name</label>
				<div class="col-sm-9">
					<input type="text" id="user_lastname" name="user_lastname" class="form-control input_lg" placeholder="Enter last name" value="<?=$user_data['user']['user_lastname']?>">
				</div>
			</div>
			<div id="div_user_email" class="form-group">
				<label for="user_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-9">
					<input type="text" id="user_email" name="user_email" class="form-control input_lg" placeholder="Enter email" value="<?=$user_data['user']['user_email']?>">
				</div>
			</div>
			<div id="div_user_password" class="form-group">
				<label for="user_password" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" id="user_password" name="user_password" class="form-control input_lg" placeholder="Enter new password">
				</div>
			</div>
			<div class="form-group nomarg">
				<div class="col-sm-offset-3 col-sm-9">
					<input type="hidden" id="user_id" name="user_id" value="<?=$user_data['user']['user_id']; ?>">
					<button type="button" class="btn btn-success" onclick="save_user_details();">Save</button>
					<button type="button" class="btn btn-success" onclick="location.href = '<?php echo url('admin/users/s'); ?>';">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?=modules::run('_main/bottom')?>