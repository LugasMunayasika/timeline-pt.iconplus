<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	public function getDetail($id){
		return $this->db->where('ID_ADMIN', $id)->get('admin')->row();
	}

	public function update($id, $foto){
		$dat = array(
			'FULLNAME'	=> $this->input->post('fullname'),
			'USERNAME'	=> $this->input->post('username'),
			'JENKEL'	=> $this->input->post('jk'),
			'NO_TELP'	=> $this->input->post('telp'),
			'ALAMAT'	=> $this->input->post('alamat'),
			'PHOTO'		=> $foto['file_name']
		);
		$this->db->where('ID_ADMIN', $id)->update('admin', $dat);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Profil_model.php */
/* Location: ./application/models/Profil_model.php */