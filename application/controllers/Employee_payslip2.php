<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_payslip2 extends CI_Controller {

	public function index(){

		$this->load->view('admin/employee_form/employee_payslip2');
	}
}