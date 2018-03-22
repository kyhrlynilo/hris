<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_document_requests extends CI_Controller {


	public function index()
	{
		$data['title'] = "Employee Document Request";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_document_requests',$data);
		$this->load->view('employee/template/footer',$data);
	}



}
