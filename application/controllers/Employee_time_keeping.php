<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_time_keeping extends CI_Controller {


	public function index()
	{
		$data['title'] = "Employee Time Keeping";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_time_keeping',$data);
		$this->load->view('employee/template/footer',$data);
	}



}
