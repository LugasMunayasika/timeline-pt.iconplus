<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_model extends CI_Model
{
	// public function getID($yah){
	// 	$query = $this->db->where('NAMA_PROGRAM', $yah)->get('program')->row()->ID_PROGRAM;
	// 	return $query;
	// }
	public function insert($dokumen)
	{
		$data = array(
			'ID_PROGRAM'	=> $this->generateID(),
			'NO_SURAT'		=> $this->input->post('no_surat'),
			'PERIHAL'		=> $this->input->post('perihal'),
			'TGL_SURAT'			=> $this->input->post('tgl_surat'),
			'NAMA_PROGRAM'		=> $this->input->post('nama_program'),
			'DIVISI'		=> $this->input->post('divisi'),
			'PEMBERI_KERJA'		=> $this->input->post('pemberi_kerja'),
			'KATEGORI'			=> $this->input->post('kategori'),
			'TGL_SELESAI'		=> $this->input->post('tgl_selesai'),
			'DOKUMEN'			=> $dokumen['file_name'],

		);

		$this->db->insert('program', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function generateID(){
		$query = $this->db->order_by('ID_PROGRAM', 'DESC')->limit(1)->get('program')->row('ID_PROGRAM');
		$lastNo = (int) substr($query, 4);
		$next = $lastNo + 1;
		$kd = 'P';
		return $kd.sprintf('%05s', $next);
	}

	public function update($id, $dokumen)
	{
		$data = array(
			//'ID_PROGRAM'		=> $this->input->post('id_program'),
			'NO_SURAT'		=> $this->input->post('no_surat'),
			'PERIHAL'		=> $this->input->post('perihal'),
			'TGL_SURAT'			=> $this->input->post('tgl_surat'),
			'NAMA_PROGRAM'		=> $this->input->post('nama_program'),
			'DIVISI'		=> $this->input->post('divisi'),
			'PEMBERI_KERJA'		=> $this->input->post('pemberi_kerja'),
			'KATEGORI'			=> $this->input->post('kategori'),
			'TGL_SELESAI'		=> $this->input->post('tgl_selesai'),
			'DOKUMEN'			=> $dokumen['file_name'],
		);

		$this->db->where('ID_PROGRAM', $id)->update('program', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('program');
	}

	public function getList()
	{
		return $query = $this->db->order_by('ID_PROGRAM', 'ASC')->get('program')->result();
	}

	// public function generateID(){
	// 	$query = $this->db->order_by('ID_PROGRAM', 'DESC')->limit(1)->get('program')->row('ID_PROGRAM');
	// 	$lastNo = substr($query, 3);
	// 	$next = $lastNo + 1;
	// 	$kd = 'BKO';
	// 	return $kd.sprintf('%03s', $next);
	// }

	public function getDetail($id)
	{
		return $this->db->where('ID_PROGRAM', $id)->get('program')->row();
	}

	public function delete($id){
		// $this->db->where('ID_ADMIN', $id)->delete('admin');
		// if($this->db->affected_rows() > 0){
		// 	return true;
		// }else{
		// 	return false;
		// }
		$this->db->delete('program', array("ID_PROGRAM" => $id));
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('ID_PROGRAM', $id)->get('program');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Program_model.php */
/* Location: ./application/models/Program_model.php */