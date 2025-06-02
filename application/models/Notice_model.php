<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice_model extends CI_Model {

	//insert notice
	public function insert_notice($data){
        return $this->db->insert('notification', $data);
    }

    //count new notification
    public function getNoticeCount(){
        $query=$this->db->where('notice_for', $_SESSION['id'])
    					->where('status', 0)
    					->get('notification');
    	return $query->num_rows();
    }

    //get notification
    public function getNotice(){
        return $this->db->where('notice_for', $_SESSION['id'])
        				->order_by('notification_id', 'desc')
        				->limit(10)
    					->get('notification')->result();
    }

    //count new message
    public function getMsgCount(){
        $query=$this->db->where('mesg_to', $_SESSION['id'])
                        ->where('status', 0)
                        ->get('message');
        return $query->num_rows();
    }
}