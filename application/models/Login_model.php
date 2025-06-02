<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function loginUser($username, $password) {
    $query = $this->db->select('*')
        ->where('phone', $username)
        ->where('password', $password) // ❌ Plain password comparison
        ->get('users');

    if ($query->num_rows() == 1) {
        return $query->row(); // ✅ Return single object instead of array
    } else {
        return false;
    }
}


    //check delete request 
    public function checkDelete(){
        return $this->db->where('user_id',$_SESSION['id'])
                        ->delete('delete_account');
    }
}