<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_time_keeping extends CI_Controller {

	
	public function index()
	{

		$this->load->model("Admin_time_keeping_model");
		$data['fetch_data'] = $this->Admin_time_keeping_model->fetch_data();
		$data['title'] = "Time Keeping";

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function employee_profile($id){

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);
			
		
		$data['title'] = "View Time Keeping";
		$user_id = $this->uri->segment(3);
		$this->load->model("Admin_time_keeping_model");
		$data['user_data'] = $this->Admin_time_keeping_model->get_single_employee($user_id);

	
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_view',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function add_employee()
	{
 		$data['title'] = "Admin Time Keeping";
 		$data['uniqid'] = $this->getToken(10);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_add',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function edit_employee($id)
	{
	
		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);
		$data['title'] = "Edit Employee";
		$user_id = $this->uri->segment(3);
		$this->load->model("Admin_time_keeping_model");
		$data['user_data'] = $this->Admin_time_keeping_model->get_single_employee($user_id);
		$data['fetch_data'] = $this->Admin_time_keeping_model->fetch_data();

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_edit',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function view_employee()
	{
		//employe tables here
	}

	public function delete_employee()
	{

		$this->load->model('Admin_time_keeping_model');

		$data['active_flag'] = "N";
		$id = $this->uri->segment(3);;
		$this->Admin_time_keeping_model->update_data($data,$id);
		$this->index();	
	}

	public function form_validation(){
	
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('mid_name','Middle Name','required');
		$this->form_validation->set_rules('birth_date','Birth Date','required');
		$this->form_validation->set_rules('birth_place','Birth Place','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('civil_status','Civil Status','required');
		$this->form_validation->set_rules('citizenship','Citizenship','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('email_address','Email Address','required');
		$this->form_validation->set_rules('cellphone_number','Cellphone Number','required');
		$this->form_validation->set_rules('department','Department','required');
		$this->form_validation->set_rules('emp_type','Employment Type','required');
		$this->form_validation->set_rules('emp_status','Employment Status','required');

		if($this->form_validation->run()){
			$this->load->model('Admin_time_keeping_model');
			//$data = $this->input->post();

			$data = array(
				"id"				=>$this->input->post("hidden_id"),
				"emp_id"			=>$this->input->post("emp_id"),
				"last_name"			=>$this->input->post("last_name"),
				"first_name"		=>$this->input->post("first_name"),
				"mid_name"			=>$this->input->post("mid_name"),
				"birth_date"		=>$this->input->post("birth_date"),
				"birth_place"		=>$this->input->post("birth_place"),
				"gender"			=>$this->input->post("gender"),
				"civil_status"		=>$this->input->post("civil_status"),
				"citizenship"		=>$this->input->post("citizenship"),
				"citizenship_type"	=>$this->input->post("citizenship_type"),
				"address"			=>$this->input->post("address"),
				"email_address"		=>$this->input->post("email_address"),
				"cellphone_number"	=>$this->input->post("cellphone_number"),
				"department"		=>$this->input->post("department"),
				"emp_type"			=>$this->input->post("emp_type"),
				"emp_status"		=>$this->input->post("emp_status")
			);
		
			if($data['citizenship'] == DUAL)
			{	
				$data['citizenship_type'] = "";
				$data['citizenship'] .= " ". $this->input->post("country"); 
				unset($data['country']);
			}
			
			if (is_null($data['id']))
			{  	
				$this->Admin_time_keeping_model->insert_data($data);
			}
			else
			{	
				$id = $data['id'];
				unset($data['hidden_id']);
				$this->Admin_time_keeping_model->update_data($data,$id);
			}
			$this->index();		
		}else{
			$this->index();
		}
	}

	function crypto_rand_secure($min, $max){
	    $range = $max - $min;
	    if ($range < 1) return $min; // not so random...
	    $log = ceil(log($range, 2));
	    $bytes = (int) ($log / 8) + 1; // length in bytes
	    $bits = (int) $log + 1; // length in bits
	    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
	    do {
	        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
	        $rnd = $rnd & $filter; // discard irrelevant bits
	    } while ($rnd > $range);
	    return $min + $rnd;
	}

		function getToken($length)
	{
	    $token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet.= "0123456789";
	    $max = strlen($codeAlphabet); // edited

	    for ($i=0; $i < $length; $i++) {
	        $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
	    }

	    return $token;
	}


}
