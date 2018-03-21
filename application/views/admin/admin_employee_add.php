<div class="container-fluid">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s12">
					<a href="<?php echo base_url(); ?>admin_employees" class="breadcrumb">Employees</a>
					<a href="#" class="breadcrumb">Add Employee Records</a>
				</div>
			</div>
		</nav>
	</div>

	
	<form method="POST" id="employee_form">
	<div class="card" style="padding: 40px;">
		<div class="row">
			<div class="col s3">
				Personal Information
			</div>
		</div>
		<div class="row">
			<div class="col s3 offset-s9">
				<div class="input-field ">
					<input id="cs_id_no" name="cs_id_no" type="text" class="validate" >
					<label for="cs_id_no">CS ID NO:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s3">
				<div class="input-field ">
					<input id="last_name" name="last_name" type="text" class="validate" >
					<label for="last_name">Surname:</label>
				</div>
			</div>
			<div class="col s3">
				<div class="input-field ">
					<input id="first" name="first_name" type="text" class="validate" >
					<label for="first_name">First Name<label>
				</div>				
			</div>
			<div class="col s3">
				<div class="input-field ">
					<input id="mid_name" name="mid_name" type="text" class="validate" >
					<label for="mid_name">Middle Name:</label>
				</div>
			</div>
			<div class="col s3">
				<div class="input-field ">
					<input id="ext_name" name="ext_name" type="text" class="validate" >
					<label for="ext_name">Name Extension (JR SR):</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="date_of_birth" name="date_of_birth" type="text" class="datepicker" >
					<label for="date_of_birth">Date of Birth: <small>(mm/dd/yyyy)</small></label>
				</div>
			</div>
			
			<div class="col s6">
				<div class="input-field ">
					<input id="place_of_birth" name="place_of_birth" type="text" class="validate" >
					<label for="place_of_birth">Place of Birth:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s6">

					<p>Sex: </p>
					<p>
						<p>
							<input class="with-gap" name="sex" type="radio" id="cb_male"  value="Male" checked="" />
							<label for="cb_male">Male</label>

							<input name="sex" type="radio" id="cb_female"  value="Female"/>
							<label for="cb_female">Female</label>
						</p>
					</p>
			</div>
			
			<div class="col s6">
				<p>Civil Status:</p>
				<p>
					<p>
						<input class="with-gap" name="civil_status" type="radio" id="single"  value="Single" checked />
						<label for="single">Single</label>

						<input name="civil_status" type="radio" id="married"  value="Married" />
						<label for="married">Married</label>
					</p>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="height" name="height" type="text" class="text">
					<label for="height">Height</label>
				</div>
			</div>
			
			<div class="col s6">
				<div class="input-field ">
					<input id="weight" name="weight" type="text" class="validate" >
					<label for="weight">Weight:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="blood_type" name="blood_type" type="text" class="text">
					<label for="blood_type">Blood Type</label>
				</div>
			</div>
			
			<div class="col s6">
				<div class="input-field ">
					<input id="gsis_id_no" name="gsis_id_no" type="text" class="validate" >
					<label for="gsis_id_no">GSIS ID No:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="pagibig_id_no" name="pagibig_id_no" type="text" class="text">
					<label for="pagibig_id_no">PAG-IBIG ID No:</label>
				</div>
			</div>
			
			<div class="col s6">
				<div class="input-field ">
					<input id="philhealth_no" name="philhealth_no" type="text" class="validate" >
					<label for="philhealth_no">PHILHEALTH:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="sss_no" name="sss_no" type="text" class="text">
					<label for="sss_no">SSS No:</label>
				</div>
			</div>
			
			<div class="col s6">
				<div class="input-field ">
					<input id="tin_no" name="tin_no" type="text" class="validate" >
					<label for="tin_no">TIN No:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="agency_employee_no" name="agency_employee_no" type="text" class="text">
					<label for="agency_employee_no">Agency Employee No:</label>
				</div>
			</div>
		</div>
	</div>
		
	<div class="card" style="padding: 40px;">
		<div class="row">
			<div class="col s2">Citizenship:</div>
			<div class="col s4">
				<p>
					<input name="citizenship" type="radio" id="cb_fil" onchange="citizenship_checker();"  value="<?php echo PH; ?>"  checked/>
					<label for="cb_fil">Filipino</label>
					&nbsp;&nbsp;
					<input name="citizenship" type="radio" id="cb_dual" onchange="citizenship_checker();" value="<?php echo DUAL; ?>"  />
					<label for="cb_dual">Dual Citizenship</label>
				</p>
				<p>
					<p>
						<input class="with-gap" name="citizenship_type" type="radio" id="cb_birth" disabled="" value="<?php echo BIRTH; ?>"  />
						<label for="cb_birth">By Birth</label>
					
						<input name="citizenship_type" type="radio" id="cb_natural" disabled="" value="<?php echo NATURALIZATION; ?>"/>
						<label for="cb_natural">Naturalization</label>
					</p>
				</p>
			</div>
			<div class="col s4">
				<div class="input-field">
					<select id="country" name="country"  disabled>
					</select>
				</div>
			</div>
		</div>
	</div>


	<div class="card" style="padding: 40px;">
		<div class="row">
			<div class="col s3">
				Residential Address:
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="number" name="number_a" type="text" class="text">
					<label for="number">House/block/Lot No.</label>
				</div>
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="street" name="street_a" type="text" class="text">
					<label for="street">Street</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s3"></div>
			<div class="col s4">
				<div class="input-field">
					<input id="sub_vill" name="sub_vill_a" type="text" class="text">
					<label for="sub_vill">Subdivision/Village</label>
				</div>
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="barangay" name="barangay_a" type="text" class="text">
					<label for="barangay">Barangay</label>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col s3"></div>
			<div class="col s4">
				<div class="input-field">
					<input id="municity" name="municity_a" type="text" class="text">
					<label for="municity">City/Municipality</label>
				</div>
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="province" name="province_a" type="text" class="text">
					<label for="province">Province</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s4 offset-s3">
				<div class="input-field">
					<input id="zip_code" name="zip_code_a" type="text" class="text">
					<label for="zip_code">Zip Code</label>
				</div>
			</div>
		</div>
	</div>
	

	<div class="card" style="padding: 40px;">
		<div class="row">
			<div class="col s3">
				Permanent Address:
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="number" name="number_b" type="text" class="text">
					<label for="number">House/block/Lot No.</label>
				</div>
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="street" name="street_b" type="text" class="text">
					<label for="street">Street</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s3"></div>
			<div class="col s4">
				<div class="input-field">
					<input id="sub_vill" name="sub_vill_b" type="text" class="text">
					<label for="sub_vill">Subdivision/Village</label>
				</div>
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="barangay" name="barangay_b" type="text" class="text">
					<label for="barangay">Barangay</label>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col s3"></div>
			<div class="col s4">
				<div class="input-field">
					<input id="municity" name="municity_b" type="text" class="text">
					<label for="municity">City/Municipality</label>
				</div>
			</div>
			<div class="col s4">
				<div class="input-field">
					<input id="province" name="province_b" type="text" class="text">
					<label for="province">Province</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s4 offset-s3">
				<div class="input-field">
					<input id="zip_code" name="zip_code_b" type="text" class="text">
					<label for="zip_code">Zip Code</label>
				</div>
			</div>
		</div>
	</div>
	<div class="card" style="padding: 40px;">
		<div class="row">
			<div class="col s3">
				Contact:
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="telephone_no" name="telephone_no" type="text" class="text">
					<label for="telephone_no">Telephone No:</label>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field">
					<input id="mobile_no" name="mobile_no" type="text" class="text">
					<label for="mobile_no">Mobile No:</label>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col s6">
				<div class="input-field">
					<input id="email_address" name="email_address" type="text" class="email" >
					<label for="email_address">Email Address:</label>
				</div>
			</div>
		</div>	
	</div>

	<div class="card" style="padding-top: 8px;">
		<div class="col s12">
			<button type="submit" id="save" class="btn waves-effect waves-light green">	
				Save
			</button>
			<a href="<?php echo base_url(); ?>admin_employees" type="button" class="btn waves-effect waves-light orange">				
				Cancel
			</a>
		</div>
	</div>
	</form>
</div>


<script type="text/javascript">

	$(document).ready(function(){
		populateCountries("country");
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

	$('#employee_form').on("submit",function(e){
		
		e.preventDefault();		
		button_loader("save",1);

		$.post(
			base_url + "admin_employees/process_employee/",
			{
				data: get_form_data("employee_form")
			},
			function(data){								
				button_loader("save",0);
				notify( data, base_url + "/Admin_employees" );				
			}
		);

	});


	function citizenship_checker()
	{
		
		if($('#cb_fil').is(':checked'))
		{
			$('#cb_birth').removeAttr("disabled");
			$('#cb_natural').removeAttr("disabled");
			$('#country').attr("disabled",true);
			$('.select-dropdown').attr("disabled",true);
			
		}

		if(!$('#cb_fil').is(':checked'))
		{
			$('#cb_birth').attr("disabled",true);
			$('#cb_natural').attr("disabled",true);
			$('#country').removeAttr("disabled",true);
			$('.select-dropdown').removeAttr("disabled",true);
			$('#cb_birth').prop("checked",false);
			$('#cb_natural').prop("checked",false);
		}

		$('select').material_select();


	}

</script>
