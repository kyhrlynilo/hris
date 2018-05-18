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
		<?php foreach($training_name as $data): ?>
			<h5><?php echo $data->title; ?></h5>
		<?php endforeach; ?>
		<div class="row">
			<div class="col s12">
				<h6>List of Employee</h6>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($employeee_list as $data): ?>
							<tr>
								<td><?php echo $data->cs_id_no; ?></td>
								<td><?php echo $data->fullname; ?></td>
								<td>
									<form method="POST" id="add_trainees">
										<input type="hidden" name="training_id" value="<?php echo $form_id; ?>">
										<input type="hidden" name="emp_id" value="<?php echo $data->cs_id_no; ?>">
										<button type="submit" id="save" class="btn waves-effect waves-light green">Add</button>
									</form>
								</td>	
							</tr>
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
	
	$('#add_trainees').on("submit",function(e){
		
		e.preventDefault();		
		button_loader("save",1);

		$.post(
			base_url + "admin_training/add_employee_training/",
			{
				data: get_form_data("add_trainees")
			},
			function(data){								
				button_loader("save",0);
				notify( data, base_url + "/admin_training");				
			}
			);
	});
</script>