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
	//menampilkan detail sarung
	public function detailSarung($id){//id sarung
		$sql = "SELECT sarung.id_sarung AS 'id_sarung', sarung_merk.merek AS 'merek',nama,jumlah, harga,deskripsi, sarung_merk.merek AS 'merek',sarung_merk.id_sarung_merk AS 'id_merk'
		FROM sarung 
		INNER JOIN sarung_merk ON sarung_merk.id_sarung_merk = sarung.id_merk
		ORDER BY sarung.id_sarung DESC
		WHERE sarung.id_sarung = ?";
		$query = $this->db->query($sql,$params);
		if($query->num_rows>0){
			return $query->row_array();
		}else{
			return array();
		}		
	}
	//sarung kategori
	public function semuaMerk(){
		$query = $this->db->get('sarung_merk');
		return $query->result_array();
	}
}