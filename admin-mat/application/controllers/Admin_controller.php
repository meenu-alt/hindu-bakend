<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Admin_controller extends CI_Controller {
	function __construct() {
        parent::__construct();
        // $GLOBALS['sideMenu'] = $this->Admin_model->getMenu();
    }

	public function index()
	{
		if ($this->session->has_userdata('ad_id')) {
			redirect('admin_controller/dashboard');
		} else {
			$this->load->view('index');
		}
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if ($user = $this->Login_model->loginUser($email, $password)) {
			foreach ($user as  $userValue) {
				$_SESSION['ad_id']=$userValue->ad_id;
				$_SESSION['email']=$userValue->email;
				$_SESSION['name']=$userValue->name;
				$_SESSION['privilege']=json_decode($userValue->privilege);
			}
			redirect('admin_controller/dashboard');
		}else{
			redirect('admin_controller');
		}
	}

	//logout
	public function logout(){
		unset($_SESSION['ad_id']);
		unset($_SESSION['email']);
		unset($_SESSION['name']);
		redirect('admin_controller');
	}

	//dashboad
	public function dashboard(){
		if ($this->session->has_userdata('ad_id')) {
			$this->load->view('dashboard');
		} else{
			redirect('admin_controller');
		}
	}

	//all user
	public function all_user(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_user();
			$this->load->view('user_all', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	//active user
	public function all_active_user(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_active_user();
			$this->load->view('user_active', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	//active user
	public function all_inactive_user(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_inactive_user();
			$this->load->view('user_inactive', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	//active user
	public function all_photo_user(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_active_user();
			$this->load->view('user_photo', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	//all block user list
	public function all_block_user(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_block_user();
			$this->load->view('user_block', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	//all delete user list
	public function all_delete_user(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_delete_user();
			$this->load->view('user_delete', $pageData);
		} else{
			redirect('admin_controller');
		}
	}
	
		//block user
	public function delete_user($user_id=''){
		if ($this->session->has_userdata('ad_id')) {
		   
			       $this->db->where("user_id",$user_id);
			       $this->db->delete("users");
				$this->session->set_flashdata('feedback',"User Deleted Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
		 
		} else{
			redirect('admin_controller');
		}
	}


	//block user
	public function block_user($user_id=''){
		if ($this->session->has_userdata('ad_id')) {
			if ($this->Dashboard_model->block_user($user_id)) {
				$this->session->set_flashdata('feedback',"User Blocked Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
			}
		} else{
			redirect('admin_controller');
		}
	}

	//block user
	public function unblock_user($user_id=''){
		if ($this->session->has_userdata('ad_id')) {
			if ($this->Dashboard_model->unblock_user($user_id)) {
			    
			    $email=$this->db->get_where("users",array("user_id"=>$user_id))->row();
			    
			            $this->load->library('email');
            $from = "no-reply@hellohumsafar.com";    //senders email address
            $subject = 'Hello Humsafar Forgot Password';  //email subject
            $to = $email->email;
            //sending confirmEmail($receiver) function calling link to the user, inside message body
            $message = 'Dear '.$email.',

Your Account is Successfully Approved  

http://localhost/perfomdigi/hindu-humsfar-react/backend//


Note:- Please change your password after login successfully.

Regards & Thanks

HelloHumsafar Team';
            
            
            
            //config email settings

     

            $config['protocol']    = 'sendmail';

            $config['smtp_host']    = 'mail.hellohumsafar.com';
            
            $config['smtp_crypto'] = 'ssl';

            $config['smtp_port']    = 465;

            $config['smtp_timeout'] = '7';

            $config['smtp_user']    = $from;

            $config['smtp_pass']    = 'NitinRawat@786408';

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";
            
            $config['crlf'] = "\r\n";
            
            // $config['charset'] = 'iso-8859-1';
            
            $config['wordwrap'] = 'TRUE';

            $config['mailtype'] = 'text/html'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not  
            
            $this->load->library('email', $config);
            $this->email->initialize($config);
            //send email
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
$this->email->send();
			    
			    
				$this->session->set_flashdata('feedback',"User UnBlocked Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
			}
		} else{
			redirect('admin_controller');
		}
	}

	public function viewUser(){
		if ($this->session->has_userdata('ad_id')) {
			$user_id = $this->input->post('id');
			$getProfileAllDetailsById =$this->Dashboard_model->getProfileAllDetailsById($user_id);

			$response = array();
			$response = $getProfileAllDetailsById[0];

			echo json_encode($response); exit;
		} else{
			redirect('admin_controller');
		}
	}

	public function banner_image(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['banner_image'] = $this->Dashboard_model->get_banner_images();
			$this->load->view('home_banner', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function update_banner(){
		if ($this->session->has_userdata('ad_id')) {
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
	        $source_img = $_FILES["banner_img"]["tmp_name"];
	        $img_path = 'assets/images/homepage/hh_banner'.time().'.jpg';
	        $destination_img = $_SERVER['DOCUMENT_ROOT'].'/'.$img_path;

	        $img1 = compress($source_img, $destination_img, 100);
	        if ($img1) {
	        	$data = array(
	        		'banner_image' => $img_path
	        	);
	        	$this->Dashboard_model->update_banner($data);
				$this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
			}
		} else{
			redirect('admin_controller');
		}
	}

	public function testimonials(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['testimonials'] = $this->Dashboard_model->get_all_testimonials();
			$this->load->view('testimonials', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function insert_testimonial(){
		if ($this->session->has_userdata('ad_id')) {
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
	        $img_path = 'assets/images/'.time().'.jpg';
	        $destination_img = $_SERVER['DOCUMENT_ROOT'].'/'.$img_path;
	        if ($_FILES["img"]["tmp_name"] !='') {
	        	$img1 = compress($source_img, $destination_img, 100);
	        } else {
	        	$img1 = false;
	        }
	        if ($img1) {
	        	$data = array(
	        		'name' => $this->input->post('name'),
	        		'location' => $this->input->post('location'),
	        		'image' => $img_path,
	        		'message' => $this->input->post('message')
	        	);
	        	if ($this->Dashboard_model->insert_testimonial($data)) {
					$this->session->set_flashdata('feedback',"Update Successfully");
	                $this->session->set_flashdata('feedback_heading',"Success");
	                $this->session->set_flashdata('feedback_icon',"success");
		            redirect($_SERVER['HTTP_REFERER']);
	        	}else{
	        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
		            $this->session->set_flashdata('feedback_heading',"Error");
		            $this->session->set_flashdata('feedback_icon',"error");
		            redirect($_SERVER['HTTP_REFERER']);
	        	}
			}
		} else{
			redirect('admin_controller');
		}
	}

	public function update_testimonial($id){
		if ($this->session->has_userdata('ad_id')) {
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
	        $img_path = 'assets/images/'.time().'.jpg';
	        $destination_img = $_SERVER['DOCUMENT_ROOT'].'/'.$img_path;
	        if ($_FILES["img"]["tmp_name"] !='') {
	        	$img1 = compress($source_img, $destination_img, 100);
	        } else {
	        	$img1 = false;
	        }
	        if ($img1) {
	        	$data = array(
	        		'name' => $this->input->post('name'),
	        		'location' => $this->input->post('location'),
	        		'image' => $img_path,
	        		'message' => $this->input->post('message')
	        	);
	        	if ($this->Dashboard_model->update_testimonial($id, $data)) {
					$this->session->set_flashdata('feedback',"Update Successfully");
	                $this->session->set_flashdata('feedback_heading',"Success");
	                $this->session->set_flashdata('feedback_icon',"success");
		            redirect($_SERVER['HTTP_REFERER']);
	        	}else{
	        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
		            $this->session->set_flashdata('feedback_heading',"Error");
		            $this->session->set_flashdata('feedback_icon',"error");
		            redirect($_SERVER['HTTP_REFERER']);
	        	}
			} else {
				$data = array(
	        		'name' => $this->input->post('name'),
	        		'location' => $this->input->post('location'),
	        		'message' => $this->input->post('message')
	        	);
	        	if ($this->Dashboard_model->update_testimonial($id, $data)) {
					$this->session->set_flashdata('feedback',"Update Successfully");
	                $this->session->set_flashdata('feedback_heading',"Success");
	                $this->session->set_flashdata('feedback_icon',"success");
		            redirect($_SERVER['HTTP_REFERER']);
	        	}else{
	        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
		            $this->session->set_flashdata('feedback_heading',"Error");
		            $this->session->set_flashdata('feedback_icon',"error");
		            redirect($_SERVER['HTTP_REFERER']);
	        	}
			}
			$pageData['testimonials'] = $this->Dashboard_model->get_all_testimonials();
			$this->load->view('testimonials', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function recent_upload(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['recent_upload'] = $this->Dashboard_model->get_recent_upload();
			$this->load->view('home_recent_upload', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function update_recent_upload(){
		if ($this->session->has_userdata('ad_id')) {			
	    	$data1 = array(
	    		'user_id' => $this->input->post('profile1')
	    	);			
	    	$data2 = array(
	    		'user_id' => $this->input->post('profile2')
	    	);			
	    	$data3 = array(
	    		'user_id' => $this->input->post('profile3')
	    	);			
	    	$data4 = array(
	    		'user_id' => $this->input->post('profile4')
	    	);
	    	if ($this->Dashboard_model->update_recent_upload($data1,$data2,$data3,$data4)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}

	public function numbers(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['numbers'] = $this->Dashboard_model->get_numbers();
			$this->load->view('home_numbers', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function update_numbers(){
		if ($this->session->has_userdata('ad_id')) {			
	    	$data = array(
	    		'matched_couples' => $this->input->post('matched_couples'),
	    		'registered_user' => $this->input->post('registered_user'),
	    		'marriages' => $this->input->post('marriages'),
	    		'hours_spent' => $this->input->post('hours_spent')
	    	);
	    	if ($this->Dashboard_model->update_numbers($data)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}
	
	public function report_misuse(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['report_misuse'] = $this->Dashboard_model->get_report_misuse();
			$this->load->view('report_misuse', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function viewReportMisuse(){
		if ($this->session->has_userdata('ad_id')) {
			$rm_id = $this->input->post('id');

			$getProfileAllDetailsById =$this->Dashboard_model->getReportMisuseById($rm_id);

			$response = array();
			$response = $getProfileAllDetailsById[0];

			echo json_encode($response); exit;
		} else{
			redirect('admin_controller');
		}
	}

	public function contact_us(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['contact_us'] = $this->Dashboard_model->get_contact_us();
			$this->load->view('contact_us', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function viewContactUs(){
		if ($this->session->has_userdata('ad_id')) {
			$cs_id = $this->input->post('id');

			$getProfileAllDetailsById =$this->Dashboard_model->getContactUsById($cs_id);

			$response = array();
			$response = $getProfileAllDetailsById[0];

			echo json_encode($response); exit;
		} else{
			redirect('admin_controller');
		}
	}

	public function delete_contact_us($id=''){
		if ($this->session->has_userdata('ad_id')) {
			if ($this->Dashboard_model->delete_contact_us($id)) {
				$this->session->set_flashdata('feedback',"Deleted Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Oops Something went Wrong !!!");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}

	public function import_profile(){
		if ($this->session->has_userdata('ad_id')) {
			$this->load->view('import_profile');
		} else{
			redirect('admin_controller');
		}
	}

	public function import_file()
	{
	    
	   // require "PHPExcel/PHPExcel.php')"
    
    require __DIR__.'/../libraries/PHPExcel.php';
    $this->load->model('excel_import_model');
	    
		if(isset($_FILES["import"]["name"]))
		{
			$path = $_FILES["import"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					if ($worksheet->getCellByColumnAndRow(0, $row)->getValue() != '') {
						$data[] = array(
							'name'		  	=>	$worksheet->getCellByColumnAndRow(1, $row)->getValue(),
							'email'		  	=>	$worksheet->getCellByColumnAndRow(2, $row)->getValue(),
							'phone'		  	=>	$worksheet->getCellByColumnAndRow(3, $row)->getValue(),
							'pro_for'	  	=>	$worksheet->getCellByColumnAndRow(4, $row)->getValue(),
							'looking_for' 	=>	$worksheet->getCellByColumnAndRow(5, $row)->getValue(),
							'gender' 		=>	$worksheet->getCellByColumnAndRow(6, $row)->getValue(),
							'dob' 			=>	$worksheet->getCellByColumnAndRow(7, $row)->getValue(),
							'religion' 		=>	$worksheet->getCellByColumnAndRow(8, $row)->getValue(),
							'caste' 		=>	$worksheet->getCellByColumnAndRow(9, $row)->getValue(),
							'sub_caste' 	=>	$worksheet->getCellByColumnAndRow(10, $row)->getValue(),
							'language' 		=>	$worksheet->getCellByColumnAndRow(11, $row)->getValue(),
							'curr_location' =>	$worksheet->getCellByColumnAndRow(12, $row)->getValue(),
							'desc' 			=>	$worksheet->getCellByColumnAndRow(13, $row)->getValue(),
							'height' 		=>	$worksheet->getCellByColumnAndRow(14, $row)->getValue(),
							'weight' 		=>	$worksheet->getCellByColumnAndRow(15, $row)->getValue(),
							'marital_status'=>	$worksheet->getCellByColumnAndRow(16, $row)->getValue(),
							'complexion' 	=>	$worksheet->getCellByColumnAndRow(17, $row)->getValue(),
							'bdy_type' 		=>	$worksheet->getCellByColumnAndRow(18, $row)->getValue(),
							'ps' 			=>	$worksheet->getCellByColumnAndRow(19, $row)->getValue(),
							'eating' 		=>	$worksheet->getCellByColumnAndRow(20, $row)->getValue(),
							'drinking' 		=>	$worksheet->getCellByColumnAndRow(21, $row)->getValue(),
							'smoking' 		=>	$worksheet->getCellByColumnAndRow(22, $row)->getValue(),
							'status' 		=>	1,
							'excel_profile' =>	1,
							'password'      =>	md5('humsafar@777')
						);
						$data1[] = array(
							'address'		=>	$worksheet->getCellByColumnAndRow(23, $row)->getValue(),
							'city'		  	=>	$worksheet->getCellByColumnAndRow(24, $row)->getValue(),
							'state'		  	=>	$worksheet->getCellByColumnAndRow(25, $row)->getValue(),
							'country'	  	=>	$worksheet->getCellByColumnAndRow(26, $row)->getValue(),
							'pin' 			=>	$worksheet->getCellByColumnAndRow(27, $row)->getValue()					
						);
						$data2[] = array(
							'highest_edu'		=>	$worksheet->getCellByColumnAndRow(28, $row)->getValue(),
							'schl_name'		  	=>	$worksheet->getCellByColumnAndRow(29, $row)->getValue(),
							'ug_degree'		  	=>	$worksheet->getCellByColumnAndRow(30, $row)->getValue(),
							'ug_college'	  	=>	$worksheet->getCellByColumnAndRow(31, $row)->getValue(),
							'pg_degree' 		=>	$worksheet->getCellByColumnAndRow(32, $row)->getValue(),	
							'pg_college' 		=>	$worksheet->getCellByColumnAndRow(33, $row)->getValue(),		
							'oth_ug_degree' 	=>	$worksheet->getCellByColumnAndRow(34, $row)->getValue(),		
							'oth_pg_degree' 	=>	$worksheet->getCellByColumnAndRow(35, $row)->getValue(),		
							'emp_in' 			=>	$worksheet->getCellByColumnAndRow(36, $row)->getValue(),		
							'occupation' 		=>	$worksheet->getCellByColumnAndRow(37, $row)->getValue(),		
							'org_name' 			=>	$worksheet->getCellByColumnAndRow(38, $row)->getValue(),		
							'annual_income' 	=>	$worksheet->getCellByColumnAndRow(39, $row)->getValue()					
						);
						$data3[] = array(
							'mother'				=>	$worksheet->getCellByColumnAndRow(40, $row)->getValue(),
							'father'		  		=>	$worksheet->getCellByColumnAndRow(41, $row)->getValue(),
							'sister'		  		=>	$worksheet->getCellByColumnAndRow(42, $row)->getValue(),
							'brother'	  			=>	$worksheet->getCellByColumnAndRow(43, $row)->getValue(),
							'gothra' 				=>	$worksheet->getCellByColumnAndRow(44, $row)->getValue(),	
							'gothra_maternal' 		=>	$worksheet->getCellByColumnAndRow(45, $row)->getValue(),		
							'family_status' 		=>	$worksheet->getCellByColumnAndRow(46, $row)->getValue(),		
							'family_income' 		=>	$worksheet->getCellByColumnAndRow(47, $row)->getValue(),		
							'family_type' 			=>	$worksheet->getCellByColumnAndRow(48, $row)->getValue(),		
							'family_based' 			=>	$worksheet->getCellByColumnAndRow(49, $row)->getValue(),		
							'living_wth_parents' 	=>	$worksheet->getCellByColumnAndRow(50, $row)->getValue()					
						);
					}
				}
			}
			if ($this->excel_import_model->insert($data,$data1,$data2,$data3)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
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
	}

	public function admin_profile(){
		if ($this->session->has_userdata('ad_id')) {
			$this->load->view('admin_profile');
		} else{
			redirect('admin_controller');
		}
	}

	public function update_password(){
		if ($this->session->has_userdata('ad_id')) {
			$password = $this->input->post('oldpassword');
			$new_password = $this->input->post('user_password');
			if ($this->Dashboard_model->update_password($password, $new_password)) {
				$this->session->set_flashdata('feedback',"Updated Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Please check your password");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}
	
	public function add_admin (){
		if ($this->session->has_userdata('ad_id')) {
			$this->load->view('add_admin');
		} else{
			redirect('admin_controller');
		}
	}

	public function insert_admin (){
		if ($this->session->has_userdata('ad_id')) {
			$post_data = $this->input->post();
			$data = array(
				'name' => $post_data['admin_name'],
				'email' => $post_data['admin_email'],
				'password' => $post_data['admin_password'],
				'role' => $post_data['admin_job'],
				'privilege' => json_encode($post_data['role'])
			);
			if ($this->Dashboard_model->insert_admin($data)) {
				$this->session->set_flashdata('feedback',"Added Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('feedback',"Oops Something went Wrong !!!");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
			}
		} else{
			redirect('admin_controller');
		}
	}

	//all Admin
	public function all_admin(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['all_user'] = $this->Dashboard_model->get_all_admin();
			$this->load->view('admin_list', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function delete_admin($id=''){
		if ($this->session->has_userdata('ad_id')) {
			if ($this->Dashboard_model->delete_admin($id)) {
				$this->session->set_flashdata('feedback',"Deleted Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Oops Something went Wrong !!!");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}

	public function edit_admin($id=''){
		if ($this->session->has_userdata('ad_id')) {
			if ($page['admin_detail'] = $this->Dashboard_model->get_admin_by_id($id)) {
				$_SESSION['page_edit'] = 1;
				$this->load->view('add_admin', $page);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Oops Something went Wrong !!!");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}



	public function update_admin ($id=''){
		if ($this->session->has_userdata('ad_id')) {
			$post_data = $this->input->post();
			$data = array(
				'name' => $post_data['admin_name'],
				'email' => $post_data['admin_email'],
				'password' => $post_data['admin_password'],
				'role' => $post_data['admin_job'],
				'privilege' => json_encode($post_data['role'])
			);
			if ($this->Dashboard_model->update_admin($data, $id)) {
				$this->session->set_flashdata('feedback',"Added Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('feedback',"Oops Something went Wrong !!!");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
			}
		} else{
			redirect('admin_controller');
		}
	}

	public function success_story(){
		if ($this->session->has_userdata('ad_id')) {
			$pageData['success_story'] = $this->Dashboard_model->get_success_story();
			$this->load->view('success_story', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function update_success_story(){
		if ($this->session->has_userdata('ad_id')) {
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
	        $source_img = $_FILES["groom_image"]["tmp_name"];
	        $groom_image = 'assets/images/'.time().'.jpg';
	        $destination_img = $_SERVER['DOCUMENT_ROOT'].'/'.$groom_image;
	        if ($_FILES["groom_image"]["tmp_name"] !='') {
	        	$img1 = compress($source_img, $destination_img, 100);
	        } else {
	        	$img1 = false;
	        }

	        $source_img1 = $_FILES["bride_image"]["tmp_name"];
	        $bride_image = 'assets/images/'.time().'.jpg';
	        $destination_img1 = $_SERVER['DOCUMENT_ROOT'].'/'.$bride_image;
	        if ($_FILES["groom_image"]["tmp_name"] !='') {
	        	$img2 = compress($source_img1, $destination_img1, 100);
	        } else {
	        	$img2 = false;
	        }
        	$data = array(
        		'groom_name' => $this->input->post('groom_name'),
        		'groom_msg' => $this->input->post('groom_msg'),
        		'bride_name' => $this->input->post('bride_name'),
        		'bride_msg' => $this->input->post('bride_msg')
        	);
        	if ($img1) {
        		$data['groom_image'] = $groom_image;
        	}
        	if ($img2) {
        		$data['bride_image'] = $bride_image;
        	}
        	if ($this->Dashboard_model->update_success_story($data)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
        	}else{
        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
        	}
		} else{
			redirect('admin_controller');
		}
	}

	public function blog(){
		if ($this->session->has_userdata('ad_id')) {

			$pageData['blog'] = $this->Dashboard_model->get_blog();
			$this->load->view('blog', $pageData);
		} else{
			redirect('admin_controller');
		}
	}
	////////pages
		public function page(){
		if ($this->session->has_userdata('ad_id')) {

			$pageData['blog'] = $this->db->get("pages")->result_array();
			$this->load->view('page', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function add_blog($id = ''){
		if ($this->session->has_userdata('ad_id')) {
			if (empty($id)) {
				$this->load->view('add_blog');
			} else {				
				$pageData['blog'] = $this->Dashboard_model->get_blog_id($id);
				$this->load->view('add_blog', $pageData);
			}

		} else{
			redirect('admin_controller');
		}
	}
	//////////add page
		public function add_page($id = ''){
		if ($this->session->has_userdata('ad_id')) {
			if (empty($id)) {
				$this->load->view('page_add');
			} else {			
			    $this->db->where("id",$id);	
				$pageData['blog'] = $this->db->get("pages")->result_array();
				$this->load->view('page_add', $pageData);
			}

		} else{
			redirect('admin_controller');
		}
	}
	
	///////////add data
		public function add_pages($id=''){
		if ($this->session->has_userdata('ad_id')) {
			$img1 =0;
	        if ($_FILES["blog_img"]["tmp_name"]) {
		        $source_img = $_FILES["blog_img"]["tmp_name"];
		        $img_path = 'assets/images/hh_'.time().'.jpg';
		        $destination_img = $_SERVER['DOCUMENT_ROOT'].'/'.$img_path;

		        $img1 = $this->compress($source_img, $destination_img, 100);
	        }
			$data = array(
        		'name' => $this->input->post('blog_name'),
        		'desc' => $this->input->post('blog_desc'),
        		'keyword' => $this->input->post('blog_keyword'),
        		'description' => $this->input->post('blog_description'),
        		'url' => url_title($this->input->post('blog_name')),
        	);
        	if ($img1) {
        		$data['img'] = $img_path;
        	}
        	if (empty($id)) {
                 $this->db->insert("pages",$data);
		
        	} else{
        	    $this->db->where("id",$id);
        	    $this->db->update("pages",$data);
        	    
        	    }
        	    
        	    $this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect('admin_controller/page');
         
		} else{
			redirect('admin_controller');
		}
	}

	public function add_bl($id=''){
		if ($this->session->has_userdata('ad_id')) {
			$img1 =0;
	        if ($_FILES["blog_img"]["tmp_name"]) {
		        $source_img = $_FILES["blog_img"]["tmp_name"];
		        $img_path = 'assets/images/hh_'.time().'.jpg';
		        $destination_img = $_SERVER['DOCUMENT_ROOT'].'/'.$img_path;

		        $img1 = $this->compress($source_img, $destination_img, 100);
	        }
			$data = array(
        		'blog_name' => $this->input->post('blog_name'),
        		'blog_desc' => $this->input->post('blog_desc'),
        		'blog_keyword' => $this->input->post('blog_keyword'),
        		'blog_description' => $this->input->post('blog_description')
        		// 'blog_url' => $this->input->post('blog_url')
        	);
        	if ($img1) {
        		$data['blog_img'] = $img_path;
        	}
        	if (empty($id)) {
        		$id=0;
        	}
        	if ($this->Dashboard_model->insert_bl($data, $id)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect('admin_controller/blog');
        	} else{
        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
        	}
		} else{
			redirect('admin_controller');
		}
	}
	
	public function delete_blog($id=''){
		if ($this->session->has_userdata('ad_id')) {
			if ($this->Dashboard_model->delete_blog($id)) {
				$this->session->set_flashdata('feedback',"Deleted Successfully");
	            $this->session->set_flashdata('feedback_heading',"Success");
	            $this->session->set_flashdata('feedback_icon',"success");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}else{
	    		$this->session->set_flashdata('feedback',"Oops Something went Wrong !!!");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
	    	}
		} else{
			redirect('admin_controller');
		}
	}

	public function term_of_use(){
		if ($this->session->has_userdata('ad_id')) {

			$pageData['term_of_use'] = $this->Dashboard_model->get_term_of_use();
			$this->load->view('term_of_use', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function add_term_of_use($id = ''){
		if ($this->session->has_userdata('ad_id')) {
			if (empty($id)) {
				$this->load->view('add_term_of_use');
			} else {				
				$pageData['term_of_use'] = $this->Dashboard_model->get_term_of_use_id($id);
				$this->load->view('add_term_of_use', $pageData);
			}

		} else{
			redirect('admin_controller');
		}
	}

	public function add_tou($id=''){
		if ($this->session->has_userdata('ad_id')) {
			$data = array(
        		'term_of_use_desc' => $this->input->post('term_of_use_desc'),
        	);
        	if (empty($id)) {
        		$id=0;
        	}
        	if ($this->Dashboard_model->insert_tou($data, $id)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect('admin_controller/term_of_use');
        	} else{
        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
        	}
		} else{
			redirect('admin_controller');
		}
	}

	public function privacy_policy(){
		if ($this->session->has_userdata('ad_id')) {

			$pageData['privacy_policy'] = $this->Dashboard_model->get_privacy_policy();
			$this->load->view('privacy_policy', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function add_privacy_policy($id = ''){
		if ($this->session->has_userdata('ad_id')) {
			if (empty($id)) {
				$this->load->view('add_privacy_policy');
			} else {				
				$pageData['privacy_policy'] = $this->Dashboard_model->get_privacy_policy_id($id);
				$this->load->view('add_privacy_policy', $pageData);
			}

		} else{
			redirect('admin_controller');
		}
	}

	public function add_pp($id=''){
		if ($this->session->has_userdata('ad_id')) {
			$data = array(
        		'privacy_policy_desc' => $this->input->post('privacy_policy_desc'),
        	);
        	if (empty($id)) {
        		$id=0;
        	}
        	if ($this->Dashboard_model->insert_pp($data, $id)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect('admin_controller/privacy_policy');
        	} else{
        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
        	}
		} else{
			redirect('admin_controller');
		}
	}

	public function how_to_use(){
		if ($this->session->has_userdata('ad_id')) {

			$pageData['how_to_use'] = $this->Dashboard_model->get_how_to_use();
			$this->load->view('how_to_use', $pageData);
		} else{
			redirect('admin_controller');
		}
	}

	public function add_how_to_use($id = ''){
		if ($this->session->has_userdata('ad_id')) {
			if (empty($id)) {
				$this->load->view('add_how_to_use');
			} else {				
				$pageData['how_to_use'] = $this->Dashboard_model->get_how_to_use_id($id);
				$this->load->view('add_how_to_use', $pageData);
			}

		} else{
			redirect('admin_controller');
		}
	}

	public function add_htu($id=''){
		if ($this->session->has_userdata('ad_id')) {
			$data = array(
        		'how_to_use_desc' => $this->input->post('how_to_use_desc'),
        	);
        	if (empty($id)) {
        		$id=0;
        	}
        	if ($this->Dashboard_model->insert_htu($data, $id)) {
				$this->session->set_flashdata('feedback',"Update Successfully");
                $this->session->set_flashdata('feedback_heading',"Success");
                $this->session->set_flashdata('feedback_icon',"success");
	            redirect('admin_controller/how_to_use');
        	} else{
        		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
	            $this->session->set_flashdata('feedback_heading',"Error");
	            $this->session->set_flashdata('feedback_icon',"error");
	            redirect($_SERVER['HTTP_REFERER']);
        	}
		} else{
			redirect('admin_controller');
		}
	}

	
	public function add_city(){
		if ($this->session->has_userdata('ad_id')) {
 
			$this->load->view('add_city');
		} else{
			redirect('admin_controller');
		}
	}

    //select State
    public function selectState()
    {
        $country = $this->input->post('country');
        $state = $this->Dashboard_model->getState($country);

        foreach ($state as $key => $stateValue) {
            $stateName[] = $stateValue->state_name;
        } 
        echo json_encode($stateName);
    }

    public function add_city_insert()
    {
        $state_name = $this->input->post('state_name');
        $city_name = $this->input->post('city_name');
        $state_id = $this->Dashboard_model->getStateId($state_name); 
        foreach ($state_id as $key => $stateIdvalue) {
        	$s_id = $stateIdvalue->state_id;
        } 
        $data = array(
        	'city_name' => $city_name,
        	'state_id' => $s_id
        );
        if ($this->Dashboard_model->insert_city($data)) {
			$this->session->set_flashdata('feedback',"City added Successfully");
            $this->session->set_flashdata('feedback_heading',"Success");
            $this->session->set_flashdata('feedback_icon',"success");
            redirect($_SERVER['HTTP_REFERER']);
    	}else{
    		$this->session->set_flashdata('feedback',"Oops Something went Wrong");
            $this->session->set_flashdata('feedback_heading',"Error");
            $this->session->set_flashdata('feedback_icon',"error");
            redirect($_SERVER['HTTP_REFERER']);
    	}

    }
	
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
    
    
    
    
    
    public function loginprofile(){
        $args=func_get_args();
        $user=$this->db->get_where("users",array("user_id"=>$args[0]))->result();
            $_SESSION['id']=$args[0];
                $_SESSION['name']=$user->name;
                $_SESSION['email']=$user->email;
                $_SESSION['status']=$user->status;
                $_SESSION['looking_for'] = $user->looking_for;
                $_SESSION['pp'] = $user->image1;
                $_SESSION['gender'] = $user->gender;
                $_SESSION['is_admin_profile_edit'] = "Admin";
                $_SESSION['caste'] = $user->caste;
            
            
            $url="https://".$_SERVER['SERVER_NAME']."/mycon/view_profile";
            
            redirect($url);
    }
    
    
    
    public function religion(){
        if($this->input->post('submit')==1){
            $insert=array("religion"=>$this->input->post('name'));
            $this->db->insert('religion',$insert);
        }
        $data['all']=$this->db->get("religion")->result();
        $this->load->view("add_religion",$data);
    }
    public function caste(){
        if($this->input->post('submit')==1){
            $insert=array("religion_id"=>$this->input->post('id'),"caste"=>$this->input->post('name'));
            $this->db->insert('caste',$insert);
        }
        $data['all']=$this->db->get("caste")->result();
        $this->load->view("add_caste",$data);
    }
    
 public function religion_delete(){
     $args=func_get_args();
     $this->db->where("religion_id",$args[0]);
     $this->db->delete("religion");
     redirect("admin_controller/religion");
 }
    
 public function caste_delete(){
     $args=func_get_args();
     $this->db->where("caste_id",$args[0]);
     $this->db->delete("caste");
     redirect("admin_controller/caste");
 }
    
    
    
    
    
    
    
    
    
}