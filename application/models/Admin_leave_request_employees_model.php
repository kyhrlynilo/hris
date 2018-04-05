<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_leave_request_employees_model extends CI_Model {
	

	public function get_pending_data()
	{
		try
		{
			$this->db->select('etkd.*, elr.*');
			$this->db->from('emp_timekeeping_details etkd, emp_leave_request elr');
			$this->db->where('etkd.email_address = elr.email_address');
			$this->db->where("status","Pending");
			$query = $this->db->get();
			
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}

	public function get_single_employee($id)
	{
		try{
			$this->db->select('etkd.*, elr.*');
			$this->db->from('emp_timekeeping_details etkd, emp_leave_request elr');
			$this->db->where('etkd.email_address = elr.email_address');
			$this->db->where('elr.id',$id);
			$query = $this->db->get()->result();
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}

	function update_data($data, $id){
		try{
			$this->db->set("status",$data);
			$this->db->where("id",$id);
			$this->db->update("emp_leave_request");
		}catch(Exception $e){
			throw $e;
		}
	}

}