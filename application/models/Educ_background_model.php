<?php

class Educ_background_model extends CI_Model {
	
	public function register($data){
		
			return $this->db->insert_batch('educ_background',$data);
		
	}
}
?>