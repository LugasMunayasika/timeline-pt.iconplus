<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./assets/php_spreadsheet/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Proyek extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyek_model');
		$this->load->model('User_model');
		$this->load->model('Program_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
		$this->load->library('pdf_wbs');
		$this->load->helper(array('url','download'));
	}

	public function index()
	{
		$data['title'] = 'Proyek';
		$data['primary_view'] = 'proyek/v_proyek';
		$data['total'] = $this->Proyek_model->getCount();
		$data['list'] = $this->Proyek_model->getList();
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
		$pdf->Cell(20,6,'ID Proyek',1,0,'C');
		$pdf->Cell(20,6,'PIC',1,0,'C');
		$pdf->Cell(30,6,'Tanggal Awal',1,0,'C');
		$pdf->Cell(30,6,'Tanggal Akhir',1,0,'C');
		$pdf->Cell(15,6,'Durasi',1,0,'C');
		$pdf->Cell(50,6,'Nama Program',1,0,'C');
		$pdf->Cell(80,6,'Nama Proyek',1,1,'C');
		$pdf->SetFont('Arial','',10);
		$proyek= $this->db->select('*')->from('program')->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM')->get()->result();
        $no=0;
        foreach ($proyek as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(20,6,$data->ID_PROYEK,1,0);
            $pdf->Cell(20,6,$data->PIC,1,0);
            $pdf->Cell(30,6,$data->TGL_AWAL,1,0);
			$pdf->Cell(30,6,$data->TGL_AKHIR,1,0);
            $pdf->Cell(15,6,$data->DURASI,1,0);
            $pdf->Cell(50,6,$data->NAMA_PROGRAM,1,0);
            $pdf->Cell(80,6,$data->NAMA_PROYEK,1,1);
        }
        $pdf->Output();
	}
	public function panggil_excel(){
		$this->load->view('v_wbs_excel');
		force_download('data_wbs.xlsx', NULL);
		redirect('proyek');
	}

	public function create()
	{
		$data['title'] = 'Tambah proyek';
		$data['primary_view'] = 'proyek/create_proyek';
		$data['id_program'] = $this->Program_model->getList();
		$this->load->view('v_template', $data);
	}

	public function update()
	{
		$id = $this->input->get('id');
		$data['program'] = $this->Program_model->getList();
		$data['program1'] = $this->Program_model->getList();
		//CHECK : Data Availability
		if($this->Proyek_model->checkAvailability($id) == true){
			$data['primary_view'] = 'proyek/update_proyek';
		}else{
			$data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update Proyek';
		$data['detail'] = $this->Proyek_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		if ($this->input->post('submit')) {
			//$this->form_validation->set_rules('id_proyek', 'ID Proyek', 'trim|required');
			$this->form_validation->set_rules('pic', 'PIC', 'trim|required');
			$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required');
			$this->form_validation->set_rules('durasi', 'durasi', 'trim|required|integer');
			$this->form_validation->set_rules('id_program', 'ID Program', 'trim|required');
			$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
			$this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required');

			if ($this->form_validation->run() == true) {
				if($this->Proyek_model->insert() == true){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('proyek');
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('proyek/create');
				}
			}
			else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('proyek/create');
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
		$this->form_validation->set_rules('id_program', 'ID Program', 'trim|required');
		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required');

		if ($this->form_validation->run() == true) {
			if ($this->Proyek_model->update($this->input->post('id')) == true) {
				$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
				redirect('proyek');
			} else {
				$this->session->set_flashdata('announce', 'Gagal menyimpan data');
				redirect('proyek/update?id=' . $this->input->post('id'));
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('proyek/update?id='.$this->input->post('id'));
		} 
	}
}

	public function delete($id_proyek)
	{
		// $id = $this->input->get('rcgn');
		if ($this->Proyek_model->delete($id_proyek) == true) :
			redirect('proyek');
		endif;
		if($this->Proyek_model->delete($id_proyek) == false):
			$this->session->set_flashdata('announce', 'Data proyek ini digunakan pada tabel lain');
			redirect('proyek');
		endif;
		// $this->Proyek_model->delete($id_proyek);
		// 	redirect('proyek');
	}
	


}