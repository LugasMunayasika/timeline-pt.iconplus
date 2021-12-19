<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Program_model');
		$this->load->model('Proyek_model');
		$this->load->model('Monitoring_model');
		if($this->session->userdata('logged_in') == false){
			redirect('login?dst=dashboard');
		}
	}

	public function index(){
		$data['title'] = 'Dashboard';
		$data['primary_view'] = 'v_dashboard';
		$data['list'] = $this->Dashboard_model->getListindex();
		$this->load->view('v_template', $data);
	}

	public function logout(){
		$data = array(
			'username'	=> '',
			'logged_in'	=> false,
			'jabatan'		=> ''
		);

		$this->session->sess_destroy();
		redirect('welcome');
	}

	public function profil(){
		$uname = $this->input->get('usr');
		$data = array(
			'title'			=> $uname.'.s Profil',
			'primary_view'	=> 'profile_view',
		);
		if($this->Dashboard_model->checkUser($uname) == true){
			$this->load->view('v_template', $data);
		}else{
			// $this->load->view('full_404_view');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */