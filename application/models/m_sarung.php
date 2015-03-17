<?php

class m_sarung extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//menampilkan semua sarung
	public function daftarSarung($limit,$offset){
		$params = array($offset,$limit);
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi,sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk
		ORDER BY sarung.id_sarung DESC
		LIMIT ?,?";
		$query = $this->db->query($sql,$params);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}

	}
	//menampilkan semua sarung yang habis
	public function daftarSarungHabis($limit,$offset){
		$params = array($offset,$limit);
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi,sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk
		WHERE sarung.jumlah = 0
		ORDER BY sarung.id_sarung DESC
		LIMIT ?,?";
		$query = $this->db->query($sql,$params);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}

	}
	//hitung jumlah sarung yang habis
	public function countDaftarSarungHabis(){
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi,sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk
		WHERE sarung.jumlah = 0
		ORDER BY sarung.id_sarung DESC";
		$query = $this->db->query($sql);
		$query->num_rows();
	}
	//menampilkan semua sarung
	public function daftarSarungByMerek($limit,$offset,$idmerek){
		$params = array($idmerek,$offset,$limit);
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi,sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk		
		WHERE sarung.id_merk = ?
		ORDER BY sarung.id_sarung DESC
		LIMIT ?,?";
		$query = $this->db->query($sql,$params);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}

	}
	//menampilkan id sarung yang terakhir dimasukan
	public function getLastIdSarung(){
		$this->db->order_by('id_sarung','desc');
		$query = $this->db->get('sarung');
		$query = $query->row_array();
		return $query['id_sarung'];//get last id of sarung
	}
	//cari sarung
	public function cariSarung($limit,$offset,$keyword){
		$params = array($offset,$limit);
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi,sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk		
		WHERE sarung.nama LIKE '%".$keyword."%' OR sarung.deskripsi LIKE '%".$keyword."%' 
		ORDER BY sarung.id_sarung DESC
		LIMIT ?,?";
		$query = $this->db->query($sql,$params);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	//menampilkan salah satu foto sarung
	public function fotoSarung($idsarung){
		$this->db->where('id_sarung',$idsarung);
		$query = $this->db->get('gambar',1,0);
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return array();
		}
	}
	//menampilkan detail sarung
	public function detailSarung($id){//id sarung
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi, sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk
		WHERE sarung.id_sarung = ?
		ORDER BY sarung.id_sarung DESC";
		$query = $this->db->query($sql,$id);
		if($query->num_rows>0){
			return $query->row_array();
		}else{
			return array();
		}		
	}
	//gambar by sarung
	public function gambarBySarung($idsarung){
		$this->db->where('id_sarung',$idsarung);
		$query = $this->db->get('gambar');
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	//sarung kategori
	public function semuaMerk(){
		$query = $this->db->get('sarung_merk');
		return $query->result_array();
	}
	//nama merek
	public function merek($idmerek){
		$this->db->where('id_sarung_merk',$idmerek);
		$query=$this->db->get('sarung_merk');
		$query = $query->row_array();
		return $query['merek'];
	}
}