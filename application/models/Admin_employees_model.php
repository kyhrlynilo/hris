<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_employees_model extends CI_Model
{
	function insert_employee($values)
	{
		try
		{
			$this->db->insert("emp_info",$values);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	function update_employee($id,$values)
	{
		try
		{
			$this->db->where("id",$id)->update("emp_info",$values);
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

	public function get_employees(/*$rows, $offset*/)
	{
		try
		{
			$fields = "";
			$employees = $this->db->select($fields)->from("emp_info")->get()->result();

			return $employees;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}


	public function get_single_employee($id)
	{
		try
		{
			$fields = "";
			$employees = $this->db->select($fields)->from("emp_info")->where("id",$id)->get()->result();

			return $employees;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function delete_employee($id)
	{
		try
		{
			$this->db->where('id',$id)->delete('emp_info');
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
}