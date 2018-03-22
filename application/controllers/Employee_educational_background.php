<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_educational_background extends CI_Controller {


	public function index()
	{
		
		$this->load->view('admin/employee_form/employee_educational_background');

	}

	public function saveeduc(){

		try{
			$this->form_validation->set_rules('name_of_school[]','Name of School','required');
			$this->form_validation->set_rules('basic_educ[]','Secondary','required');
			$this->form_validation->set_rules('date_from[]','From','required');
			$this->form_validation->set_rules('date_to[]','To','required');
			$this->form_validation->set_rules('highest_level[]','Highest Level','required');
			$this->form_validation->set_rules('year_graduated[]','Year Graduated','required');
			$this->form_validation->set_rules('scholarship[]','Scholarship','required');
			
			if($this->form_validation->run()){
				$this->load->model('Educ_background_model');
				$data = $this->input->post();

				foreach($data as $fkey => $fvalue ){
				  $ids []= $this->Educ_background_model->register($fvalue);//$Ids is array of returned id
				}

				unset($data['submit']);
				if($this->Educ_background_model->register($data)){
					$this->session->set_flashdata('response','Registered Succesfully');
				}else{
					$this->session->set_flashdata('response','Registered Failed');
				}
				return redirect('employee_educational_background');
			}else{
				echo $this->index();
			}
		}catch(Exception $e){
			throw $e;
		}
	}
}
