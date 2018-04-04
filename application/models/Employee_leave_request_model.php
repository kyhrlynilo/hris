<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_leave_request_model extends CI_Model {
	
	function insert_data($values)
	{
		try
		{
			$this->db->insert("emp_leave_request",$values);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	public function get_data()
	{
		try
		{
			$query = $this->db->get("emp_leave_request");
			return $query;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	function update_data($id,$values)
	{
		try
		{
			$this->db->where("id",$id)->update("emp_leave_request",$values);
			$db_error = $this->db->error();
			if ($db_error['code'] != 0) {
					throw new Exception('Database error! ' .$db_error['message']);
	            return false; // unreachable retrun statement !!!
	        }
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function get_single_data($email_address)
	{
		try
		{
			$this->db->where('email_address', $email_address);  
			$query = $this->db->get("emp_leave_request");  
			return $query;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}


	public function delete_data($id)
	{
		try
		{
			$this->db->where('id',$id)->delete('emp_leave_request');
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function get_last_id()
	{
		$sql = $this->db->select('id')
		->from('emp_leave_request')
		->limit(1)
		->order_by('id','desc')
		->get()->result();

		$last_id = 0;
		foreach($sql as $key):
			$last_id = $key->id;
		endforeach;

		return $last_id;
	}

}