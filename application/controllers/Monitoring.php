<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Monitoring_model');
		$this->load->model('Proyek_model');
		$this->load->model('Program_model');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$id = $this->input->get('id_proyek');
		$data['title'] = 'Monitoring';
		$data['primary_view'] = 'monitoring/v_monitoring';
		$data['total'] = $this->Monitoring_model->getCount();
		$data['list'] = $this->Monitoring_model->getListindex();
		//$data['list1'] = $this->Monitoring_model->getList1($id);
		$this->load->view('v_template', $data);
	}


	public function create()
	{
		$data['title'] = 'Tambah Monitoring';
		$data['primary_view'] = 'monitoring/create_monitoring';
		$data['user'] = $this->User_model->getList();
		$data['id_proyek'] = $this->Proyek_model->getList();
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		if ($this->input->post('submit')) {
			//$this->form_validation->set_rules('no_monitoring', 'Nomor Monitoring', 'trim|required');
			$this->form_validation->set_rules('id_proyek', 'ID Proyek', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('progres', 'Progres(%)', 'trim|required|integer');
			$this->form_validation->set_rules('dana_turun', 'Dana Turun', 'trim|required|integer');
		
			if ($this->form_validation->run() == true) {	
				if($this->Monitoring_model->insert() == true){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('monitoring');
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('monitoring/create');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('monitoring/create');
			}
	}
}

	public function submits()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('progres', 'Progres(%)', 'trim|required|integer');
			$this->form_validation->set_rules('dana_turun', 'Dana Turun', 'trim|required|integer');
		
			
			if ($this->form_validation->run() == true) {
				if ($this->Monitoring_model->update($this->input->post('id')) == true) {
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('monitoring');
				} else {
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('monitoring/update?id=' . $this->input->post('id'));
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('monitoring/update?id='.$this->input->post('id'));
			} 
		}
	}

	public function update()
	{
		$id = $this->input->get('id');
		$data['monitoring'] = $this->Proyek_model->getList();
		
		//CHECK : Data Availability
		if ($this->Monitoring_model->checkAvailability($id) == true) {
			$data['primary_view'] = 'monitoring/update_monitoring';
		} else {
			// $data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update Monitoring';
		$data['detail'] = $this->Monitoring_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function delete($id_proyek)
	{
		// $id = $this->input->get('rcgn');
		// if ($this->Monitoring_model->delete($id) == true) {
		// 	$this->session->set_flashdata('announce', 'Berhasil menghapus data');
		// 	redirect('monitoring');
		// } else {
		// 	$this->session->set_flashdata('announce', 'Gagal menghapus data');
		// 	redirect('monitoring');
		// }
		$this->Monitoring_model->delete($id_proyek);
			redirect('monitoring');
	}
}

/* End of filemonitoring.php */
/* Location: ./application/controllers/monitoring.php */