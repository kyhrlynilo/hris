<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_training extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_training_model","model");
	}

	public function index()
	{

		$data['title'] = "Training";
		$data['data_list'] = $this->model->get_data();
		$data['employee_list'] = $this->model->get_data_employee();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function training_form()
	{

		$data['title'] = "Training Form";
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_form',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function training_update_form($id)
	{	

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);

		$data['title'] = "Update Training";
		$data['data_list'] = $this->model->get_single_data($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_form_update',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function training_details($id)
	{	

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);

		$data['title'] = "Training Details";
		$data['data_list'] = $this->model->get_single_data($id);
		$data['emp_list'] = $this->model->get_single_emp_data($id);
		$data['form_id'] = $this->uri->segment(3);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_details',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function insert()
	{
		$buttons = array( "success" => "Okay" );
		try
		{	
			$data = $this->get_params();


			if(empty($data['id']))
			{
				$this->model->insert_training($data);
				$text = "Successfully Added!";
			}
			else
			{
				$id = $data['id'];
				unset($data['id']);
				$this->model->update_data($id,$data);
				$text = "Successfully Updated!";				
			}

			$title 	= "Some success title.";
			$text 	= "Some success message.";
			$icon 	= 'success';	


			$result = array(
				"title" => $title , 
				"text" => $text ,
				"icon" => $icon ,
				"buttons" => $buttons
			);

			echo json_encode($result);
		}
		catch(Exception $e)
		{
			$this->handle_catch($e);
		}
	}

	public function delete_data($id = "")
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			
			$this->model->delete_data($id);
			$title = "Success!";
			$text = "School load has been deleted.";
			$icon = "success";

		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Try again" );
		}

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons 
		);	

		echo json_encode($result);		
	}


	public function remove_trainee($id = "")
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			
			$this->model->delete_trainee($id);
			$title = "Success!";
			$text = "School load has been deleted.";
			$icon = "success";

		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Try again" );
		}

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons 
		);	

		echo json_encode($result);		
	}

		public function add_employee_training()
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			$data = $this->get_params();
			
			/*if($data['citizenship'] == DUAL)
			{
				$data['citizenship'].= isset($data['country']) ? " " .ucwords($data['country']) : ""; 
				unset($data['country']);
			}

			$required_fields = array('first_name','last_name','sex','civil_status','date_of_birth');
			
			$this->validate_data($required_fields,$data);			
			*/
		/*	echo "<pre>";
			print_r($data);
			echo "</pre>";
			exit();
*/
			
			if(empty($data['id']))
			{
				$this->model->add_employee_training($data);
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



	public function reports(){

		$data['title'] = "Reports";
		/*$data['data_list'] = $this->model->get_data();
		$data['employee_list'] = $this->model->get_data_employee();*/
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_reports',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function anouncement(){

		$data['title'] = "Anouncement";
		$data['data_list'] = $this->model->get_data_anouncement();
		/*$data['employee_list'] = $this->model->get_data_employee();*/
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_anouncement',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function admin_training_anouncement_form(){

		$data['title'] = "Form";
		$data['data_list'] = $this->model->get_data();
		/*$data['employee_list'] = $this->model->get_data_employee();*/
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_anouncement_form',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function training_insert($id)
	{
	
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			$data = $this->get_params();

			$required_fields = array('training_id','anouncement');
			
			$this->validate_data($required_fields,$data);			

			if(empty($data['id']))
			{
				$this->model->insert_training_anouncement($data);
				$text = "Anouncement has been added!";
			}
			else
			{
				$id = $data['id'];
				unset($data['id']);
				$this->model->update_training_anouncement($id,$data);
				$text = "Anouncement has been updated!";				
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


	public function training_update_form_anouncement($id)
	{	

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);

		$data['title'] = "Update Training";
		$data['data_list'] = $this->model->get_data();
		$data['update_data_list'] = $this->model->get_single_data_anouncement($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_anouncement_form_update',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function delete_data_announcement($id = "")
	{
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			
			$this->model->delete_training_anouncement($id);
			$title = "Success!";
			$text = "Anouncement has been deleted.";
			$icon = "success";

		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
			$buttons = array( "error" => "Try again" );
		}

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons 
		);	

		echo json_encode($result);		
	}

	public function employee_trainings(){

		$data['title'] = "Employee List";
		//$data['data_list'] = $this->model->get_data_anouncement();
		/*$data['employee_list'] = $this->model->get_data_employee();*/
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_employee',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function training_adding_trainees($id){

		$data['title'] = "Adding trainees";
		$data['training_name'] = $this->model->get_training_data($id);
		$data['employeee_list'] = $this->model->training_get_employee($id);
		$data['form_id'] = $this->uri->segment(3);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_adding_trainees',$data);
		$this->load->view('admin/template/footer',$data);

	}

	public function add_trainees($id)
	{
	
		$title 	= "";
		$text 	= "";
		$icon 	= "";
		$buttons = array( "success" => "Okay" );

		try
		{
			$data = $this->get_params();

	
			/*$required_fields = array('training_id','emp_id');
			
			$this->validate_data($required_fields,$data);			
*/
			if(empty($data['id']))
			{
				$this->model->add_employee_training($data);
				$text = "Anouncement has been added!";
			}
			else
			{
				$id = $data['id'];
				unset($data['id']);
				//$this->model->update_training_anouncement($id,$data);
				$text = "Anouncement has been updated!";				
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
}
