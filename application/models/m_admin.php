<?php 

class m_admin extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//can login
	public function can_login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return array();
		}
	}
	//show all sarung
	public function showSarung($limit,$offset){
		$this->db->select('*');
		$this->db->join('sarung_merek','sarung_merek.id_sarung_merek = sarung.id_merek');
		$query = $this->db->get('sarung');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	//count show all sarung
	public function countShowSarung(){$query = $this->db->get('sarung');return $query->row_array();}

	//////////////
	// ALL ABOUT PESANAN
	/////////////
	//ubah status pesanan
	public function ubahStatusPesanan($idpesanan,$status){
		$this->db->where('id_pesan',$idpesanan);
		return $this->db->update('pesan',array('status'=>str_replace('-', ' ', $status)));
	}
}