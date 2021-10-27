<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wbs_model extends CI_Model
{

	public function insert($id_user, $foto)
	{
		$data = array(
			'ID_WBS'	=> $this->generateID(),
			'PIC'		=> $this->input->post('pic'),
			'TGL_AWAL'		=> $this->input->post('tgl_awal'),
			'TGL_AKHIR'		=> $this->input->post('tgl_akhir'),
			'DURASI'		=> $this->input->post('durasi'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
		);

		$this->db->insert('wbs', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update($id)
	{
		$data = array(
			'FULL_NAME'			=> $this->input->post('pic'),
			'DURASI'		=> $this->input->post('durasi'),
			'TELP'		=> $this->input->post('telp')
		);

		$this->db->where('ID_ANGGOTA', $id)->update('anggota', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function generateID()
	{
		$query = $this->db->order_by('WEB_CODE', 'DESC')->limit(1)->get('wbs')->row('WEB_CODE');
		$lastNo = substr($query, 3);
		$next = $lastNo + 1;
		$kd = 'WBC';
		return $kd . sprintf('%03s', $next);
	}

	public function getList()
	{
		return $query = $this->db->order_by('id_anggota', 'ASC')->get('anggota')->result();
	}

	public function getCount()
	{
		return $this->db->count_all('anggota');
	}

	public function getDetail($id)
	{
		return $this->db->where('ID_ANGGOTA', $id)->get('anggota')->row();
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('ID_ANGGOTA', $id)->get('anggota');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('ID_ANGGOTA', $id)->delete('anggota');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Anggota_model.php */
/* Location: ./application/models/Anggota_model.php */