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

	public function time_in_out($emp_id, $type)
	{
		
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
}