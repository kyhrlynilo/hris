<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_time_keeping_model");
	}
	
	public function index()
	{	
		$data['title'] = "Test";
		$this->load->view('admin/template/header',$data);
		$this->load->view('test/test',$data);
	}

	public function some_test_process()
	{
		$buttons 	= array( "success" => "Okay" );
		try
		{	
			$data = $this->get_params();
	
			$required_fields = array('some_input');
		
			$this->validate_data($required_fields,$data);
			//Do any process here.  
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
}