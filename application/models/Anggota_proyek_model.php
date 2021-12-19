<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_proyek_model extends CI_Model
{
	private $table = "anggota_proyek";
	public function insert()
	{
		$data = array(
            'ID_AP'		=> $this->generateID(),
			'FULLNAME'		=> $this->input->post('fullname'),
			'ID_PROYEK'	=> $this->input->post('id'),
		);

		$this->db->insert('anggota_proyek', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function generateID(){
		$query = $this->db->order_by('ID_AP', 'DESC')->limit(1)->get('anggota_proyek')->row('ID_AP');
		$lastNo = (int) substr($query, 2);
		$next = $lastNo + 1;
		$kd = 'AP';
		return $kd.sprintf('%06s', $next);
	}

	public function getList($id)
	{
		return $query = $this->db->order_by('FULLNAME', 'ASC')->get_where('anggota_proyek',array('ID_PROYEK ='=>$id))->result();
		
		//$this->db->select('*');
		//$this->db->from('anggota_proyek');
		//$this->db->join('proyek', 'anggota_proyek.ID_PROYEK = proyek.ID_PROYEK');
		//return $this->db->get_where('anggota_proyek',array('ID_PROYEK ='=>$id))->result();

		//return $this->db->get()->result();
		//$this->db->order_by('laporan_mingguan.FULLNAME','ASC');
	}

	public function update($id)
	{
		$data = array(
			'FULLNAME'		=> $this->input->post('fullname'),
			'ID_PROYEK'	=> $this->input->post('id_proyek'),
		);

		$this->db->where('ID_AP', $id)->update('anggota_proyek', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('anggota_proyek');
	}

	public function getDetail($id)
	{
		return $this->db->where('ID_AP', $id)->get('anggota_proyek')->row();
	}


	public function checkAvailability($id)
	{
		$query = $this->db->where('ID_AP', $id)->get('anggota_proyek');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		// $this->db->where('ID_PROYEK', $id)->delete('proyek');
		// if ($this->db->affected_rows() > 0) {
		// 	return true;
		// } else {
		// 	return false;
		// }
		return $this->db->delete($this->table, array("ID_AP" => $id));
	}

	
}
