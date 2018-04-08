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

		public function training_form()
	{

		$data['title'] = "Add Employee";
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_training_form',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function insert()
 	{
 		$buttons 	= array( "success" => "Okay" );
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
			/*if( !$this->ion_auth->logged_in() OR $id == null) 			
				throw new Exception("Nice try", 1);	*/			
			
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

}
