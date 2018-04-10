<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_time_keeping_model extends CI_Model {
	
	public function get_employee_id_by_email($email)
	{
		try
		{
			$sql = $this->db->select()->from('emp_timekeeping_details')->where('email_address',$email)->get()->result();
			$emp_id = "";
			foreach($sql as $key)
			{
				$emp_id = $key->emp_id;
			}

			return $emp_id;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}	

}