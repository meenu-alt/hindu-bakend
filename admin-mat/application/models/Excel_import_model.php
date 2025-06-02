<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('CustomerID', 'DESC');
		$query = $this->db->get('tbl_customer');
		return $query;
	}

	function insert($data,$data1,$data2,$data3)
	{
		for ($i=0; $i < sizeof($data); $i++) {
			if ($i == sizeof($data)-1) {
				$this->db->insert('users', $data[$i]);
				$id = $this->db->insert_id();
				$data1[$i]['user_id'] = $id;
				$data2[$i]['user_id'] = $id;
				$data3[$i]['user_id'] = $id;
				$this->db->insert('user_contact', $data1[$i]);
				$this->db->insert('user_education', $data2[$i]);
				return $this->db->insert('user_family', $data3[$i]);
			} else {				
				$this->db->insert('users', $data[$i]);
				$id = $this->db->insert_id();
				$data1[$i]['user_id'] = $id;
				$data2[$i]['user_id'] = $id;
				$data3[$i]['user_id'] = $id;
				$this->db->insert('user_contact', $data1[$i]);
				$this->db->insert('user_education', $data2[$i]);
				$this->db->insert('user_family', $data3[$i]);
			}			
		}
	}
}
