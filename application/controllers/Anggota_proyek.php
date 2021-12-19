<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./assets/php_spreadsheet/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Anggota_proyek extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyek_model');
		$this->load->model('User_model');
		$this->load->model('Anggota_proyek_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
		$id = $this->input->get('id');
		$data['detail'] = $this->Anggota_proyek_model->getDetail($id);
	}

	public function index()
	{
		$id = $this->input->get('id');
		$data['title'] = 'Proyek';
		$data['primary_view'] = 'anggota_proyek/v_anggota_proyek';
		$data['total'] = $this->Anggota_proyek_model->getCount();
		$data['list'] = $this->Anggota_proyek_model->getList($id);
		$this->load->view('v_template', $data);
		$data['detail'] = $this->Proyek_model->getDetail($id);
		
	}


	public function create()
	{
		$id = $this->input->get('id');
		$data['title'] = 'Tambah anggota proyek';
		$data['primary_view'] = 'anggota_proyek/create_anggota_proyek';
		$data['total'] = $this->Anggota_proyek_model->getCount();
		$data['detail'] = $this->Proyek_model->getDetail($id);
		$data['list'] = $this->User_model->getList();
		$this->load->view('v_template', $data);
	}

	public function update()
	{
		$id = $this->input->get('id');
		//CHECK : Data Availability
		$data['list'] = $this->User_model->getList();
		if($this->Anggota_proyek_model->checkAvailability($id) == true){
			$data['primary_view'] = 'anggota_proyek/update_anggota_proyek';
		}else{
			$data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update Anggota Proyek';
		$data['detail'] = $this->Anggota_proyek_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		if ($this->input->post('submit')) {
			//$this->form_validation->set_rules('id_ap', 'ID Anggota Proyek', 'trim|required');
			$this->form_validation->set_rules('fullname', 'Nama', 'trim|required');
			//$this->form_validation->set_rules('id_proyek', 'ID Proyek', 'trim|required');
			if ($this->form_validation->run() == true) {
				if($this->Anggota_proyek_model->insert($this->input->post('id')) == true){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('anggota_proyek/?id=' . $this->input->post('id'));
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('anggota_proyek/create?id=' . $this->input->post('id'));
				}
			}else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('anggota_proyek/create?id=' . $this->input->post('id'));
			} 
		}
	}

	public function delete($id_proyek)
	{
		$this->Anggota_proyek_model->delete($id_proyek);
		$this->session->set_flashdata('announce', 'Berhasil menghapus nama dari anggota proyek');
		redirect('proyek');
	}
}