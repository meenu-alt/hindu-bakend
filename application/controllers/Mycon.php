<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycon extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->Register_model->deleteUserData();
	}

	public function index()
	{ 
		if (!isset($_SESSION['id'])) {
			$page_data['details'] = $this->Register_model->getDashProfile();
			// echo "<pre>"; print_r($page_data); exit();
			$this->load->view('index', $page_data);
		}else {
			redirect('mycon/view_profile');
		}
	}
	
	
	public function approve(){
	   // 	if ($_SESSION['id']==2) {
	    unset($_SESSION['id']);
        unset($_SESSION['fname']);
        unset($_SESSION['email']);
        unset($_SESSION['status']);
        unset($_SESSION['gender']);
        unset($_SESSION['pp']);
        unset($_SESSION['looking_for']);
			$this->load->view('approve');
// 		}else {
// 			redirect('mycon/view_profile');
// 		}
	}
	
	
	
	
	public function matched_interest(){
	    
				if (isset($_SESSION['id'])) {
			$config = array();
	        $config["base_url"] = base_url() . "mycon/match_interest";
	        $config["total_rows"] = sizeof($this->Search_model->getAllmatches());
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$page_data['detail'] = $this->Search_model->getAllmatches($config["per_page"], $page);
			$page_data["links"] = $this->pagination->create_links();
			$this->load->view('match_interest', $page_data);
		}else {
			redirect('');
		}
	}
	
	
	
	
	public function view_profile()
	{
		if (isset($_SESSION['id'])) {
			if ($this->input->get('id')) {
				$id = $this->input->get('id');
			} else {
				$id = $_SESSION['id'];
			}
			$page_data['details'] = $this->Register_model->getProfileAllDetailsById($id);
			// echo "<pre>";print_r($page_data['details'][0]->looking_for); exit();
// 			if ($_SESSION['looking_for'] != $page_data['details'][0]->looking_for || $_SESSION['id'] == $page_data['details'][0]->user_id && !empty($page_data['details'])) {
	if ($_SESSION['looking_for'] != $page_data['details'][0]->looking_for && $this->input->get('id') || $_SESSION['id'] == $page_data['details'][0]->user_id && !empty($page_data['details'])) {
				$page_data['connection'] = $this->Register_model->getConnectionDetailsById($_SESSION['id']);
				// echo "<pre>"; print_r($page_data); exit();
				$this->load->view('view_profile', $page_data);
			}else{
				$this->session->set_flashdata('feedback',"Please search by valid Id.");
                $this->session->set_flashdata('feedback_heading',"Error");
                $this->session->set_flashdata('feedback_icon',"error");
                redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			redirect('Mycon');
		}
	}
	public function create_profile()
	{
		if (isset($_SESSION['id']) && $_SESSION['status'] != 1) {
			$page_data['details'] = $this->Register_model->getProfileDetailsById();
			$this->load->view('create_profile', $page_data);
		} else {
			redirect($_SESSION['HTTP_REFERER']);
		}
	}
	public function chat()
	{	
		if (isset($_SESSION['id'])) {
			$get = $this->input->get();
			if (!empty($get)) {
				$id = $_GET['id'];
				$page_data['id']=$id;
				$this->load->view('chat', $page_data);
			} else {
				$this->load->view('chat');
			}
		}else {
			redirect('Mycon');
		}
	}
	public function search_result()
	{
		if (isset($_SESSION['id'])) {
			$config = array();
	        $config["base_url"] = base_url() . "mycon/search_result";
	        $config["total_rows"] = sizeof($this->Search_model->getAllProfile());
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$page_data['detail'] = $this->Search_model->getAllProfile($config["per_page"], $page);
			$page_data["links"] = $this->pagination->create_links();
			$this->load->view('search_result', $page_data);
		}else {
			redirect('Mycon');
		}
	}
	
	
		public function send_interest()
	{
		if (isset($_SESSION['id'])) {
			$config = array();
	        $config["base_url"] = base_url() . "mycon/send_interest";
	        $config["total_rows"] = sizeof($this->Search_model->getAllConnection());
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$page_data['detail'] = $this->Search_model->getAllConnection($config["per_page"], $page);
			$page_data["links"] = $this->pagination->create_links();
// 			print_r($page_data);
			$this->load->view('send_interest', $page_data);
		}else {
			redirect('Mycon');
		}
	}
	
	
	
	public function desire_patner_match()
	{
		if (isset($_SESSION['id'])) {
			$config = array();
	        $config["base_url"] = base_url() . "mycon/desire_patner_match";
	        $config["total_rows"] = sizeof($this->Search_model->getDesireProfile());
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$page_data['detail'] = $this->Search_model->getDesireProfile($config["per_page"], $page);
			$page_data["links"] = $this->pagination->create_links();
			$this->load->view('search_result', $page_data);
		}else {
			redirect('Mycon');
		}
	}
	public function recently_joint_match()
	{
		if (isset($_SESSION['id'])) {
			$config = array();
	        $config["base_url"] = base_url() . "mycon/recently_joint_match";
	        $config["total_rows"] = sizeof($this->Search_model->getAllProfile());
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;

	        $this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$page_data['detail'] = $this->Search_model->getAllProfile($config["per_page"], $page);
			$page_data["links"] = $this->pagination->create_links();
			$this->load->view('search_result', $page_data);
		}else {
			redirect('Mycon');
		}
	}
	public function filter_match()
	{
	    
		$form_data = $this->input->get();
// 		$url_query="";
 
//      if (!empty($form_data['looking_for'])) {
//             $url_query.=("?looking_for=".$form_data['looking_for']."&");
//         }
//         if (!empty($form_data['religion'])) {
//             $url_query.=("religion=".$form_data['religion']."&");
//             if (!empty($form_data['caste'])) {
//                 $url_query.=("caste=".$form_data['caste']."&");
//             }   
//         }
//         if (!empty($form_data['age'][0])) {
//             $url_query.=("age[]=". $form_data['age'][0]."&");
//         }
//         if (!empty($form_data['age'][1])) {
//           $url_query.=("age[]=".$form_data['age'][1]);
//         }
		
 
		$config = array();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config["base_url"] = base_url() . "mycon/filter_match/";
        $config["total_rows"] = sizeof($this->Search_model->getProfile($form_data));
        $config["per_page"] = 20;
        $config["reuse_query_string"] = TRUE;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

	
		$page_data['detail'] = $this->Search_model->getProfile($form_data, $config["per_page"], $page);
		$page_data["links"] = $this->pagination->create_links();
		$page_data["forms"] = $form_data;

		$this->load->view('filter_match', $page_data);
	}
	public function change_password()
	{
		$this->load->view('change_password');
	}
	public function customer_support()
	{
		$this->load->view('customer_support');
	}
	public function be_safe_online()
	{
		$this->load->view('be_safe_online');
	}
	public function privacy_policy()
	{
		$this->load->view('privacy_policy');
	}
	public function term_of_use()
	{
		$this->load->view('term_of_use');
	}
	public function how_to_use()
	{
		$this->load->view('how_to_use');
	}
	public function report_misuse()
	{
		$this->load->view('report_misuse');
	}
	public function desired_partner()
	{
		if (isset($_SESSION['id'])) {
			$page_data['detail'] = $this->Register_model->getDesiredPatnerData();
			$this->load->view('desired_partner', $page_data);
		}else {
			redirect('Mycon');
		}
	}
	public function add_photos()
	{
		if (isset($_SESSION['id'])) {
			// $fetchPhoto = $this->Register_model->fetchPhoto();
			// $pageData['photo'] = $fetchPhoto;
			// print_r($fetchPhoto); exit;
			$this->load->view('add_photos');
		}else {
			redirect('Mycon');
		}
	}
	public function search()
	{
		if (isset($_SESSION['id'])) { 
			$this->load->view('search');
		} else {
			redirect('Mycon');
		}
	} 
	public function blog()
	{ 
		$config = array();
        $config["base_url"] = base_url() . "mycon/blog";
        $config["total_rows"] = sizeof($this->Search_model->getAllBlogs());
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$page_data['detail'] = $this->Search_model->getAllBlogs($config["per_page"], $page);
		$page_data['older_post'] = $this->Search_model->getAllOlderBlogs($config["per_page"], $page);
		$page_data["links"] = $this->pagination->create_links(); 
		$this->load->view('blog', $page_data); 
	}
	public function blog_details($blog_id)
	{  
		$page_data['detail'] = $this->Search_model->getBlogDetails($blog_id);
		$page_data['recent_post'] = $this->Search_model->getRecentBlogs();
		$this->load->view('blog_details', $page_data);
	}
	
}