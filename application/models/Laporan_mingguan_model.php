<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_mingguan_model extends CI_Model
{

	public function insert($dokumen)
	{
		$data = array(
            'ID_LAPORAN'	=> $this->generateID(),
			'ID_PROYEK'	=> $this->input->post('id_proyek'),
			'TANGGAL'	=> $this->input->post('tanggal'),
			'FILE_LAPORAN'	=> $dokumen['file_name'],
			'CATATAN'		=> $this->input->post('catatan'),
			'KENDALA'		=> $this->input->post('kendala'),
			'STATUS'		=> $this->input->post('status'),
		);

		$this->db->insert('laporan_mingguan', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function generateID(){
		$query = $this->db->order_by('ID_LAPORAN', 'DESC')->limit(1)->get('laporan_mingguan')->row('ID_LAPORAN');
		$lastNo = (int) substr($query, 5);
		$next = $lastNo + 1;
		$kd = 'LPM';
		return $kd.sprintf('%06s', $next);
	}

	public function update($id, $dokumen)
	{
		$data = array(
			'ID_LAPORAN'	=> $this->generateID(),
			'TANGGAL'	=> $this->input->post('tanggal'),
			'FILE_LAPORAN'	=> $dokumen['file_name'],
			'CATATAN'		=> $this->input->post('catatan'),
			'KENDALA'		=> $this->input->post('kendala'),
			'STATUS'		=> $this->input->post('status'),
		);

		$this->db->where('ID_LAPORAN', $id)->update('laporan_mingguan', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('laporan_mingguan');
	}

	public function getList()
	{
		//return $query = $this->db->order_by('ID_LAPORAN', 'ASC')->get('laporan_mingguan')->result();
		$this->db->select('*');
		$this->db->from('program');
		$this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		$this->db->join('laporan_mingguan', 'laporan_mingguan.ID_PROYEK = proyek.ID_PROYEK');
		return $this->db->get()->result();
	}
	public function getListindex()
	{
		//return $query = $this->db->order_by('ID_LAPORAN', 'ASC')->get('laporan_mingguan')->result();
		$this->db->select('*');
		$this->db->from('program');
		$this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		$this->db->join('laporan_mingguan', 'laporan_mingguan.ID_PROYEK = proyek.ID_PROYEK');
		$this->db->order_by('laporan_mingguan.ID_PROYEK','ASC');
		return $this->db->get()->result();
	}
	public function getDetail($id)
	{
		return $this->db->where('ID_LAPORAN', $id)->get('laporan_mingguan')->row();
	}

	public function delete($id)
	{
		// $this->db->where('ID_LAPORAN', $id)->delete('laporan_mingguan');
		// if ($this->db->affected_rows() > 0) {
		// 	return true;
		// } else {
		// 	return false;
		// }
		$this->db->delete('laporan_mingguan', array("ID_LAPORAN" => $id));
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('ID_LAPORAN', $id)->get('laporan_mingguan');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}