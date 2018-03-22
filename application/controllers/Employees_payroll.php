<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employees_payroll extends CI_Controller {

	public function index(){

		$this->load->view('admin/employee_form/employees_payroll');
	}
}