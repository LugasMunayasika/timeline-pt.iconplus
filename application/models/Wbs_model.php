<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wbs_model extends CI_Model
{

	public function insert()
	{
		$data = array(
			'WEB_CODE'	=> $this->input->post('web_code'),
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
			'PIC'		=> $this->input->post('pic'),
			'TGL_AWAL'		=> $this->input->post('tgl_awal'),
			'TGL_AKHIR'		=> $this->input->post('tgl_akhir'),
			'DURASI'		=> $this->input->post('durasi'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
		);

		$this->db->where('WEB_CODE', $id)->update('wbs', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getList()
	{
		return $query = $this->db->order_by('web_code', 'ASC')->get('wbs')->result();
	}

	public function getCount()
	{
		return $this->db->count_all('wbs');
	}

	public function getDetail($id)
	{
		return $this->db->where('WEB_CODE', $id)->get('wbs')->row();
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('WEB_CODE', $id)->get('wbs');
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