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
		$this->db->or_where('password',$password);
		$query = $this->db->get('pelanggan');
		if($query->num_rows()>2){
			return $query->result_array();
		}else{
			return array();
		}
	}
}