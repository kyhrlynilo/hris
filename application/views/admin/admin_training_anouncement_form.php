
<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>Admin_training" class="breadcrumb">Training</a>
					<a href="<?php echo base_url(); ?>Admin_training/employee_trainings" class="breadcrumb">Employee</a>
					<a href="<?php echo base_url(); ?>Admin_training/reports" class="breadcrumb">Reports</a>
					<a href="<?php echo base_url(); ?>Admin_training/anouncement" class="breadcrumb">Anouncement</a>
				</div>		
			</div>
		</nav>
	</div>
	<div class="col s12 card pad-lg">
		<div class="row">
			<div class="col s12">
				<div align="center">
					<h4>Anouncement Form</h4>
				</div>
			</div>
		</div>
		
		<form method="POST" id="admin_training_form">
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<select name="training_id">
							<option value="" disabled selected>Choose your option</option>
							<?php foreach($data_list as $data): ?>
								<option value="<?php echo $data->id; ?>"><?php echo $data->title; ?></option>
							<?php endforeach; ?>
						</select>
						<label>Select Training</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<input type="text" name="anouncement" id="anouncement"  class="validate">
						<!-- <textarea  type="text" id="anouncement" name="anouncement" class="materialize-textarea"></textarea> -->
						<label for="anouncement">Anouncement</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<button type="submit" class="waves-effect waves-light btn">Save</button>				
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('select').material_select();
	});


	$('#admin_training_form').on("submit",function(e){
		
		e.preventDefault();		
		button_loader("save",1);

		$.post(
			base_url + "admin_training/training_insert/",
			{
				data: get_form_data("admin_training_form")
			},
			function(data){								
				button_loader("save",0);
				notify( data, base_url + "Admin_training/anouncement" );				
			}
			);

	});

</script>
