<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_leave extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Employee_leave_request_model");
		$this->load->model("Employee_leave_points_balance_history_model");
	}

	public function index()
	{	$data['user_email'] = $this->ion_auth->user()->row()->email;
		//$data['email_address'] = $this->ion_auth->user()->row()->email;
		$data['fetch_data'] = $this->Employee_leave_request_model->get_single_data($data['user_email']);
		$user_email = $data['user_email'];
		$data['user_vlp_data'] = $this->Employee_leave_points_balance_history_model->get_single_employee_vacation_leave_points($user_email);
		$data['user_slp_data'] = $this->Employee_leave_points_balance_history_model->get_single_employee_sick_leave_points($user_email);


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

		$this->form_validation->set_rules('agency','Agency','required');
		$this->form_validation->set_rules('dept_office','Depertment/Office','required');
		$this->form_validation->set_rules('full_name','Full name','required');
		$this->form_validation->set_rules('date_filed','Date of filing','required');
		$this->form_validation->set_rules('position','Position','required');
		$this->form_validation->set_rules('stat_of_appt','Status of Appointment','required');
		$this->form_validation->set_rules('salary','Salary','required');
		$this->form_validation->set_rules('leave_type','Type of Leave','required');
		$this->form_validation->set_rules('total_days','number of days','required');
		$this->form_validation->set_rules('date_from','Start date','required');
		$this->form_validation->set_rules('date_to','End Date','required');
		$this->form_validation->set_rules('commutation','Commutation','required');
		
		if($this->form_validation->run()){
			$data = array(
				"agency" =>$this->input->post("agency",TRUE),
				"dept_office" =>$this->input->post("dept_office",TRUE),
				"full_name" =>$this->input->post("full_name",TRUE),
				"date_filed" =>$this->input->post("date_filed",TRUE),
				"position" =>$this->input->post("position",TRUE),
				"stat_of_appt" =>$this->input->post("stat_of_appt",TRUE),
				"salary" =>$this->input->post("salary",TRUE),
				"leave_type" =>$this->input->post("leave_type",TRUE),
				"total_days" =>$this->input->post("total_days",TRUE),
				"date_from" =>$this->input->post("date_from",TRUE),
				"date_to" =>$this->input->post("date_to",TRUE),
				"commutation" =>$this->input->post("commutation",TRUE),
				"image_file" =>$this->upload_image()
			);
			
			if(isset($_POST['reason'])){
				$data['reason'] = $this->input->post("reason",TRUE);
			}
			if(isset($_POST['specific_place'])){
				$data['specific_place'] = $this->input->post("specific_place",TRUE);
			}
			if(isset($_POST['place_leave_spent'])){
				$data['place_leave_spent'] = $this->input->post("place_leave_spent",TRUE);
			}
			
			$data['email_address'] = $this->ion_auth->user()->row()->email;
			$data['emp_id'] = $this->generate_employee_id($data);

			$this->Employee_leave_request_model->insert_data($data);
		}else{
			echo validation_errors();	
		}
		
	}

	function upload_image(){
		if(isset($_FILES["image_file"])){
			$extension = explode('.',$_FILES['image_file']['name']);
			$new_name = rand() . '.' .$extension[1];
			$destination = './uploads/'.$new_name;
			move_uploaded_file($_FILES['image_file']['tmp_name'], $destination);
			return $new_name;
		}
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
