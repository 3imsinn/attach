<?php

class piypa_model extends CI_Model {



	public function __construct()
	{
		$this->load->database();
	}

	public function update_piyp($data, $id){

		$this->db->where('id', $id);
		$this->db->update('piypa', $data); 


	}

	public function get_piyps($where)
	{
		
		$query = $this->db->get_where('piypa', array('product' => $where));
		return $query->result_array();

	}

	public function get_piyp($where)
	{
		
		$query = $this->db->get_where('piypa', array('id' => $where));
		return $query->result_array();

	}

	public function delete($deleteID){

		$this->db->delete('piypa', array('id' => $deleteID));
		
	}

	

}	



?>