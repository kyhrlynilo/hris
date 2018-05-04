<style type="text/css">
	th{

		text-align: center;
	}


</style>


<div class="row">
	<nav>
		<div class="nav-wrapper grey" style="margin-top: 10px;">
			<ul class="left hide-on-med-and-down">
				<li><a href="<?php echo base_url(); ?>Employee_leave">Leave</a></li>
				<li class="active"><a href="<?php echo base_url(); ?>Employee_leave_points_balance_history">Leave Points Balance History</a></li>
			</ul>  		
		</div>
	</nav>

	<div class="col s12 card pad-lg">

		 <table id="table_leave_points_balance_history" class=" table striped highlight" >
            <thead>
            	<tr>
                    <th colspan="1" rowspan="2">id</th>
            		<th colspan="2">Period</th>
                    <th colspan="2">Particulars</th>
    
                    <th colspan="1" rowspan="2">Earned</th>
                    <th colspan="1" rowspan="2">Abs./Und. W/P</th>
                    <th colspan="1" rowspan="2">Balance</th>
                    <th colspan="1" rowspan="2">Abs./Und. WOP</th>
                   <!--  <th colspan="4">Vacation Leave</th> -->
                   <!--  <th colspan="4">Sick Leave</th> -->
                    <th colspan="1" rowspan="2">Date Filed</th>
                    <th colspan="1" rowspan="2">Action Taken</th>
                    <th colspan="1" rowspan="2">Notes</th>
                </tr>
                <tr>
                	
                    <th>From</th>
                    <th>To</th>
                    <th>Type</th>
                    <th>Remarks</th>
                   <!--
                   <th>Remarks</th>
                     <th>Earned</th>
                    <th>Abs./Und. W/P</th>
                    <th>Balance</th>
                    <th>Abs./Und. WOP</th> -->
                    <!-- <th>Earned</th>
                    <th>Abs./Und. W/P</th>
                    <th>Balance</th>
                    <th>Abs./Und. WOP</th> -->
                </tr>
            </thead>
            <tbody>
                     <?php 
                    if($fetch_data->num_rows()>0){
                    	foreach ($fetch_data->result() as $row) {
                    		?>
                    		<tr>
                    			<td ><?php echo $row->id ?></td>
                    			<td><?php echo $row->date_from ?></td>
                    			<td><?php echo $row->date_to ?></td>
                    			<td><?php echo $row->leave_type ?></td>
                    			<td><?php echo $row->remarks ?></td>
                    			
                    			<td><?php echo $row->earned ?></td>
                    			<td><?php echo $row->abs_und_w_pay ?></td>
                    			<td><?php echo $row->balance ?></td>
                    			<td><?php echo $row->abs_und_wo_pay ?></td>
                    		
                    			<!-- <td><?php echo $row->earned ?></td>
                    			<td><?php echo $row->abs_und_w_pay ?></td>
                    			<td><?php echo $row->balance ?></td>
                    			<td><?php echo $row->abs_und_wo_pay ?></td> -->
                    		
                    			 <td><?php echo $row->date_filed ?></td>
                    			<td><?php echo $row->action_taken ?></td>
                    			<td>Test</td>
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
            <tfoot>
                <tr>
                	<th >id</th>
                   <th>From</th>
                    <th>To</th>
                    <th>Type</th>
                    <th>Remarks</th>
                    <th>Earned</th>
                    <th>Abs./Und. W/P</th>
                    <th>Balance</th>
                    <th>Abs./Und. WOP</th>
                   <!--  <th>Earned</th>
                    <th>Abs./Und. W/P</th>
                    <th>Balance</th>
                    <th>Abs./Und. WOP</th> -->
                    <th>Date Filed</th>
                    <th>Action Taken</th>
                    <th>Notes</th>
                </tr>
            </tfoot>
        </table>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		var oTable = $('#table_leave_points_balance_history').dataTable();
		// Hide the first column after initialisation
		oTable.fnSetColumnVis( 0, false );
		/*oTable.fnSort( [0,'dsc']);*/


		// Filter to rows with 'Webkit' in them, add a background colour and then
		// remove the filter, thus highlighting the 'Webkit' rows only.
		/*oTable.fnFilter('Vacation');
		oTable.$('tr', {"search": "applied"}).css('backgroundColor', 'green');
		oTable.fnFilter('');*/
		$('select').material_select();
	});

</script>