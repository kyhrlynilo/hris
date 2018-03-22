<?php

class Educ_background_model extends CI_Model {
	
	public function register($data){
		try
		{
			$data = array(
			'level'=>$this->input->post('level'),
		    'name_of_school'=>$this->input->post('name_of_school'),
		    'basic_educ'=>$this->input->post('basic_educ'),
		    'date_from'=>$this->input->post('date_from'),
		    'date_to'=>$this->input->post('date_to'),
			'highest_level'=>$this->input->post('highest_level'),
		 	'year_graduated'=>$this->input->post('year_graduated'),
		 	'scholarship'=>$this->input->post('scholarship'));

			//	return $this->db->insert('educ_background',$data);;
			return $this->db->insert('educ_background',$data);
			//	 $this->db->insert('feature',array('column_name'=>$fvalue));//specify column name
		}catch(Exception $e)
		{
			throw $e;
		}
	}
}
?>