<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // New or Modified method to create a user, possibly in a 'pending OTP' state
    public function create_pending_user($data){
		// Assumes $data['password'] is already hashed by the controller
        // Assumes $data['created_at'] is set by the controller
        // Assumes $data['status'] is set (e.g., 0 for pending OTP)
		if ($this->db->insert('users', $data)) {
   		    $id = $this->db->insert_id();
            // Optionally, create entries in related tables immediately or after OTP verification.
            // For now, let's assume basic user record is enough until OTP is verified.
            // $data_related = array('user_id' => $id);
            // $this->db->insert('user_contact', $data_related);
            // $this->db->insert('user_education', $data_related);
            // $this->db->insert('user_family', $data_related);
            return $id; // Return the new user_id
        }
   		return false;
	}

	//delete all 10 mint old data from otp table for a specific mobile
	public function deleteRecordOTP($mobile = null){
        if ($mobile) {
            $this->db->where('mobile', $mobile);
        }
        // Also delete globally expired OTPs (older than, say, 15-30 minutes)
		$this->db->or_where('updated_on < (NOW() - INTERVAL 15 MINUTE)');
		return $this->db->delete('otp');
	}

	//insert otp in database
	public function insertMobileOTP($userData){
        // $userData should include 'mobile', 'otp', 'user_id' (optional but good), 'updated_on'
		return $this->db->insert('otp', $userData);
	}

	// Check if a valid OTP exists for verification (used by your OTP verification page's backend)
	public function getRowsVerifyOtp($mobile, $otp_code){
		$query = $this->db->where('mobile', $mobile)
						  ->where('otp', $otp_code)
                          ->where('updated_on >=', date('Y-m-d H:i:s', strtotime('-10 MINUTE'))) // OTP valid for 10 min
						  ->get('otp');
		if ($query->num_rows() > 0) {
			return $query->row_array(); // Return the OTP record (can include user_id if stored)
		} else {
			return false;
		}
	}

    // Method to update user status after OTP verification (used by OTP page's backend)
    public function activate_user_account($user_id) {
        $data = array(
            'status' => 1, // Example: 1 for 'active'
            'phone_verified_at' => date('Y-m-d H:i:s') // Optional: Mark phone as verified
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }





	// Check if any user exists with the given credentials	
	public function getRowsMobileOtp($mobile){
		$query = $this->db->where('mobile', $mobile)
						  ->get('otp');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}


	//register user
	public function register($data){
		$this->db->insert('users', $data);
   		$id = $this->db->insert_id();
   		$data1 = array(
   			'user_id'=>$id
   		);
   		$this->db->insert('user_contact', $data1);
   		$this->db->insert('user_education', $data1);
   		$this->db->insert('user_family', $data1);
   		return $id;

	}

	//register all detail
    public function insertUsers2($data,$data1,$data2,$data3){
        $id = $_SESSION['id'];

        // echo $md5email;
        $this->db->where('user_id',$id)
        		 ->update('users', $data);

        $this->db->where('user_id',$id)
        		 ->update('user_contact',$data1);

        $this->db->where('user_id',$id)
        		 ->update('user_education',$data2);

        return $this->db->where('user_id',$id)
 						->update('user_family',$data3);      
    }

    public function getIndiaState(){
    	$sql = "SELECT * FROM states where country_id=101";
	 	return $this->db->query($sql)->result();
    }

    //get states 
    public function getState($country){
	 	$sql = "SELECT * FROM countries where country_name='".$country."'";
	 	$country_id = $this->db->query($sql)->result();
	 	foreach ($country_id as $key => $countryIdValue) {
	 		$c_id=$countryIdValue->country_id;
	 	}
	 	$sql = "SELECT * FROM states where country_id=".$c_id;
	 	return $this->db->query($sql)->result();
    } 

    //get country 
    public function getCountry(){
	 	$sql = "SELECT * FROM countries";
	 	return $this->db->query($sql)->result();
    } 

    //get language 
    public function getLanguage(){
	 	$sql = "SELECT * FROM language ORDER BY language";
	 	return $this->db->query($sql)->result();
    } 

    //get user detail by id 
    public function getProfileDetailsById(){
	 	return $this->db->select('*')
	 			 		->where('user_id', $_SESSION['id'])
	 			 		->get('users')->result();
    }  

    //get user all detail by id 
    public function getProfileAllDetailsById($id){
	 	return $this->db->select('*')
	 			 		->from('users u')
	 			 		->join('user_contact uc', 'uc.user_id = u.user_id')
	 			 		->join('user_education ue', 'ue.user_id = u.user_id')
	 			 		->join('user_family uf', 'uf.user_id = u.user_id')
	 			 		->where('u.user_id', $id)
	 			 		->get()->result();
    }  

    //get dashboard user all detail
    public function getDashProfile(){
	 	return $this->db->select('*')
	 			 		->from('users u')
	 			 		->join('user_contact uc', 'uc.user_id = u.user_id')
	 			 		->join('user_education ue', 'ue.user_id = u.user_id')
	 			 		->join('user_family uf', 'uf.user_id = u.user_id')
	 			 		->where('u.hide_status', 0)
	 			 		->order_by('u.user_id', 'desc')
	 			 		->limit(4)
	 			 		->get()->result();
    } 

    //get income 
    public function getIncome(){
	 	return $this->db->get('income')->result();
    } 

    //get Occupation 
    public function getOccupation(){
	 	return $this->db->get('occupation')->result();
    } 

    //get Education 
    public function getEducation(){
	 	return $this->db->get('edu_degree')->result();
    }

    //get city 
    public function selectCity($country,$state){
    	$sql = "SELECT * FROM countries where country_name='".$country."'";
	 	$country_id = $this->db->query($sql)->result();
	 	foreach ($country_id as $key => $countryIdValue) {
	 		$c_id=$countryIdValue->country_id;
	 	}
	 	$state_id = $this->db->select('*')
	 						 ->where('state_name', $state)
	 						 ->where('country_id', $c_id)
	 			 			 ->get('states')->result();
	 	foreach ($state_id as $key => $value) {
	 		$s_id = $value->state_id;
	 	}
	 	$city = $this->db->select('*')
	 					 ->where('state_id', $s_id)
	 					 ->get('cities')->result();
	 	return $city;
    }

    //get connection 
    public function getConnectionDetailsById($id){
    	return $this->db->select('*')
    					->where('req_from', $id)
    					->or_where('req_to', $id)
    					->get('connection')->result();
    }

    //get religion
    public function getReligion(){
        $this->db->order_by('religion', 'ASC');
    	return $this->db->get('religion')->result();
    }

    //get caste
    public function selectCaste($religion){
        
	 	$religion_id = $this->db->select('*')
	 						 ->where('religion', $religion)
	 			 			 ->get('religion')->result();
	 	// echo "<pre>"; print_r($religion); exit;
	 	foreach ($religion_id as $key => $value) {
	 		$r_id = $value->religion_id;
	 	}
	 	$caste = $this->db->select('*')->from('caste')
	 					 ->where('religion_id', $r_id)->order_by('caste',"ASC")
	 					 ->get()->result();
	 	return $caste;
    }

    //get sub caste
    public function getSubCaste($religion, $caste){
	 	$religion_id = $this->db->select('*')
	 						 ->where('religion', $religion)
	 			 			 ->get('religion')->result();
	 	foreach ($religion_id as $key => $value) {
	 		$r_id = $value->religion_id;
	 	}
	 	$caste_id = $this->db->select('*')
	 					 ->where('religion_id', $r_id)
	 					 ->where('caste', $caste)
	 					 ->get('caste')->result();
	 	foreach ($caste_id as $key => $casteValue) {
	 		$c_id = $casteValue->caste_id;
	 	}
	 	$sub_caste = $this->db->select('*')
	 					 ->where('religion_id', $r_id)
	 					 ->where('caste_id', $c_id)
	 					 ->get('sub_caste')->result();
	 	return $sub_caste;
    }

    //change password
    public function change_pwd($new_pwd, $old_pwd){
    	$check = $this->db->where('password', md5($old_pwd))
    					  ->where('user_id', $_SESSION['id'])
    					  ->get('users');
    	if ($check->num_rows()>0) {
    		$data = array(
    			// 'password' => md5($new_pwd)
                'password' => password_hash($this->input->post('pwd'), PASSWORD_DEFAULT)
    		);
    		return $this->db->where('user_id', $_SESSION['id'])
    						->update('users', $data);
    	}else {
    		return false;
    	}
    }

    //delete profile request
     public function delete_pro($data){
     	return $this->db->insert('delete_account', $data);
     }

    //delete profile
     public function deleteUserData(){
     	$sql = "SELECT * FROM delete_account WHERE created_on < (NOW() - INTERVAL 720 HOUR)";
		$query =  $this->db->query($sql)->result();

		foreach ($query as $key => $value) {
			$table = array('users', 'user_contact', 'user_education', 'user_family');
			$size = sizeof($table);
			for ($i=0; $i < $size ; $i++) { 
				// if ($i == $size -1) {
				// 	return $this->db->where('user_id', $value->user_id)
				// 					->delete($table[$i]);
				// } else {
					$this->db->where('user_id', $value->user_id)
							->delete($table[$i]);
				// }
			}
			$data = array(
				'status' => 1
			);
			$this->db->where('user_id', $value->user_id)
							->update('delete_account', $data);
		}
		return true;
     }

    //delete profile request
     public function hide_pro($data){
     	return $this->db->where('user_id', $_SESSION['id'])
						->update('users', $data);
     }

    //fetch photo
     public function fetchPhoto(){
     	return $this->db->select('image1, image2, image3, image4, image5, image6')
     					->where('user_id', $_SESSION['id'])
						->get('users')->result();
     }

    //upload photo
     public function uploadImg($data){
     	return $this->db->where('user_id', $_SESSION['id'])
						->update('users', $data);
     }

     //clear notifiaction 
     public function clearNoti(){
     	$data = array(
     		'status'=> 1
     	);
     	return $this->db->where('notice_for', $_SESSION['id'])
     					->update('notification', $data);
     }

    //get desired patner data
     public function getDesiredPatnerData(){
     	return $this->db->select('*')
     					->where('user_id', $_SESSION['id'])
						->get('desired_patner')->result();
     }

    //insert desired patners
     public function insertDesiredPartner($data){
     	return $this->db->insert('desired_patner', $data);
     }

    //update desired patners basic
     public function updateDpBasicDetails($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('desired_patner', $data);
     }

    //update desired patners religion
     public function updateDpReligionEthnicity($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('desired_patner', $data);
     }

    //update desired patners education
     public function updateDpEducationWork($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('desired_patner', $data);
     }

    //update profile description
     public function updateProfileDes($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('users', $data);
     }

    //update profile basic details
     public function updateProfileBasicDetails($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('users', $data);
     }

    //update profile contact
     public function updateProfileContact($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('user_contact', $data);
     }

    //update profile education
     public function updateProfileEducation($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('user_education', $data);
     }

    //update profile family
     public function updateProfileFamily($data){
     	return $this->db->where('user_id', $_SESSION['id'])
     					->update('user_family', $data);
     }

    //update profile family Address
     public function updateProfileFamilyAddress($data){
        return $this->db->where('user_id', $_SESSION['id'])
                        ->update('user_contact', $data);
     }

     //get success story
    public function getSuccessStory(){
        return $this->db->get('success_story')->result();
    }

    //get testimonials
    public function getTestimonials(){
        return $this->db->get('testimonial')->result();
    }

    //get banner image
    public function getBannerImage(){
        return $this->db->get('banner_image')->result();
    }

    //get number counter
    public function getNumberCounter(){
        return $this->db->get('number_counter')->result();
    }

    //get recent upload profile
    public function getRecentUpload(){
        $query =  $this->db->get('recent_upload')->result();

        foreach ($query as $key => $queryValue) {
           $id[$key] = $queryValue->user_id;
        }

        return $this->db->select('*')
                        ->where_in('user_id', $id)
                        ->where('hide_status', 0)
                        ->get('users')->result();
    }

    //forgot password
    public function forgot_pwd($email, $password){
        $data = array('password' => password_hash($this->input->post('pwd'), PASSWORD_DEFAULT));
        return $this->db->where('email', $email)
                        ->update('users', $data);
    }

    //email verification
    public function email_verification($email){
        $data = array('verify_email' => 1);
        return $this->db->where('email', $email)
                        ->update('users', $data);
    }
    
    //get user all detail for calculator
    public function getProfileAllDetailsForCal($id){
        $data = $this->db->select('*')
                        ->from('users u')
                        ->join('user_contact uc', 'uc.user_id = u.user_id')
                        ->join('user_education ue', 'ue.user_id = u.user_id')
                        ->join('user_family uf', 'uf.user_id = u.user_id')
                        ->where('u.user_id', $id)
                        ->get()->result_array();

        $photo = 0;
        $email_verify = 0;
        $basic_detail = 0;
        $contact_detail = 0;
        $education_detail = 0;
        $family_detail = 0;
        if ($data[0]['image1'] != '') {
            $photo = 25;
        }
        if ($data[0]['verify_email'] == 1) {
            $email_verify = 15;
        }
        if (empty($data[0]['email']) || empty($data[0]['phone']) || empty($data[0]['pro_for']) || empty($data[0]['looking_for']) || empty($data[0]['gender']) || empty($data[0]['name']) || empty($data[0]['dob']) || empty($data[0]['religion']) || empty($data[0]['caste']) || empty($data[0]['sub_caste']) || empty($data[0]['language']) || empty($data[0]['curr_location']) || empty($data[0]['desc']) || empty($data[0]['height']) || empty($data[0]['weight']) || empty($data[0]['marital_status']) || empty($data[0]['complexion']) || empty($data[0]['bdy_type']) || empty($data[0]['ps']) || empty($data[0]['eating']) || empty($data[0]['drinking']) || empty($data[0]['smoking']) ) {
            if (empty($data[0]['email']) && empty($data[0]['phone']) && empty($data[0]['pro_for']) && empty($data[0]['looking_for']) && empty($data[0]['gender']) && empty($data[0]['name']) && empty($data[0]['dob']) && empty($data[0]['religion']) && empty($data[0]['caste']) && empty($data[0]['sub_caste']) && empty($data[0]['language']) && empty($data[0]['curr_location']) && empty($data[0]['desc']) && empty($data[0]['height']) && empty($data[0]['weight']) && empty($data[0]['marital_status']) && empty($data[0]['complexion']) && empty($data[0]['bdy_type']) && empty($data[0]['ps']) && empty($data[0]['eating']) && empty($data[0]['drinking']) && empty($data[0]['smoking']) ) {
                    $basic_detail = 0;
                } else {
                    $basic_detail = 10;
                }

        } else {
            $basic_detail = 15;
        }

        if (empty($data[0]['address']) || empty($data[0]['city']) || empty($data[0]['state']) || empty($data[0]['country']) || empty($data[0]['pin']) ) {
            if (empty($data[0]['address']) && empty($data[0]['city']) && empty($data[0]['state']) && empty($data[0]['country']) && empty($data[0]['pin']) ) {
                    $contact_detail = 0;
                } else {
                    $contact_detail = 10;
                }
        }else {
            $contact_detail = 15;
        }

        if (empty($data[0]['highest_edu']) || empty($data[0]['schl_name']) || empty($data[0]['ug_degree']) || empty($data[0]['pg_degree']) || empty($data[0]['emp_in']) || empty($data[0]['occupation']) || empty($data[0]['annual_income']) ) {
            if (empty($data[0]['highest_edu']) && empty($data[0]['schl_name']) && empty($data[0]['ug_degree']) && empty($data[0]['pg_degree']) && empty($data[0]['emp_in']) && empty($data[0]['occupation']) && empty($data[0]['annual_income']) ) {
                    $education_detail = 0;
                } else {
                    $education_detail = 10;
                }
        }else {
            $education_detail = 15;
        }

        if (empty($data[0]['mother']) || empty($data[0]['father']) || empty($data[0]['sister']) || empty($data[0]['brother']) || empty($data[0]['gothra_maternal']) || empty($data[0]['family_status']) || empty($data[0]['family_income']) || empty($data[0]['family_type']) || empty($data[0]['family_based']) || empty($data[0]['living_wth_parents']) ) {
            if (empty($data[0]['mother']) && empty($data[0]['father']) && empty($data[0]['sister']) && empty($data[0]['brother']) && empty($data[0]['gothra_maternal']) && empty($data[0]['family_status']) && empty($data[0]['family_income']) && empty($data[0]['family_type']) && empty($data[0]['family_based']) && empty($data[0]['living_wth_parents']) ) {
                $family_detail = 0;
            } else{
                $family_detail = 10;
            }
        }else {
            $family_detail = 15;
        }
        return $response = array(
            'photo' => $photo,
            'email_verify' => $email_verify,
            'basic_detail' => $basic_detail,
            'contact_detail' => $contact_detail,
            'education_detail' => $education_detail,
            'family_detail' => $family_detail
        );
    }

    public function delete_notification($id='') {
        return $this->db->where('notification_id', $id)
                        ->delete('notification');

    }

    //get
    public function getPrivacyPolicy(){
        return $this->db->get('privacy_policy')->result();
    }

    //get
    public function getTermOfUse(){
        return $this->db->get('term_of_use')->result();
    }

    //get
    public function getHowToUse(){
        return $this->db->get('how_to_use')->result();
    }


}