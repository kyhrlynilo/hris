<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_leave_points_balance_history_model extends CI_Model{

	public function fetch_data($email){
		try{
			$this->db->select('*');
			$this->db->from('emp_leave_balance');
			$this->db->where('email_address',$email);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get();
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}

	public function get_single_employee_vacation_leave_points($email)
	{	
		try{
			$this->db->select('balance');
			$this->db->from('emp_leave_balance');
			$this->db->where('email_address',$email);
			$this->db->where('leave_type="Vacation" ORDER BY id DESC LIMIT 1');
			$query = $this->db->get()->result();
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}

	public function get_single_employee_sick_leave_points($email)
	{	
		try{
			/*$this->db->select('elb.balance');
			$this->db->from('emp_leave_balance elb, emp_leave_request elr');
			$this->db->where('elb.email_address = elr.email_address');
			$this->db->where('elr.email_address',$email);
			$this->db->where('elb.leave_type="Sick Leave" ORDER BY elb.id DESC LIMIT 1');*/
			$this->db->select('balance');
			$this->db->from('emp_leave_balance');
			$this->db->where('email_address',$email);
			$this->db->where('leave_type="Sick Leave" ORDER BY id DESC LIMIT 1');
			$query = $this->db->get()->result();
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}
}