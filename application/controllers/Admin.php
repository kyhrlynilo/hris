<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		$data['title'] = "Personal Data";

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin',$data);
		$this->load->view('admin/template/footer',$data);
		/*if( !$this->ion_auth->logged_in() ) 
		{
			redirect('Admin/login', 'refresh');
		}*/
	}

	public function login()
	{
		$data['title'] = "Login";
		$this->load->view('admin/login',$data);
	}

	public function authenticate()
	{
		$title = "";
		$text = "";
		$icon = "";
		$button = "Okay";
		try
		{
			$params = $this->input->post("data",true);
			$data 	= $this->get_params($params);
			
			$required_fields = array('email','password');		
			$this->validate_data($required_fields,$data);	

			if ($this->ion_auth->login($data['email'], $data['password'], FALSE /*$remember*/))
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				$id = $this->ion_auth->user()->row()->id;
				$groups = $this->ion_auth->get_users_groups($id)->result();
				$group_id = $groups[0]->id;
			
				$title = "Authentication successful!";
				$text = $group_id == 1 ? "Hello Admin!" : "Hello Employee!";
				$icon = "success";
				$button = FALSE;
				$data 	= (array) $this->User_model->get_user_data($this->session->userdata('email'));
				$group 	= $this->ion_auth->get_users_groups($this->session->userdata('user_id'))->result();
				foreach($group as $grp)
				{		
					$data['group_id'] = $grp->id;
				}
				$_SESSION['user_info'] = $data;
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				$title = "Authentication failed!";
				$icon = "error";
				$text = "Email and password do not match!";
			}

		}
		catch(Exception $e)
		{
			$title = "Error";
			$text = $e->getMessage();
			$icon = "error";
		}


		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"button" => $button
		);	
		echo json_encode($result);		
	}


}
