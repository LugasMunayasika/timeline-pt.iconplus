<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timesheet extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Timesheet_model');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Timesheet';
		$data['primary_view'] = 'Timesheet/v_timesheet';
		$data['total'] = $this->Timesheet_model->getCount();
		$data['list'] = $this->Timesheet_model->getList();
		$this->load->view('v_template', $data);
	}


	public function create()
	{
		$data['title'] = 'Tambah Timesheet';
		$data['primary_view'] = 'timesheet/create_timesheet';
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('web_code', 'Web Code', 'trim|required');
			$this->form_validation->set_rules('pic', 'PIC', 'trim|required');
			$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required');
			$this->form_validation->set_rules('durasi', 'durasi', 'trim|required|integer');
			$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'trim|required');
		if($this->Wbs_model->insert() == true){
			$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
			redirect('wbs');
		}else{
			$this->session->set_flashdata('announce', 'Gagal menyimpan data');
			redirect('wbs/create');
		}
	}
}

	public function submits()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('no_surat', 'No Surat timesheet', 'trim|required');
			$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
			$this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'trim|required');
			$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('pemberi_kerja', 'Pemberi Kerja', 'trim|required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$this->form_validation->set_rules('pic', 'PIC', 'trim|required');
			$this->form_validation->set_rules('tgl_selesai', 'Tgl Target Penyelesaian', 'trim|required');
			$config['upload_path'] = './assets/doc/upload/';
			$config['allowed_types'] = 'jpg|png|pdf|docx|doc';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);
			$id_user = $this->User_model->getID($this->session->userdata('username'));
			if ($this->Timesheet_model->update($this->input->post('id')) == true) {
				$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
				redirect('timesheet/update?id=' . $this->input->post('id'));
				if ($this->upload->do_upload('dokumen') == true) {
					if ($this->Timesheet_model->update($id_user, $this->upload->data()) == true) {
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('timesheet/update?change_key=' . $this->input->post('id') . '&signup=0');
					}
				} else {
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('timesheet/update?change_key=' . $this->input->post('id') . '&signup=0');
				}
			} else {
				$this->session->set_flashdata('announce', 'Gagal menyimpan data');
				redirect('timesheet/update?id=' . $this->input->post('id'));
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('timesheet/update?id=' . $this->input->post('id'));
		}

	}

	public function update()
	{
		
		$id = $this->input->get('id');
		
		//CHECK : Data Availability
		if ($this->Timesheet_model->checkAvailability($id) == true) {
			$data['primary_view'] = 'timesheet/update_timesheet';
		} else {
			// $data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update timesheet';
		$data['detail'] = $this->Timesheet_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function delete()
	{
		$id = $this->input->get('rcgn');
		if ($this->Timesheet_model->delete($id) == true) {
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('timesheet');
		} else {
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('timesheet');
		}
	}
}

/* End of file timesheet.php */
/* Location: ./application/controllers/timesheet.php */