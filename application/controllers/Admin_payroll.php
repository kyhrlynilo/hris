<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_payroll extends CI_Controller {


	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_payroll',$data);
		$this->load->view('admin/template/footer',$data);
	}

	


}
