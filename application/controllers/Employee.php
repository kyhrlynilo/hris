<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {


	public function index()
	{	
		$data['user_email'] = $this->ion_auth->user()->row()->email;
		$data['title'] = "Employee";
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/employee',$data);
		$this->load->view('employee/template/footer',$data);
	}

	public function add_info()
	{
		$data['title'] = "Employee";
		
		$this->load->view('employee/template/header',$data);
		$this->load->view('admin/employee_form/employee_family_background',$data);
		$this->load->view('admin/employee_form/employee_educational_background',$data);
		$this->load->view('admin/employee_form/employee_civil_service_eligibility',$data);
		$this->load->view('admin/employee_form/employee_work_experience',$data);
		$this->load->view('admin/employee_form/employee_voluntary_work',$data);
		$this->load->view('admin/employee_form/employee_l_and_d',$data);
		$this->load->view('admin/employee_form/employee_other_info',$data);
		$this->load->view('employee/template/footer',$data);
	}

}
