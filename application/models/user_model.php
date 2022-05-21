<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
    // Proses login user
    public function loginadmin($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('admin');


        if($result->num_rows() == 1){
            return $result->row(0)->id_admin;
        } else {
            return false;
        }
    }
    // Proses login user
    public function login($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');


        if($result->num_rows() == 1){
            return $result->row(0)->id_user;
        } else {
            return false;
        }
    }
    public function register($enc_password){
        // Array data user 
        $data = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
        );

        // Insert user
        return $this->db->insert('user', $data);
    }
	
	public function readevent(){
		$query=$this->db->get('user');
		return $query->result();
	}
	
	//FUNGSI TAMBAH
	 public function insertevent()
	 {
	 	$object = array
		('username' =>$this->input->post('username'),
	 	'password' =>$this->input->post('password'),
	 	'email' =>$this->input->post('email'),		 	
	 	'alamat' =>$this->input->post('alamat'),	 
	 	'no_telp' =>$this->input->post('no_telp')
	 	 );
	 	$this->db->insert('user',$object);
	 }

	public function getevent($id)
	{
		$this->db->where('id_user',$id);
		$query=$this->db->get('user');
		return $query->result();	 
	}
	
	public function UpdateById($id)
	{
		$data = array(
		 	'username' =>$this->input->post('username'),
		 	'password' =>$this->input->post('password'),
		 	'email' =>$this->input->post('email'),
		 	'alamat' =>$this->input->post('alamat'),
		 	'no_telp' =>$this->input->post('no_telp')
		 );
		$this->db->where('id_user',$id);
		$this->db->update('user',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('user');
	}
}

/* End of file event_model.php */
/* Location: ./application/models/event_model.php */