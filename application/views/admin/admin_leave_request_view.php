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

	<div class="col s12 card pad-lg">
		
			<?php 
			$details = array();
			foreach ($user_data as $row) {
				$details = $row;
			}
			?>
			<input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $details->id;?>" >

			<br/>

			<div class="row">
				<div class="col s2">
					<label><p>Name: </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->last_name.", ".$details->first_name." ".$details->mid_name ;?></b></p></label>
				</div>

				<div class="col s2">
					<label><p>Department: </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->department ;?></b></p></label>
				</div>
			</div>

			<div class="row">
				<div class="col s2">
					<label><p>Type: </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->leave_type;?></b></p></label>
				</div>
			</div>

			<div class="row">
				<div class="col s2">
					<label><p>Reason: </p></label>
				</div>
				<div class="col s10">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->reason;?></b></p></label>
				</div>
			</div>

			<div class="row">
				<div class="col s2">
					<label><p>Start Date: </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->date_from;?></b></p></label>
				</div>

				<div class="col s2">
					<label><p>End Date: </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->date_to;?></b></p></label>
				</div>
			</div>

			<div class="row">
				<div class="col s2">
					<label><p>Leave hours (per day): </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->leave_hr_day;?></b></p></label>
				</div>

				<div class="col s2">
					<label><p>Total: </p></label>
				</div>
				<div class="col s3">
					<label name="leave_type" id="leave_type"><p><b><?php echo $details->total_hrs;?></b></p></label>
				</div>
			</div>

			<div class="row">
				<div class="col s12" style="text-align: center;">
					<a href="<?php echo base_url(); ?>Admin_leave/approve_leave_request/<?php echo $details->id; ?>" class="btn green darken-2">Approve</a>

					<a href="<?php echo base_url(); ?>Admin_leave/disapprove_leave_request/<?php echo $details->id; ?>" class="btn orange darken-2 modal-trigger" >Disapprove</a>
				</div>
			</div>


	</div>
</div>

<script type="text/javascript">
	$(document).ready( function {
		
		$('select').material_select();

	} );

</script>
