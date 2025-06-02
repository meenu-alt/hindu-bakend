<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection_model extends CI_Model {

	public function insert_conn($data){
        return $this->db->insert('connection', $data);
    } 

    public function accept_req($id, $data){
        return $this->db->where('connection_id', $id)
                        ->update('connection', $data);
    } 
}