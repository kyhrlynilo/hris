<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_time_keeping_model extends CI_Model{



 ####### #     # ######  #       ####### #     # ####### ####### 
 #       ##   ## #     # #       #     #  #   #  #       #       
 #       # # # # #     # #       #     #   # #   #       #       
 #####   #  #  # ######  #       #     #    #    #####   #####   
 #       #     # #       #       #     #    #    #       #       
 #       #     # #       #       #     #    #    #       #       
 ####### #     # #       ####### #######    #    ####### ####### 
                                                                 


	public function insert_data($data){
		$this->db->insert("emp_timekeeping_details",$data);
		return $this->db->insert_id();
	}

	public function update_data($data, $emp_id){
		$this->db->where("emp_id",$emp_id);
		$this->db->update("emp_timekeeping_details",$data);
	}

	public function fetch_data(){
		$this->db->where("active_flag","Y");
		$query = $this->db->get("emp_timekeeping_details");
		return $query;
	}

	public function get_single_employee($emp_id)
	{
		$fields = "";
		$employees = $this->db->select($fields)->from("emp_timekeeping_details")->where("emp_id",$emp_id)->get()->result();

		return $employees;
	}




	public function get_last_id()
	{
		$sql = $this->db->select('id')
			->from('emp_timekeeping_details')
			->limit(1)
			->order_by('id','desc')
			->get()->result();

		$last_id = 0;
		foreach($sql as $key):
			$last_id = $key->id;
		endforeach;

		return $last_id;
	}



	  #####   #####  #     # ####### ######  #     # #       ####### 
	 #     # #     # #     # #       #     # #     # #       #       
	 #       #       #     # #       #     # #     # #       #       
	  #####  #       ####### #####   #     # #     # #       #####   
	       # #       #     # #       #     # #     # #       #       
	 #     # #     # #     # #       #     # #     # #       #       
	  #####   #####  #     # ####### ######   #####  ####### ####### 
	                                                                 


	public function get_schedule($emp_id)
	{
		try
		{
			$fields = "";
			$data = $this->db
			             ->select($fields)
			             ->from("emp_official_times")
			             ->where("emp_id",$emp_id)
			             ->get()->result();

			return $data;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function get_single_schedule($id)
	{
		try
		{
			$sql = $this->db->select()->from("emp_official_times")->where("id",$id)->get()->result();
			return $sql;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function insert_time_schedule($values)
	{
		try
		{
			$this->db->insert("emp_official_times",$values);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function update_time_schedule($id,$values)
	{
		try
		{
			$this->db->where("id",$id)->update("emp_official_times",$values);
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

	public function delete_time_schedule($id)
	{
		try
		{
			$this->db->where('id',$id)->delete('emp_official_times');
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

 

 ####### ### #     # #######   #    # ####### ####### ######  ### #     #  #####  
    #     #  ##   ## #         #   #  #       #       #     #  #  ##    # #     # 
    #     #  # # # # #         #  #   #       #       #     #  #  # #   # #       
    #     #  #  #  # #####     ###    #####   #####   ######   #  #  #  # #  #### 
    #     #  #     # #         #  #   #       #       #        #  #   # # #     # 
    #     #  #     # #         #   #  #       #       #        #  #    ## #     # 
    #    ### #     # #######   #    # ####### ####### #       ### #     #  #####  
                                                                                  
	public function insert_time($values)
	{
		try
		{
			$this->db->insert("emp_time_records",$values);
		}	
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function get_time_records_by_emp_year_month($emp_id, $year,$month)
	{
		try
		{

			$month = str_pad($month, 2, "0", STR_PAD_LEFT);
			$query = " SELECT id, date, time, type FROM emp_time_records WHERE date LIKE '$year-$month-%' AND emp_id = '$emp_id'  ";
			$sql = $this->db->query($query)->result();

		       return $sql;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	public function get_honorariums($emp_id, $id = null)
	{
		try
		{
			  
			
			if(isset($id) AND !empty($id))
				$query 	= " SELECT * FROM emp_official_times WHERE emp_id = '$emp_id' AND id <> $id  ";
			else
				$query 	= " SELECT * FROM emp_official_times WHERE emp_id = '$emp_id' ";

			$sql 	= $this->db->query($query)->result();

			return $sql;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function get_time_records()
	{
		try
		{
			$sql = $this->db->select("*, A.id as time_id")
			       ->from("emp_time_records A")
			       ->join("emp_timekeeping_details B","A.emp_id = B.emp_id","left")
			       ->get()
			       ->result();

		       return $sql;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	public function delete_time_record($id)
	{
		try
		{
			$this->db->where("id",$id)->delete("emp_time_records");
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
}