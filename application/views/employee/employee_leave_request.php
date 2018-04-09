<div class="fixed-action-btn">
	<a id="add" class="btn-floating btn-large waves-effect grey" href="<?php echo base_url(); ?>Employee_leave/request_leave">
		<i class="material-icons white-text ">add</i>
	</a>				
</div>



<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper grey">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>Employee_leave" class="breadcrumb">Leave</a>
				</div>		
			</div>
		</nav>
	</div>

	<div class="col s12 card pad-lg">
<!-- enctype="multipart/form-data" -->
		<form id="employee_leave_request_form" method="post" >
			<div class="row">

				<div class="col s3">
					<div class="input-field">
						<label for="agency">1. AGENCY</label>
						<input id="agency" name="agency" type="text" class="validate">
					</div>
				</div>

				<div class="col s3">
					<div class="input-field">
						<label for="dept_office">1.1 DEPARTMENT/OFFICE</label>
						<input id="dept_office" name="dept_office" type="text" class="validate">
					</div>
				</div>

				<div class="col s6">
					<div class="input-field">
						<label for="full_name">2. NAME (Surname, Given Name, M.I.)</label>
						<input id="full_name" name="full_name" type="text" class="validate">
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col s3">
					<div class="input-field">
						<label for="date_filed">3. DATE OF FILING</label>
						<input id="date_filed" name="date_filed" type="text" class="datepicker">
					</div>
				</div>

				<div class="col s3">
					<div class="input-field">
						<label for="position">4. POSITION</label>
						<input id="position" name="position" type="text" class="validate">
					</div>
				</div>

				<div class="col s4">
					<div class="input-field">
						<label for="stat_of_appt">4.1 STATUS OF APPOINTMENT</label>
						<input id="stat_of_appt" name="stat_of_appt" type="text" class="validate">
					</div>
				</div>

				<div class="col s2">
					<div class="input-field">
						<label for="salary">5. SALARY</label>
						<input id="salary" name="salary" type="text" class="validate">
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col s6">
					<p>6. DETAILS OF APPLICATION <br/>
						6.a). TYPE OF LEAVE
					</p>
					<div class="col s12">
						<p>
							<input type="radio" name="leave_type" id="lt_1" value="<?php echo VL;?>" onchange="show_reason_input();" />
							<label for="lt_1"><?php echo VL;?></label>
						</p>
					</div>
					<div class="col s12">
						<p>
							<input type="radio" name="leave_type" id="lt_2" value="<?php echo TSE;?>" onchange="show_reason_input();" />
							<label for="lt_2"><?php echo TSE;?></label>
						</p>
					</div>
					<div class="col s4">
						<p>
							<input type="radio" name="leave_type" id="lt_3" value="<?php echo OTH;?>" onchange="show_reason_input();" />
							<label for="lt_3"><?php echo OTH;?></label>
						</p>
					</div>
					<div class="col s8">
						<div class="input-field" style="margin-top:-5px;">
							<label for="reason">Specify</label>
							<input id="reason[0]" name="reason" type="text" class="validate" disabled>
						</div>
					</div>
					<div class="col s4">
						<p>
							<input type="radio" name="leave_type" id="lt_4" value="<?php echo PL;?>" onchange="show_reason_input();" />
							<label for="lt_4"><?php echo PL;?></label>
						</p>
					</div>
					<div class="col s8">
						<div class="input-field" style="margin-top:-5px;">
							<label for="reason">Specify</label>
							<input id="reason[1]" name="reason" type="text" class="validate" disabled>
						</div>
					</div>

					<div class="col s4">
						<p>
							<input type="radio" name="leave_type" id="lt_5" value="<?php echo SL;?>" onchange="show_reason_input();" />
							<label for="lt_5"><?php echo SL;?></label>
						</p>
					</div>
					<div class="col s8">
						<div class="input-field" style="margin-top:-5px;">
							<label for="reason">Cause</label>
							<input id="reason[2]" name="reason" type="text" class="validate" disabled>
						</div>
					</div>

					<div class="col s12">
						<p>
							<input type="radio" name="leave_type" id="lt_6" value="<?php echo MPL;?>" onchange="show_reason_input();" />
							<label for="lt_6"><?php echo MPL;?></label>
						</p>
					</div>
				</div>
				<!-- start of 2nd column -->
				<div class="col s6">
					<div class="row">

						<p>6.b). WHERE LEAVE WILL BE SPENT</p>

						<p>(1) IN CASE OF VACATION LEAVE</p>
						<div class="col s12">
							<p>
								<input type="radio" name="place_leave_spent" id="pls_1" value="<?php echo LS_WP;?>" onchange="show_specific_place_input();" disabled />
								<label for="pls_1"><?php echo LS_WP;?></label>
							</p>
						</div>
						<div class="col s4">
							<p>
								<input type="radio" name="place_leave_spent" id="pls_2" value="<?php echo LS_AB;?>" onchange="show_specific_place_input();" disabled />
								<label for="pls_2"><?php echo LS_AB;?></label>
							</p>
						</div>
						<div class="col s8">
							<div class="input-field" style="margin-top:-5px;">
								<label for="specific_place[0]">Specify</label>
								<input id="specific_place[0]" name="specific_place" type="text" class="validate" disabled>
							</div>
						</div>
						<p>(2) IN CASE OF SICK LEAVE</p>

						<div class="col s4">
							<p>
								<input type="radio" name="place_leave_spent" id="pls_3" value="<?php echo LS_IH;?>" onchange="show_specific_place_input();" disabled />
								<label for="pls_3"><?php echo LS_IH;?></label>
							</p>
						</div>
						<div class="col s8">
							<div class="input-field" style="margin-top:-5px;">
								<label for="specific_place[1]">Specify</label>
								<input id="specific_place[1]" name="specific_place" type="text" class="validate" disabled>
							</div>
						</div>
						
						<div class="col s4">
							<p>
								<input type="radio" name="place_leave_spent" id="pls_4" value="<?php echo LS_OP;?>" onchange="show_specific_place_input();" disabled="" />
								<label for="pls_4"><?php echo LS_OP;?></label>
							</p>
						</div>
						<div class="col s8">
							<div class="input-field" style="margin-top:-5px;">
								<label for="specific_place[2]">Specify</label>
								<input id="specific_place[2]" name="specific_place" type="text" class="validate" disabled>
							</div>
						</div>

					</div>
				</div>
				<!-- end of 2nd column -->

			</div>

			<div class="row">

				<div class="col s6">

					<div class="input-field">
						<label for="total_days">6.c). NUMBER OF DAYS APPLIED FOR</label>
						<input id="total_days" name="total_days" type="text" class="validate">
					</div>

					<div class="row">

						<div class="col s6">
							<div class="input-field ">
								<input id="date_from" name="date_from" type="text" class="datepicker" >
								<label for="date_from">Start Date: <small>(mm/dd/yyyy)</small></label>
								<span class="text-danger"><?php echo form_error("date_from");?></span>
							</div>
						</div>

						<div class="col s6">
							<div class="input-field ">
								<input id="date_to" name="date_to" type="text" class="datepicker" >
								<label for="date_to">End Date: <small>(mm/dd/yyyy)</small></label>
								<span class="text-danger"><?php echo form_error("date_to");?></span>
							</div>
						</div>

					</div>
				</div>

				<div class="col s6">
					<div class="row">			
							<p>6.d). COMMUTATION</p>
							<div class="col s6">
								<p>
									<input type="radio" name="commutation" id="cmt_1" value="Requested" />
									<label for="cmt_1">Requested</label>
								</p>
							</div>
							<div class="col s6">
								<p>
									<input type="radio" name="commutation" id="cmt_2" value="Not Requested" checked />
									<label for="cmt_2">Not Requested</label>
								</p>
							</div>
						<!-- </div> -->
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col s6">
					<div class="file-field input-field">
						<div class="btn">
							<span>File</span>
							<input type="file" name="image_file" id="image_file" />
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload file">
						</div>
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

		</form>
	</div>
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
        aftershow: function(){} //Function for after opening timepicker							<div class="col s6">

    });
	});


	$('#employee_leave_request_form').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();

		var extension = $('#image_file').val().split('.').pop().toLowerCase();
		if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
			swal("Error!","Invalid image file", "error")
			$('#image_file').val('');
			return false;
		}

			var baseurl = "Employee_leave/process_leave"
			$.ajax({
				url: "<?php echo base_url() ?>" +baseurl,
				type: 'POST',
				data: new FormData(this),
				contentType:false,
				processData:false,
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

	function show_reason_input(){
		if($('#lt_2').is(':checked')){
			clear_leave_type_input();
			clear_leave_spent_radio_input();
		}else if($('#lt_3').is(':checked')){
			document.getElementById("reason[1]").value = "";
			document.getElementById("reason[2]").value = "";
			document.getElementById("reason[0]").disabled = false;
			document.getElementById("reason[1]").disabled = true;
			document.getElementById("reason[2]").disabled = true;
			clear_leave_spent_radio_input();
		}else if ($('#lt_4').is(':checked')){
			document.getElementById("reason[0]").value = "";
			document.getElementById("reason[2]").value = "";
			document.getElementById("reason[0]").disabled = true;
			document.getElementById("reason[1]").disabled = false;
			document.getElementById("reason[2]").disabled = true;
			clear_leave_spent_radio_input();
			clear_radio_input();
		}else if ($('#lt_6').is(':checked')){
			/*document.getElementById("reason[0]").value = "";
			document.getElementById("reason[1]").value = "";
			document.getElementById("reason[0]").disabled = true;
			document.getElementById("reason[1]").disabled = true;
			document.getElementById("reason[2]").disabled = false;*/
			clear_leave_type_input();
			clear_leave_spent_radio_input();
			clear_radio_input();
		}else{
			clear_leave_type_input();
			if($('#lt_1').is(':checked')){
				$('#pls_1').attr("disabled",false);
				$('#pls_2').attr("disabled",false);
				$('#pls_3').attr("disabled",true);
				$('#pls_4').attr("disabled",true);
				$('#pls_3').prop("checked",false);
				$('#pls_4').prop("checked",false);
				$('#pls_1').prop("checked",true);
				clear_leave_spent_input();
			}else if($('#lt_5').is(':checked')){
				document.getElementById("reason[0]").value = "";
				document.getElementById("reason[1]").value = "";
				document.getElementById("reason[0]").disabled = true;
				document.getElementById("reason[1]").disabled = true;
				document.getElementById("reason[2]").disabled = false;
				$('#pls_1').attr("disabled",true);
				$('#pls_2').attr("disabled",true);
				$('#pls_3').attr("disabled",false);
				$('#pls_4').attr("disabled",false);
				$('#pls_1').prop("checked",false);
				$('#pls_2').prop("checked",false);
				$('#pls_3').prop("checked",true);
				clear_leave_spent_input();
				document.getElementById("specific_place[1]").disabled = false;
			}
		}
	}

	function show_specific_place_input(){
		if($('#pls_2').is(':checked')){
			document.getElementById("specific_place[1]").value = "";
			document.getElementById("specific_place[2]").value = "";
			document.getElementById("specific_place[0]").disabled = false;
			document.getElementById("specific_place[1]").disabled = true;
			document.getElementById("specific_place[2]").disabled = true;
		}else if ($('#pls_3').is(':checked')){
			document.getElementById("specific_place[0]").value = "";
			document.getElementById("specific_place[2]").value = "";
			document.getElementById("specific_place[0]").disabled = true;
			document.getElementById("specific_place[1]").disabled = false;
			document.getElementById("specific_place[2]").disabled = true;
		}else if ($('#pls_4').is(':checked')){
			document.getElementById("specific_place[0]").value = "";
			document.getElementById("specific_place[1]").value = "";
			document.getElementById("specific_place[0]").disabled = true;
			document.getElementById("specific_place[1]").disabled = true;
			document.getElementById("specific_place[2]").disabled = false;
		}else{
			clear_leave_spent_input();
		}
	}

	function clear_leave_spent_radio_input(){
		$('#pls_1').attr("disabled",true);
		$('#pls_1').prop("checked",false);
		$('#pls_2').attr("disabled",true);
		$('#pls_2').prop("checked",false);
		$('#pls_3').attr("disabled",true);
		$('#pls_3').prop("checked",false);
		$('#pls_4').attr("disabled",true);
		$('#pls_4').prop("checked",false);
		clear_leave_spent_input();
	}

	function clear_leave_spent_input(){
		document.getElementById("specific_place[0]").value="";
		document.getElementById("specific_place[1]").value="";
		document.getElementById("specific_place[2]").value="";
		document.getElementById("specific_place[0]").disabled = true;
		document.getElementById("specific_place[1]").disabled = true;
		document.getElementById("specific_place[2]").disabled = true;
	}

	function clear_leave_type_input(){
		document.getElementById("reason[0]").value = "";
		document.getElementById("reason[1]").value = "";
		document.getElementById("reason[2]").value = "";
		document.getElementById("reason[0]").disabled = true;
		document.getElementById("reason[1]").disabled = true;
		document.getElementById("reason[2]").disabled = true;
	}

</script>