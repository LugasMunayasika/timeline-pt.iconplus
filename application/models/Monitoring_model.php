<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{
	private $table = "monitoring";
	public function insert()
	{
		$data = array(
			'NO_MONITORING'		=> $this->generateID(),
			'ID_PROYEK'		=> $this->input->post('id_proyek'),
			'TANGGAL'		=> $this->input->post('tanggal'),
			'PROGRES'		=> $this->input->post('progres'),
			'DANA_TURUN'		=> $this->input->post('dana_turun'),
	
		);

		$this->db->insert('monitoring', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function generateID(){
		$query = $this->db->order_by('NO_MONITORING', 'DESC')->limit(1)->get('monitoring')->row('NO_MONITORING');
		$lastNo = (int) substr($query, 5);
		$next = $lastNo + 1;
		$kd = 'NMTR';
		return $kd.sprintf('%06s', $next);
	}

	public function update($id)
	{
		$data = array(
			'TANGGAL'		=> $this->input->post('tanggal'),
			'PROGRES'		=> $this->input->post('progres'),
			'DANA_TURUN'		=> $this->input->post('dana_turun'),
		);

		$this->db->where('NO_MONITORING', $id)->update('monitoring', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('monitoring');
	}

	public function getList()
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		$this->db->join('monitoring', 'proyek.ID_PROYEK = monitoring.ID_PROYEK');
		return $this->db->get()->result();
		// return $this->db->order_by('NO_MONITORING', 'ASC')->get('monitoring')->result();
	}
	public function getListindex()
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		$this->db->join('monitoring', 'proyek.ID_PROYEK = monitoring.ID_PROYEK');
		$this->db->order_by('monitoring.ID_PROYEK','ASC');

		return $this->db->get()->result();
		// return $this->db->order_by('NO_MONITORING', 'ASC')->get('monitoring')->result();
	}
	// public function getList1($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('proyek');
	// 	$this->db->join('program', 'program.ID_PROGRAM = proyek.ID_PROGRAM');
	// 	$this->db->order_by('ID_PROYEK', 'ASC');
	// 	// $this->db->get_where('proyek',array('ID_PROYEK ='=>$id));
	// 	return $this->db->get()->result();
	// 	//return $query = $this->db->order_by('ID_AP', 'ASC')->get_where('anggota_proyek',array('ID_PROYEK ='=>$id))->result();
	// }
	public function getDetail($id)
	{
		return $this->db->where('NO_MONITORING', $id)->get('monitoring')->row();
	}

	public function delete($id)
	{
		// $this->db->where('NO_MONITORING', $id)->delete('monitoring');
		// if ($this->db->affected_rows() > 0) {
		// 	return true;
		// } else {
		// 	return false;
		// }
		return $this->db->delete($this->table, array("NO_MONITORING" => $id));
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('NO_MONITORING', $id)->get('monitoring');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Monitoring_model.php */
/* Location: ./application/models/Monitoring_model.php */