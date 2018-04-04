<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Teves_test extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model("Test_model","model");

 	}

 	public function index()
 	{

 		$data['title'] = "Test";
 		$data['data_list'] = $this->model->get_data();

 		$this->load->view('admin/template/header',$data);
 		$this->load->view('test/teves_test_table',$data);
 	}

 	public function insert_form()
 	{

 		$data['title'] = "Test";
 		//$data['data_list'] = $this->model->get_data();

 		$this->load->view('admin/template/header',$data);
 		$this->load->view('test/teves_test',$data);
 	}

	public function update_form($id)
	{	

		if($id == null OR empty($id))
			throw new Exception("Parameter Error", 1);

		$data['title'] = "Edit Employee";
		$data['data_list'] = $this->model->get_single_data($id);
		$this->load->view('admin/template/header',$data);
 		$this->load->view('test/teves_test_update',$data);
	}

 	public function insert()
 	{
 		$buttons 	= array( "success" => "Okay" );
 		try
 		{	
 			$data = $this->get_params();

 			echo "<pre>"; print_r($data); exit();
 			
 			/*$required_fields = array(
 						'type', 						
 						'effective_on',
 						'effective_until',
 						'days',
 						'time_start',
 						'time_end'
 					);

 			$this->validate_data($required_fields,$data);*/

 			$data['date_created'] = date("Y-m-d H:m:s");

			if(empty($data['id']))
			{
				$this->model->insert_data($data);
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















