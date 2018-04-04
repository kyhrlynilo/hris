<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper grey">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>Employee_leave" class="breadcrumb">Leave</a>
					<a href="<?php echo base_url(); ?>Employee_leave/request_leave" class="breadcrumb">Request Leave</a>
				</div>			
			</div>
		</nav>
	</div>

	<form method="post" id="employee_leave_request_form">

		<input type="hidden" name="hdn_email_address" id="hdn_email_address" value="marlontaguicana@gmail.com">
		<div class="col s12 card pad-lg">
			<div class="row">
				<div class="col s4" >
					<label for="leave_type">Type</label>
					<select id="leave_type" name="leave_type">
						<option value="<?php echo SL; ?>"><?php echo SL; ?></option>
						<option value="<?php echo VL; ?>"><?php echo VL; ?></option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<textarea id="reason" name="reason" class="materialize-textarea"></textarea>
					<label for="reason">Reason</label>
				</div>
			</div>


			<div class="row">
				<div class="col s4" >
					<div class="input-field ">
						<input id="date_from" name="date_from" type="text" class="datepicker" >
						<label for="date_from">Start Date: <small>(mm/dd/yyyy)</small></label>
						<span class="text-danger"><?php echo form_error("date_from");?></span>
					</div>
				</div>
				<div class="col s4" >
					<div class="input-field ">
						<input id="date_to" name="date_to" type="text" class="datepicker" >
						<label for="date_to">End Date: <small>(mm/dd/yyyy)</small></label>
						<span class="text-danger"><?php echo form_error("date_to");?></span>
					</div>
				</div>
				<div class="col s4" >
					<div class="input-field ">
						<input id="leave_hr_day" name="leave_hr_day" type="text" class="validate" >
						<label for="leave_hr_day">Leave Hours (per Day)</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col s12">
					<center>
						<button type="submit" id="id_send" name="id_send" class="btn waves-effect waves-light green"> 
							Send Request
						</button>
						<a href="<?php echo base_url(); ?>Employee_leave" type="button" class="btn waves-effect waves-light orange">    
							Cancel
						</a>
					</center>
				</div>
			</div>

		</div>
	</div> 
	
</form>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('select').material_select();
		$('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });

		$('.timepicker').pickatime({
        default: 'now', // Set default time: 'now', '1:30AM', '16:30'
        fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
        twelvehour: false, // Use AM/PM or 24-hour format
        donetext: 'OK', // text for done-button
        cleartext: 'Clear', // text for clear-button
        canceltext: 'Cancel', // Text for cancel-button
        autoclose: false, // automatic close timepicker
        ampmclickable: true, // make AM PM clickable
        aftershow: function(){} //Function for after opening timepicker
    });
	});

/*	IO.setSubmitScript({
		form_id : "employee_leave_request_form",
		button_id : "id_send",
		data_receiver_url : base_url + "Employee_leave/process_leave" ,
		redirect_url : base_url + "employee_leave"
    });	*/


	$('#employee_leave_request_form').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var baseurl = "Employee_leave/process_leave"
		$.ajax({
			url: "<?php echo base_url() ?>" +baseurl,
			type: 'POST',
			data: data,
			success: function(data){
				if($.isEmptyObject(data)){
					swal("Success!", "Employee has been added!", "success").then(
						function(){
							$('#employee_leave_request_form')[0].reset();
							window.location ="<?php echo base_url() ?>/Employee_leave";
						})
					
				}else{
					var text = $(data).text();
					swal("Error!",text, "error")
				}  
			},
			error: function(){
				alert('error');
			}
		});
	});



</script>
