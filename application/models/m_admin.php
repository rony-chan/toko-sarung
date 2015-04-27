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

	//////////////
	// ALL ABOUT ADMIN
	/////////////
	//lihat semua data admin
	public function listAdmin($limit,$offset){
		$this->db->limit($limit,$offset);
		$query = $this->db->get('admin');
		return $query->result_array();
	}
	//detail admin
	public function detailAdmin($id){
		$this->db->where('id_admin',$id);
		$query = $this->db->get('admin');
		return $query->row_array();//get admin data on single array
	}

	//Database for Android
	public function data_sarung(){
		$sql = "SELECT nama, jumlah, merek from sarung inner join sarung_merk on sarung.id_merk=sarung_merk.id_sarung_merk";
		$query = $this->db->query($sql);
		if($query->num_rows()>0) {
			return $query->result_array();
		}else{
			return array();
		}
	}
	
	public function data_sarung_habis(){
		$sql = "SELECT nama, jumlah, merek from sarung inner join sarung_merk on sarung.id_merk=sarung_merk.id_sarung_merk WHERE jumlah=0";
		$query = $this->db->query($sql);
		if($query->num_rows()>0) {
			return $query->result_array();
		}else{
			return array();
		}
	}

	public function data_pemasok(){
		$sql = "SELECT pemasok.nama_pemasok, sarung.nama, pasokan_item.jumlah, pasokan_item.subtotal FROM pasokan_item 
				INNER JOIN pasokan ON pasokan.id_pasokan = pasokan_item.id_pasokan 
				INNER JOIN pemasok ON pasokan.id_pemasok = pemasok.id_pemasok 
				INNER JOIN sarung on sarung.id_sarung = pasokan_item.id_sarung ";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}else{
			return array();
		}
	}

	public function data_penjualan(){
		$sql = "SELECT pelanggan.nama_lengkap, sarung.nama, pesan_item.jumlah, pesan_item.subtotal from pelanggan 
				inner join pesan on pesan.id_pelanggan=pelanggan.id_pelanggan 
				inner join pesan_item on pesan_item.id_pesan=pesan.id_pesan 
				inner join sarung on sarung.id_sarung=pesan_item.id_sarung";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}else{
			return array();
		}
	}
}