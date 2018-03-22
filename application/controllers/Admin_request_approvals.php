<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_request_approvals extends CI_Controller {


	public function index()
	{
		$data['title'] = "Request Approvals";

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_request_approvals',$data);
		$this->load->view('admin/template/footer',$data);
	}

}
