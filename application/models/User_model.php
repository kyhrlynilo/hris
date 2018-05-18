<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	function get_user_data( $email )
	{
		$user_data = array();
		$sql = $this->db->select(['*'])->from('emp_timekeeping_details')->where('email_address',$email)->get()->result();
	
		foreach($sql as $val)
		{
			$user_data = $val;
		}
		return $user_data;
	}

}