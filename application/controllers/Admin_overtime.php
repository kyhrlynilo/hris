<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_overtime extends CI_Controller {


	public function index()
	{
		$data['title'] = "Overtime";
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_overtime',$data);
		$this->load->view('admin/template/footer',$data);
	}



}
