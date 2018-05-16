<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Reports_model','model');
	}

	public function list_of_tardiness( $date_from, $date_to, $type )
	{
		$data['date_from'] = $date_from;
		$data['date_to'] = $date_to;
		$data['title'] = $type == LATE ? "List of Lates" : "List of Undertimes";
		$data['data'] = $this->model->get_tardiness($date_from, $date_to, $type);
		$data['employees'] = $this->model->get_employees_involved($date_from, $date_to, $type);
		$this->load->view('admin/list_of_tardiness',$data);
	}

	public function list_of_lates( $date_from, $date_to )
	{
		$this->list_of_tardiness( $date_from, $date_to, LATE );
	}

	public function list_of_undertimes( $date_from, $date_to )
	{
		$this->list_of_tardiness( $date_from, $date_to, UNDERTIME );
	}

	public function list_of_abseneces( $date_from, $date_to )
	{

	}

}