<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

	public function getProfile($form_data, $limit='', $start='')
    {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('user_contact uc', 'uc.user_id = u.user_id');
        $this->db->join('user_education ue', 'ue.user_id = u.user_id');
        $this->db->join('user_family uf', 'uf.user_id = u.user_id');
        if (!empty($form_data['looking_for'])) {
            $this->db->where('looking_for !=', $form_data['looking_for']);
        }
        if (!empty($form_data['religion'])) {
            $this->db->where('religion', $form_data['religion']);
            if (!empty($form_data['caste'])) {
                $this->db->where_in('u.caste', $form_data['caste']);
            }   
        }
        if (!empty($form_data['age'][0])) {
            $this->db->where('YEAR(CURDATE()) - YEAR(dob) >=', $form_data['age'][0]);
        }
        if (!empty($form_data['age'][1])) {
            $this->db->where('YEAR(CURDATE()) - YEAR(dob) <=', $form_data['age'][1]);
        }
        if (!empty($form_data['height'])) {
            $this->db->where('height >=', $form_data['height']);
        }
        $this->db->where('u.hide_status', 0);
        $this->db->where('u.status', 1);
        $this->db->where('u.image1 >', '');
        $this->db->order_by("u.user_id", "desc");
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

    public function record_count() {
        return $this->db->count_all("users");
    }
    public function getAllProfile($limit='', $start='')
    {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('user_contact uc', 'uc.user_id = u.user_id');
        $this->db->join('user_education ue', 'ue.user_id = u.user_id');
        $this->db->join('user_family uf', 'uf.user_id = u.user_id');
        $this->db->where('looking_for !=', $_SESSION['looking_for']);
        $this->db->where('u.user_id !=', $_SESSION['id']);
        $this->db->where('u.hide_status', 0);
        $this->db->where('u.status', 1);
        $this->db->order_by("u.user_id", "desc");
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }
    
        public function getAllConnection($limit='', $start='')
    {
        $this->db->select('*');
        $this->db->from('connection c');
        $this->db->join('users u', 'u.user_id = c.req_to');
        $this->db->where('u.looking_for !=', $_SESSION['looking_for']);
        $this->db->where('u.status', 1);
        $this->db->where('c.req_from', $_SESSION['id']);
        $this->db->where('u.hide_status', 0);
   
        $this->db->order_by("c.connection_id", "desc");
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }
    
    
    
        public function getAllmatches($limit='', $start='')
    {
        $this->db->select('*');
        $this->db->from('connection c');
        $this->db->join('users u', 'u.user_id = c.req_to');
        $this->db->where('u.looking_for !=', $_SESSION['looking_for']);
        $this->db->where('u.status', 1);
        $this->db->where('c.status', 1);
        $this->db->where('c.req_from', $_SESSION['id']);
        $this->db->where('u.hide_status', 0);
   
        $this->db->order_by("c.connection_id", "desc");
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

    // Blog Fetch
    public function getAllBlogs($limit='', $start='')
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->order_by('blog_id', 'desc');

        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

    // Blog Older Fetch
    public function getAllOlderBlogs($limit='', $start='')
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->order_by('blog_id', 'asc');

        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

    // Blog Details
    public function getBlogDetails($blog_id)
    {
        $this->db->select('*');
        $this->db->where('blog_id', $blog_id);
        $this->db->from('blog');  
        return $this->db->get()->result();
    }

    // Blog Recent
    public function getRecentBlogs()
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->order_by('blog_id', 'asc');
        $this->db->limit(6);
        return $this->db->get()->result();
    }

    public function getDesireProfile($limit='', $start='')
    {
        $desiredProfile  = $this->db->select('*')
                                    ->where('user_id', $_SESSION['id'])
                                    ->get('desired_patner');
        if ($desiredProfile->num_rows()>0) {
            foreach ($desiredProfile->result() as $key => $desiredProfileValue) {
                $age= $desiredProfileValue->age;
                $height= $desiredProfileValue->height;
                $marital_status= $desiredProfileValue->marital_status;
                $country= $desiredProfileValue->country;
                $state= $desiredProfileValue->state;
                $religion= $desiredProfileValue->religion;
                $caste= $desiredProfileValue->caste;
            }
            $arrayAge = explode(',', $age);
            $arrayHeight = explode(', ', $height);
            $arrayMarital_status = explode(',', $marital_status);
            $arrayState = explode(',', $state);
            $arrayCaste = explode(', ', $caste);
            $this->db->select('*');
            $this->db->from('users u');
            $this->db->join('user_contact uc', 'uc.user_id = u.user_id');
            $this->db->join('user_education ue', 'ue.user_id = u.user_id');
            $this->db->join('user_family uf', 'uf.user_id = u.user_id');
            $this->db->where('looking_for !=', $_SESSION['looking_for']);
            $this->db->where('u.user_id !=', $_SESSION['id']);
            $this->db->where('u.hide_status', 0);
            $this->db->where('u.status', 1);
            if (!empty($arrayAge[0]) && !empty($arrayAge[1])) {
                $age1=$arrayAge[0]; $age2=$arrayAge[1];
                // $this->db->where('dob  <= DATE_SUB(CURDATE(), INTERVAL '.$age1.' YEAR) AND dob >= DATE_SUB(CURDATE(), INTERVAL '.$age2.' YEAR)');
            $this->db->where('YEAR(CURDATE())-YEAR(dob)<='.$age2.' AND YEAR(CURDATE())-YEAR(dob)>='.$age1);
            }
            // if (!empty($arrayAge[1])) {
               
            //     $this->db->where('dob <= DATE_SUB(CURDATE(), INTERVAL '.$age2.' YEAR)');
            // }
            if (!empty($arrayHeight[0])) {
                $this->db->where('u.height >=', $arrayHeight[0]);
            }
            if (!empty($arrayHeight[1])) {
                $this->db->where('u.height <=', $arrayHeight[1]);
            }
            if (!empty($marital_status)) {
                $this->db->where_in('u.marital_status', $arrayMarital_status);
            }
            if (!empty($religion)) {
                $this->db->where('u.religion', $religion);
                if (!empty($caste)) {
                    $this->db->where_in('u.caste', $arrayCaste);
                }
            }
            $this->db->order_by("u.user_id", "desc");
            if ($limit != '') {
                $this->db->limit($limit, $start);
            }
            return $this->db->get()->result();
        }
    } 
}