<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model
{

	public function get_lates()
	{

	}

	public function get_tardiness( $date_from, $date_to, $type )
	{
		$query = <<<magic
			SELECT * 
			FROM emp_tardiness A
			WHERE
				A.date BETWEEN '$date_from' AND '$date_to'
				AND A.type = '$type'
magic;
		
		$stmt = $this->db->query($query);
		return $stmt->result();
	}

	public function get_employees_involved( $date_from, $date_to, $type )
	{
		$query = <<<magic
			SELECT *
			FROM emp_timekeeping_details
			WHERE emp_id IN (
				SELECT emp_id 
				FROM emp_tardiness A
				WHERE
					A.date BETWEEN '$date_from' AND '$date_to'
					AND A.type = '$type'
			)
			ORDER BY last_name
magic;
		
		$stmt = $this->db->query($query);
		return $stmt->result();
	}

	public function get_absences()
	{

	}

}
