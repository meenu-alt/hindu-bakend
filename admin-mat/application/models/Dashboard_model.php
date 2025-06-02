<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_all_user(){
	    
	    $this->db->select('*');
$this->db->from('users');
$this->db->join('user_contact', 'user_contact.user_id = users.user_id');
return $query = $this->db ->order_by('users.user_id', 'desc')->get()->result_array();

//////old
    //  return $this->db->select('*')
    //                  ->order_by('user_id', 'desc')
    //                  ->get('users')->result_array();
  }

  public function get_all_active_user(){
     return $this->db->select('*')
                     ->where('status', 1)
                     ->order_by('user_id', 'DESC')
                     ->get('users')->result_array();
  }

  public function get_all_inactive_user(){
     return $this->db->select('*')
                     ->where('status', 0)
                     ->order_by('user_id', 'DESC')
                     ->get('users')->result_array();
  }

  public function get_all_block_user(){
     return $this->db->select('*')
                     ->where('status', 2)
                     ->order_by('user_id', 'DESC')
                     ->get('users')->result_array();
  }
  
  
  public function get_all_delete_user(){
     return $this->db->select('*')->order_by('user_id', 'DESC')
                     ->get('delete_account')->result_array();
  }
  
  public function get_all_male_user(){
     return $this->db->select('*')
                     ->where('gender', 'male')
                     ->where('status', 1)
                     ->get('users')->result_array();
  }
  
  public function get_all_female_user(){
     return $this->db->select('*')
                     ->where('gender', 'female')
                     ->where('status', 1)
                     ->get('users')->result_array();
  }

  public function get_admin_menu(){
    return $this->db->select('*')
                    ->get('admin_menu')->result_array();
  }

  public function get_admin_sub_menu(){
    return $this->db->select('*')
                    ->get('admin_sub_menu')->result_array();
  }

  public function block_user($user_id){
    $data = array('status' => 2);
    return $this->db->where('user_id', $user_id)
                    ->update('users', $data);
  }

  public function unblock_user($user_id){
    $data = array('status' => 1);
    return $this->db->where('user_id', $user_id)
                    ->update('users', $data);
  }

  public function get_banner_images(){
    return $this->db->select('*')
                    ->get('banner_image')->result_array();
  }

  public function update_banner($data){
    return $this->db->where('banner_image_id', 1)
                    ->update('banner_image', $data);
  }

  public function get_all_testimonials(){
    return $this->db->select('*')
                    ->get('testimonial')->result_array();
  }

  //get user all detail by id 
  public function getProfileAllDetailsById($id){
  return $this->db->select('*')
          ->from('users u')
          ->join('user_contact uc', 'uc.user_id = u.user_id')
          ->join('user_education ue', 'ue.user_id = u.user_id')
          ->join('user_family uf', 'uf.user_id = u.user_id')
          ->where('u.user_id', $id)
          ->get()->result_array();
  }

  public function update_testimonial($id, $data){
    return $this->db->where('testimonial_id', $id)
                    ->update('testimonial', $data);
  }

  public function insert_testimonial($data){
    return $this->db->insert('testimonial', $data);
  }

  public function get_recent_upload(){
    return $this->db->select('*')
                    ->get('recent_upload')->result_array();
  }

  public function update_recent_upload($data1,$data2,$data3,$data4){
    for($i=1; $i<=4; $i++){
      if ($i==4) {
        $data = $data.$i;
        return $this->db->where('ru_id', $i)
                        ->update('recent_upload', $data4);
      }
      if ($i==3) {
        $this->db->where('ru_id', $i)
                 ->update('recent_upload', $data3);
      }
      if ($i==2) {
        $this->db->where('ru_id', $i)
                 ->update('recent_upload', $data2);
      }
      if ($i==1) {
        $this->db->where('ru_id', $i)
                 ->update('recent_upload', $data1);
      }
    }
  }

  public function get_numbers(){
    return $this->db->select('*')
                    ->get('number_counter')->result_array();
  }

  public function update_numbers($data){
    return $this->db->where('nc_id', 1)
                    ->update('number_counter', $data);
  }

  public function get_report_misuse(){
    return $this->db->select('*')
                    ->get('report_misuse')->result_array();
  }

  public function getReportMisuseById($rm_id){
    return $this->db->select('*')
                    ->where('rm_id', $rm_id)
                    ->get('report_misuse')->result_array();
  }

  public function get_contact_us(){
      $this->db->order_by("cs_id","desc");
    return $this->db->get('customer_support')->result_array();
  }  

  public function delete_contact_us($id){
    return $this->db->where('cs_id', $id)
                    ->delete('customer_support');
  }

  public function getContactUsById($cs_id){
    return $this->db->select('*')
                    ->where('cs_id', $cs_id)
                    ->get('customer_support')->result_array();
  }

  public function update_password($password, $new_password){
    $query = $this->db->select('*')
                      ->where('ad_id', $_SESSION['ad_id'])
                      ->where('password', $password)
                      ->get('admin');
    if ($query->num_rows() > 0) {
      $data = array('password' => $new_password);
      return $this->db->where('ad_id', $_SESSION['ad_id'])
                      ->update('admin', $data);
    } else {
      return false;
    }
  }
  
  public function insert_admin($data){
    return $this->db->insert('admin', $data);
  }

  public function get_all_admin(){
     return $this->db->select('*')
                     ->order_by('ad_id', 'DESC')
                     ->get('admin')->result_array();
  }

  public function delete_admin($id){
    return $this->db->where('ad_id', $id)
                    ->delete('admin');
  }

  public function get_admin_by_id($id) {
    return $this->db->select('*')
          ->where('ad_id', $id)
          ->get('admin')->result_array();
  }

  public function update_admin($data, $id){
    return $this->db->where('ad_id', $id)
                    ->update('admin', $data);
  }

  public function get_success_story(){
    return $this->db->select('*')
                    ->get('success_story')->result_array();
  }

  public function update_success_story($data){
    return $this->db->where('ss_id', 1)
                    ->update('success_story', $data);
  }  

  public function get_blog(){
    return $this->db->select('*')
                    ->get('blog')->result_array();
  }

  public function get_blog_id($id = ''){
    return $this->db->select('*')
                    ->where('blog_id', $id)
                    ->get('blog')->result_array();
  }  

  public function insert_bl($data, $id){
    if ($id == 0) {
      return $this->db->insert('blog', $data);
    } else {
      return $this->db->where('blog_id', $id)
                    ->update('blog', $data);
    }
  }  

  public function delete_blog($id){
    return $this->db->where('blog_id', $id)
                    ->delete('blog');
  } 

  public function get_term_of_use(){
    return $this->db->select('*')
                    ->get('term_of_use')->result_array();
  }

  public function get_term_of_use_id($id = ''){
    return $this->db->select('*')
                    ->where('term_of_use_id', $id)
                    ->get('term_of_use')->result_array();
  }

  public function insert_tou($data, $id){
    if ($id == 0) {
      return $this->db->insert('term_of_use', $data);
    } else {
      return $this->db->where('term_of_use_id', $id)
                    ->update('term_of_use', $data);
    }
  } 

  public function get_privacy_policy(){
    return $this->db->select('*')
                    ->get('privacy_policy')->result_array();
  }

  public function get_privacy_policy_id($id = ''){
    return $this->db->select('*')
                    ->where('privacy_policy_id', $id)
                    ->get('privacy_policy')->result_array();
  }

  public function insert_pp($data, $id){
    if ($id == 0) {
      return $this->db->insert('privacy_policy', $data);
    } else {
      return $this->db->where('privacy_policy_id', $id)
                    ->update('privacy_policy', $data);
    }
  } 

  public function get_how_to_use(){
    return $this->db->select('*')
                    ->get('how_to_use')->result_array();
  }

  public function get_how_to_use_id($id = ''){
    return $this->db->select('*')
                    ->where('how_to_use_id', $id)
                    ->get('how_to_use')->result_array();
  }

  public function insert_htu($data, $id){
    if ($id == 0) {
      return $this->db->insert('how_to_use', $data);
    } else {
      return $this->db->where('how_to_use_id', $id)
                    ->update('how_to_use', $data);
    }
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

    public function getStateId($state_name){
      return $this->db->select('*')
                    ->where('state_name', $state_name)
                    ->get('states')->result(); 
    } 

  public function insert_city($data){
    return $this->db->insert('cities', $data);
  }


}