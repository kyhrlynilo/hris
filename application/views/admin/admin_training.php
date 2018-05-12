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
			<div class="s12">
				<a href="<?php echo base_url(); ?>Admin_training/training_form" class="waves-effect waves-light btn blue">Add Training</a>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<table>
					<thead>
						<tr>
							<th>Title</th>
							<th>Type 1</th>
							<th>Type 2</th>
							<th>Sponsor</th>
							<th>Location</th>
							<th>Total Hours</th>
							<th>Date from</th>
							<th>Date to</th>
							<th width="350px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data_list as $data): ?>
							<tr>
								<td><?php echo $data->title; ?></td>
								<td><?php echo $data->type_1; ?></td>
								<td><?php echo $data->type_2; ?></td>
								<td><?php echo $data->sponsor; ?></td>
								<td><?php echo $data->location; ?></td>
								<td><?php echo $data->total_hours; ?></td>
								<td><?php echo $data->date_from; ?></td>
								<td><?php echo $data->date_to; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin_training/training_details/<?php echo $data->id; ?>" class=" btn waves-effect waves-light yellow darken-1" >View</a>
									<a href="<?php echo base_url(); ?>admin_training/training_update_form/<?php echo $data->id; ?>" class=" btn waves-effect waves-light green darken-1" >Update</a>
									<a href="#delete<?php echo $data->id; ?>" class="waves-effect waves-light btn modal-trigger red" >Delete</a>
									<a href="<?php echo base_url(); ?>admin_training/training_adding_trainees/<?php echo $data->id; ?>" class="waves-effect waves-light btn modal-trigger blue" >Add Trainies</a>
									<!-- <a href="#add_emp<?php //echo $data->id; ?>" class="waves-effect waves-light btn modal-trigger blue" >Add Trainies</a> -->
								</td>
							</tr>
							<!-- Modal Structure -->
							<div id="delete<?php echo $data->id; ?>" class="modal">
								<div class="modal-content">
									<h4>Are you sure?</h4>
									<p>
										You want to delete <?php echo $data->title ; ?>'s records?
									</p>
								</div>
								<div class="modal-footer">
									<button type="button" onclick="delete_data(id);" id="<?php echo $data->id; ?>" class="btn waves-effect waves-light green">	
										Yes
									</button>
									<button type="button" href="#!" class="white-text orange modal-action modal-close waves-effect waves-red btn-flat ">No</button>
								</div>
							</div>
							<!-- End of first modal -->
						<?php endforeach; ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>
<style type="text/css">
.modal1 { width: 50% !important ; height: 100% !important ; } 
</style>
<script type="text/javascript">

	$(document).ready(function(){
		$('#table_data').DataTable();
		$('select').material_select();
		$('.tap-target').tapTarget('open');
		$('.modal').modal();
	});

	$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal1').modal();
});
	/**
	* delete
	*/
	function delete_data(id)
	{
		button_loader(id,1);
		$.post("<?php echo base_url() ?>admin_training/delete_data/"+id,
			function(data){		
				$('#delete'+id).modal('close');						
				button_loader(id,0);
				notify(data, base_url + "admin_training");
			});
	}

	IO.setSubmitScript({
		form_id : "form",
		button_id : "id_add",
		data_receiver_url : base_url + "admin_training/add_employee_training",
		redirect_url : base_url + "admin_training"
        //,post_script : postScript
    });	

</script>


</script>