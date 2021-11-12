<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wbs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wbs_model');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Wbs';
		$data['primary_view'] = 'wbs/v_wbs';
		$data['total'] = $this->Wbs_model->getCount();
		$data['list'] = $this->Wbs_model->getList();
		$this->load->view('v_template', $data);
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['wbs'] = $this->Wbs_model->get_data('wbs')->result();
		$this->load->view('laporan_wbs', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_wbs.pdf', array('Attachment'));
	}

	public function create()
	{
		$data['title'] = 'Tambah wbs';
		$data['primary_view'] = 'wbs/create_wbs';
		$this->load->view('v_template', $data);
	}

	public function update()
	{
		$id = $this->input->get('id');
		//CHECK : Data Availability
		if($this->Wbs_model->checkAvailability($id) == true){
			$data['primary_view'] = 'wbs/update_wbs';
		}else{
			$data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update WBS';
		$data['detail'] = $this->Wbs_model->getDetail($id);
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
		$this->form_validation->set_rules('pic', 'PIC', 'trim|required');
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required');
		$this->form_validation->set_rules('durasi', 'durasi', 'trim|required|integer');
		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'trim|required');

		if ($this->form_validation->run() == true) {
			if ($this->Wbs_model->update($this->input->post('id')) == true) {
				$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
				redirect('wbs/update?id=' . $this->input->post('id'));
			} else {
				$this->session->set_flashdata('announce', 'Gagal menyimpan data');
				redirect('wbs/update?id=' . $this->input->post('id'));
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('wbs/update?id='.$this->input->post('id'));
		} 
	}
}

	public function delete()
	{
		$id = $this->input->get('rcgn');
		if ($this->Wbs_model->delete($id) == true) {
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('wbs');
		} else {
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('wbs');
		}
	}
	


}