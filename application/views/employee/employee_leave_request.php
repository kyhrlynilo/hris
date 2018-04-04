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

	<div class="col s12 card pad-lg">
		<div class="container">
			<div class="row" style="text-align: center;">
				<h4>REQUEST FOR COMPENSATORY TIME-OFF</h4>
			</div>
<form method="post" id="admin_time_keeping_form" action="<?php echo base_url()?>Admin_time_keeping/form_validation">

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
				<div class="col s3">
					<label for="emp_status">Employment Status</label>
					<select id="emp_status" name="emp_status">
						<option value="<?php echo ES_R; ?>"><?php echo ES_R; ?></option>
						<option value="<?php echo ES_C; ?>"><?php echo ES_C; ?></option>
						<option value="<?php echo ES_PT; ?>"><?php echo ES_PT; ?></option>
						<option value="<?php echo ES_JO; ?>"><?php echo ES_JO; ?></option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col s12"  >
					<div class="input-field ">
						<input id="cs_id_no" name="cs_id_no" type="text" class="validate" >
						<label for="cs_id_no">Reason</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s4" >
					<div class="input-field ">
						<input id="birth_date" name="birth_date" type="text" class="datepicker" >
						<label for="birth_date">Start Date: <small>(mm/dd/yyyy)</small></label>
						<span class="text-danger"><?php echo form_error("date_from");?></span>
					</div>
				</div>
				<div class="col s4" >
					<div class="input-field ">
						<input id="birth_date" name="birth_date" type="text" class="datepicker" >
						<label for="birth_date">End Date: <small>(mm/dd/yyyy)</small></label>
						<span class="text-danger"><?php echo form_error("date_to");?></span>
					</div>
				</div>
				<div class="col s4" >
					<div class="input-field ">
						<input id="cs_id_no" name="cs_id_no" type="text" class="validate" >
						<label for="cs_id_no">Leave Hours (per Day)</label>
					</div>
				</div>
			</div>
			


<div class="row" style="margin-top: 50px;border: 1px solid black; padding: 10px;">
		<div class="col s12 center">
			<button class="btn blue">SUBMIT</button>
			<button type="clear" class="btn orange">CLEAR</button>
		</div>
	</div>

</form>			
		</div>
	</div>

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

  function citizenship_checker()
  {
    if($('#cb_fil').is(':checked'))
    { 
      $('.typetoggle').hide();
      $("#country").val("");
      $('#cb_birth').removeAttr("disabled");
      $('#cb_natural').removeAttr("disabled");
      $('.select-dropdown').attr("disabled",true);  
      $('#cb_birth').prop("checked",true);
    }

    if(!$('#cb_fil').is(':checked'))
    {  
      $('.typetoggle').show();
      $('#cb_birth').attr("disabled",true);
      $('#cb_natural').attr("disabled",true);
      $('.select-dropdown').removeAttr("disabled",true);
      $('#cb_birth').prop("checked",false);
      $('#cb_natural').prop("checked",false);

    }

    $('select').material_select();
  }

  $(document).ready(function(){  
    $('#email_address').change(function(){  
     var email_address = $('#email_address').val();  

     if(email_address != '')  
     {
       $('#email_result').show();
       $.ajax({  
         url:"<?php echo base_url(); ?>Admin_time_keeping/check_email_avalibility",  
         method:"POST",  
         data:{email_address:email_address},  
         success:function(data){  
          $('#email_result').html(data);  
        }  
      });  
     } 
     else{
      $('#email_result').hide();
    } 
  });  
  });  

</script>
