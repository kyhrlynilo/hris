<?php 
$details = array();
foreach($employee as $employee):
	$details = $employee;
endforeach;

?>

<div class="container-fluid">
	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s12">
					<a href="<?php echo base_url(); ?>admin_employees" class="breadcrumb">Employees</a>
					<a href="#" class="breadcrumb">Employee Profile</a>
				</div>
			</div>
		</nav>
	</div>

	<div class="card" style="padding: 20px;">
		<div class="row">
			<div class="col s12">
				<b>Personal Information</b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Surname:
			</div>
			<div class="col s10">
				<b> <?php echo $details->last_name; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				First Name:
			</div>
			<div class="col s5">
				<b> <?php echo $details->first_name; ?> </b>
			</div>
			<div class="col s3">
				Name Extension (JR. SR):
			</div>
			<div class="col s2">
				<b> <?php echo $details->ext_name; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Middle Name:
			</div>
			<div class="col s10">
				<b> <?php echo $details->mid_name; ?> </b>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col s2">
				DATE OF BIRTH:<br>
				<small>(mm/dd/yyyy)</small>
			</div>
			<div class="col s4">
				<b> <?php echo $details->date_of_birth; ?> </b>
			</div>
			<div class="col s2">
				PLACE OF BIRTH:
			</div>
			<div class="col s4">
				<b> <?php echo $details->place_of_birth; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				SEX:
			</div>
			<div class="col s4">
				<b> Male </b>
			</div>
			<div class="col s2">
				Civil Status:
			</div>
			<div class="col s4">
				<b> <?php echo $details->civil_status; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Height (m):
			</div>
			<div class="col s4">
				<b> <?php echo $details->height; ?> </b>
			</div>
			<div class="col s2">
				Weight:
			</div>
			<div class="col s4">
				<b> <?php echo $details->weight; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Blood Type:
			</div>
			<div class="col s4">
				<b> <?php echo $details->blood_type; ?> </b>
			</div>
			<div class="col s2">
				GSIS ID No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->gsis_id_no; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				PAG-IBIG ID No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->pagibig_id_no; ?> </b>
			</div>
			<div class="col s2">
				PHILHEALTH No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->philhealth_no; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				SSS No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->sss_no; ?> </b>
			</div>
			<div class="col s2">
				TIN No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->tin_no; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Agency Employee No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->agency_employee_no; ?> </b>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col s2">
				Citizenship:
			</div>
			<div class="col s10">
				<b> <?php echo $details->citizenship; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Residential Address:
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->sub_vill_a; ?></b><br>
					<label>House/block/Lot No.</label>
				</div>
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->street_a; ?></b><br>
					<label>Street</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->sub_vill_a; ?></b><br>
					<label>Subdivision/Villege</label>
				</div>
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->barangay_a; ?></b><br>
					<label>Barangay</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->municity_a; ?></b><br>
					<label>City/Municipality</label>
				</div>
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->province_a; ?></b><br>
					<label>Province</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				ZIP Code:
			</div>
			<div class="col s10">
				<b><?php echo $details->zip_code_a; ?></b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Permanent Address:
			</div>
			<div class="col s5">
				<div align="center">
					<b>182-D</b><br>
					<label><?php echo $details->sub_vill_b; ?></label>
				</div>
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->street_b; ?></b><br>
					<label>Street</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->sub_vill_b; ?></b><br>
					<label>Subdivision/Villege</label>
				</div>
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->barangay_b; ?></b><br>
					<label>Barangay</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->municity_b; ?></b><br>
					<label>City/Municipality</label>
				</div>
			</div>
			<div class="col s5">
				<div align="center">
					<b><?php echo $details->province_b; ?></b><br>
					<label>Province</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Telephone No:
			</div>
			<div class="col s4">
				<b> <?php echo $details->telephone_no; ?> </b>
			</div>
			<div class="col s2">
				Mobile No: 
			</div>
			<div class="col s4">
				<b> <?php echo $details->mobile_no; ?> </b>
			</div>
		</div>
		<div class="row">
			<div class="col s2">
				Email Address:
			</div>
			<div class="col s10">
				<b> <?php echo $details->email_address; ?></b>
			</div>
		</div>
	</div>
</div>
