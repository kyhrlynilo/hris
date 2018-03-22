<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {


	public function index()
	{
		$data['title'] = "Employee";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee',$data);
		$this->load->view('employee/template/footer',$data);
	}

}
