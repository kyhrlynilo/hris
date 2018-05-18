

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
		
		<table id="table_leave" class="table striped highlight">
			<thead>
				<tr>
					<th>Name</th>
					<th>Leave Type</th>
					<th>Date Filed</th>
					<th>Status</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Leave Type</th>
					<th>Date Filed</th>
					<th>Status</th>
				</tr>
			</tfoot>
			<tbody>
				<?php 
				if($fetch_data->num_rows()>0){
					foreach ($fetch_data->result() as $row) {
						?>
						<tr>
							<td><?php echo $row->full_name ?></td>
							<td><?php echo $row->leave_type ?></td>
							<td><?php echo $row->date_filed ?></td>
							<td><?php echo $row->status ?></td>
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
	$(document).ready(function(){
		$('#table_leave').dataTable();
		$('select').material_select();
	});
</script>