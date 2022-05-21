<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('event_model');
		$this->load->library('form_validation');
		$this->load->helper('url','form');

		if(!$this->session->userdata('logged_in_admin')) 
			redirect('index.php/admin/login');
			
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('event_model');
		
		$data['event']=$this->event_model->readevent();

		$this->load->view('event/list_event', $data);	
	}
	// Membuat fungsi create
	public function create()
	{
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
		$this->load->library('form_validation');


	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
	    $this->form_validation->set_rules('nama_event', 'Nama Event', 'required|is_unique[event.nama_event]',
			array(
				'required' 		=> 'Isi %s donk, males amat.',
				'is_unique' 	=> 'Judul <strong>' .$this->input->post('title'). '</strong> sudah ada bosque.'
			));

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('event/tambah_event_view');

	    } else {

    		// Apakah user upload gambar?
    		if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './assets/img/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2024;

    	        // Load library upload
    	        $this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('event/tambah_event_view', $data);

    	        } else {

    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini
    			$post_image = '';
    		}

	    	// Memformat slug sebagai alamat URL, 
	    	// Misal judul: "Hello World", kita format menjadi "hello-world"
	    	// Nantinya, URL blog kita menjadi mudah dibaca 
	    	// http://localhost/ci3-course/blog/hello-world

	    	$post_data = array(
				'nama_event' => $this->input->post('nama_event'),
	    	    'tanggal_event' => $this->input->post('tanggal_event'),
	    	   	'tempat_event' => $this->input->post("tempat_event"),
	    	    'total_tiket' => $this->input->post('total_tiket'),
	    	    'harga_satuan' => $this->input->post('harga_satuan'),
	    	    'deskripsi' => $this->input->post('deskripsi'),
	    	    'gambar' => $post_image,
	    	);

	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->event_model->insert_event($post_data);

		        $this->load->view('event/tambah_event_sukses');
	    	}
	    }
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{
		// Get artikel dari model berdasarkan $id
		$data['event'] = $this->event_model->getevent($id);

		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['event'] ) redirect('event');

		// Kita simpan dulu nama file yang lama
		$old_image = $data['event'][0]->gambar;

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('nama_event', 'Nama Event', 'required',
			array('required' => 'Isi %s donk, males amat.'));

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('event/edit_event_view', $data);

	    } else {

    		// Apakah user upload gambar?
    		if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './assets/img/';
    	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
    	        $config['max_size']             = 2024;

    	        // Load library upload
    	        $this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('event/edit_event_view', $data);

    	        } else {

    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './assets/img/'.$old_image ) ){
    	        		    unlink( './assets/img/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}

    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini, atau jika sudah ada, gunakan image sebelumnya
    			$post_image = ( !empty($old_image) ) ? $old_image : '';

    		}

	    	$post_data = array(
				'nama_event' => $this->input->post('nama_event'),
	    	    'tanggal_event' => $this->input->post('tanggal_event'),
	    	   	'tempat_event' => $this->input->post("tempat_event"),
	    	    'total_tiket' => $this->input->post('total_tiket'),
	    	    'harga_satuan' => $this->input->post('harga_satuan'),
	    	    'deskripsi' => $this->input->post('deskripsi'),
	    	    'gambar' => $post_image,
	    	);

	    	// Jika tidak ada error upload gambar, maka kita update datanya 
	    	if( empty($data['upload_error']) ) {

	    		// Update artikel sesuai post_data dan id-nya
		        $this->event_model->update_event($post_data, $id);

		        $this->load->view('event/edit_event_sukses', $data);
	    	}
	    }
	}

	public function Update($id)
	{
		$this->form_validation->set_rules('id_event','event','trim|required');
		$this->form_validation->set_rules('id_tiket','id_tiket','trim|required');
		$this->form_validation->set_rules('nama_event','nama_event','trim|required');
		$this->form_validation->set_rules('tanggal_event','tanggal_event','trim|required');
		$this->form_validation->set_rules('tempat_event','tempat_event','trim|required');
		$this->form_validation->set_rules('waktu_event','waktu_event','trim|required');

		$data['event']=$this->event_model->getevent($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('event/edit_event_view',$data);
		}
		else{
			$this->event_model->UpdateById($id);
			$this->load->view('event/edit_event_sukses');
			}
		}	

	public function delete($id)
	{
		$this->event_model->delete($id);
		$data['event']=$this->event_model->readevent();
		$this->load->view('event/list_event', $data);
	}

}
