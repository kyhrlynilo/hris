<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_training_model extends CI_Model
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

		public function get_data()
	{
		try
		{
			$fields = "";
			$data = $this->db->select($fields)->from("trainings")->get()->result();

			return $data;
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
			$this->db->where('id',$id)->delete('trainings');
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	public function get_single_data($id)
	{
		try
		{
			$fields = "";
			$data = $this->db->select($fields)->from("trainings")->where("id",$id)->get()->result();

			return $data;
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
			$this->db->where("id",$id)->update("trainings",$values);
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


}