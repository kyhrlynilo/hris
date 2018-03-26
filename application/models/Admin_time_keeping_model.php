<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_time_keeping_model extends CI_Model{

	function insert_data($data){
			$this->db->insert("emp_timekeeping_details",$data);
	}

	function update_data($data, $id){
		$this->db->where("id",$id);
		$this->db->update("emp_timekeeping_details",$data);
	}

	function fetch_data(){
		$this->db->where("active_flag","Y");
		$query = $this->db->get("emp_timekeeping_details");
		return $query;
	}

	public function get_single_employee($id)
	{
			$fields = "";
			$employees = $this->db->select($fields)->from("emp_timekeeping_details")->where("id",$id)->get()->result();

			return $employees;
	}

}