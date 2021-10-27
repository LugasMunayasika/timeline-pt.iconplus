<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penugasan_model extends CI_Model
{

	public function insert($id_admin)
	{
		$data = array(
			'ID_TUGAS'		=> $this->input->post('id_tugas'),
			// 'ID_TUGAS'		=> $this->generateID(),
			'NO_SURAT'		=> $this->input->post('no_surat'),
			'PERIHAL'		=> $this->input->post('perihal'),
			'TGL_SURAT'			=> $this->input->post('tgl_surat'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
			'PEMBERI_KERJA'		=> $this->input->post('pemberi_kerja'),
			'KATEGORI'			=> $this->input->post('kategori'),
			'PIC'			=> $this->input->post('pic'),
			'TGL_SELESAI'		=> $this->input->post('tgl_selesai'),
			'DOKUMEN'		=> $this->input->post('dokumen'),

		);

		$this->db->insert('tugas', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update($id)
	{
		$data = array(
			'ID_TUGAS'		=> $this->input->post('id_tugas'),
			'NO_SURAT'		=> $this->input->post('no_surat'),
			'PERIHAL'		=> $this->input->post('perihal'),
			'TGL_SURAT'			=> $this->input->post('tgl_surat'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
			'PEMBERI_KERJA'		=> $this->input->post('pemberi_kerja'),
			'KATEGORI'			=> $this->input->post('kategori'),
			'PIC'			=> $this->input->post('pic'),
			'TGL_SELESAI'		=> $this->input->post('tgl_selesai'),
			'DOKUMEN'		=> $this->input->post('dokumen'),
			'STATUS'		=> $this->input->post('status'),
		);

		$this->db->where('ID_TUGAS', $id)->update('tugas', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('tugas');
	}

	public function getList()
	{
		return $query = $this->db->order_by('ID_TUGAS', 'ASC')->get('tugas')->result();
	}

	// public function generateID(){
	// 	$query = $this->db->order_by('ID_TUGAS', 'DESC')->limit(1)->get('tugas')->row('ID_TUGAS');
	// 	$lastNo = substr($query, 3);
	// 	$next = $lastNo + 1;
	// 	$kd = 'BKO';
	// 	return $kd.sprintf('%03s', $next);
	// }

	public function getDetail($id)
	{
		return $this->db->where('ID_TUGAS', $id)->get('tugas')->row();
	}

	public function delete($id)
	{
		$this->db->where('ID_TUGAS', $id)->delete('tugas');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('ID_TUGAS', $id)->get('tugas');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Penugasan_model.php */
/* Location: ./application/models/Penugasan_model.php */