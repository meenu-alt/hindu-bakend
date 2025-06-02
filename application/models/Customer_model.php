<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	//insert customer support
    public function cust_support($data){
        return $this->db->insert('customer_support', $data);
    }
	//report misuse
    public function report_misuse($data){
        return $this->db->insert('report_misuse', $data);
    }
}