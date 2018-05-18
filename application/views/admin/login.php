<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? $title : "Please define Title!"; ?></title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom_script.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>
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


	<div class="container-fluid" style="margin-top: 10%;">
		<div class="row" >
			<div class="col s6 offset-s3">
				<div class="card">
					<div class="card-content" style="padding: 0;">
						<div class="row" style="padding: 0;margin-bottom: 0;">
							<div class="col s5 blue white-text center" style="height: 400px;">
								<h1 style="margin-top: 150px;">HRIS</h1>
							</div>
							<form id="login_form" method="POST" class="col s7 ">
								<div class="row" style="margin-top: 40px;text-align: center;">
									<h5>Administrator</h5>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<i class="fa fa-user-circle prefix" aria-hidden="true"></i>
										<input id="email" type="email" name="email" class="validate">
										<label for="email">E-mail</label>
									</div>
									<div class="input-field col s12">
										<i class="fa fa-lock prefix" aria-hidden="true"></i>
										<input id="password" type="password" name="password" class="validate">
										<label for="password">Password</label>
									</div>								
								</div>
								<div class="row">
									<div class="s12 center m-top-20">										
										<button id="login" class="waves-effect waves-light btn blue darken-2" type="submit">										
										Login
										</button>									
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$('#login_form').on("submit",function(e){
			e.preventDefault();		
			button_loader("login",1);
			setTimeout(function(){
				$.post("<?php echo base_url() ?>admin/authenticate",
				{
					data:get_form_data("login_form")
				},
				function(data){								
					button_loader("login",0);
					notify(data);
					var result = JSON.parse(data);					
					setTimeout(function(){ 
						if(result.icon == "success")
						{
							if(result.text == "Hello Admin!")
								window.location.replace('<?php echo base_url(); ?>admin_time_keeping');
							else							
								window.location.replace('<?php echo base_url(); ?>employee');
						}

					},300);
				});
			},300);


		});
	</script>



</body>


</html>

