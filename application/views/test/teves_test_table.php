<div class="card">
	<div class="row">
		<div class="col s12">
			<a href="<?php echo base_url(); ?>teves_test/insert_form" class="waves-effect waves-light btn">Add</a>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<table id="table_data" class="striped bordered">
				<thead>
					<tr>
						<th>Type</th>
						<th>Effective On</th>
						<th>Effective Until</th>
						<th>Days</th>
						<th>Time Start</th>
						<th>Time End</th>
						<th>Date Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data_list as $data): ?>
						<tr>
							<td><?php echo $data->type; ?></td>
							<td><?php echo $data->effective_on; ?></td>
							<td><?php echo $data->effective_until; ?></td>
							<td><?php echo $data->days; ?></td>
							<td><?php echo $data->time_start; ?></td>
							<td><?php echo $data->time_end; ?></td>
							<td><?php echo $data->date_created; ?></td>
							<td>
								<a href="<?php echo base_url(); ?>teves_test/update_form/<?php echo $data->id; ?>" class=" btn waves-effect waves-light green darken-1" >Update</a>
								<a href="#delete<?php echo $data->id; ?>" class="waves-effect waves-light btn modal-trigger red" >Delete</a>
							</td>
						</tr>
						<!-- Modal Structure -->
						<div id="delete<?php echo $data->id; ?>" class="modal">
							<div class="modal-content">
								<h4>Are you sure?</h4>
								<p>
									You want to delete <?php echo $data->type ; ?>'s records?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" onclick="delete_data(id);" id="<?php echo $data->id; ?>" class="btn waves-effect waves-light green">	
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


<script type="text/javascript">

	$(document).ready(function(){
		$('#table_data').DataTable();
		$('select').material_select();
		$('.tap-target').tapTarget('open');
		$('.modal').modal();
	});

	/**
	* delete
	*/
	function delete_data(id)
	{
		button_loader(id,1);
		$.post("<?php echo base_url() ?>teves_test/delete_data/"+id,
			function(data){		
				$('#delete'+id).modal('close');						
				button_loader(id,0);
				notify(data, base_url + "teves_test");
			});
	}
</script>

<script type="text/javascript">
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
});

	$(document).ready(function() {
		$('select').material_select();
	});

	$('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
});

	$(document).ready(function(){
		$('.tooltipped').tooltip({delay: 50});
	});
</script>

