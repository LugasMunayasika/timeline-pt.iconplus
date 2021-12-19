<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek_model extends CI_Model
{
	private $table = "proyek";
	public function insert()
	{
		$data = array(
			'ID_PROYEK'	=> $this->generateID(),
			'PIC'		=> $this->input->post('pic'),
			'TGL_AWAL'		=> $this->input->post('tgl_awal'),
			'TGL_AKHIR'		=> $this->input->post('tgl_akhir'),
			'DURASI'		=> $this->input->post('durasi'),
			'ID_PROGRAM'		=> $this->input->post('id_program'),
			'NAMA_PROYEK'		=> $this->input->post('nama_proyek'),
			'ANGGARAN'		=> $this->input->post('anggaran'),
		);

		$this->db->insert('proyek', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function generateID(){
		$query = $this->db->order_by('ID_PROYEK', 'DESC')->limit(1)->get('proyek')->row('ID_PROYEK');
		$lastNo = (int) substr($query, 3);
		$next = $lastNo + 1;
		$kd = 'PY';
		return $kd.sprintf('%04s', $next);
	}
	public function delete($id){
		$this->db->delete('proyek', array("ID_PROYEK" => $id));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getList()
	{
		//return $query = $this->db->order_by('id_proyek', 'ASC')->get('proyek')->result();
		$this->db->select('*');
		$this->db->from('program');
		$this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		return $this->db->get()->result();
	}
	public function getTimList()
	{
		return $query = $this->db->order_by('id_tim', 'ASC')->get('timwbs')->result();
	}

	public function update($id)
	{
		$data = array(
			'PIC'		=> $this->input->post('pic'),
			'TGL_AWAL'		=> $this->input->post('tgl_awal'),
			'TGL_AKHIR'		=> $this->input->post('tgl_akhir'),
			'DURASI'		=> $this->input->post('durasi'),
			'ID_PROGRAM'		=> $this->input->post('id_program'),
			'NAMA_PROYEK'		=> $this->input->post('nama_proyek'),
			'ANGGARAN'		=> $this->input->post('anggaran'),
		);

		$this->db->where('ID_PROYEK', $id)->update('proyek', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('proyek');
	}
	public function getCountTim()
	{
		return $this->db->count_all('timwbs');
	}

	public function getDetail($id)
	{
		return $this->db->where('ID_PROYEK', $id)->get('proyek')->row();
	}

	public function getDetailTim($id)
	{
		return $this->db->where('ID_TIM', $id)->get('timwbs')->row();
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('ID_PROYEK', $id)->get('proyek');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}	
}
