<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller {

    //User connection
    public function con_req(){
        if (isset($_SESSION['id']) &&!empty($_GET['id'])) {
            $data = array(
                'req_from'=> $_SESSION['id'],
                'req_to'=> $_GET['id'],
            );
            $url = base_url('mycon/view_profile/?id=').$_SESSION['id'];
            $notice = '<a href="'.$url.'">New request on your profile by HH - '.$_SESSION['id'].'</a>';
            $notification = array(
                'notice_for' => $_GET['id'],
                'notice' => $notice
            );
                // echo $notice; exit;
            if ($this->Connection_model->insert_conn($data)) {
                $this->Notice_model->insert_notice($notification);
                $response= array(
                    'error'=>200,
                    'message'=>'success',
                );
                echo json_encode($response);
                // redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    //Accept User connection
    public function accept_req(){
        if (isset($_SESSION['id']) &&!empty($_GET['id'])) {
            $id= $_GET['id'];
            $user_id= $_GET['user_id'];
            $data = array(
                'status'=> 1
            );
            $url = base_url('mycon/view_profile/?id=').$_SESSION['id'];
            $notice = '<a href="'.$url.'">HH - '.$_SESSION['id'].' has accepted your request.</a>';
            $notification = array(
                'notice_for' => $user_id,
                'notice' => $notice
            );
            if ($this->Connection_model->accept_req($id, $data)) {
                $this->Notice_model->insert_notice($notification);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}
