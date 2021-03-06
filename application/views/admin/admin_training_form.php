<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>Admin_training" class="breadcrumb">Training</a>
					<a href="<?php echo base_url(); ?>Admin_training/training_form" class="breadcrumb">Training Form</a>
				</div>		
			</div>
		</nav>
	</div>
	<div class="col s12 card pad-lg">
		<form method="post" id="form">
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<input id="title" name="title" type="text" class="validate">
						<label for="title">Title</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="input-field col s12">
						<select name="type_1">
							<option value="" disabled selected>Choose your option</option>
							<option value="Technical">Technical</option>
							<option value="Professional">Professional</option>
						</select>
						<label>Type 1</label>
					</div>
				</div>
				<div class="col s6">
					<div class="input-field col s12">
						<select name="type_2">
							<option value="" disabled selected>Choose your option</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
						</select>
						<label>Type 2</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<input id="sponsor" name="sponsor" type="text" class="validate">
						<label for="sponsor">Sponsor</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<input id="location_of_seminar" name="location" type="text" class="validate">
						<label for="location_of_seminar">Location of Seminar</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<input id="total_hours" name="total_hours" type="number" class="validate">
						<label for="total_hours">Total hours</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="input-field">
						<input type="text" name="date_from" id="date_from" class="datepicker">
						<label for="date_from">Date from</label>
					</div>
				</div>
				<div class="col s6">
					<div class="input-field">
						<input type="text" name="date_to" id="date_to" class="datepicker">
						<label for="date_to">Date to</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<input type="submit" class="btn" name="add" id="id_add">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	IO.setSubmitScript({
		form_id : "form",
		button_id : "id_add",
		data_receiver_url : base_url + "admin_training/insert",
		redirect_url : base_url + "admin_training"
        //,post_script : postScript
    });	

</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('select').material_select();
	});       
</script>
<script type="text/javascript">
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    format: 'yyyy-mm-dd',
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
});
</script>