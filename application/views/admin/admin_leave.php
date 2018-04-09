
<script type="text/javascript">
  $('#admin_leave').addClass('active');
</script>


<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>Admin_leave" class="breadcrumb">Leave Request</a>

					<a href="<?php echo base_url(); ?>Admin_employee_leave_credit_points" class="breadcrumb">Employee Leave Credit Points</a>
				</div>		
			</div>
		</nav>
	</div>

	<div class="col s12 card pad-lg">
		
		<table id="table_leave" class="table striped highlight">
			<thead>
				<tr>
					<th>Name</th>
					<th>Type</th>
					<th>Date Filed</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Type</th>
					<th>Date Filed</th>
					<th >Action</th>
				</tr>
			</tfoot>
			<tbody>
				<?php 
				if($fetch_data->num_rows()>0){
					foreach ($fetch_data->result() as $row) {
						?>
						<tr>
							<td><?php echo $row->last_name ." ". $row->first_name .", ". $row->mid_name ?></td>
							<td><?php echo $row->leave_type ?></td>
							<td><?php echo $row->date_filed ?></td>
							<td> 
								<a href="<?php echo base_url(); ?>Admin_leave/employee_leave_request/<?php echo $row->id; ?>" class="btn green darken-2">View</a>
							</td>
						</tr>
						<?php
					}

				}else{
					?>
					<tr>
						<td colspan="3">No data found</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function (){
		$('#table_leave').dataTable();
		$('select').material_select();

	});

</script>
