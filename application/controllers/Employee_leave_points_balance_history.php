<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_leave_points_balance_history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Employee_leave_points_balance_history_model");
	}
	
	public function index()
	{	
		$data['user_email'] = $this->ion_auth->user()->row()->email;
		$data['title'] = "Employee Leave Points Balance History";
		$email = $data['user_email'];
		$data['fetch_data'] = $this->Employee_leave_points_balance_history_model->fetch_data($email);
	//	$data['user_data'] = $this->Admin_time_keeping_model->get_single_employee($user_id);

		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_leave_points_balance_history',$data);
		$this->load->view('employee/template/footer',$data);
	}

}
