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


	/*
		LEAVE CREDIT POINTS
	*/

	public function get_email(){
		try{
			$this->db->select('distinct(email_address)');
			$this->db->from('emp_leave_balance');
			$query = $this->db->get()->result();
			return $query;

		}catch(Exception $e){
			throw $e;
		}
	}

	public function insert_data_emp_leave_balance($email,$empid,$emptype){

		$sql = "INSERT INTO emp_leave_balance (emp_id,leave_type,date_from,date_to,earned,balance,date_filed,action_taken,email_address) SELECT '".$empid."','Sick Leave',NOW(),DATE_ADD(NOW(),INTERVAL 1 MINUTE),0,0,NOW(),'CREDITED','".$email."' FROM emp_timekeeping_details etd WHERE (etd.emp_type='Admin' OR etd.emp_type='Faculty') AND etd.email_address = '".$email."'";
		$this->db->query($sql);

		$sql = "INSERT INTO emp_leave_balance (emp_id,leave_type,date_from,date_to,earned,balance,date_filed,action_taken,email_address) SELECT '".$empid."','Vacation',NOW(),DATE_ADD(NOW(),INTERVAL 1 MINUTE),0,0,NOW(),'CREDITED','".$email."' FROM emp_timekeeping_details etd WHERE (etd.emp_type='Admin') AND etd.email_address = '".$email."'";
		$this->db->query($sql);
	}

	public function insert_credit_points_data($emails){
		/*
			interval
			1 MONTH STARTS LAST_DAY(NOW())

			range to
			DATE_ADD(NOW(),INTERVAL 1 MONTH)

			first day of the month
			DATE_FORMAT(NOW() ,'%Y-%m-01')

			last day of the month
			LAST_DAY(NOW())
		*/
		$sql = "DROP EVENT IF EXISTS ecp";
		$this->db->query($sql);	
		$sql = "CREATE EVENT ecp ON SCHEDULE EVERY 1 MINUTE STARTS DATE_ADD(NOW(),INTERVAL 1 MINUTE) DO 
		BEGIN
		DECLARE x INT DEFAULT 0;
		DECLARE counter INT DEFAULT (SELECT COUNT(DISTINCT(email_address)) FROM emp_leave_balance);
		DECLARE y INT DEFAULT 1;
		DECLARE email_c INT DEFAULT 0;
		simple_loop: LOOP

		INSERT INTO emp_leave_balance (balance, date_from, date_to, leave_type, earned, date_filed, action_taken, email_address, emp_id)
		SELECT (1.25+balance), NOW(), DATE_ADD(NOW(),INTERVAL 1 MINUTE), 'Vacation', 1.25, NOW(), 'CREDITED',SUBSTRING_INDEX(SUBSTRING_INDEX('".$emails."','|',y),'|',-1), elb.emp_id FROM emp_leave_balance elb JOIN emp_timekeeping_details etd ON elb.email_address = etd.email_address WHERE elb.email_address = SUBSTRING_INDEX(SUBSTRING_INDEX('".$emails."','|',y),'|',-1) AND etd.emp_type='Admin' AND etd.active_flag='Y' AND elb.leave_type='Vacation' ORDER BY elb.id DESC LIMIT 1;

		INSERT INTO emp_leave_balance (balance, date_from, date_to, leave_type, earned, date_filed, action_taken, email_address, emp_id)
		SELECT (1.25+balance), NOW(), DATE_ADD(NOW(),INTERVAL 1 MINUTE), 'Sick Leave', 1.25, NOW(), 'CREDITED',SUBSTRING_INDEX(SUBSTRING_INDEX('".$emails."','|',y),'|',-1), elb.emp_id FROM emp_leave_balance elb JOIN emp_timekeeping_details etd ON elb.email_address = etd.email_address WHERE elb.email_address = SUBSTRING_INDEX(SUBSTRING_INDEX('".$emails."','|',y),'|',-1) AND (etd.emp_type='Admin' OR etd.emp_type='Faculty') AND etd.active_flag='Y' AND elb.leave_type='Sick Leave' ORDER BY elb.id DESC LIMIT 1;

		SET y = y + 1;
		SET x = x + 1;
		IF x=counter THEN
		LEAVE simple_loop;
		END IF;
		END LOOP simple_loop;
		END";
			$this->db->query($sql);		
	}
}