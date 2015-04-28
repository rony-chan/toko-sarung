<?php

class m_user extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//can login
	public function can_login($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('pelanggan');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	public function validate_credentials(){
		$username = $this->input->post('input_username');
		$password = md5(md5($this->input->post('input_password')));
		//cek apakah tersedia di database
		if($this->m_admin->can_login($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials','email dan password tidak cocok');
			return false;
		}
	}
	//get detail user by id
	public function userbyId($iduser){
		$this->db->where('id_pelanggan',$iduser);
		$query = $this->db->get('pelanggan');
		return $query->row_array();
	}
	//show all member
	public function listMember($limit,$offset){
		$this->db->limit($limit,$offset);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}
}
