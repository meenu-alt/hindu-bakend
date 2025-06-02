<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// It's good practice to put API controllers in a subfolder like 'api'
// So, this would be application/controllers/Api/RegisterController.php
// And you'd call it via /api/register/ (or whatever you set in routes)

class Register_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->database();

        // --- CORS HEADERS ---
        header("Access-Control-Allow-Origin: http://localhost:3000"); // Your React app's URL
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit;
        }
    }

    // Helper function to send JSON response (if not already present from previous examples)
    private function _send_json_response($data, $status_code = 200) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($status_code)
            ->set_output(json_encode($data));
    }

    // New method to handle the initial registration data and send OTP
    public function initiate_registration() {
        $request_data = json_decode(file_get_contents('php://input'), true);

        if (!$request_data) {
            $this->_send_json_response(['status' => false, 'message' => 'No data received.'], 400);
            return;
        }

        // Sanitize all inputs
        $cleaned_data = array_map([$this->security, 'xss_clean'], $request_data);

        // Set validation rules
        // Note: 'password' is received but not validated for OTP sending, it's for user save
        $this->form_validation->set_data($cleaned_data);
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
            ['is_unique' => 'This email address is already registered.']
        );
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|exact_length[10]|numeric|is_unique[users.phone]',
            [
                'is_unique' => 'This mobile number is already registered.',
                'exact_length' => 'Mobile number must be 10 digits.'
            ]
        );
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required'); // Add more specific date validation if needed
        $this->form_validation->set_rules('looking_for', 'Looking For', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('caste', 'Caste', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('language', 'Mother Tongue', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('pro_for', 'Profile For', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('terms_accepted', 'Terms and Conditions', 'required|callback_accept_terms_initial');


        if ($this->form_validation->run() == FALSE) {
            $this->_send_json_response(['status' => false, 'message' => 'Validation errors occurred.', 'errors' => $this->form_validation->error_array()], 400);
            return;
        }

        // --- Data seems valid, proceed to save user (as pending) and send OTP ---

        // 1. Prepare user data for insertion (status can be 'pending_otp' or similar)
        $user_data_to_insert = array(
            'name' => $cleaned_data['name'],
            'email' => $cleaned_data['email'],
            'phone' => $cleaned_data['mobile'],
            'dob' => $cleaned_data['dob'],
            'looking_for' => $cleaned_data['looking_for'],
            'gender' => $cleaned_data['gender'],
            'religion' => $cleaned_data['religion'],
            'caste' => $cleaned_data['caste'],
            'language' => $cleaned_data['language'],
            'pro_for' => $cleaned_data['pro_for'],
            'password' => password_hash($cleaned_data['password'], PASSWORD_BCRYPT), // Hash the password!
            'status' => 0, // Example: 0 for 'pending_otp_verification' or 'inactive'
            'created_at' => date('Y-m-d H:i:s'),
            'curr_location' => $cleaned_data['curr_location'] ?? "India",
        );

        // You might want to wrap this in a transaction if saving user and OTP together is critical
        // $this->db->trans_start();

        $user_id = $this->Register_model->create_pending_user($user_data_to_insert); // Use a specific model method

        if (!$user_id) {
            // $this->db->trans_rollback();
            $this->_send_json_response(['status' => false, 'message' => 'Failed to save user data. Please try again.'], 500);
            return;
        }

        // 2. Generate and Store OTP
        $this->Register_model->deleteRecordOTP($cleaned_data['mobile']); // Delete any old OTPs for this mobile
        $otp_code = rand(1000, 9999); // Generate 4-digit OTP
        $otp_data = array(
            'mobile' => $cleaned_data['mobile'],
            'otp' => $otp_code,
            'user_id' => $user_id, // Link OTP to the user_id if your OTP table supports it
            'updated_on' => date('Y-m-d H:i:s')
        );

        if (!$this->Register_model->insertMobileOTP($otp_data)) {
            // $this->db->trans_rollback();
            // Potentially delete the user created if OTP storage fails, or handle this state
            log_message('error', 'Failed to store OTP for mobile: ' . $cleaned_data['mobile']);
            $this->_send_json_response(['status' => false, 'message' => 'Failed to store OTP. Please try again.'], 500);
            return;
        }

        // 3. Send OTP via Fast2SMS
        $fields = array(
            "sender_id" => "FSTSMS", // REPLACE with your approved Sender ID
            "message" => "172738",   // YOUR DLT TEMPLATE ID for OTP
            "variables_values" => $otp_code,
            "route" => "dlt",        // Or "otp" or "t" as per your Fast2SMS account
            "numbers" => $cleaned_data['mobile'],
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0, // For dev. In prod, set to 2 if CA bundle available.
            CURLOPT_SSL_VERIFYPEER => 0, // For dev. In prod, set to true.
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: YOUR_FAST2SMS_API_KEY", // <<<< REPLACE THIS!
                "Content-Type: application/json",
                "accept: */*",
                "cache-control: no-cache",
            ),
        ));
        $sms_response_str = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // $this->db->trans_rollback();
            log_message('error', 'Fast2SMS cURL Error: ' . $err . ' for mobile ' . $cleaned_data['mobile']);
            // Consider what to do here. Maybe the user is saved but OTP failed.
            // You could inform the user to try "Resend OTP" later.
            $this->_send_json_response(['status' => false, 'message' => 'User data saved, but failed to send OTP. Please try "Resend OTP" on the verification page.'], 500);
            return;
        }

        $sms_response_data = json_decode($sms_response_str, true);
        if (!(isset($sms_response_data['return']) && $sms_response_data['return'] === true && !empty($sms_response_data['request_id']))) {
            // $this->db->trans_rollback();
            log_message('error', 'Fast2SMS API Error: ' . $sms_response_str . ' for mobile ' . $cleaned_data['mobile']);
            $this->_send_json_response(['status' => false, 'message' => 'User data saved, but OTP provider returned an error: '. ($sms_response_data['message'] ?? 'Unknown error'), 'details' => $sms_response_data], 400);
            return;
        }

        // If all successful
        // $this->db->trans_commit();
        $this->_send_json_response([
            'status' => true,
            'message' => 'Registration initiated. An OTP has been sent to your mobile number for verification.',
            'mobile' => $cleaned_data['mobile'] // Send mobile back for React to use
        ], 200);
    }

    // Custom validation callback for terms_accepted (if needed differently for this step)
    public function accept_terms_initial($str) {
        if ($str == 'true' || $str == 1 || $str === true) {
            return TRUE;
        } else {
            $this->form_validation->set_message('accept_terms_initial', 'You must accept the {field} to proceed.');
            return FALSE;
        }
    }


    // ... Your other existing controller methods like checkEmailValidation, verifyotp (which will be used by the OTP page), register (final activation), selectCaste etc. ...
    // Make sure verifyotp and the final register/activate_user method are also correctly implemented for the next step.

}
