<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function loginUser($username, $password){

        $query=$this->db->select('*')
                    ->where('email', $username)
                    ->where('password', $password)
        			->get('admin');
        
        if($query->num_rows() == 1){
            return $query->result();               
        }
        else{
            return false;
        }
    }
}