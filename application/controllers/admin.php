<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('url', 'form');
	}

	public function index()
	{
		if (!$this->session->userdata('logged_in_admin'))
			redirect('index.php/admin/login');

		$this->load->helper('url');
		$this->load->model('admin_model');
		$data['admin'] = $this->admin_model->readevent();
		$this->load->view('admin/list_admin', $data);
	}

	public function login()
	{
		$this->load->helper('url');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/header_fo2');
			$this->load->view('frontend/login_admin');
			$this->load->view('template/footer_fo2');
		} else {

			// Get username
			$username = $this->input->post('username');
			// Get & encrypt password
			// $password = md5($this->input->post('password'));
			$password = $this->input->post('password');

			// Login user
			$id_admin = $this->user_model->loginadmin($username, $password);

			if ($id_admin) {
				// Buat session
				$user_data = array(
					'id_admin' => $id_admin,
					'username' => $username,
					'logged_in_admin' => true,
				);

				$this->session->set_userdata($user_data);

				// Set message
				$this->session->set_flashdata('user_loggedin', 'Anda Sudah Login');

				redirect('index.php/admin');
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Login Gagal, Periksa Username dan Password Anda');

				redirect('index.php/admin/login');
			}
		}
	}

	// Log user out
	public function logout()
	{
		// Unset user data
		$this->session->unset_userdata('logged_in_admin');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda Sudah Log Out');

		redirect('index.php/admin/login');
	}

	public function Update($id)
	{
		if (!$this->session->userdata('logged_in_admin'))
			redirect('index.php/admin/login');

		$this->form_validation->set_rules('id_admin', 'id_admin', 'trim|required');
		$this->form_validation->set_rules('nama_admin', 'nama_admin', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		$data['admin'] = $this->admin_model->getevent($id);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/edit_admin_view', $data);
		} else {
			$this->admin_model->UpdateById($id);
			redirect('index.php/admin');
		}
	}

	public function delete($id)
	{
		if (!$this->session->userdata('logged_in_admin'))
			redirect('index.php/admin/login');

		$this->admin_model->delete($id);
		$this->load->view('admin/hapus_admin_sukses');
	}
}

/* End of file event.php */
/* Location: ./application/controllers/event.php */