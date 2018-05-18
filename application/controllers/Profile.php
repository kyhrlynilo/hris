<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/*
	(
		[__ci_last_regenerate]
		[identity]
		[email]
		[user_id]
		[old_last_login]
		[last_check]
	)
	
	stdClass Object
	(
		[id] => 20
		[emp_id] => NK810200000
		[last_name] => Nilo
		[first_name] => Kyle Harley
		[mid_name] => Lumbang
		[birth_date] => 20 August, 1996
		[birth_place] => Makati City
		[gender] => Male
		[civil_status] => Single
		[citizenship] => Filipino
		[citizenship_type] => By Birth
		[address] => Makati City
		[email_address] => admin@admin.com
		[cellphone_number] => 
		[department] => CCS
		[emp_status] => Regular
		[emp_type] => Faculty
		[active_flag] => Y
	)
	*/

	public function __construct()
	{
		parent::__construct();

	
		
		if (!$this->ion_auth->logged_in())
		{
			$location = base_url();
			header("Location: $location");
		}
		else
		{			
			$data = $this->session->get_userdata('user_info'); 	
			$this->group = $data['user_info']['group_id'];
		}

	}
	public function index()
	{
		$data['title'] = "Profile";
		
		$data['color'] = $this->group == GROUP_ADMIN ? "blue" : "grey";
		$session = $this->session->get_userdata('user_info'); 	
		$data = array_merge($data, (array) $session['user_info'] );
		$header_path = $this->group == GROUP_ADMIN ? "admin/template/header" : "employee/template/header"; 
		$footer_path = $this->group == GROUP_ADMIN ? "admin/template/footer" : "employee/template/footer"; 

		$this->load->view($header_path,$data);
		$this->load->view('common/profile',$data);
		$this->load->view($footer_path,$data);
	}

}

