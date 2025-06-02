<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: http://localhost:3000"); // React dev server
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");


class Login_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation', 'session']);
        $this->load->model(['Login_model', 'Register_model']);
        $this->load->helper('url');
    }

    // Show login form
    public function index() {
        $this->load->view('login_view');
    }

    // Login process
   public function login() {
    // Decode raw JSON input
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate inputs
    if (!isset($data['email']) || !isset($data['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
        return;
    }

    $username = $data['email'];
    $password = $data['password'];

    $user = $this->Login_model->loginUser($username);

    if ($user && password_verify($password, $user->password)) {
        if ($user->status == 5) {
            echo json_encode(['status' => 'error', 'message' => 'Profile Deleted. Contact support.']);
            return;
        }

        // Optionally set session
        $this->set_user_session($user);

        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'user' => [
                'id' => $user->user_id,
                'name' => $user->name,
                'email' => $user->email,
                'gender' => $user->gender,
                'looking_for' => $user->looking_for,
                'image' => $user->image1,
            ]
        ]);
        return;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}



    public function logout() {
        $this->clear_user_session();
        $this->set_flash('Successfully logout!', 'Success', 'success');
        redirect('Mycon');
    }

    private function set_flash($message, $heading = '', $icon = '') {
        $this->session->set_flashdata('feedback', $message);
        $this->session->set_flashdata('feedback_heading', $heading);
        $this->session->set_flashdata('feedback_icon', $icon);
    }

    private function set_user_session($user) {
        $this->session->set_userdata([
            'id' => $user->user_id,
            'name' => $user->name,
            'email' => $user->email,
            'status' => $user->status,
            'looking_for' => $user->looking_for,
            'pp' => $user->image1,
            'gender' => $user->gender,
        ]);
    }

    private function clear_user_session() {
        $this->session->unset_userdata([
            'id', 'name', 'email', 'status', 'gender', 'pp', 'looking_for'
        ]);
    }
}
