<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_mingguan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_mingguan_model');
		$this->load->model('Monitoring_model');
		$this->load->model('User_model');
		$this->load->model('Proyek_model');
		$this->load->model('Program_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Laporan Mingguan';
		$data['primary_view'] = 'laporan_mingguan/v_laporan_mingguan';
		$data['total'] = $this->Laporan_mingguan_model->getCount();
		$data['list'] = $this->Laporan_mingguan_model->getListindex();
		$this->load->view('v_template', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Laporan Mingguan';
		$data['primary_view'] = 'laporan_mingguan/create_laporan_mingguan';
		$data['proyek'] = $this->Proyek_model->getList();
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		if ($this->input->post('submit')); {
            //$this->form_validation->set_rules('id_laporan', 'ID Laporan', 'trim|required');
			$this->form_validation->set_rules('id_proyek', 'ID Proyek', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
			$this->form_validation->set_rules('kendala', 'Kendala', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
			if ($this->form_validation->run() == true) {
				$config['upload_path'] = './assets/doc/upload/file_laporan';
				$config['allowed_types'] = 'jfif|jpg|png|doc|docx|pdf';
				$config['max_size']  = '10000';
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file_laporan')){
					if($this->Laporan_mingguan_model->insert($this->upload->data()) == true){
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('laporan_mingguan');
					}else{
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('laporan_mingguan/create');
					}
				}else{
					$this->session->set_flashdata('announce', $this->upload->display_errors());
					redirect('laporan_mingguan/create');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('laporan_mingguan/create');
			}
		}
	}

	public function submits()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
			$this->form_validation->set_rules('kendala', 'Kendala', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == true) {
				$config['upload_path'] = './assets/doc/upload/file_laporan';
				$config['allowed_types'] = 'jfif|jpg|png|doc|docx|pdf';
				$config['max_size']  = '10000';
				
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('file_laporan') == true){
					if($this->Laporan_mingguan_model->update($this->input->post('id'), $this->upload->data()) == true){
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('laporan_mingguan');
					}else{
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('laporan_mingguan/update?id=' . $this->input->post('id'));
					}
				}else{
					$this->session->set_flashdata('announce', $this->upload->display_errors());
					redirect('laporan_mingguan/update?id=' . $this->input->post('id'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('laporan_mingguan/update?id=' . $this->input->post('id'));
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('laporan_mingguan/update?id=' . $this->input->post('id'));
		}
	}

	public function update()
	{	
		$id = $this->input->get('id');
		$data['lpm'] = $this->Proyek_model->getList();
		//CHECK : Data Availability
		if ($this->Laporan_mingguan_model->checkAvailability($id) == true) {
			$data['primary_view'] = 'laporan_mingguan/update_laporan_mingguan';
		} else {
			// $data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update Laporan Mingguan';
		$data['detail'] = $this->Laporan_mingguan_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function delete($id)
	{
		// $id = $this->input->get('rcgn');
		// if ($this->Laporan_mingguan_model->delete($id) == true) {
		// 	$this->session->set_flashdata('announce', 'Berhasil menghapus data');
		// 	redirect('laporan');
		// } else {
		// 	$this->session->set_flashdata('announce', 'Gagal menghapus data');
		// 	redirect('laporan');
		// }
		$this->Laporan_mingguan_model->delete($id);
		redirect('laporan_mingguan');
	}
}