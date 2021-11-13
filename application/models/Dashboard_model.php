<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	
	public function getAdmCount(){
		return $this->db->count_all('admin');
	}

	public function getAdmLkCount(){
		return $this->db->where('JENKEL', 'L')->from('admin')->count_all_results();
	}

	public function getAdmPrCount(){
		return $this->db->where('JENKEL', 'P')->from('admin')->count_all_results();
	}
	
	public function checkUser($uname){
		$query = $this->db->where('USERNAME', $uname)->get('admin');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */