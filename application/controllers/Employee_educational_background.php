<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_educational_background extends CI_Controller {


	public function index()
	{
		
		$this->load->view('admin/employee_form/employee_educational_background');

	}

	public function saveeduc(){

		$validation = array(
			array('field'=>'name_of_school[]','rules'=>'required'),
			array('field'=>'basic_educ[]','rules'=>'required'),
			array('field'=>'date_from[]','rules'=>'required'),
			array('field'=>'date_to[]','rules'=>'required'),
			array('field'=>'highest_level[]','rules'=>'required'),
			array('field'=>'year_graduated[]','rules'=>'required'),
			array('field'=>'scholarship[]','rules'=>'required'),
		);

		$this->form_validation->set_rules($validation);
		if($this->form_validation->run()==true){
			$this->load->model('Educ_background_model');
		
			$name_of_school = $this->input->post('name_of_school[]');
			$basic_educ = $this->input->post('basic_educ[]');
			$date_from = $this->input->post('date_from[]');
			$date_to = $this->input->post('date_to[]');
			$highest_level = $this->input->post('highest_level[]');
			$year_graduated = $this->input->post('year_graduated[]');
			$scholarship = $this->input->post('scholarship[]');
			$value = array();


			for($i = 0;$i<count($name_of_school);$i++){
				$value[$i] = array(
					'level' => $i+1,
					'name_of_school' => $name_of_school[$i],
					'basic_educ' => $basic_educ[$i],
					'date_from' => $date_from[$i],
					'date_to' => $date_to[$i],
					'highest_level' => $highest_level[$i],
					'year_graduated' => $year_graduated[$i],
					'scholarship' => $scholarship[$i],
				);
			}
			
			if($this->Educ_background_model->register($value)){
				$this->session->set_flashdata('msg','save');
			}else{
				$this->session->set_flashdata('msg','Failed');
			}

			redirect('employee_educational_background');
		
	}
}
}