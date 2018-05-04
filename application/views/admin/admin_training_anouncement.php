<script type="text/javascript">
	$('#admin_training').addClass('active');
</script>

<!-- Tap Target Structure -->
<div class="tap-target blue" data-activates="add">
	<div class="tap-target-content white-text">
		<h5>Hello Admin!</h5>
		<p>Click here to add an Anouncement</p>
	</div>
</div>

<div class="fixed-action-btn">
	<a id="add" class="btn-floating btn-large waves-effect blue" href="<?php echo base_url(); ?>admin_training/admin_training_anouncement_form">
		<i class="material-icons white-text ">add</i>
	</a>				
</div>
<div class="row">
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
	<div class="col s12 card pad-lg">
		<div class="row">
			<div class="col s12">
				<div align="center">
					<h4>Announcement Form</h4>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<table>
					<thead>
						<tr>
							<th>Training</th>
							<th>Anouncement</th>
							<th>Action</th>	
						</tr>
					</thead>
					<tbody>
						<?php foreach($data_list as $data): ?>
						<tr>
							<td><?php echo $data->title; ?></td>
							<td><?php echo $data->anouncement; ?></td>
							<td>
								<a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $data->id; ?>">View</a>
								<a href="<?php echo base_url(); ?>admin_training/training_update_form_anouncement/<?php echo $data->id; ?>" class=" btn waves-effect waves-light green darken-1" >Update</a>
								<a href="#delete<?php echo $data->id; ?>" class="waves-effect waves-light btn modal-trigger red" >Delete</a>
							</td>
						</tr>
 
						  <div id="modal<?php echo $data->id; ?>" class="modal">
						    <div class="modal-content">
						      <h4><?php echo $data->title; ?></h4>
						      <p><?php echo $data->anouncement; ?></p>
						    </div>
						  </div>
						  <!-- Modal Structure -->
					<div id="delete<?php echo $data->id; ?>" class="modal small">
						<div class="modal-content">
							<h4>Are you sure?</h4>
							<p>
								You want to delete <?php echo $data->title ?>'s records?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" onclick="delete_emp(id);" id="<?php echo $data->id; ?>" class="btn waves-effect waves-light green">	
								Yes
							</button>
							<button type="button" href="#!" class="white-text orange modal-action modal-close waves-effect waves-red btn-flat ">No</button>
						</div>
					</div>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


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
	function delete_emp(id)
	{
		button_loader(id,1);
		$.post("<?php echo base_url() ?>admin_training/delete_data_announcement/"+id,
			function(data){		
				$('#delete'+id).modal('close');						
				button_loader(id,0);
				notify(data, base_url + "admin_training/anouncement");
		});
	}

	
</script>
