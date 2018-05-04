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

	public function get_single_employee_vacation_leave_points($id)
	{	
		try{
			/*$sql = "select elb.balance from emp_leave_balance elb join emp_leave_request elr on elb.email_address = elr.email_address where elr.id = ".$id." and elb.leave_type = 'Vacation' order by elb.id desc limit 1";
			return $this->db->query($sql);*/
			$this->db->select('elb.balance');
			$this->db->from('emp_leave_balance elb, emp_leave_request elr');
			$this->db->where('elb.email_address = elr.email_address');
			$this->db->where('elr.id',$id);
			$this->db->where('elb.leave_type="Vacation" ORDER BY elb.id DESC LIMIT 1');
			$query = $this->db->get()->result();
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}

	public function get_single_employee_sick_leave_points($id)
	{	
		try{
			$this->db->select('elb.balance');
			$this->db->from('emp_leave_balance elb, emp_leave_request elr');
			$this->db->where('elb.email_address = elr.email_address');
			$this->db->where('elr.id',$id);
			$this->db->where('elb.leave_type="Sick Leave" ORDER BY elb.id DESC LIMIT 1');
			$query = $this->db->get()->result();
			return $query;
		}catch(Exception $e){
			throw $e;
		}
	}
	function update_data($data, $id){

		try{

			/*echo '<pre>';
			print_r($data);
			echo '<pre>';
			exit();*/
			$this->db->set("status",$data['status']);
			$this->db->set("disapproved_reason",$data['dsapr_reason']);
			$this->db->where("id",$id);
			$this->db->update("emp_leave_request");

			$sql = "INSERT INTO emp_leave_balance (emp_id,leave_type,date_from,date_to,abs_und_w_pay,abs_und_wo_pay,balance,date_filed,action_taken,email_address)(SELECT elr.emp_id,elr.leave_type,elr.date_from,elr.date_to,elr.total_days,0,(elb.balance - elr.total_days),NOW(),'".$data['status']."',elr.email_address FROM emp_leave_request elr JOIN emp_leave_balance elb ON elr.email_address=elb.email_address WHERE elr.id='".$id."' ORDER BY elb.id desc LIMIT 1)";
			$this->db->query($sql);
		}catch(Exception $e){
			throw $e;
		}
	}

}
