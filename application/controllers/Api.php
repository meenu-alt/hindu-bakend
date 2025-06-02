<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
        $this->load->model('Register_model');
    }

    // Check email uniqueness
    public function checkEmailValidation() {
        $email = $this->input->post('email');
        $this->form_validation->set_rules('email','User Email','is_unique[users.email]');
        
        if($this->form_validation->run() == false) {
            echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
        } else {
            echo json_encode(['status' => 'success']);
        }
    }

    // Handle registration
    public function register() {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'password' => md5($this->input->post('password')),
            // Add other fields as needed
        ];

        $id = $this->Register_model->register($data);
        
        if($id) {
            echo json_encode([
                'status' => 'success',
                'user_id' => $id,
                'message' => 'Registration successful'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Registration failed'
            ]);
        }
    }
}