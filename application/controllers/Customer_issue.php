<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_issue extends CI_Controller {

	//customer support
	public function cust_support(){
		$data = array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'mobile'=>$this->input->post('mobile'),
			'subject'=>$this->input->post('subject'),
			'message'=>$this->input->post('message')
		);
		if ($this->Customer_model->cust_support($data)) {
			$this->session->set_flashdata('feedback',"Thanks for Submiting , Our team get back soon");
            $this->session->set_flashdata('feedback_heading',"Success");
            $this->session->set_flashdata('feedback_icon',"success");
            redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('feedback',"Oops Something went Wrong");
            $this->session->set_flashdata('feedback_heading',"Error");
            $this->session->set_flashdata('feedback_icon',"error");
            redirect($_SERVER['HTTP_REFERER']);
		}
	}

	//report misuse

	public function compress($source, $destination, $quality) {

	    $info = getimagesize($source);

	    if ($info['mime'] == 'image/jpeg') 
	        $image = imagecreatefromjpeg($source);

	    elseif ($info['mime'] == 'image/gif') 
	        $image = imagecreatefromgif($source);

	    elseif ($info['mime'] == 'image/png') 
	        $image = imagecreatefrompng($source);

	    $t=imagejpeg($image, $destination, $quality);

	    return $t;
	}

	public function report_misuse(){
		// $config['upload_path'] = 'images/report'; 
  //       $config['allowed_types'] = 'jpg|gif|png|jpeg|JPEG|JPG|PNG';
  //       $config['file_name'] = 'hh_report'.time();
  //       $this->load->library('upload',$config,'image1');
  //       $img1=$this->image1->do_upload('img');
  //       $upload_img1=$this->image1->data();     
  //       $img1_path=('images/report/'.$upload_img1['raw_name']. $upload_img1['file_ext']);

        function compress($source, $destination, $quality) {

		    $info = getimagesize($source);

		    if ($info['mime'] == 'image/jpeg') 
		        $image = imagecreatefromjpeg($source);

		    elseif ($info['mime'] == 'image/gif') 
		        $image = imagecreatefromgif($source);

		    elseif ($info['mime'] == 'image/png') 
		        $image = imagecreatefrompng($source);

		    $t=imagejpeg($image, $destination, $quality);

		    return $t;
		}

		// $source_img = 'C:\xampp\htdocs\ravi\resize_image\source.jpg';
		$source_img = $_FILES["img"]["tmp_name"];
		$img1_path = '/images/report/hh_report'.time().'.jpg';
		$destination_img = $_SERVER['DOCUMENT_ROOT'].$img1_path;

		$img1 = compress($source_img, $destination_img, 30);

		// print_r($img1); exit;
        if ($img1==1) {
			$data = array(
				'user_id'=>$this->input->post('user_id'),
				'subject'=>$this->input->post('subject'),
				'img'=>$img1_path,
				'message'=>$this->input->post('message')
			);
			if ($this->Customer_model->report_misuse($data)) {
				$this->session->set_flashdata('feedback',"Thanks for Submiting , Our team get back soon");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
			}
        } else {
        	$this->session->set_flashdata('feedback',"Oops Something went Wrong");
            $this->session->set_flashdata('feedback_heading',"Error");
            $this->session->set_flashdata('feedback_icon',"error");
            redirect($_SERVER['HTTP_REFERER']);
        }
	}

}
