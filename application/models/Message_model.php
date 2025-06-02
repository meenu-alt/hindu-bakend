<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

	//insert message
	public function insertMsg($data){
        return $this->db->insert('message', $data);
    }

    //fetch message 
    public function fetchMesg($msg_id){
        $data= array('status'=>1);

        $this->db->where('mesg_from', $msg_id)
                 ->where('mesg_to', $_SESSION['id'])
                 ->update('message', $data);

        $sql = "SELECT * FROM message WHERE mesg_from IN (".$_SESSION['id'].",".$msg_id.") AND mesg_to IN (".$_SESSION['id'].",".$msg_id.")";
        return $this->db->query($sql)->result();

    }

    //fetch message 
    public function fetchUserMesg(){
        // $sql = "SELECT * FROM message WHERE mesg_from IN (".$_SESSION['id'].",".$msg_id.") AND mesg_to IN (".$_SESSION['id'].",".$msg_id.")";
        $sql = "SELECT DISTINCT mesg_from, mesg_to FROM message WHERE mesg_from = ".$_SESSION['id']." OR mesg_to = ".$_SESSION['id']." ORDER BY created_on DESC ";
        return $this->db->query($sql)->result();
    }

    //fetch message 
    public function countUserMesg(){
        // $sql = "SELECT * FROM message WHERE mesg_from IN (".$_SESSION['id'].",".$msg_id.") AND mesg_to IN (".$_SESSION['id'].",".$msg_id.")";
        $sql = "SELECT DISTINCT mesg_from,COUNT(mesg_from) AS no_msg FROM message WHERE mesg_to = ".$_SESSION['id']." AND status=0 GROUP BY mesg_from ";
        return $this->db->query($sql)->result();
    }

    //fetch profile photo 
    public function getProfilePhoto($dataValue){
        return $this->db->select('image1')
                        ->where('user_id', $dataValue)
                        ->get('users')->result_array();
    }
}