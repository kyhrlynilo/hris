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

	public function reports_hrmo_certificate()
	{
		$data['title'] = "Employee Document Request";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_document_requests_reports_hrmo_certificate',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function reports_hrmo_certificate_employment_compensation()
	{
		$data['title'] = "Employee Document Request";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_document_requests_reports_hrmo_certificate_employment_compensation',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function reports_service_record()
	{
		$data['title'] = "Employee Document Request";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee_document_requests_reports_service_record',$data);
		$this->load->view('employee/template/footer',$data);
	}

}
