<div class="row">

	<div class="card row" style="margin-bottom: 0;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="col s11">
					<a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
				</div>		
			</div>
		</nav>
	</div>

	<div class="col s12 card pad-lg">
		<pre> 
		INSTRUCTIONS:

			Gawa ka nalang ng views 
			Controller : Admin_time_keeping
			Functions  : 
					view_employees
					add_employee (new page)
						gawa ka ng form, based dun sa fields
					edit_employee (new page)
						yung $id, http://localhost/hris/Admin_time_keeping/2
						sample ng id is 2,
						ige-get mo yung details na ang id ay 2					
						icopy-paste mo lang yung form, tas lagyan mo ng values, based dun sa na fetch mo
					delete_employee 
						update lang sya, set mo lang yung active flag sa N

		TABLE NAME: 

			emp_timekeeping_details

		FIELDS : 

			id auto increment
			emp_id : ( auto-generated, kaw na bahala, basta unique ) 
			last_name
			first_name
			mid_name
			birth_date
			birth_place
			gender
			civil_status
			citizenship
			address
			email_address
			cellphone_number
			department
			emp_status (Regular, Casual, Parttime, Job-order) - DROP DOWN
			emp_type (Admin, Faculty, Student Assistant) - DROP DOWN
			active_flag (enum, Y/N), default = Y
		</pre>
	</div>
</div>