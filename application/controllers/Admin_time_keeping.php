<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_time_keeping extends CI_Controller {


	public function index()
	{
		$data['title'] = "Time Keeping";

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function add_employee()
	{
		
	}
}
