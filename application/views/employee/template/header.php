<?php $modules = $this->db->select()->from("sys_modules")->get()->result(); ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? $title : "Please define Title!"; ?></title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/offline.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/offline.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>	
	<script src="<?php echo base_url(); ?>assets/js/custom_script.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/countries.js"></script>
</head>

<style type="text/css">
header, main, footer {
	padding-left: 300px;
}

@media only screen and (max-width : 992px) {
	header, main, footer {
		padding-left: 0;
	}
}

</style>
<body>
	<div class="row" style="padding: 0; margin: 0;">
		<div class="col s12" style="padding: 0; margin: 0;">	
			<div id="preloader" class="progress grey darken-4" style="padding: 0; margin: 0; height: 10px;">
				<div class="indeterminate grey lighten-4"></div>
			</div>
		</div>
	</div>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
	<li>
		<a href="#!">
		Options
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="<?php echo base_url(); ?>auth/logout">
		Logout
	</a></li>
	<li class="divider"></li>
</ul>
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper  grey darken-1">
			<ul class="right ">
				<li>
					<a class="dropdown-button" href="#!" data-activates="dropdown1">
						<i class="fa fa-user-circle" aria-hidden="true"></i> Employee
						<i class="material-icons right">arrow_drop_down</i>
					</a>
				</li>			
			</ul>
			<ul class="left">
				<li>
					<a href="#" class=" show-on-large">
						<i class="material-icons left">apps</i> HRIS
					</a>
				</li>
			</ul>
		</div>
	</nav>
</div>

<div class="container-fluid">
<div class="row" style="margin-bottom: 0;">

	<div class="col s2 grey darken-1" style="padding: 0; height: 100vh; margin-bottom: 0;">
		<div class="row white" style="height: 200px;">
			<div class="col s3 center" style="padding: 20px;margin-top: 50px;">
				<img src="<?php echo base_url(); ?>assets\images\user.png" alt="" class="circle">
			</div>
			<div class="col s8" style="padding: 20px;margin-top: 50px;">
				<b>Employee Juandroid</b>
				juan@employee.com
			</div>
		</div>
		<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee/">
					<i class="material-icons left">group</i> Personal Data
				</a>
			</div>			
		</div>
		<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee_document_requests/">
					<i class="material-icons left">group</i> Document Requests
				</a>
			</div>			
		</div>
		<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee_overtime/">
					<i class="material-icons left">attach_money</i>	Overtime
				</a>
			</div>
		</div>	
		<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee_leave/">
					<i class="material-icons left">assignment</i> Leave
				</a>
			</div>			
		</div>
			
		<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee_time_keeping/">
					<i class="material-icons left">watch_later</i> Time keeping
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee_payroll/">
					<i class="fa fa-road fa-2x left"></i> Payroll
				</a>
			</div>			
		</div>
			<div class="row">
			<div class="col s12" style="border-bottom: 1px solid grey;padding-bottom: 10px;">
				<a class="white-text" href="<?php echo base_url(); ?>Employee_training/">
					<i class="material-icons left">directions_walk</i> Trainings
				</a>
			</div>			
		</div>
	</div>

	<div class="col s10">

		


<script type="text/javascript">
	const base_url = '<?php echo base_url(); ?>';
	
	$(document).ready(function(){
		$(".button-collapse").sideNav();
		 //Preloader
            preloaderFadeOutTime = 500;
            function hidePreloader() {
                var preloader = $('#preloader');
                preloader.fadeOut(preloaderFadeOutTime);
            }
            hidePreloader();
	});
	
</script>