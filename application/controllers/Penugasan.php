<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penugasan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penugasan_model');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Penugasan';
		$data['primary_view'] = 'penugasan/v_penugasan';
		$data['total'] = $this->Penugasan_model->getCount();
		$data['list'] = $this->Penugasan_model->getList();
		$this->load->view('v_template', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Penugasan';
		$data['primary_view'] = 'penugasan/create_penugasan';
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		// if ($this->input->post('submit')) {
		// 	$this->form_validation->set_rules('id_tugas', 'ID Tugas', 'trim|required');
		// 	$this->form_validation->set_rules('no_surat', 'No Surat penugasan', 'trim|required');
		// 	$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
		// 	$this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'trim|required');
		// 	$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
		// 	$this->form_validation->set_rules('pemberi_kerja', 'Pemberi Kerja', 'trim|required');
		// 	$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		// 	$this->form_validation->set_rules('pic', 'PIC', 'trim|required');
		// 	$this->form_validation->set_rules('tgl_selesai', 'Tgl Target Penyelesaian', 'trim|required');
		// 	$this->form_validation->set_rules('dokumen', 'Dokumen', 'trim|required');


			// if ($this->form_validation->run() == true) {
				$config['upload_path'] = './assets/doc/upload/';
				$config['allowed_types'] = 'jpg|png|pdf|docx';
				$config['max_size']  = 20000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumen') == true) {
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('penugasan/create');
				}
				else if ($this->Penugasan_model->insert() == true) {
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('penugasan/create');
				} 
				else {
					$this->session->set_flashdata('announce', $this->upload->display_errors());
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('penugasan/create');
				}
		}
	

	public function submits()
	{
		if ($this->input->post('submit')) {
			// $this->form_validation->set_rules('id_tugas', 'ID Tugas', 'trim|required');
			// $this->form_validation->set_rules('no_surat', 'No Surat penugasan', 'trim|required');
			// $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
			// $this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'trim|required');
			// $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
			// $this->form_validation->set_rules('pemberi_kerja', 'Pemberi Kerja', 'trim|required');
			// $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			// $this->form_validation->set_rules('pic', 'PIC', 'trim|required');
			// $this->form_validation->set_rules('tgl_selesai', 'Tgl Target Penyelesaian', 'trim|required');
			// $this->form_validation->set_rules('dokumen', 'Dokumen', 'trim|required');
			// $this->form_validation->set_rules('status', 'Status', 'trim|required');


			if ($this->form_validation->run() == true) {

				$config['upload_path'] = './assets/doc/upload/';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_size']  = '2000';
				$this->load->library('upload', $config);
				$id_user = $this->User_model->getID($this->session->userdata('username'));
				if ($this->Penugasan_model->update($this->input->post('id')) == true) {
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('penugasan/update?id=' . $this->input->post('id'));
					if ($this->upload->do_upload('dokumen') == true) {
						if ($this->Penugasan_model->update($id_user, $this->upload->data()) == true) {
							$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
							redirect('penugasan/update?change_key=' . $this->input->post('id') . '&signup=0');
						}
					} else {
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('penugasan/update?change_key=' . $this->input->post('id') . '&signup=0');
					}
				} else {
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('penugasan/update?id=' . $this->input->post('id'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('penugasan/update?id=' . $this->input->post('id'));
			}
		}
	}

	public function update()
	{
		
		$id = $this->input->get('id');
		
		//CHECK : Data Availability
		if ($this->Penugasan_model->checkAvailability($id) == true) {
			$data['primary_view'] = 'penugasan/update_penugasan';
		} else {
			// $data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update penugasan';
		$data['detail'] = $this->Penugasan_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function delete()
	{
		$id = $this->input->get('rcgn');
		if ($this->Penugasan_model->delete($id) == true) {
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('penugasan');
		} else {
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('penugasan');
		}
	}
}

/* End of file penugasan.php */
/* Location: ./application/controllers/penugasan.php */