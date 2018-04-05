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
 			$ots = $this->Admin_time_keeping_model->get_honorariums($data['emp_id']);
 			$this->validate_time_schedule( $ots, [ $data['effective_on'], $data['effective_until'] ], $data['days'], $time_start, $time_end );

 			# end of conflict validations
 			 			
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

	public function validate_time_schedule( $ots, $dates, $days, $time_start, $time_end )
	{
		/*$days = explode(",", $days);
		$this->load->view('common/dtr_computations');
		$date_from 	= date('Y-m-d', strtotime($dates[0]));
		$date_to 	= date('Y-m-d', strtotime($dates[1]));

		$sched = get_daily_schedule( $ots,  );
		
		exit;*/

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

	
}
