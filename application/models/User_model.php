<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	private $table = "admin";

	public function getID($yah){
		$query = $this->db->where('USERNAME', $yah)->get('admin')->row()->ID_ADMIN;
		return $query;
	}

	public function usernameCheck($input){
		$hue = $this->db->where('USERNAME', $input)->get('admin');
		if($hue->num_rows() == 0){
			return true;
		}else{
			return false;
		}
	}

	public function getList(){
		return $query = $this->db->order_by('id_admin','ASC')->get('admin')->result();
	}

	public function insert(){
		$dat = array(
			'ID_ADMIN'	=> $this->generateID(),
			'USERNAME'	=> $this->input->post('username'),
			'PASSWORD'	=> md5($this->input->post('password')),
			'LAST_LOGIN'=> NULL,
			'JABATAN'		=> $this->input->post('jabatan'),
			'FULLNAME'	=> $this->input->post('fullname'),
			'JENKEL'	=> NULL,
			'NO_TELP'	=> NULL,
			'ALAMAT'	=> NULL,
			'PHOTO'		=> 'default.png',
			'DTE_CREATED' => date('Ymd')
			 );
		$this->db->insert('admin', $dat);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function inserts($id, $psw){
		if($psw == true){
			$dat = array(
				'USERNAME'	=> $this->input->post('username'),
				'JABATAN'		=> $this->input->post('jabatan'),
				'FULLNAME'	=> $this->input->post('fullname'),
				'PASSWORD'	=> md5($this->input->post('password'))
			);
		}else{
			$dat = array(
				'USERNAME'	=> $this->input->post('username'),
				'JABATAN'		=> $this->input->post('jabatan'),
				'FULLNAME'	=> $this->input->post('fullname'),
			);
		}
		$this->db->where('ID_ADMIN', $id)->update('admin', $dat);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function generateID(){
		$query = $this->db->order_by('ID_ADMIN', 'DESC')->limit(1)->get('admin')->row('ID_ADMIN');
		$lastNo = (int) substr($query, 2);
		$next = $lastNo + 1;
		$kd = 'AD';
		return $kd.sprintf('%03s', $next);
	}

	public function getPhoto($username){
		return $this->db->where('USERNAME', $username)->get('admin')->row('PHOTO');
	}

	public function getCount(){
		return $this->db->count_all('admin');
	}

	public function delete($id){
		// $this->db->where('ID_ADMIN', $id)->delete('admin');
		// if($this->db->affected_rows() > 0){
		// 	return true;
		// }else{
		// 	return false;
		// }
		return $this->db->delete($this->table, array("ID_ADMIN" => $id));
	}

	public function getDetail($id){
		return $this->db->where('ID_ADMIN', $id)->get('admin')->row();
	}

	public function checkAvailability($id){
		$query = $this->db->where('ID_ADMIN', $id)->get('admin');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function usernameChecks($id){
		$user = $this->db->where('ID_ADMIN', $id)->get('admin')->row('USERNAME');
		if($this->input->post('username') == $user){
			return true;
		}else{

			$get = $this->db->where('USERNAME', $this->input->post('username'))->get('admin');
			if($get->num_rows() > 0){
				return false;
			}else{
				return true;
			}
		}
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */