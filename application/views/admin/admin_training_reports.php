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
			<div class="col s6">
				<div class="input-field">
					<select>
						<option value="" disabled selected>Choose your option</option>
						<option value="Department 1">Department 1</option>
						<option value="Department 2">Department 2</option>
						<option value="Department 3">Department 3</option>
					</select>
					<label>Select department</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s3">
				<div class="input-field">
					<input type="text" id="date_from" name="date_from" class="datepicker">
					<label for="date_from">Date from</label>
				</div>
			</div>
			<div class="col s3">
				<div class="input-field">
					<input type="text" id="date_to" name="date_to" class="datepicker">
					<label for="date_to">Date from</label>
				</div>
			</div>
			<div class="col s2">
				<button type="submit" class="btn">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('select').material_select();
	});

	$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15, // Creates a dropdown of 15 years to control year,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
		});


</script>