<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_overtime extends CI_Controller {


	public function index()
	{
		$data['title'] = "Employee Overtime";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_overtime',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function request_overtime()
	{
		$data['title'] = "Employee Overtime Request";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_overtime_request',$data);
		$this->load->view('employee/template/footer',$data);
	}


}
