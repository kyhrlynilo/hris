<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_time_keeping_model","tk_model");
	}
	
	public function dtr($emp_id = null, $year = null, $month = null, $day_from = null, $day_to = null )
    {
    	if(!isset($emp_id) OR empty($emp_id))
    		throw new Exception("Parameter error!", 1);

    	# SETTINGS PARAMS
    	$data['emp_id'] 	= $emp_id;
		$data['selected_year'] 		= ( isset( $year) OR !empty($year) ) ? $year : 2018   ;
		$data['selected_month'] 	= ( isset( $month) OR !empty($month) ) ? $month : 1   ;
		$data['selected_day_from'] 	= ( isset( $day_from) OR !empty($day_from) ) ? $day_from : 1   ;
		$data['selected_day_to'] 	= ( isset( $day_to) OR !empty($day_to) ) ? $day_to : 1   ;	 

		# NEEDED DATAS
    	$total_days 			= cal_days_in_month(CAL_GREGORIAN, $data['selected_month'], $data['selected_year']);
    	$data['times']			= $this->Admin_time_keeping_model->get_time_records_by_emp_year_month($emp_id, $data['selected_year'], $data['selected_month']);
    	$data['honos']  		= $this->Admin_time_keeping_model->get_honorariums($emp_id);
    	$data['days_from'] 		= array();
    	$data['days_to'] 		= array();
    	for( $a = 1; $a <= $total_days; $a++)
    	{
    		$data['days_to'][] = $a;
    		$data['days_from'][] = $a;
    	}

    	# COMMON DATAS
    	$data['title']	= "Daily Time Records";
		$data['months'] = MONTHS;
		$data['years'] 	= YEARS;		
		$data['employee'] = $this->Admin_time_keeping_model->get_single_employee($emp_id);
		
		if($this->input->post('generate',true))
		{
			$year = $this->input->post('year',true);
			$month = $this->input->post('month',true);
			$day_from = $this->input->post('day_from',true);
			$day_to = $this->input->post('day_to',true);
			$location = base_url() ."admin_time_keeping/dtr/$emp_id/$year/$month/$day_from/$day_to";

			header("Location: $location");
		}

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/admin_time_keeping_dtr',$data);
		$this->load->view('admin/template/footer',$data);
    }


}