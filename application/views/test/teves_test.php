<div class="card">
	<form method="post" id="form">
		<div class="row">
			<div class="col s12">
				<div align="center">
					<h5>Title</h5>
				</div>
			</div>
		</div>
		<input type="hidden" name="emp_id" value="123">
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
			<div class="col s6">
				<p>
					<input type="checkbox" name="days[]" id="test1" value="0" />
					<label for="test1">SUNDAY</label>
				</p>
				<p>
					<input type="checkbox" name="days[]" id="test2" value="1"/>
					<label for="test2">MONDAY</label>
				</p>
				<p>
					<input type="checkbox" name="days[]" id="test3" value="2"/>
					<label for="test3">TUESDAY</label>
				</p>
				<p>
					<input type="checkbox" name="days[]" id="test4" value="3"/>
					<label for="test4">WEDNESDAY</label>
				</p>
			</div>
			<div  class="col s6">	
				<p>
					<input type="checkbox" name="days[]" id="test5" value="4" />
					<label for="test5">THURSDAY</label>
				</p>
				<p>
					<input type="checkbox" name="days[]" id="test6" value="5"/>
					<label for="test6">FRIDAY</label>
				</p>
				<p>
					<input type="checkbox" name="days[]" id="test7" value="6"/>
					<label for="test7">SATURDAY</label>
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
					<input type="submit" class="btn" name="add" id="id_add">
					<a href="<?php echo base_url(); ?>teves_test/" class="waves-effect waves-light btn">View</a>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('select').material_select();
		$('.tooltipped').tooltip({delay: 50});

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
		data_receiver_url : base_url + "teves_test/insert" ,
		redirect_url : base_url + "teves_test"
        //,post_script : postScript
    });	

	
</script>