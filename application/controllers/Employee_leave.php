<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_leave extends CI_Controller {


	public function index()
	{
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


}
