<script type="text/javascript">
	$('#admin_employees').addClass('active');
</script>

<style type="text/css">
	
.modal { width: 20% !important ; height: 30% !important ; } 
</style>


<!-- Tap Target Structure -->
<div class="tap-target blue" data-activates="add">
	<div class="tap-target-content white-text">
		<h5>Hello Admin!</h5>
		<p>Click here to add an employee</p>
	</div>
</div>

<div class="fixed-action-btn">
	<a id="add" class="btn-floating btn-large waves-effect blue" href="<?php echo base_url(); ?>admin_employees/add_employee"e>
		<i class="material-icons white-text ">add</i>
	</a>				
</div>

<div class="row">

	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>admin_employees" class="breadcrumb">Employees</a>
				</div>		
			</div>
		</nav>
	</div>
	
	<div class="col s12 card pad-lg">
		<table id="table_employees" class=" table striped highlight" >
			<thead>
				<tr>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th></th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($employee_list as $employee): ?>
					<tr>
						<td><?php echo "$employee->first_name $employee->mid_name $employee->last_name $employee->ext_name"; ?></td>
						<td>
							<a href="<?php echo base_url(); ?>admin_employees/employee_profile/<?php echo $employee->id; ?>" class="btn blue darken-2">View</a>
							<a href="<?php echo base_url(); ?>admin_employees/edit_employee/<?php echo $employee->id; ?>" class="btn green darken-2">Edit</a>
							<a href="#delete<?php echo $employee->id; ?>" class="btn orange darken-2 modal-trigger">Delete</a>
						</td>	
					</tr>
			
					<!-- Modal Structure -->
					<div id="delete<?php echo $employee->id; ?>" class="modal small">
						<div class="modal-content">
							<h4>Are you sure?</h4>
							<p>
								You want to delete <?php echo "$employee->first_name $employee->mid_name $employee->last_name $employee->ext_name"; ?>'s records?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" onclick="delete_emp(id);" id="<?php echo $employee->id; ?>" class="btn waves-effect waves-light green">	
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
		$.post("<?php echo base_url() ?>admin_employees/delete_employee/"+id,
			function(data){		
				$('#delete'+id).modal('close');						
				button_loader(id,0);
				notify(data, base_url + "admin_employees");
		});
	}

 	
</script>
