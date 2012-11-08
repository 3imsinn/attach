<?php

class products_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_products($slug = FALSE)
	{
	
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('accounts_products', 'accounts_products.product_id = products.id', 'left');

		$query = $this->db->get();

		return $query->result_array();
	}


	public function get_product($asin){
		$query = $this->db->get_where('products', array('asin' => $asin));
		return $query->result_array();


	}


}	



?>