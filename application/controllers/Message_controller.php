<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_controller extends CI_Controller {

	//insert new message
	public function insertMsg(){
		if (isset($_SESSION['id'])) {
			$msg = $this->input->post('msg');
			$msg_to = $this->input->post('msg_to');
			$msg_from = $this->input->post('msg_from');
			$data = array(
				'mesg_from'=>$msg_from,
				'mesg_to'=>$msg_to,
				'message'=>$msg,
				'created_on'=>date('Y-m-d H:i:s')
			);
			if($this->Message_model->insertMsg($data))
			{
				$response = array(
					'errorCode'=> 200
				);
				echo json_encode($response);
			}
			else{
				$response = array(
					'errorCode'=> 201
				);
				echo json_encode($response);
			}
		}else {
			$response = array(
				'errorCode'=> 202
			);
			echo json_encode($response);
		}
	}

	//fetch message
	public function message(){
		if (isset($_SESSION['id'])) {
			$msg_id = $this->input->post('msg_id');
			if ($msg = $this->Message_model->fetchMesg($msg_id)) {
				$page_data['data'] = $msg;
				$this->load->view('message/message', $page_data);
			} else {
				$response = array(
					'errorCode'=> 201
				);
				// print_r($response);
				echo 201;
			}
		} else {
			$response = array(
				'errorCode'=> 202
			);
			// echo json_encode($response);
			echo 202;
		}
	}

	//fetch user message
	public function messageUser(){
		if (isset($_SESSION['id'])) {
			if ($msg = $this->Message_model->fetchUserMesg()) {
				foreach ($msg as $key => $msgValue) {
					$from[] = $msgValue->mesg_from;
					$to[] = $msgValue->mesg_to;
				}
				$array = array_unique(array_merge($from,$to));
				// echo "<pre>"; print_r($msg); exit;
				$msgCount = $this->Message_model->countUserMesg();
				$page_data['data'] = $array;
				$page_data['msgCount'] = $msgCount;
				$this->load->view('message/mesg_user', $page_data);
			} else {
				$response = array(
					'errorCode'=> 201
				);
				// print_r($response);
				echo 201;
			}
		} else {
			$response = array(
				'errorCode'=> 202
			);
			// echo json_encode($response);
			echo 202;
		}
	}

}
