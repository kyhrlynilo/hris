<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_training extends CI_Controller {


		public function __construct()
	{
		parent::__construct();
		$this->load->model("Employee_training_model","model");
	}


	public function index()
	{
		$data['title'] = "Employee";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_trainings',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function training_logs()
	{
		$data['title'] = "Employee";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_training_logs',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function training_anonuncement()
	{
		$data['title'] = "Employee";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_training_anouncement',$data);
		$this->load->view('employee/template/footer',$data);
	}




}
