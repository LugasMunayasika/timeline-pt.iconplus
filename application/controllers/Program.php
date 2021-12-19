<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Program_model');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Program';
		$data['primary_view'] = 'program/v_program';
		$data['total'] = $this->Program_model->getCount();
		$data['list'] = $this->Program_model->getList();
		$this->load->view('v_template', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Program';
		$data['primary_view'] = 'program/create_program';
		$this->load->view('v_template', $data);
	}

	public function submit(){
		if($this->input->post('t')){
			//$this->form_validation->set_rules('id_program', 'ID Tugas', 'trim|required');
			$this->form_validation->set_rules('no_surat', 'No Surat program', 'trim|required');
			$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
			$this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'trim|required');
			$this->form_validation->set_rules('nama_program', 'Nama Program', 'trim|required');
			$this->form_validation->set_rules('divisi', 'Divisi', 'trim|required');
			$this->form_validation->set_rules('pemberi_kerja', 'Pemberi Kerja', 'trim|required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$this->form_validation->set_rules('tgl_selesai', 'Tgl Target Penyelesaian', 'trim|required');
			
			if ($this->form_validation->run() == true) {
				$config['upload_path'] = './assets/doc/upload/';
				$config['allowed_types'] = 'jfif|jpg|png|doc|docx|pdf';
				$config['max_size']  = '10000';
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('dokumen')){
					if($this->Program_model->insert($this->upload->data()) == true){
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('program');
					}else{
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('program/create');
					}
				}else{
					$this->session->set_flashdata('announce', $this->upload->display_errors());
					redirect('program/create');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('program/create');
			}
		}
	}

	

	public function submits()
	{
		if ($this->input->post('t')) {
			$this->form_validation->set_rules('no_surat', 'No Surat program', 'trim|required');
			$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
			$this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'trim|required');
			$this->form_validation->set_rules('nama_program', 'Nama Program', 'trim|required');
			$this->form_validation->set_rules('divisi', 'Divisi', 'trim|required');
			$this->form_validation->set_rules('pemberi_kerja', 'Pemberi Kerja', 'trim|required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$this->form_validation->set_rules('tgl_selesai', 'Tgl Target Penyelesaian', 'trim|required');
			if ($this->form_validation->run() == true) {
				$config['upload_path'] = './assets/doc/upload/';
				$config['allowed_types'] = 'jfif|jpg|png|doc|docx|pdf';
				$config['max_size']  = '10000';
				
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumen') == true){
					if($this->Program_model->update($this->input->post('id'), $this->upload->data()) == true){
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('program');
					}else{
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('program/update?id=' . $this->input->post('id'));
					}
				}else{
					$this->session->set_flashdata('announce', $this->upload->display_errors());
					redirect('program/update?id=' . $this->input->post('id'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('program/update?id=' . $this->input->post('id'));
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('program/update?id=' . $this->input->post('id'));
		}

	}

	public function update()
	{
		
		$id = $this->input->get('id');
		
		//CHECK : Data Availability
		if ($this->Program_model->checkAvailability($id) == true) {
			$data['primary_view'] = 'program/update_program';
		} else {
			// $data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update program';
		$data['detail'] = $this->Program_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function delete($id)
	{
		// $id = $this->input->get('rcgn');
		// if ($this->Program_model->delete($id) == true) {
		// 	$this->session->set_flashdata('announce', 'Berhasil menghapus data');
		// 	redirect('program');
		// } else {
		// 	$this->session->set_flashdata('announce', 'Gagal menghapus data');
		// 	redirect('program');
		// }
		
		$this->Program_model->delete($id);
		redirect('program');
	}
}

/* End of file program.php */
/* Location: ./application/controllers/program.php */