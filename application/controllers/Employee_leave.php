<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_leave extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Employee_leave_request_model");
	}

	public function index()
	{

		$data['email_address'] = "marlontaguicana@gmail.com";
		$data['fetch_data'] = $this->Employee_leave_request_model->get_single_data($data['email_address']);
		/*	echo '<pre>';
			print_r($data);
			echo '</pre>';
			exit();*/
		$data['title'] = "Employee Leave";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_leave',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function request_leave()
	{
		$data['title'] = "Employee Leave Request";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_leave_request',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function process_leave(){

		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		$this->form_validation->set_rules('leave_type','Leave Type','required');
		$this->form_validation->set_rules('reason','Reason','required');
		$this->form_validation->set_rules('date_from','Start Date','required');
		$this->form_validation->set_rules('date_to','End Data','required');
		$this->form_validation->set_rules('leave_hr_day','Leave hour per day','required');

		if($this->form_validation->run()){
			
			$data = array(
				"email_address" =>$this->input->post("hdn_email_address",TRUE),
				"leave_type" =>$this->input->post("leave_type",TRUE),
				"reason" =>$this->input->post("reason",TRUE),
				"date_from" =>$this->input->post("date_from",TRUE),
				"date_to" =>$this->input->post("date_to",TRUE),
				"leave_hr_day" =>$this->input->post("leave_hr_day",TRUE)
			);
			$data['emp_id'] = $this->generate_employee_id($data);
			$data['total_hrs'] = $this->calculate_total_hrs($data);

			$this->Employee_leave_request_model->insert_data($data);

			$text = "Leave Request has been sent!";
			$icon = "success";		
			$title = "Sucess";
			redirect('employee_leave','refresh');	
		}else{
			echo validation_errors();	
		}

		/*$buttons 	= array( "success" => "Okay" );
		try
		{	
			$data = $this->get_params();
			

			$required_fields = array('leave_type','reason','date_from','date_to','leave_hr_day');
		
			$this->validate_data($required_fields,$data);
			//Do any process here.  
			echo '<pre>';
			print_r($data);
			echo '</pre>';
			exit();
			
			$this->load->model('Employee_leave_request_model');
			$this->Employee_leave_request_model->insert_data($data);


			$title 	= "Some success title.";
			$text 	= "Some success message.";
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
		}*/

	}

	function generate_employee_id($data)
	{
		$date 			= date('Y-m-d');
		$append 		= substr($date,0,4);
		$append 		= strrev($append);
		$suffix 		= $this->Employee_leave_request_model->get_last_id();
		$suffix 		= str_pad($suffix, 5, "0", STR_PAD_LEFT);
		$employee_id  	= substr($data['email_address'],0,1).$append.$suffix;		

		return $employee_id;
	}

	function calculate_total_hrs($data){
	
		$date1 = new DateTime($data['date_from']);
		date_format($date1,"Y-m-d");
		$date2 = new DateTime($data['date_to']);
		date_format($date2,"Y-m-d");

	 	$diff = $date2->diff($date1)->format("%a");
		
		$diff = ($diff+1) * $data['leave_hr_day'];

		return $diff;
	}
}
