<div class="row">
	<nav>
		<div class="nav-wrapper blue" style="margin-top: 10px;">
			<ul class="left hide-on-med-and-down">
				<li><a href="<?php echo base_url(); ?>Admin_time_keeping">Time Keeping</a></li>
				<li><a href="<?php echo base_url(); ?>Admin_time_keeping/view_employees">Employees</a></li>
				<li><a href="<?php echo base_url(); ?>Admin_time_keeping/reports">Reports</a></li>
				<li class="active"><a href="<?php echo base_url(); ?>Admin_time_keeping/others">Others</a></li>
			</ul>            
		</div>
	</nav>

	
	<div class="col s12 card pad-lg" style="padding: 20px;">
		<form method="POST" id="test_time_in">
		<div class="row">
			<div class="col s4">
				<select name="emp_id">
					<?php foreach($employees->result() as $emp): ?>
						<option value="<?php echo $emp->emp_id; ?>"><?php echo "$emp->last_name, $emp->first_name $emp->mid_name"; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col s2">
				<select name="type">
					<option value="<?php echo IN; ?>"><?php echo IN; ?></option>
					<option value="<?php echo OUT; ?>"><?php echo OUT; ?></option>
				</select>
			</div>
			<div class="col s2">
				<input type="date" name="date">
			</div>
			<div class="col s2">
				<input type="time" name="time">
			</div>
			<button class="btn blue" type="submit" id="submit">Submit</button>
		</div>	
		</form>
		<div class="col s12">
			<table id="table_data" class="striped bordered blue">
				<thead>
					<tr class="white-text">
						<th>Name</th>
						<th>Type</th>
						<th>Date</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($times as $data): ?>
						<tr>
							<td><?php echo "$data->last_name, $data->first_name $data->mid_name"; ?></td>
							<td><?php echo $data->type; ?></td>
							<td><?php echo $data->date ?></td>
							<td><?php echo $data->time; ?></td>												
							<td>
								<form method="POST" id="none">							
									<button name="delete_time" type="submit" value="<?php echo $data->time_id; ?>" class="btn tooltipped blue lighten-1 modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Delete" >
										<i class="material-icons">delete</i>    
									</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('select').material_select();
		$('#table_data').DataTable();
	});

	IO.setSubmitScript({
		form_id : "test_time_in",
		button_id : "submit",
		data_receiver_url : base_url + "admin_time_keeping/process_time" ,
		redirect_url : base_url + "admin_time_keeping/others"
        //,post_script : postScript
    });	

</script>
