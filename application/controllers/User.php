<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		if($this->session->userdata('logged_in') == false){
			redirect('welcome');
		}
	}

	public function index(){
		if($this->session->userdata('role') == 'superadmin') {
			$data['title'] = 'User';
			$data['primary_view'] = 'user/user_view';
			$data['list'] = $this->User_model->getList();
			$data['total'] = $this->User_model->getCount();
			$this->load->view('user/v_user', $data);	
		}else{
			$this->load->view('full_401_view');
		}
	}

	public function add(){
		if($this->session->userdata('role') == 'superadmin') {
			$data['title'] = 'Tambah user';
			$data['primary_view'] = 'user/add_user_view';
			$this->load->view('template_view', $data);
		}else{
			$this->load->view('full_401_view');
		}
	}

	public function submit(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

			if ($this->form_validation->run() == true) {
				$password = $this->input->post('password');
				$cpassword = $this->input->post('cpassword');

				if($password == $cpassword){
					if($this->User_model->usernameCheck($this->input->post('username')) == true){
						if($this->User_model->insert() == true){
							$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
							redirect('user/add');
						}else{
							$this->session->set_flashdata('announce', 'Gagal menyimpan data');
							redirect('user/add');
						}
					}else{
						$this->session->set_flashdata('announce', 'Username tidak tersedia, silahkan pilih username lain');
						redirect('user/add');
					}
				}else{
					$this->session->set_flashdata('announce', 'Password tidak sesuai');
					redirect('user/add');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('user/add');
			}
		}
	}

	public function submits(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');

			if($this->form_validation->run() == true) {
				$id = $this->input->post('ids');
				$psw = false;
				if($this->input->post('password') != ''){
					$psw = true;
					$password = $this->input->post('password');
					$cpassword = $this->input->post('cpassword');

					if($password == $cpassword){
						if($this->User_model->usernameChecks($id) == true){
							if($this->User_model->inserts($id, $psw) == true){
								$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
								redirect('user/edit?tken='.$id);
							}else{
								$this->session->set_flashdata('announce', 'Gagal menyimpan data');
								redirect('user/edit?tken='.$id);
							}
						}else{
							$this->session->set_flashdata('announce', 'Username tidak tersedia, silahkan pilih username lain');
							redirect('user/edit?tken='.$id);
						}
					}else{
						$this->session->set_flashdata('announce', 'Password tidak sesuai');
						redirect('user/edit?tken='.$id);
					}
				}else{
					if($this->User_model->usernameChecks($id) == true){
						if($this->User_model->inserts($id, $psw) == true){
							$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
							redirect('user/edit?tken='.$id);
						}else{
							$this->session->set_flashdata('announce', 'Gagal menyimpan data');
							redirect('user/edit?tken='.$id);
						}
					}else{
						$this->session->set_flashdata('announce', 'Username tidak tersedia, silahkan pilih username lain');
						redirect('user/edit?tken='.$id);
					}
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('user/add');
			}
		}
	}

	public function delete(){
		if($this->session->userdata('role') == 'superadmin') {
			$rcgn = $this->input->get('rcgn');
			if($this->User_model->delete($rcgn) == true){
				$this->session->set_flashdata('announce', 'Berhasil menghapus data');
				redirect('user');
			}
		}
	}

	public function edit(){
		if($this->session->userdata('role') == 'superadmin') {
			$id = $this->input->get('tken');
			//CHECK : Data Availability
			if($this->User_model->checkAvailability($id) == true){
				$data['primary_view'] = 'user/edit_user_view';
			}else{
				$data['primary_view'] = '404_view';
			}
			$data['title'] = 'Edit user';
			$data['detail'] = $this->User_model->getDetail($id);
			$this->load->view('template_view', $data);
		}else{
			$this->load->view('full_401_view');
		}
	}

	public function getDetail($id){
		if($this->session->userdata('role') == 'superadmin') {
			return $this->db->where('ID_ANGGOTA', $id)->get('anggota')->row();	
		}else{
			$this->load->view('full_401_view');
		}
		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */