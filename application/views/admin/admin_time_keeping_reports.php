<div class="row">
	<nav>
		<div class="nav-wrapper blue" style="margin-top: 10px;">
			<ul class="left hide-on-med-and-down">
				<li><a href="<?php echo base_url(); ?>Admin_time_keeping">Time Keeping</a></li>
				<li><a href="<?php echo base_url(); ?>Admin_time_keeping/view_employees">Employees</a></li>
				<li class="active"><a href="<?php echo base_url(); ?>Admin_time_keeping/reports">Reports</a></li>
				<li><a href="<?php echo base_url(); ?>Admin_time_keeping/others">Others</a></li>
			</ul>            
		</div>
	</nav>

	
	<div class="col s12 card pad-lg" style="padding: 20px;">
		<div class="row">
			<h5>Generation Of Reports</h5>
		</div>	
		<div class="row">
			<div class="col s8">
				<div class="input-field ">
					<select id="report_type">
						<option value="" disabled selected>Select Report</option>
						<option value="list_of_lates">List of Lates</option>
						<option value="list_of_undertimes">List of Undertimes</option>
						<option value="list_of_abseneces">List of Absences</option>
					</select>
					<label for="report_type">Type of Report</label>					
				</div>
			</div>
			<div class="col s4 center">
				<button id="generate" class="btn blue btn-large"><i class="material-icons ">save</i> Geneate</button>
			</div>
		</div>
		<div class="row">
			<div class="col s4">							
				<label class="active">Date From</label>
				<input type="date" name="date_from" id="date_from">				
			</div>
			<div class="col s4">
				<label class="active">Date To</label>			
				<input type="date" name="date_to" id="date_to">				
			</div>
		</div>
		<div class="row">
			<div class="col s4">
				<div class="input-field ">
					
				</div>
			</div>
		</div>
	</div>
	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('select').material_select();
		$('#table_data').DataTable();
	
		$('#generate').on('click', function(){
			var base_url 	= '<?php echo base_url(); ?>';
			var report 		= $('#report_type').val(); 
			var date_from 	= $('#date_from').val(); 
			var date_to 	= $('#date_to').val(); 
			var link 		= base_url + 'reports/' + report +'/' +date_from +'/' +date_to ;

			if(
				base_url == null || base_url == '' ||
				report == null || report == '' ||
				date_from == null || date_from == '' ||
				date_to == null || date_to == '' ||
				link == null || link == ''
				)
			{
				swal({
					'title' : 'Error',
					'text' : 'All fields are required!',
					'icon' : 'error'
				});
			}
			else
			{
				var win 		= window.open(link, '_blank');
				win.focus();				
			}

		});
	});

</script>


