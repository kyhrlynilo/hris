<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	public function get_params()
	{
		$params = $this->input->post("data",true);
		
		$data = array();
		foreach($params as $param):
			if(strpos($param['name'],'[]') !== false)
			{
				$input_name = str_replace('[]', '', $param['name']);
				$data[$input_name][] = isset( $param["value"] ) ? $param["value"] : ""; 
			}
			else
			{				
				$data[ $param["name"] ] = isset( $param["value"] ) ? $param["value"] : "";
			}
		endforeach;

		return $data;
	}

	public function gen_salt($id = null)
	{
		if(empty($id) OR !isset($id))
			throw new Exception("ID is needed!");

		return sha1(md5($id));
	}

	public function gen_token($id,$salt)
	{
		return sha1(md5($id."!@#$%^&*()".$salt));
	}

	public function check_salt($id,$token)
	{
		
	}

	public function validate_data($required_fields,$params = array())
	{
		$result = "";
		$null_values = array();
		//echo "<pre>"; print_r($params);print_r($required_fields); exit();
		/*foreach($params as $key => $value)
		{
			if(in_array($key, $required_fields))
			{	
				if( empty( preg_replace('/\s+/', '', $value) ) )
					array_push($null_values,str_replace('_'," ",$key));
			}
		}*/
		foreach($required_fields as $field)
		{
			if(!isset($params[$field]) OR empty( preg_replace('/\s+/', '', $params[$field] ) ) )
				array_push($null_values, str_replace('_'," ",$field));
		}

		foreach($null_values as $key => $value)
		{
			if($key == count($null_values) - 2 )
				$result.=$value ." and  "; 
			else
				$result.= $key < count($null_values) - 1 ? "$value, " : "$value"; 
		}

		if(count($null_values) > 0)
			throw new Exception(ucfirst($result) ." is required!" , 1);
		
	}

	public function handle_catch($e)
	{
		$title = "Error";
		$text = $e->getMessage();
		$icon = "error";
		$buttons = array( "error" => "Try Again" );

		$result = array(
			"title" => $title , 
			"text" => $text ,
			"icon" => $icon ,
			"buttons" => $buttons
		);

		echo json_encode($result);
	}

}
