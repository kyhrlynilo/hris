<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_leave extends CI_Controller {


	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_leave',$data);
		$this->load->view('admin/template/footer',$data);
	}
/*scds*/

}
