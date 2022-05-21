<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function readevent(){
        $this->db->join('event', 'event.id_event = pembayaran.id_event', 'left');
		$query=$this->db->get('pembayaran');
		return $query->result();
	}
	
	//FUNGSI TAMBAH
	 public function insertbayar()
	 {
	 	$object = array
		(
	 	'id_user' =>$this->input->post('id_user'),
	 	'id_event' =>$this->input->post('id_event'),
	 	'jumlah_beli' =>$this->input->post('tiket'),	 
	 	'total_harga' =>$this->input->post('harga_satuan')*$this->input->post('tiket')
		);
	 	$this->db->insert('pembayaran',$object);
	}

	public function getpembayaran($id)
	{
		$this->db->where('id_bayar',$id);
		$query=$this->db->get('pembayaran');
		return $query->result();	 
	}
	
	public function UpdateById($id)
	{
		$data = array('status' =>1
		 );
		$this->db->where('id_bayar',$id);
		$this->db->update('pembayaran',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_bayar',$id);
		$this->db->delete('pembayaran');
	}
}

/* End of file event_model.php */
/* Location: ./application/models/event_model.php */