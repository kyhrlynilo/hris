<style type="text/css">
p{
	font-size: 14px;
	color:#000000;
}

</style>

<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>Admin_leave" class="breadcrumb">Leave Request</a>
					<a href="#" class="breadcrumb">Employee Leave Request</a>
				</div>		
			</div>
		</nav>
	</div>
	
	<div class="col s12 card pad-lg" style="margin-bottom: 0;">
		<form method="post"  id="admin_leave_request_form">
			<?php 
			$details = array();
			foreach ($user_data as $row) {
				$details = $row;
			}
			?>
			<input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $details->id;?>" >
			<br/>

			<div class="row">
					<div class="col s3">
						<label><p>1. AGENCY<p></label>
						<label><p><b><?php echo $details->agency ;?></b></p></label>
					</div>

					<div class="col s3">
						<label><p>1.1 DEPARTMENT/OFFICE</p></label>
						<label><p><b><?php echo $details->dept_office ;?></b></p></label>
					</div>

					<div class="col s6">
						<label for="full_name"><p>2. NAME (Surname, Given Name, M.I.)<p></label>
							<label><p><b><?php echo $details->full_name ;?></b></p></label>
					</div>

			</div>

					<div class="row">

						<div class="col s3">
							<label><p>3. DATE OF FILING</p></label>
							<label><p><b><?php echo $details->date_filed ;?></b></p></label>
						</div>

						<div class="col s3">
							<label><p>4. POSITION</p></label>
							<label><p><b><?php echo $details->position ;?></b></p></label>
						</div>

						<div class="col s4">
							<label><p>4.1 STATUS OF APPOINTMENT</p></label>
							<label><p><b><?php echo $details->stat_of_appt ;?></b></p></label>
						</div>

						<div class="col s2">
							<label><p>5. SALARY</p></label>
							<label><p><b><?php echo $details->salary ;?></b></p></label>
						</div>

					</div>

					<div class="row">

						<div class="col s6">
							<p>6. DETAILS OF APPLICATION <br/>
								6.a). TYPE OF LEAVE
							</p>
							<div class="col s12">
								<p>
									<input name="leave_type" type="checkbox" <?php echo $details->leave_type ==  VL ?  "checked" : ""; ?> />
									<label><?php echo VL;?></label>
								</p>
							</div>
							<div class="col s12">
								<p>
									<input name="leave_type" type="checkbox"  <?php echo $details->leave_type == TSE ?  "checked" : ""; ?>  />
									<label><?php echo TSE;?></label>
								</p>
							</div>

							<div class="col s5">
								<p>
									<input name="leave_type" type="checkbox" <?php echo $details->leave_type == OTH ?  "checked" : ""; ?> />
									<label><?php echo OTH;?>&nbsp;(Specify)</label>
								</p>
							</div>
							<div class="col s7">
								<div style="margin-top:-18px;">
									<label for="reason">&nbsp;</label>
									<label id="reason" name="reason"><p><b>&nbsp;
										<?php 
										if($details->leave_type === OTH){
											echo $details->reason ;
										}
										?></b></p></label>
								</div>
							</div>

								<div class="col s5">
									<p>
										<input name="leave_type" type="checkbox"<?php echo $details->leave_type ==  PL ?  "checked" : ""; ?> />
										<label><?php echo PL;?>&nbsp; (Specify)</label>
									</p>
								</div>
								<div class="col s7">
									<div style="margin-top:-18px;">
										<label for="reason">&nbsp;</label>
										<label id="reason" name="reason"><p><b>&nbsp;
											<?php 
											if($details->leave_type === PL){
												echo $details->reason;
											}
											;?>
										</b></p></label>
									</div>
								</div>

								<div class="col s5">
									<p>
										<input name="leave_type" type="checkbox" <?php echo $details->leave_type == SL ?  "checked" : ""; ?> />
										<label><?php echo SL;?>&nbsp;(Cause)</label>
									</p>
								</div>
								<div class="col s7">
									<div style="margin-top:-19px;">
										<label for="reason">&nbsp;</label>
										<label id="reason" name="reason"><p><b>&nbsp;
											<?php 
											if($details->leave_type === SL){
												echo $details->reason;
											}
											;?>
										</b></p></label>
									</div>
								</div>

								<div class="col s12">
									<p>
										<input name="leave_type" type="checkbox" <?php echo $details->leave_type == MPL ?  "checked" : ""; ?> />
										<label><?php echo MPL;?></label>
									</p>
								</div>
							</div>

							<div class="col s6">
								<div class="row">

									<p>6.b). WHERE LEAVE WILL BE SPENT</p>

									<p>(1) IN CASE OF VACATION LEAVE</p>
									<div class="col s12">
										<p>
											<input type="checkbox" <?php echo $details->place_leave_spent == LS_WP ?  "checked" : ""; ?> />
											<label for="pls_1"><?php echo LS_WP;?></label>
										</p>
									</div>
									<div class="col s4">
										<p>
											<input type="checkbox" <?php echo $details->place_leave_spent == LS_AB ?  "checked" : ""; ?> />
											<label for="pls_2"><?php echo LS_AB;?></label>
										</p>
									</div>
									<div class="col s8">
										<div style="margin-top:-18px;">
											<label for="specific_place">&nbsp</label>
											<label id="specific_place" name="specific_place"><p><b>&nbsp;
												<?php 
												if($details->place_leave_spent === LS_AB){
													echo $details->specific_place ;
												}
												?></b></p>
											</label>
										</div>
									</div>
									<p>(2) IN CASE OF SICK LEAVE</p>

									<div class="col s4">
										<p>
											<input type="checkbox" <?php echo $details->place_leave_spent == LS_IH ?  "checked" : ""; ?> />
											<label for="pls_3"><?php echo LS_IH;?></label>
										</p>
									</div>
									<div class="col s8">
										<div style="margin-top:-18px;">
											<label for="specific_place">&nbsp</label>
											<label id="specific_place" name="specific_place"><p><b>&nbsp;
												<?php 
												if($details->place_leave_spent === LS_IH){
													echo $details->specific_place ;
												}
												?></b></p>
											</label>
										</div>
									</div>

									<div class="col s4">
										<p>
											<input type="checkbox" <?php echo $details->place_leave_spent == LS_OP ?  "checked" : ""; ?> />
											<label for="pls_4"><?php echo LS_OP;?></label>
										</p>
									</div>
									<div class="col s8">
										<div style="margin-top:-18px;">
											<label for="specific_place">&nbsp</label>
											<label id="specific_place" name="specific_place"><p><b>&nbsp;
												<?php 
												if($details->place_leave_spent === LS_OP){
													echo $details->specific_place ;
												}
												?></b></p>
											</label>
										</div>
									</div>

								</div>
							</div>


						</div>

						<div class="row">

							<div class="col s6">

								<div class="row">
									<div class="col s6"  >
										<label><p>6.c). NUMBER OF DAYS APPLIED FOR</p></label>
										<label><p><b><?php echo $details->total_days;?>&nbsp; days</b></p></label>
									</div>
								</div>

								<div class="row">
									<p>INCLUSIVE DATES</p>
									<div class="col s6">
										<label name="date_from" id="date_from"><p>FROM:&nbsp;<b><?php echo $details->date_from;?></b></p></label>
									</div>

									<div class="col s6">
										<label name="date_to" id="date_to"><p>TO:&nbsp;<b><?php echo $details->date_to;?></b></p></label>
									</div>

								</div>
							</div>

							<div class="col s6">
								<div class="row">			
									<p>6.d). COMMUTATION</p>
									<div class="col s6">
										<p>
											<input type="checkbox" <?php echo $details->commutation == "Requested" ? "Checked" : "";?>  />
											<label for="cmt_1">Requested</label>
										</p>
									</div>
									<div class="col s6">
										<p>
											<input type="checkbox" <?php echo $details->commutation == "Not Requested" ? "checked" : "";?> />
											<label for="cmt_2">Not Requested</label>
										</p>
									</div>
									<!-- </div> -->
								</div>
							</div>

						</div>

						<div class="row">
							<div class="input-field col s6">
								<img class="materialboxed" src="<?php echo base_url().'uploads/'.$details->image_file;?>" style="height: 30%; width: 30%;" alt="Leave Request Form Image">
							</div>

							<div class=" col s6">

								<div class="row">
									<div class=" col s6">
										<input name="status" type="radio" id="rb_approve" value="Approved" />
										<label for="rb_approve">Approve</label>
										&nbsp;&nbsp;
										<input name="status" type="radio" id="rb_disapprove" value="Disapproved"  checked />
										<label for="rb_disapprove">Disapprove</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12">
										<textarea id="dsapr_reason" name="dsapr_reason" class="materialize-textarea"></textarea>
										<label for="dsapr_reason">DISAPPROVED DUE TO:</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col s12" style="text-align: center;">
								<button type="submit" id="id_send" name="id_send" class="btn waves-effect waves-light green"> 
									Submit
								</button>

								<a href="<?php echo base_url(); ?>Admin_leave" type="button" class="btn waves-effect waves-light orange">   
									Cancel
								</a>
								<!-- <a href="<?php echo base_url(); ?>Admin_leave/approve_leave_request/<?php echo $details->id; ?>" class="btn green darken-2">Submit</a>

									<a href="<?php echo base_url(); ?>Admin_leave/disapprove_leave_request/<?php echo $details->id; ?>" class="btn orange darken-2 modal-trigger" >Cancel</a> -->
							</div>
						</div>

						</form>
			</div>


	</div>
	<div class="card pad-lg" >
		<?php 
		$vlp_details = array();
		foreach ($user_vlp_data as $row) {
			$vlp_details = $row;		
		}

		$slp_details = array();
		foreach ($user_slp_data as $row) {
			$slp_details = $row;		
		}
		?>
		<div class="row">
			<div class="col s6">
				<p>Vacation Leave Points Balance &nbsp;&nbsp;&nbsp;<b><?php echo isset($vlp_details->balance) ? $vlp_details->balance : 0; ?></b></p>
			</div>

			<div class="col s6">
				<p>Sick Leave Points Balance &nbsp;&nbsp;&nbsp;<b><?php echo isset($slp_details->balance) ? $slp_details->balance : 0; ?></b></p>
			</div>
			<div class="col s6">
				<p>Privilege Leave Points Balance &nbsp;&nbsp;&nbsp;<b><!-- <?php echo isset($vlp_details->balance) ? $vlp_details->balance : 0; ?> -->5</b></p>
			</div>
			<div class="col s6">
				<p>Maternity/Paternity Points Balance &nbsp;&nbsp;&nbsp;<b><!-- <?php echo isset($slp_details->balance) ? $slp_details->balance : 0; ?> -->0</b></p>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready( function() {
			$('select').material_select();
		});
	$('#admin_leave_request_form').on('submit', function(e){
			e.preventDefault();
			var data = $(this).serialize();
			var baseurl = "Admin_leave/approve_leave_request"
			$.ajax({
				url: "<?php echo base_url() ?>" +baseurl,
				type: 'POST',
				data: data,
				success: function(data){
					if($.isEmptyObject(data)){
						swal("Success!", "Employee has been added!", "success").then(
							function(){
								$('#admin_leave_request_form')[0].reset();
								window.location ="<?php echo base_url() ?>/Admin_leave";
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
	
