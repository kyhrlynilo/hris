<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_employees extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_employees_model","model");

		if( !$this->ion_auth->logged_in() ) 
		{
			redirect('Admin/login', 'refresh');
		}
		
	}

	public function index()
	{

		$data['title'] = "Employees";
		$breadcrumbs = [
			"Employees" 
		];
		$data['employee_list'] = $this->model->get_employees();

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_employees',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function employee_profile($id)
	{

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);
			

		$data['title'] = "Employee Profile";
		$data['employee'] = $this->model->get_single_employee($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_employees_profile',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function add_employee()
	{			


		$data['title'] = "Add Employee";
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_employee_add',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function edit_employee($id)
	{	

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);

		$data['title'] = "Edit Employee";
		$data['employee'] = $this->model->get_single_employee($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_employee_edit',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function process_employee()
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			$data = $this->get_params();
			
			if($data['citizenship'] == DUAL)
			{
				$data['citizenship'].= isset($data['country']) ? " " .ucwords($data['country']) : ""; 
				unset($data['country']);
			}

			$required_fields = array('first_name','last_name','sex','civil_status','date_of_birth');
			
			$this->validate_data($required_fields,$data);			
			
			if(empty($data['id']))
			{
				$this->model->insert_employee($data);
				$text = "Employee has been added!";
			}
			else
			{
				$id = $data['id'];
				unset($data['id']);
				$this->model->update_employee($id,$data);
				$text = "Employee has been updated!";				
			}

			
	
			$icon = "success";		
			$title = "Sucess";
		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Try Again" );
		}
	

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons
		);	

		echo json_encode($result);		
	}

	public function delete_employee($id = "")
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			if( !$this->ion_auth->logged_in() OR $id == null) 			
				throw new Exception("Nice try", 1);				
			
			$this->model->delete_employee($id);
			$title = "Success!";
			$text = "Employee has been deleted.";
			$icon = "success";

		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Okay" );
		}

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons 
		);	

		echo json_encode($result);		
	}
}

 
 
 
 
 
 
 
 
 
 
 
 


