<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_time_keeping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_time_keeping_model");
	}
	
	public function index()
	{		
		$data['title'] = "Time Keeping";
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping',$data);
		$this->load->view('admin/template/footer',$data);
	}

 ####### #     # ######  #       ####### #     # ####### ####### 
 #       ##   ## #     # #       #     #  #   #  #       #       
 #       # # # # #     # #       #     #   # #   #       #       
 #####   #  #  # ######  #       #     #    #    #####   #####   
 #       #     # #       #       #     #    #    #       #       
 #       #     # #       #       #     #    #    #       #       
 ####### #     # #       ####### #######    #    ####### ####### 
                                                                 

	public function employee_profile($id)
	{

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);
			
		
		$data['title'] = "View Time Keeping";
		$user_id = $this->uri->segment(3);
		
		$data['user_data'] = $this->Admin_time_keeping_model->get_single_employee($user_id);

	
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_employee_view',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function add_employee()
	{
 		$data['title'] = "Add Employee";
 		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_employee_add',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function edit_employee($id)
	{
	
		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);
		$data['title'] = "Edit Employee";
		$user_id = $this->uri->segment(3);
		
		$data['user_data'] = $this->Admin_time_keeping_model->get_single_employee($user_id);
		$data['fetch_data'] = $this->Admin_time_keeping_model->fetch_data();

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_employee_edit',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function view_employees()
	{
		$data['fetch_data'] = $this->Admin_time_keeping_model->fetch_data();
		$data['title'] = "Employees";

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_employees',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function delete_employee()
	{


		$data['active_flag'] = "N";
		$id = $this->uri->segment(3);;
		$this->Admin_time_keeping_model->update_data($data,$id);
		$this->view_employees();	
	}

	public function process_employee()
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			$data = $this->get_params();
			
			if($data['citizenship'] == DUAL)
			{
				$data['citizenship'].= isset($data['country']) ? " " .ucwords($data['country']) : ""; 				
			}

			unset($data['country']);

			$required_fields = array(
							'first_name',
							'last_name',
							'gender',
							'civil_status',
							'birth_date',
							'citizenship',
							'email_address',
							'department'
							);
			
			$this->validate_data($required_fields,$data);	

			if(empty($data['id']))
			{
				$data['emp_id'] = $this->generate_employee_id($data);				
				$id = $this->Admin_time_keeping_model->insert_data($data);
				$additional_data = array(
					'first_name' => $data['first_name'],
					'last_name'	 => $data['last_name'],
					'emp_id'  	 => $data['emp_id']
				);
				//echo "<pre>"; print_r($data); exit();
				$this->ion_auth->register( $data['email_address'], $data['emp_id'] , $data['email_address'], $additional_data );
				$this->ion_auth->add_to_group(array(4), $id);
				$text = "Employee has been added!";

				$email = $data['email_address'];
				$empid = $data['emp_id'];
				$emptype = $data['emp_type'];
				$this->Admin_time_keeping_model->insert_data_emp_leave_balance($email,$empid,$emptype);
				$this->process_credit_points();
			}
			else
			{				
				$id = $data['id'];
				unset($data['id']);
				$this->Admin_time_keeping_model->update_data($data,$id);
				$text = "Employee has been updated!";				
			}

			
	
			$icon = "success";		
			$title = "Sucess";
		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Try Again" );
		}
	

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons
		);	

		echo json_encode($result);
	}

	function generate_employee_id($data)
	{
		$date 			= date('Y-m-d');
		$append 		= substr($date,0,4);
		$append 		= strrev($append);
		$suffix 		= $this->Admin_time_keeping_model->get_last_id();
		$suffix 		= str_pad($suffix, 5, "0", STR_PAD_LEFT);
		$employee_id  	= substr($data['last_name'],0,1).substr($data['first_name'],0,1).$append.$suffix;		

		return $employee_id;
	}
  #####   #####  #     # ####### ######  #     # #       ####### 
 #     # #     # #     # #       #     # #     # #       #       
 #       #       #     # #       #     # #     # #       #       
  #####  #       ####### #####   #     # #     # #       #####   
       # #       #     # #       #     # #     # #       #       
 #     # #     # #     # #       #     # #     # #       #       
  #####   #####  #     # ####### ######   #####  ####### ####### 

	public function time_schedule($emp_id = null)
	{
		if(!isset($emp_id) OR empty($emp_id))
			throw new Exception("No employee id", 1);

		$data['title'] = "Official Time Schedule";
		$data['employee'] = $this->Admin_time_keeping_model->get_single_employee($emp_id);
		$data['schedule'] = $this->Admin_time_keeping_model->get_schedule($emp_id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_time_schedule',$data);
		$this->load->view('admin/template/footer',$data);
			
	}

	public function time_schedule_add($emp_id = null)
	{
		if(!isset($emp_id) OR empty($emp_id))
			throw new Exception("No employee id", 1);

		$data['title'] = "Add Official Time Schedule";
		$data['employee'] = $this->Admin_time_keeping_model->get_single_employee($emp_id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_time_schedule_add',$data);
		$this->load->view('admin/template/footer',$data);
			
	}

	public function time_schedule_edit($emp_id = null, $id = null)
	{
		if(!isset($emp_id) OR empty($emp_id) OR !isset($id) OR empty($id))
			throw new Exception("No employee id", 1);

		$data['title'] = "Official Time Schedule";
		$data['employee'] = $this->Admin_time_keeping_model->get_single_employee($emp_id);
		$data['schedule'] = $this->Admin_time_keeping_model->get_single_schedule($id);		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_time_schedule_edit',$data);
		$this->load->view('admin/template/footer',$data);
			
	}
	
	public function process_time_schedule()
	{

 		$buttons 	= array( "success" => "Okay" );
 		try
 		{	
 			$data = $this->get_params();
 		
 			$required_fields = array(
 						'type', 						
 						'effective_on',
 						'effective_until',
 						'days',
 						'time_start',
 						'time_end'
 					);

 			$this->validate_data($required_fields,$data);

 			$data['days'] 			= implode(",", $data['days']);
 			$data['time_start']   	= date("G:i", strtotime($data['time_start']));
 			$data['time_end'] 	  	= date("G:i", strtotime($data['time_end']));
 			$data['date_created'] 	= date("Y-m-d H:m:s");

 			$effective_on = $data['effective_on'];
 			$effective_until = $data['effective_until'];

 			$time_start = $data['time_start'];
 			$time_end = $data['time_end']; 			

 			if(date('Y-m-d',strtotime($effective_until)) <= date('Y-m-d',strtotime($effective_on)))
 				throw new Exception("Date of effectivity error.", 1);
 			
 			if(strtotime($time_start) >= strtotime($time_end))
 				throw new Exception("Time period error.", 1);

 			# conflict validations

 			if(isset($data['id']))
 				$ots = $this->Admin_time_keeping_model->get_honorariums($data['emp_id'],$data['id']);
 			else
 				$ots = $this->Admin_time_keeping_model->get_honorariums($data['emp_id']);

 			$this->validate_time_schedule( $ots, $data['effective_on'], $data['effective_until'] , $data['days'], $time_start, $time_end );

 			# end of conflict controller.validateAction( action=any, inclusion=any, exclusion=any )
 			 			
			if(empty($data['id']))
			{
				$this->Admin_time_keeping_model->insert_time_schedule($data);
				$text = "Official Time Schedule Added!";
			}
			else
			{
				$id = $data['id'];
				unset($data['id']);
				unset($data['date_created']);	
				$this->Admin_time_keeping_model->update_time_schedule($id,$data);
				$text = "Official Time Schedule Updated!";				
			}

 			$title 	= "Success!";
 			$icon 	= 'success';	


			$result = array(
				"title" => $title , 
				"text" => $text ,
				"icon" => $icon ,
				"buttons" => $buttons
			);

			echo json_encode($result);
		}
		catch(Exception $e)
		{
			$this->handle_catch($e);
		}
	
	}

	public function delete_time_schedule($id = "")
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			/*if( !$this->ion_auth->logged_in() OR $id == null) 			
				throw new Exception("Nice try", 1);	*/			
			
			$this->Admin_time_keeping_model->delete_time_schedule($id);
			$title = "Success!";
			$text = "School load has been deleted.";
			$icon = "success";

		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Try again" );
		}

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons 
		);	

		echo json_encode($result);
	}

	public function validate_time_schedule( $ots, $date_a, $date_b, $days, $time_start, $time_end )
	{

		$this->load->view('common/dtr_computations');

		$days = explode(",", $days);		
		$date_from 	= date('Y-m-d', strtotime($date_a));
		$date_to 	= date('Y-m-d', strtotime($date_b));

		$time_start_name = $time_start;
		$time_end_name 	 = $time_end;

		$time_start = strtotime($time_start);
		$time_end 	= strtotime($time_end);

		$day_start 	= (int) substr($date_from,8,2) ;
		$day_end 	= (int) substr($date_to,8,2) ;
		//echo "<pre>";
		for($a = $day_start; $a <= $day_end; $a++)
		{	
			$proper_day = strlen($a) > 1 ? $a : "0$a";  
			$date = substr($date_from,0,4) ."-" .substr($date_from,5,2) ."-$proper_day"; 
			$day = date('w',strtotime($date));

			if(in_array($day, $days))
			{
				$sched = get_daily_schedule( $ots, $date );
				if( count($sched) > 0 )	
				{	
					foreach($sched as $s)
					{
						$day_name = DAYS[$day];
						$time_from = strtotime($s['from']);
						$time_to   = strtotime($s['to']);						
						if($time_start >= $time_from AND $time_start < $time_to )										
							throw new Exception("Schedule Conflict \n Requested Sched : $day_name ($time_start_name - $time_end_name) \nConflicting Sched : $day_name ($s[from] - $s[to])", 1);
						
						if($time_end > $time_from AND $time_end <= $time_to)
							throw new Exception("Schedule Conflict \n Requested Sched : $day_name ($time_start_name - $time_end_name) \nConflicting Sched : $day_name ($s[from] - $s[to])", 1);
					}
				}
			}				
			
		
		}
		/*throw new Exception("No error!", 1);
		exit;*/
		//exit;

	}



 ####### ### #     # #######   #    # ####### ####### ######  ### #     #  #####  
    #     #  ##   ## #         #   #  #       #       #     #  #  ##    # #     # 
    #     #  # # # # #         #  #   #       #       #     #  #  # #   # #       
    #     #  #  #  # #####     ###    #####   #####   ######   #  #  #  # #  #### 
    #     #  #     # #         #  #   #       #       #        #  #   # # #     # 
    #     #  #     # #         #   #  #       #       #        #  #    ## #     # 
    #    ### #     # #######   #    # ####### ####### #       ### #     #  #####  

    public function dtr($emp_id = null, $year = null, $month = null, $day_from = null, $day_to = null )
    {
    	if(!isset($emp_id) OR empty($emp_id))
    		throw new Exception("Parameter error!", 1);

    	# SETTINGS PARAMS
    	$data['emp_id'] 	= $emp_id;
		$data['selected_year'] 		= ( isset( $year) OR !empty($year) ) ? $year : 2018   ;
		$data['selected_month'] 	= ( isset( $month) OR !empty($month) ) ? $month : 1   ;
		$data['selected_day_from'] 	= ( isset( $day_from) OR !empty($day_from) ) ? $day_from : 1   ;
		$data['selected_day_to'] 	= ( isset( $day_to) OR !empty($day_to) ) ? $day_to : 1   ;	 

		# NEEDED DATAS
    	$total_days 				= cal_days_in_month(CAL_GREGORIAN, $data['selected_month'], $data['selected_year']);
    	$data['times']				= $this->Admin_time_keeping_model->get_time_records_by_emp_year_month($emp_id, $data['selected_year'], $data['selected_month']);
    	$data['ots'] 				= $this->Admin_time_keeping_model->get_honorariums($emp_id);
    	$data['days_from'] 			= array();
    	$data['days_to'] 			= array();
    	for( $a = 1; $a <= $total_days; $a++)
    	{
    		$data['days_to'][] = $a;
    		$data['days_from'][] = $a;
    	}

    	# COMMON DATAS
    	$data['title']	= "Daily Time Records";
		$data['months'] = MONTHS;
		$data['years'] 	= YEARS;		
		$data['employee'] = $this->Admin_time_keeping_model->get_single_employee($emp_id);
		
		if($this->input->post('generate',true))
		{
			$year = $this->input->post('year',true);
			$month = $this->input->post('month',true);
			$day_from = $this->input->post('day_from',true);
			$day_to = $this->input->post('day_to',true);
			$location = base_url() ."admin_time_keeping/dtr/$emp_id/$year/$month/$day_from/$day_to";

			header("Location: $location");
		}

		$this->load->view('admin/template/header',$data);
		$this->load->view('common/dtr_computations',$data);
		$this->load->view('admin/admin_time_keeping_dtr',$data);
		$this->load->view('admin/template/footer',$data);
    		
    }

    public function others()
	{
		//$data['fetch_data'] = $this->Admin_time_keeping_model->fetch_data();
		$data['title'] = "Time Records";
		$data['employees'] =  $this->Admin_time_keeping_model->fetch_data();
		$data['times'] = $this->Admin_time_keeping_model->get_time_records();

		if($this->input->post("delete_time",true))
		{

			$id = $this->input->post("delete_time",true); 
		
			$this->Admin_time_keeping_model->delete_time_record($id);
			header("Refresh: 0");
		}


		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/others',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function process_time()
	{

		$buttons 	= array( "success" => "Okay" );
 		try
 		{	
 			$data = $this->get_params();
 			
 			$required_fields = array(
 						'emp_id', 						
 						'date',
 						'time',
 						'type'
 					);

 			$this->validate_data($required_fields,$data);
	
 		
			$this->Admin_time_keeping_model->insert_time($data);
			
			# LATE, UNDERTIME AND ABSENCES DETECTION

			$this->load->view('common/dtr_computations',$data);
			$ots = $this->Admin_time_keeping_model->get_honorariums($data['emp_id']);
			if( $data['type'] == IN )
			{
				$is_late = array();
				$is_late = is_late( $ots, $data['date'], $data['time'] );

				if(isset($is_late[0]) AND $is_late[0] == FLAG_YES )
				{
					$fields = array(
						'emp_id' 	=> $data['emp_id'],
						'date' 		=> $data['date'],
						'type' 		=> LATE,
						'mins' 		=> $is_late[1]
					);

					$this->db->insert('emp_tardiness',$fields);
				}
			}

			if( $data['type'] == OUT )
			{
				$is_undertime = array();
				$is_undertime = is_undertime( $ots, $data['date'], $data['time'] );
				if( isset($is_undertime[0]) AND $is_undertime[0] == FLAG_YES )
				{
					$fields = array(
						'emp_id' 	=> $data['emp_id'],
						'date' 		=> $data['date'],
						'type' 		=> UNDERTIME,
						'mins' 		=> $is_undertime[1]
					);

					$this->db->insert('emp_tardiness',$fields);
				}
			}

			# LATE, UNDERTIME AND ABSENCES DETECTION
			
			$text = "Timed In!";				
		

 			$title 	= "Success!";
 			$icon 	= 'success';	


			$result = array(
				"title" => $title , 
				"text" => $text ,
				"icon" => $icon ,
				"buttons" => $buttons
			);

			echo json_encode($result);
		}
		catch(Exception $e)
		{
			$this->handle_catch($e);
		}
	}

	/*
		LEAVE CREDIT POINTS
	*/

	public function process_credit_points(){
		try{


			$data['email_address'] = $this->Admin_time_keeping_model->get_email();
			$email = $data['email_address'];
			
			$emails="";
			foreach ($email as $row) {   
				$emails .= $row->email_address.'|';
			}
			$this->Admin_time_keeping_model->insert_credit_points_data($emails);
		}
		catch(Exception $e)
		{
			$this->handle_catch($e);
		}
	}
}
