<?php  
$emp_detail = "";
foreach($employee as $emp)
{
    $emp_detail = $emp; 
}

?>

<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
					<a href="<?php echo base_url(); ?>admin_time_keeping/view_employees" class="breadcrumb">Employees</a>
					<a href="<?php echo base_url(); ?>admin_time_keeping/employee_profile/<?php echo $emp_detail->emp_id; ?>" class="breadcrumb"><?php echo $emp_detail->last_name.", ".$emp_detail->first_name ." " ,$emp_detail->mid_name;; ?> </a>
					<a href="<?php echo base_url(); ?>admin_time_keeping/time_schedule/<?php echo $emp_detail->emp_id; ?>" class="breadcrumb">Official Time Schedule</a>
					<a href="#" class="breadcrumb">Add Official Time Schedule</a>
				</div>    
			</div>
		</nav>
	</div>

	<div class="col s12 card" style="padding: 20px;">    
		<form method="post" id="form">
			<div class="row">
				<div class="col s12">
					<div align="left">
						<h5>Add Time Schedule</h5>
					</div>
				</div>
			</div>
			<input type="hidden" name="emp_id" value="<?php echo $emp_detail->emp_id; ?>">
			<div class="row">
				<div class="col s6">
					<div class="input-field">
						<select name="type">
							<option value="" disabled selected>Choose your option</option>
							<option value="<?php echo HONO_UG; ?>"><?php echo HONO_UG; ?></option>
							<option value="<?php echo HONO_GR; ?>"><?php echo HONO_GR; ?></option>
						</select>
						<label>TYPE</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="input-field">
						<input type="text" name="effective_on" id="effective_on" class="datepicker">
						<label for="effective_on">EFFECTIVE ON</label>
					</div>
				</div>

				<div class="col s6">
					<div class="input-field">
						<input type="text" name="effective_until" id="effective_until" class="datepicker">
						<label for="effective_until">EFFECTIVE UNTIL</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<p>
						<input type="checkbox" name="days[]" id="test2" value="1"/>
						<label for="test2">MONDAY</label>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="days[]" id="test3" value="2"/>
						<label for="test3">TUESDAY</label>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="days[]" id="test4" value="3"/>
						<label for="test4">WEDNESDAY</label>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="days[]" id="test5" value="4" />
						<label for="test5">THURSDAY</label>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="days[]" id="test6" value="5"/>
						<label for="test6">FRIDAY</label>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="days[]" id="test7" value="6"/>
						<label for="test7">SATURDAY</label>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="days[]" id="test1" value="0" />
						<label for="test1">SUNDAY</label>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="input-field">
						<input type="text" name="time_start" id="time_start" class="timepicker">
						<label for="time_start">TIME START</label>
					</div>
				</div>
				<div class="col s6">
					<div class="input-field">
						<input type="text" name="time_end" id="time_end" class="timepicker">
						<label for="time_end">TIME END</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<button type="submit" class="btn green" name="add" id="id_add">Save</button>
						<a href="<?php echo base_url(); ?>admin_time_keeping/time_schedule/<?php echo $emp_detail->emp_id; ?>" class="waves-effect waves-light btn orange">cancel</a>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>





<script type="text/javascript">
	
	$(document).ready(function() {
		$('select').material_select();
		$('.tooltipped').tooltip({delay: 50});

		$('.timepicker').pickatime({
		    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
		    twelvehour: true,
		    ampmclickable: true,		   
		    aftershow: function(){} //Function for after opening timepicker
		});

		$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15, // Creates a dropdown of 15 years to control year,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
		});
	});

	IO.setSubmitScript({
		form_id : "form",
		button_id : "id_add",
		data_receiver_url : base_url + "admin_time_keeping/process_time_schedule" ,
		redirect_url : base_url + "admin_time_keeping/time_schedule/<?php echo $emp_detail->emp_id; ?>"
        //,post_script : postScript
    });	

	
</script>