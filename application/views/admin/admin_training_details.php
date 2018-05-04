<?php foreach($data_list as $data): ?>
	
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
	<div class="card">
		
		<div class="row">
			<div class="col s12">
				<h5><?php echo ucfirst($data->title); ?></h5>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				<p>
					<label>Type:</label>
					<?php echo $data->type_1; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Type:</label>
					<?php echo $data->type_2; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Sponsor:</label>
					<?php echo $data->sponsor; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Location:</label>
					<?php echo $data->location; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				<p>
					<label>Total Hours:</label>
					<?php echo $data->total_hours; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Date from:</label>
					<?php echo $data->date_from; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Date to:</label>
					<?php echo $data->date_to; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				List of Participants
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<table>
					<thead>
						<tr>
							<th>Employe Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($emp_list as $emp_data): ?>
							<tr>
								<td><?php echo $emp_data->fullname; ?></td>
								<td>
									<a href="#delete<?php echo $emp_data->id; ?>" class="btn tooltipped red darken-1 modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Remove"><i class="material-icons">delete</i></a>
								</td>
							</tr>
							<!-- Modal Structure -->
							<div id="delete<?php echo $emp_data->id; ?>" class="modal small">
								<div class="modal-content">
									<h4>Are you sure?</h4>
									<p>
										You want to delete <?php echo $emp_data->fullname; ?>'s records?
									</p>

								</div>
								<div class="modal-footer">
									<button type="button" onclick="delete_emp(id);" id="<?php echo $emp_data->id; ?>" class="btn waves-effect waves-light green">	
										Yes
									</button>
									<button type="button" href="#!"  class="white-text orange modal-action modal-close waves-effect waves-red btn-flat ">No</button>
								</div>
							</div>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php endforeach; ?>



<script type="text/javascript">
	$(document).ready(function(){
		$('#table_employees').DataTable();
		$('select').material_select();
		$('.tap-target').tapTarget('open');
		$('.modal').modal();
	});

		/**
	* delete
	*/

	function delete_emp(id,form_id)
	{	
		button_loader(id,1);
		$.post("<?php echo base_url() ?>Admin_training/remove_trainee/"+id,
			function(data){		
				$('#delete'+id).modal('close');						
				button_loader(id,0);
				notify(data, base_url + "admin_training")
			});
	}

</script>