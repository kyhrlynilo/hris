
<div class="fixed-action-btn">
	<a id="add" class="btn-floating btn-large waves-effect grey" href="<?php echo base_url(); ?>employee/">
		<i class="material-icons white-text ">add</i>
	</a>				
</div>

<div class="row">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper grey">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>employee_training" class="breadcrumb">Trainings Schedule</a>
					<a href="<?php echo base_url(); ?>employee_training/training_logs" class="breadcrumb">Trainings Logs</a>
					<a href="<?php echo base_url(); ?>employee_training/training_anonuncement" class="breadcrumb">Anonuncement</a>
				</div>		
			</div>
		</nav>
	</div>
	<div class="col s12 card pad-lg">
			<h6>Latest Training</h6>
			<div class="row">
			<div class="col s12">
				<h5><?php //echo ucfirst($data->title); ?></h5>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				<p>
					<label>Type:</label>
					<?php //echo $data->type_1; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Type:</label>
					<?php //echo $data->type_2; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Sponsor:</label>
					<?php //echo $data->sponsor; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Location:</label>
					<?php //echo $data->location; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				<p>
					<label>Total Hours:</label>
					<?php //echo $data->total_hours; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Date from:</label>
					<?php //echo $data->date_from; ?>
				</p>
			</div>
			<div class="col s2">
				<p>
					<label>Date to:</label>
					<?php //echo $data->date_to; ?>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				<h6>Incoming Trainings</h6>
				<table>
					<thead>
						<tr>
							<th>Training Name</th>
							<th>Location</th>
							<th>Date from</th>
							<th>Date to</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>