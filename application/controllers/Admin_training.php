<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_training extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model("Admin_employees_model","model");

	}

	public function index()
	{

		$data['title'] = "Training";
		//$data['employee_list'] = $this->model->get_employees();

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training',$data);
		$this->load->view('admin/template/footer',$data);
	}


}
