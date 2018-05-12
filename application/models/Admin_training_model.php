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

	public function get_data_employee()
	{
		try
		{
			$fields = "";
			//$data = $this->db->select($fields)->from("emp_info")->get()->result();
			$data = $this->db->query("SELECT CONCAT(last_name,' ,',first_name,' ',mid_name) as fullname , cs_id_no from emp_info where cs_id_no not in(SELECT emp_id from training_employees)")->result();
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
	public function delete_trainee($id)
	{
		try
		{
			$this->db->where('id',$id)->delete('training_employees');
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
	public function get_single_emp_data($id)
	{
		try
		{
			$fields = "";
			$data = $this->db->query("SELECT training_employees.id ,CONCAT(emp_info.last_name,', ',emp_info.first_name,' ',emp_info.mid_name) as fullname , training_employees.emp_id from emp_info join training_employees ON emp_info.cs_id_no=training_employees.emp_id where training_employees.training_id='$id'")->result();

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

	function add_employee_training($values){
		try
		{
			$this->db->insert("training_employees",$values);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}


	function insert_training_anouncement($values)
	{
		try
		{
			$this->db->insert("training_anouncement",$values);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	function update_training_anouncement($id,$values)
	{
		try
		{
			$this->db->where("id",$id)->update("training_anouncement",$values);
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



	public function get_data_anouncement()
	{
		try
		{
			$fields = "";
	
			$this->db->select('training_anouncement.id, trainings.title, training_anouncement.anouncement');
			$this->db->from('trainings');
			$this->db->join('training_anouncement', 'trainings.id=training_anouncement.training_id');
			$data = $this->db->get()->result();

			return $data;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}


	public function get_single_data_anouncement($id)
	{
		try
		{
			$fields = "";
			$data = $this->db->select($fields)->from("training_anouncement")->where("id",$id)->get()->result();

			return $data;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

		public function delete_training_anouncement($id)
	{
		try
		{
			$this->db->where('id',$id)->delete('training_anouncement');
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}


		public function get_training_data($id)
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

	public function training_get_employee($id)
	{
		try
		{
			/*$fields = "";
			$this->db->select('CONCAT(emp_info.last_name,', ',emp_info.first_name,' ',emp_info.mid_name) as fullname, emp_info.cs_id_no, training_employees.emp_id');
			$this->db->from('emp_info');
			$this->db->join('training_employees ON emp_info.cs_id_no=training_employees.emp_id','left');
			$this->db->where('emp_info.cs_id_no NOT IN (select emp_id from training_employees where training_id=7)')
			$data = $this->db->get()->result();*/

				$data = $this->db->query("SELECT CONCAT(emp_info.last_name,', ',emp_info.first_name,' ',emp_info.mid_name) as fullname, emp_info.cs_id_no, training_employees.emp_id from emp_info left JOIN training_employees ON emp_info.cs_id_no=training_employees.emp_id where emp_info.cs_id_no NOT IN (select emp_id from training_employees where training_id=$id)")->result();

			return $data;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	
} 