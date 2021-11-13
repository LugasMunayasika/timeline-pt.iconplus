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
		$this->load->library('pdf_wbs');
	}

	public function index()
	{
		$data['title'] = 'Wbs';
		$data['primary_view'] = 'wbs/v_wbs';
		$data['total'] = $this->Wbs_model->getCount();
		$data['list'] = $this->Wbs_model->getList();
		$this->load->view('v_template', $data);
	}

	public function panggil_fpdf(){
		error_reporting(0);
		$pdf = new FPDF('L','mm','Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,7,'PDF DATA WBS',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'No',1,0,'C');
		$pdf->Cell(20,6,'Web Code',1,0,'C');
		$pdf->Cell(20,6,'PIC',1,0,'C');
		$pdf->Cell(30,6,'Tanggal Awal',1,0,'C');
		$pdf->Cell(30,6,'Tanggal Akhir',1,0,'C');
		$pdf->Cell(15,6,'Durasi',1,0,'C');
		$pdf->Cell(50,6,'Nama Pekerjaan',1,0,'C');
		$pdf->Cell(80,6,'Uraian Kegiatan',1,1,'C');
		$pdf->SetFont('Arial','',10);
        $wbs = $this->db->get('wbs')->result();
        $no=0;
        foreach ($wbs as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(20,6,$data->WEB_CODE,1,0);
            $pdf->Cell(20,6,$data->PIC,1,0);
            $pdf->Cell(30,6,$data->TGL_AWAL,1,0);
			$pdf->Cell(30,6,$data->TGL_AKHIR,1,0);
            $pdf->Cell(15,6,$data->DURASI,1,0);
            $pdf->Cell(50,6,$data->NAMA_PEKERJAAN,1,0);
            $pdf->Cell(80,6,$data->URAIAN_KEGIATAN,1,1);
        }
        $pdf->Output();
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