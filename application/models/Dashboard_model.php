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

	public function getListindex()
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		$this->db->join('monitoring', 'proyek.ID_PROYEK = monitoring.ID_PROYEK');
		$this->db->order_by('TGL_AWAL','ASC');

		return $this->db->get()->result();
		// return $this->db->order_by('NO_MONITORING', 'ASC')->get('monitoring')->result();
	}
}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */