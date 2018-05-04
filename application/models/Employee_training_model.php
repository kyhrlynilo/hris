<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_training_model extends CI_Model
{
	function insert_training($values)
	{
		try
		{
			$this->db->insert("trainings",$values);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	

}