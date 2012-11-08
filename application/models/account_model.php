<?php

class account_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_login($email,$password)
	{
		
		$password = md5($password);
		

	$this->db->select('*')->from('accounts')->where(array('email' => $email, 'password' => $password));
	$query =  $this->db->get();
	return $query->result_array();

	}

	

}	



?>