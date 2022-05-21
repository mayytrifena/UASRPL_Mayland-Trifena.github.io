<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('logged_in_admin')) 
			redirect('index.php/admin/login');

		$this->load->helper('url');
		$this->load->model('user_model');
		$data['user']=$this->user_model->readevent();
		$this->load->view('user/list_user', $data);	
	}

	public function __construct()
	{

		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('url','form');
			
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda Sudah Log Out');

		redirect('index.php/frontend');
	}
	
	public function login()
	{
		if($this->session->userdata('logged_in')) 
			redirect('index.php/frontend');

		$this->load->helper('url');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('template/header_fo2');
			$this->load->view('frontend/login');
			$this->load->view('template/footer_fo2');	
		} else {
			
	// Get username
	$username = $this->input->post('username');
	// Get & encrypt password
	// $password = md5($this->input->post('password'));
	$password = $this->input->post('password');

	// Login user
	$id_user = $this->user_model->login($username, $password);

		if($id_user){
			// Buat session
			$user_data = array(
				'id_user' => $id_user,
				'username' => $username,
				'logged_in' => true,
			);

			$this->session->set_userdata($user_data);

			// Set message
			$this->session->set_flashdata('user_loggedin', 'Anda Sudah Login');

			redirect('index.php/frontend');
		} else {
			// Set message
			$this->session->set_flashdata('login_failed', 'Login Gagal, Periksa Kembali Uusername dan Password Anda');

			redirect('index.php/user/login');
		}		
		
	}
	}
	
	// Register user
	public function register(){
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('template/header_fo2');
			$this->load->view('frontend/register');
			$this->load->view('template/footer_fo2');
		} else {
			// Encrypt password
			// $enc_password = md5($this->input->post('password'));
			$enc_password = $this->input->post('password');

			$this->user_model->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

			redirect('index.php/frontend');
		}
	}

	//FUNGSI TAMBAH
	 public function Create()
	 {
		if(!$this->session->userdata('logged_in_admin')) 
			redirect('index.php/admin/login');
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('user_model');

		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		if($this->form_validation->run()==FALSE)
		{
		$this->load->view('user/tambah_user_view');
		}
		else
		{
		$this->user_model->insertevent();
		redirect('index.php/user');
		}
		}

	public function Update($id)
	{
		if(!$this->session->userdata('logged_in_admin')) 
			redirect('index.php/admin/login');
		$this->form_validation->set_rules('id_user','id_user','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');

		$data['user']=$this->user_model->getevent($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('user/edit_user_view',$data);
		}
		else{
			$this->user_model->UpdateById($id);
			redirect('index.php/user');
			}
		}	

	public function delete($id)
	{
		if(!$this->session->userdata('logged_in_admin')) 
			redirect('index.php/admin/login');
		$this->user_model->delete($id);
		$this->load->view('user/hapus_user_sukses');
	}

}

/* End of file event.php */
/* Location: ./application/controllers/event.php */