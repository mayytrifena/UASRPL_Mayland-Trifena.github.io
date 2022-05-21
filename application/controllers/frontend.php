<?php
defined('BASEPATH') or exit('No direct script access allowed');

class frontend extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('event_model');
		$this->load->model('pembayaran_model');
		$this->load->library('form_validation');
		$this->load->helper('url', 'form');
	}

	public function index()
	{
		$this->load->helper('url');

		$data['event'] = $this->event_model->readevent();

		$this->load->view('template/header_fo');
		$this->load->view('frontend/index', $data);
		$this->load->view('template/footer_fo');
	}

	public function about()
	{
		$this->load->helper('url');

		$this->load->view('template/header_fo');
		$this->load->view('frontend/about');
		$this->load->view('template/footer_fo');
	}

	public function pesanan()
	{
		if (!$this->session->userdata('logged_in'))
			redirect('index.php/user/login');
		$this->load->helper('url');

		$data['pembayaran'] = $this->pembayaran_model->readevent();

		$this->load->view('template/header_fo');
		$this->load->view('frontend/pesanan', $data);
		$this->load->view('template/footer_fo');
	}

	//FUNGSI TAMBAH
	public function booking()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('index.php/user/login');
		} else {


			$this->load->helper('url', 'form');
			$this->load->library('form_validation');
			$this->load->model('pembayaran_model');

			$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('frontend');
			} else {
				$this->pembayaran_model->insertbayar();
				redirect('index.php/frontend/pesanan');
			}
		}
	}


	public function Update($id)
	{
		$this->form_validation->set_rules('id_admin', 'id_admin', 'trim|required');
		$this->form_validation->set_rules('nama_admin', 'nama_admin', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		$data['admin'] = $this->admin_model->getevent($id);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/edit_admin_view', $data);
		} else {
			$this->admin_model->UpdateById($id);
			$this->load->view('admin/edit_admin_sukses');
		}
	}

	public function delete($id)
	{
		$this->admin_model->delete($id);
		$this->load->view('admin/hapus_admin_sukses');
	}
}

/* End of file event.php */
/* Location: ./application/controllers/event.php */