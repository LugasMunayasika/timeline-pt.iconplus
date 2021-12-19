<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Profil_model');
		$this->load->model('User_model');
		if($this->session->userdata('logged_in') == false){
			redirect('welcome');
		}
	}

	public function detail(){
		$id = $this->input->post('id');
		$data['detail'] =  $this->Profil_model->getDetail($id);
		$this->load->view('profil/detail_profil', $data);
	}

	public function edit(){
		$unm = $this->input->get('change_key');
		$data['det'] = $this->Profil_model->getDetail($unm);
		$data['title'] = 'Edit Profile';
		$data['primary_view'] = 'profil/update_profil';
		$this->load->view('v_template', $data);
	}

	public function simpan(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('telp', 'No. Telepon', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

			if ($this->form_validation->run() == true) {
				$config['upload_path'] = './assets/images/upload/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2000';
				
				$this->load->library('upload', $config);
				$id_petugas = $this->User_model->getID($this->session->userdata('username'));

				if ($this->upload->do_upload('foto') == true){
					if($this->Profil_model->update($id_petugas, $this->upload->data()) == true){
						$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
						redirect('profil/edit?change_key='.$this->input->post('id').'&signup=0');
					}else{
						$this->session->set_flashdata('announce', 'Gagal menyimpan data');
						redirect('profil/edit?change_key='.$this->input->post('id').'&signup=0');
					}
				}else{
					$this->session->set_flashdata('announce', $this->upload->display_errors());
					redirect('profil/edit?change_key='.$this->input->post('id').'&signup=0');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('profil/edit?change_key='.$this->input->post('id').'&signup=0');
			}
		}
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/profil.php */