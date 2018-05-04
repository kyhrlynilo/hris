<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_leave extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Admin_leave_request_employees_model");
	}

	public function index()
	{
		$data['title'] = "Employees Leave Request";
		$data['fetch_data'] = $this->Admin_leave_request_employees_model->get_pending_data();

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_leave',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function approve_leave_request(){
	

		if($this->input->post("status") === 'Disapproved'){
			$this->form_validation->set_rules('dsapr_reason','Disapproved Reason','required');
			if($this->form_validation->run()){
					$this->load->model('Admin_leave_request_employees_model');
				$data =array( 
					"status"		=>	$this->input->post("status"),
					"id"			=>	$this->input->post("hidden_id"),
					"dsapr_reason"	=>	$this->input->post("dsapr_reason")); 
			
				$id = $data['id'];
				$this->Admin_leave_request_employees_model->update_data($data,$id);
				redirect('admin_leave','refresh');
			}else{
				echo validation_errors();	
			}
		}else{
				$data =array( 
					"status"		=>	$this->input->post("status"),
					"id"			=>	$this->input->post("hidden_id"),
					"dsapr_reason"	=>	$this->input->post("dsapr_reason")); 
			
				$id = $data['id'];
				$this->Admin_leave_request_employees_model->update_data($data,$id);
				redirect('admin_leave','refresh');
		}

	}

	public function employee_leave_request($id){

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);
			
		$data['title'] = "Employee Leave Request";
		$user_id = $this->uri->segment(3);
		$this->load->model("Admin_time_keeping_model");
		$data['user_data'] = $this->Admin_leave_request_employees_model->get_single_employee($user_id);
		$data['user_vlp_data'] = $this->Admin_leave_request_employees_model->get_single_employee_vacation_leave_points($user_id);
		$data['user_slp_data'] = $this->Admin_leave_request_employees_model->get_single_employee_sick_leave_points($user_id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_leave_request_view',$data);
		$this->load->view('admin/template/footer',$data);
	}
}
