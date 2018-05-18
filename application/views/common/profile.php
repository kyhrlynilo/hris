<style type="text/css">
.tabs .indicator {
    color: <?= $color; ?>;
    background-color: <?= $color; ?>;
}
</style>
<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper <?= $color; ?>">
				<div class="col s12">
					<a href="<?php echo base_url(); ?>Employee_document_requests" class="breadcrumb">My Profile</a>

					<button type="button" id="btn_save" name="save" class="btn waves-effect waves-light <?= $color; ?>-text white right" style="margin-top:14px;"> 
						Save Changes
					</button>
				</div>		
			</div>
		</nav>
	</div>

	<div class="col s12 card pad-lg">
		<div class="row">
			<div class="col s12" style="margin-top:20px;">
				<ul class="tabs" id="tabs">
					<li class="tab col s4"><a href="#personal_info" id="id_#personal_info" class="active black-text"><i class="material-icons prefix <?= "$color-text"; ?>" style="font-size: 40px;">person_pin</i> <!-- &nbsp;&nbsp;Personal  Info--></a></li>
					<li class="tab col s4"><a href="#credentials" id="id_#credentials" class="black-text"><i class="material-icons prefix <?= "$color-text"; ?>" style="font-size: 40px;">security</i> <!-- &nbsp;&nbsp;Credentials --></a></li>
					<li class="tab col s4"><a href="#others" id="id_#others" class="black-text"><i class="material-icons prefix <?= "$color-text"; ?>" style="font-size: 40px;">settings_applications</i> <!-- &nbsp;&nbsp;Others --></a></li>
					<!-- <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li> -->
				</ul>
			</div>
			<div id="personal_info" class="col s12" style="padding:20px; margin-top: 10px;">
				<p class="<?= $color; ?> white-text" style="padding: 10px;"><b>PERSONAL INFORMATION</b></p>
				<form method="POST" id="form_personal_info">
					<div class="row">
						<div class="col s4 input-field">
							<input type="text" name="first_name" id="first_name" value="<?= $first_name; ?>">
							<label for="first_name">First name</label>
						</div>
						<div class="col s4 input-field">
							<input type="text" name="mid_name" id="mid_name" value="<?= $mid_name; ?>">
							<label for="mid_name">Middle name</label>
						</div>
						<div class="col s4 input-field">
							<input type="text" name="last_name" id="last_name" value="<?= $last_name; ?>">
							<label for="last_name">Last name</label>
						</div>

					</div>
				</form>
			</div>
			<div id="credentials" class="col s12" style="padding:20px; margin-top: 10px;">
				<p class="<?= $color; ?> white-text" style="padding: 10px;"><b>CREDENTIALS</b></p>
				<form method="POST" id="form_credentials">
					<div class="row">
						<div class="col s5 input-field">
							<input type="password" name="first_name" id="password_a">
							<label for="password_a">Password</label>
						</div>
						<div class="col s5 input-field">
							<input type="password" name="mid_name" id="password_b">
							<label for="password_b">Please re-type password</label>
						</div>
						<div class="col s2 input-field center">
							
						</div>
					</div>
				</form>
			</div>
			<div id="others"  class="col s12" style="padding:20px; margin-top: 10px;">
				<p class="<?= $color; ?> white-text" style="padding: 10px;"><b>SETTINGS</b></p>
			</div>
			<!-- <div id="test3" class="col s12">Test 3</div> -->
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#btn_save").on("click",function(){
		var active_tab = $("#tabs").find('li a .active').attr('id');
		console.log(active_tab);
	});
</script>