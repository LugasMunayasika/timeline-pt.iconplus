<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {


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